<?php
if (!defined('ABSPATH')) {
    exit;
}

$json_path = getenv('HWS_IMPORT_JSON') ?: ($argv[1] ?? '/tmp/easysteam_wp_import.json');
$payload = json_decode(file_get_contents($json_path), true);
if (!is_array($payload)) {
    fwrite(STDERR, "Import JSON is invalid\n");
    exit(1);
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

function hws_clean_text($value) {
    return trim(wp_strip_all_tags((string) $value));
}

function hws_import_price($rub_price) {
    $rate = (float) getenv('HWS_USD_RUB_RATE');
    if ($rate > 0) {
        return (string) (ceil(((float) $rub_price / $rate) / 10) * 10);
    }
    return (string) $rub_price;
}

function hws_attribute_key($name) {
    return sanitize_title($name);
}

function hws_ensure_product_brand_term($brand_name) {
    if (!taxonomy_exists('product_brand')) {
        return 0;
    }

    $term = get_term_by('name', $brand_name, 'product_brand');
    if ($term) {
        return (int) $term->term_id;
    }

    $created = wp_insert_term($brand_name, 'product_brand', ['slug' => sanitize_title($brand_name)]);
    if (is_wp_error($created)) {
        return 0;
    }

    return (int) $created['term_id'];
}

function hws_find_attachment_by_source($url) {
    if (!$url) {
        return 0;
    }
    $ids = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_key' => '_hws_source_url',
        'meta_value' => $url,
    ]);
    return $ids ? (int) $ids[0] : 0;
}

function hws_sideload_image($url, $post_id, $desc = '') {
    $url = trim((string) $url);
    if (!$url) {
        return 0;
    }
    $existing = hws_find_attachment_by_source($url);
    if ($existing) {
        return $existing;
    }
    $attachment_id = media_sideload_image($url, $post_id, $desc, 'id');
    if (is_wp_error($attachment_id)) {
        return 0;
    }
    update_post_meta($attachment_id, '_hws_source_url', $url);
    return (int) $attachment_id;
}

function hws_product_description($product) {
    $detail = $product['raw_data']['detail'] ?? [];
    if (!empty($product['description'])) {
        return wpautop(esc_html($product['description']));
    }

    if (!empty($detail['description'])) {
        return wpautop(esc_html($detail['description']));
    }

    $parts = [];
    if (!empty($detail['banner_text'])) {
        $parts[] = '<p>' . esc_html($detail['banner_text']) . '</p>';
    }
    return implode("\n", $parts);
}

function hws_short_description($product) {
    $detail = $product['raw_data']['detail'] ?? [];
    $lines = [];
    foreach (($product['specs'] ?? []) as $spec) {
        if (in_array($spec['name'], ['Максимальный объем парной', 'Диаметр дымохода', 'Каменка', 'Парогенератор'], true)) {
            $lines[] = '<li><strong>' . esc_html($spec['name']) . ':</strong> ' . esc_html($spec['normalized_value'] ?: $spec['raw_value']) . '</li>';
        }
    }
    if (!$lines && !empty($detail['volume_text'])) {
        $lines[] = '<li>' . esc_html($detail['volume_text']) . '</li>';
    }
    $sku = $product['source_sku'] ?? '';
    if ($sku) {
        $lines[] = '<li><strong>Артикул:</strong> ' . esc_html($sku) . '</li>';
    }
    return '<ul class="hws-product-highlights">' . implode('', $lines) . '</ul>';
}

function hws_specs_html($specs) {
    if (!$specs) {
        return '';
    }
    $rows = [];
    foreach ($specs as $spec) {
        $value = $spec['normalized_value'] ?: $spec['raw_value'];
        if (!$value) {
            continue;
        }
        $rows[] = '<tr><th>' . esc_html($spec['name']) . '</th><td>' . esc_html($value) . '</td></tr>';
    }
    if (!$rows) {
        return '';
    }
    return '<table class="shop_attributes hws-specs"><tbody>' . implode('', $rows) . '</tbody></table>';
}

function hws_cartesian($groups, $index = 0, $current = []) {
    if ($index >= count($groups)) {
        return [$current];
    }
    $result = [];
    foreach ($groups[$index]['values'] as $value) {
        $next = $current;
        $next[] = ['group' => $groups[$index], 'value' => $value];
        foreach (hws_cartesian($groups, $index + 1, $next) as $combo) {
            $result[] = $combo;
        }
    }
    return $result;
}

function hws_default_combo($groups) {
    $combo = [];
    foreach ($groups as $group) {
        $selected = $group['values'][0] ?? null;
        foreach ($group['values'] as $value) {
            if (!empty($value['is_default'])) {
                $selected = $value;
                break;
            }
        }
        if ($selected) {
            $combo[] = ['group' => $group, 'value' => $selected];
        }
    }
    return [$combo];
}

function hws_update_product($product) {
    $base_sku = trim((string) ($product['source_sku'] ?? ''));
    echo "Importing {$base_sku} / catalog {$product['id']}\n";
    if (!$base_sku) {
        return ['status' => 'skipped', 'reason' => 'missing sku'];
    }

    $product_id = wc_get_product_id_by_sku($base_sku);
    $wc_product = $product_id ? wc_get_product($product_id) : new WC_Product_Variable();
    if (!$wc_product || !($wc_product instanceof WC_Product_Variable)) {
        $wc_product = new WC_Product_Variable();
    }

    $name = $product['display_name'] ?: $product['name'];
    $wc_product->set_name($name);
    $wc_product->set_slug(sanitize_title('easysteam-' . $base_sku));
    $wc_product->set_sku($base_sku);
    $wc_product->set_status('publish');
    $wc_product->set_catalog_visibility('visible');
    $wc_product->set_description(hws_product_description($product));
    $wc_product->set_short_description(hws_short_description($product));
    $wc_product->set_manage_stock(false);
    $wc_product->set_stock_status('instock');

    $category = get_term_by('name', 'Дровяные печи EasySteam', 'product_cat');
    if (!$category) {
        $created = wp_insert_term('Дровяные печи EasySteam', 'product_cat', ['slug' => 'easysteam-wood-stoves']);
        $category_id = is_wp_error($created) ? 0 : (int) $created['term_id'];
    } else {
        $category_id = (int) $category->term_id;
    }
    if ($category_id) {
        $wc_product->set_category_ids([$category_id]);
    }
    $main_image = $product['main_image'] ?: ($product['raw_data']['detail']['main_image'] ?? null) ?: ($product['raw_data']['card']['image'] ?? null);
    if (getenv('HWS_IMPORT_IMAGES') && $main_image) {
        $image_id = hws_sideload_image($main_image, $wc_product->get_id(), $name);
        if ($image_id) {
            $wc_product->set_image_id($image_id);
        }
    }

    $attributes = [];
    foreach ($product['option_groups'] as $position => $group) {
        $attribute = new WC_Product_Attribute();
        $attribute->set_id(0);
        $attribute->set_name($group['name']);
        $attribute->set_options(array_values(array_unique(array_map(function ($value) {
            return $value['name'];
        }, $group['values']))));
        $attribute->set_position($position);
        $attribute->set_visible(true);
        $attribute->set_variation(true);
        $attributes[] = $attribute;
    }
    $wc_product->set_attributes($attributes);
    $product_id = $wc_product->save();
    $brand_id = hws_ensure_product_brand_term($product['brand'] ?? ($product['raw_data']['brand'] ?? 'EasySteam'));
    if ($brand_id) {
        wp_set_object_terms($product_id, [$brand_id], 'product_brand', false);
    }

    update_post_meta($product_id, '_hws_catalog_product_id', $product['id']);
    update_post_meta($product_id, '_hws_specs_html', hws_specs_html($product['specs'] ?? []));
    update_post_meta($product_id, '_hws_source_payload', wp_json_encode($product, JSON_UNESCAPED_UNICODE));
    if ((float) getenv('HWS_USD_RUB_RATE') > 0) {
        update_post_meta($product_id, '_hws_usd_rub_rate', (float) getenv('HWS_USD_RUB_RATE'));
        update_post_meta($product_id, '_hws_price_currency', 'USD');
        update_option('woocommerce_currency', 'USD');
    }

    $old_variations = get_children([
        'post_parent' => $product_id,
        'post_type' => 'product_variation',
        'post_status' => ['publish', 'private'],
        'fields' => 'ids',
        'numberposts' => -1,
    ]);
    foreach ($old_variations as $variation_id) {
        wp_delete_post($variation_id, true);
    }

    $base_price = (float) ($product['base_price'] ?? 0);
    $all_combos = hws_cartesian($product['option_groups']);
    $max_variations = (int) (getenv('HWS_MAX_VARIATIONS') ?: 200);
    $combos = count($all_combos) > $max_variations ? hws_default_combo($product['option_groups']) : $all_combos;
    echo "Product {$base_sku}: " . count($all_combos) . " possible combinations, importing " . count($combos) . "\n";
    update_post_meta($product_id, '_hws_possible_variation_count', count($all_combos));
    update_post_meta($product_id, '_hws_imported_variation_count', count($combos));
    $variation_count = 0;
    foreach ($combos as $combo) {
        $variation = new WC_Product_Variation();
        $variation->set_parent_id($product_id);
        $variation->set_status('publish');
        $price = $base_price;
        $suffixes = [];
        $variation_attributes = [];
        $variation_image = 0;
        foreach ($combo as $selected) {
            $group = $selected['group'];
            $value = $selected['value'];
            $price += (float) ($value['delta_price'] ?? 0);
            if (!empty($value['sku_suffix'])) {
                $suffixes[] = $value['sku_suffix'];
            }
            $variation_attributes[hws_attribute_key($group['name'])] = $value['name'];
            if (getenv('HWS_IMPORT_VARIATION_IMAGES') && getenv('HWS_USE_OPTION_IMAGES_FOR_VARIATIONS') && !$variation_image && !empty($value['image_url'])) {
                $variation_image = hws_sideload_image($value['image_url'], $product_id, $name . ' ' . $value['name']);
            }
        }
        $variation->set_sku('ES-' . $base_sku . '-' . implode('-', $suffixes));
        $source_price = (string) max(0, $price);
        $variation->set_regular_price(hws_import_price($source_price));
        $variation->set_attributes($variation_attributes);
        $variation->set_manage_stock(false);
        $variation->set_stock_status('instock');
        if ($variation_image) {
            $variation->set_image_id($variation_image);
        }
        $variation_id = $variation->save();
        update_post_meta($variation_id, '_hws_price_rub_source', $source_price);
        if ((float) getenv('HWS_USD_RUB_RATE') > 0) {
            update_post_meta($variation_id, '_hws_usd_rub_rate', (float) getenv('HWS_USD_RUB_RATE'));
        }
        $variation_count++;
    }

    WC_Product_Variable::sync($product_id);
    wc_delete_product_transients($product_id);

    return ['status' => 'ok', 'product_id' => $product_id, 'variations' => $variation_count, 'sku' => $base_sku];
}

$results = [];
foreach ($payload as $product) {
    $results[] = hws_update_product($product);
}

echo wp_json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
