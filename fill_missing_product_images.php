<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

function hws_find_attachment_by_source_url($url) {
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

$products = wc_get_products([
    'limit' => -1,
    'type' => ['simple', 'variable'],
    'return' => 'objects',
]);

$updated = [];
$skipped = [];

foreach ($products as $product) {
    $sku = $product->get_sku();
    if (!preg_match('/^\d+$/', $sku)) {
        continue;
    }
    if ($product->get_image_id()) {
        continue;
    }

    $payload = json_decode((string) get_post_meta($product->get_id(), '_hws_source_payload', true), true);
    $url = $payload['main_image']
        ?? ($payload['raw_data']['detail']['main_image'] ?? null)
        ?? ($payload['raw_data']['card']['image'] ?? null);

    if (!$url) {
        $skipped[] = [$product->get_id(), $sku, 'no source image'];
        continue;
    }

    $attachment_id = hws_find_attachment_by_source_url($url);
    if (!$attachment_id) {
        $attachment_id = media_sideload_image($url, $product->get_id(), $product->get_name(), 'id');
        if (is_wp_error($attachment_id)) {
            $skipped[] = [$product->get_id(), $sku, $attachment_id->get_error_message()];
            continue;
        }
        update_post_meta($attachment_id, '_hws_source_url', $url);
    }

    $product->set_image_id((int) $attachment_id);
    $product->save();
    $updated[] = [$product->get_id(), $sku, $attachment_id, $url];
}

echo wp_json_encode([
    'updated' => $updated,
    'skipped' => $skipped,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
