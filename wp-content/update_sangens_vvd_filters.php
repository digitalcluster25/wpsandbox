<?php
if (!defined('ABSPATH')) {
    exit;
}

function hws_attr_term_id($taxonomy, $name) {
    if (!taxonomy_exists($taxonomy) || !$name) {
        return 0;
    }
    $term = get_term_by('name', $name, $taxonomy);
    if ($term) {
        return (int) $term->term_id;
    }
    $created = wp_insert_term($name, $taxonomy, ['slug' => sanitize_title($name)]);
    return is_wp_error($created) ? 0 : (int) $created['term_id'];
}

function hws_set_filter_terms($product_id, $taxonomy, $names) {
    $names = array_values(array_unique(array_filter(array_map('trim', (array) $names))));
    if (!$names || !taxonomy_exists($taxonomy)) {
        return;
    }

    $term_ids = [];
    foreach ($names as $name) {
        $term_id = hws_attr_term_id($taxonomy, $name);
        if ($term_id) {
            $term_ids[] = $term_id;
        }
    }
    if (!$term_ids) {
        return;
    }

    wp_set_object_terms($product_id, $term_ids, $taxonomy, false);

    $product = wc_get_product($product_id);
    if (!$product) {
        return;
    }
    $attributes = $product->get_attributes();
    $attribute = new WC_Product_Attribute();
    $attribute->set_id(wc_attribute_taxonomy_id_by_name(str_replace('pa_', '', $taxonomy)));
    $attribute->set_name($taxonomy);
    $attribute->set_options($term_ids);
    $attribute->set_position(count($attributes));
    $attribute->set_visible(false);
    $attribute->set_variation(false);
    $attributes[$taxonomy] = $attribute;
    $product->set_attributes($attributes);
    $product->save();
}

function hws_extract_power_terms($text) {
    $terms = [];
    if (preg_match_all('/(\d+(?:[,.]\d+)?)\s*кВт/iu', $text, $matches)) {
        foreach ($matches[1] as $value) {
            $value = str_replace(',', '.', $value);
            $terms[] = rtrim(rtrim($value, '0'), '.') . ' кВт';
        }
    }
    return $terms;
}

function hws_extract_volume_terms($text) {
    $terms = [];
    if (preg_match_all('/(?:до|об[ъе]м[^\d]{0,20})(\d+(?:[,.]\d+)?)\s*м[³3]/iu', $text, $matches)) {
        foreach ($matches[1] as $value) {
            $value = str_replace(',', '.', $value);
            $terms[] = 'до ' . rtrim(rtrim($value, '0'), '.') . ' м3';
        }
    }
    return $terms;
}

function hws_material_terms($text) {
    $map = [
        'Стекло' => ['стекло', 'glass'],
        'Камень' => ['камень', 'stone'],
        'Кирпич' => ['кирпич', 'brick'],
        'Керамика' => ['керамик', 'ceramic'],
        'Серпентинит' => ['серпентинит'],
        'Чугун' => ['чугун'],
    ];
    $found = [];
    $lower = mb_strtolower($text);
    foreach ($map as $term => $needles) {
        foreach ($needles as $needle) {
            if (str_contains($lower, $needle)) {
                $found[] = $term;
                break;
            }
        }
    }
    return $found;
}

$query = new WP_Query([
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => [[
        'taxonomy' => 'product_brand',
        'field' => 'name',
        'terms' => ['Sangens', 'ВВД'],
    ]],
]);

$updated = 0;
foreach ($query->posts as $post) {
    $product_id = $post->ID;
    $brand_terms = wp_get_post_terms($product_id, 'product_brand', ['fields' => 'names']);
    $brand = $brand_terms[0] ?? '';
    $text = get_the_title($product_id) . ' ' . wp_strip_all_tags(get_post_meta($product_id, '_hws_specs_html', true));
    $source_url = get_post_meta($product_id, '_hws_source_url', true);
    $haystack = mb_strtolower($text . ' ' . $source_url);

    if ($brand === 'Sangens') {
        hws_set_filter_terms($product_id, 'pa_fuel-type', ['Электричество']);
        hws_set_filter_terms($product_id, 'pa_usage-class', ['Частное использование']);
        hws_set_filter_terms($product_id, 'pa_power', hws_extract_power_terms($text));
        hws_set_filter_terms($product_id, 'pa_steam-room-volume', hws_extract_volume_terms($text));
        hws_set_filter_terms($product_id, 'pa_cladding-material', hws_material_terms($text));
    } elseif ($brand === 'ВВД') {
        $fuel = str_contains($haystack, 'drovyanye') || str_contains($haystack, 'дров') ? 'Дрова' : 'Электричество';
        hws_set_filter_terms($product_id, 'pa_fuel-type', [$fuel]);
        hws_set_filter_terms($product_id, 'pa_power', hws_extract_power_terms($text));
        hws_set_filter_terms($product_id, 'pa_steam-room-volume', hws_extract_volume_terms($text));
        hws_set_filter_terms($product_id, 'pa_cladding-material', hws_material_terms($text));
        if (str_contains($haystack, 'профи') || str_contains($haystack, 'parizhar') || str_contains($haystack, 'futurus')) {
            hws_set_filter_terms($product_id, 'pa_usage-class', ['Коммерческое использование']);
        } else {
            hws_set_filter_terms($product_id, 'pa_usage-class', ['Частное использование']);
        }
    }
    $updated++;
}

wc_delete_product_transients();
wp_cache_flush();

echo "updated=$updated\n";
