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

function hws_short_description_without_sku($product) {
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
    return '<ul class="hws-product-highlights">' . implode('', $lines) . '</ul>';
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
    if (!$product) {
        $skipped++;
        continue;
    }

    $product->set_short_description(hws_short_description_without_sku($item));
    $product->save();
    wc_delete_product_transients($product_id);
    $updated++;
}

echo wp_json_encode([
    'updated_short_descriptions' => $updated,
    'skipped' => $skipped,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
