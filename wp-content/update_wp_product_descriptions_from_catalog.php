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

function hws_catalog_description_html($item) {
    $description = trim((string) ($item['description'] ?? ''));
    if (!$description && !empty($item['raw_data']['detail']['description'])) {
        $description = trim((string) $item['raw_data']['detail']['description']);
    }
    if (!$description && !empty($item['raw_data']['detail']['banner_text'])) {
        $description = trim((string) $item['raw_data']['detail']['banner_text']);
    }
    return $description ? wpautop(esc_html($description)) : '';
}

$updated = 0;
$skipped = 0;
foreach ($payload as $item) {
    $sku = trim((string) ($item['source_sku'] ?? ''));
    if (!$sku) {
        $skipped++;
        continue;
    }

    $product_id = wc_get_product_id_by_sku($sku);
    $product = $product_id ? wc_get_product($product_id) : null;
    $description = hws_catalog_description_html($item);
    if (!$product || !$description) {
        $skipped++;
        continue;
    }

    $product->set_description($description);
    $product->save();
    wc_delete_product_transients($product_id);
    $updated++;
}

echo wp_json_encode([
    'updated_descriptions' => $updated,
    'skipped' => $skipped,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
