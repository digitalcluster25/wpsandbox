<?php
if (!defined('ABSPATH')) {
    exit;
}

$json_path = getenv('HWS_IMPORT_JSON') ?: ($argv[1] ?? '');
if (!$json_path || !file_exists($json_path)) {
    fwrite(STDERR, "HWS_IMPORT_JSON is required\n");
    exit(1);
}

$payload = json_decode(file_get_contents($json_path), true);
if (!is_array($payload)) {
    fwrite(STDERR, "Import JSON is invalid\n");
    exit(1);
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

$brand_id = hws_ensure_product_brand_term('EasySteam');
$updated = 0;
$skipped = 0;

foreach ($payload as $item) {
    $sku = trim((string) ($item['source_sku'] ?? ''));
    $name = trim((string) ($item['display_name'] ?? $item['name'] ?? ''));
    if (!$sku || !$name) {
        $skipped++;
        continue;
    }

    $product_id = wc_get_product_id_by_sku($sku);
    $product = $product_id ? wc_get_product($product_id) : null;
    if (!$product) {
        $skipped++;
        continue;
    }

    $product->set_name($name);
    $product->save();
    if ($brand_id) {
        wp_set_object_terms($product_id, [$brand_id], 'product_brand', false);
    }
    wc_delete_product_transients($product_id);
    $updated++;
}

echo wp_json_encode([
    'updated_products' => $updated,
    'skipped' => $skipped,
    'brand_term_id' => $brand_id,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
