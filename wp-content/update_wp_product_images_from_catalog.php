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

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

function hws_find_attachment_by_source_url_for_image_update($url) {
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

function hws_sideload_catalog_image_for_update($url, $post_id, $desc) {
    $url = trim((string) $url);
    if (!$url) {
        return 0;
    }

    $existing = hws_find_attachment_by_source_url_for_image_update($url);
    if ($existing) {
        return $existing;
    }

    $attachment_id = media_sideload_image($url, $post_id, $desc, 'id');
    if (is_wp_error($attachment_id)) {
        fwrite(STDERR, "Image import failed for {$url}: " . $attachment_id->get_error_message() . "\n");
        return 0;
    }
    update_post_meta($attachment_id, '_hws_source_url', $url);
    return (int) $attachment_id;
}

$updated = 0;
$skipped = 0;
foreach ($payload as $item) {
    $sku = trim((string) ($item['source_sku'] ?? ''));
    $image_url = trim((string) ($item['main_image'] ?? ''));
    if (!$sku || !$image_url) {
        $skipped++;
        continue;
    }

    $product_id = wc_get_product_id_by_sku($sku);
    $product = $product_id ? wc_get_product($product_id) : null;
    if (!$product) {
        $skipped++;
        continue;
    }

    $attachment_id = hws_sideload_catalog_image_for_update($image_url, $product_id, $product->get_name());
    if (!$attachment_id) {
        $skipped++;
        continue;
    }

    $product->set_image_id($attachment_id);
    $product->save();
    wc_delete_product_transients($product_id);
    $updated++;
}

$variation_ids = get_posts([
    'post_type' => 'product_variation',
    'post_status' => ['publish', 'private'],
    'posts_per_page' => -1,
    'fields' => 'ids',
    'meta_query' => [
        [
            'key' => '_sku',
            'value' => 'ES-',
            'compare' => 'LIKE',
        ],
    ],
]);

$cleared_variation_images = 0;
foreach ($variation_ids as $variation_id) {
    if ((int) get_post_thumbnail_id($variation_id)) {
        delete_post_thumbnail($variation_id);
        $cleared_variation_images++;
    }
}

echo wp_json_encode([
    'updated_product_images' => $updated,
    'skipped' => $skipped,
    'checked_variations' => count($variation_ids),
    'cleared_variation_images' => $cleared_variation_images,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
