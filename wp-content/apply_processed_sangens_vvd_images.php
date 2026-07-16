<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/image.php';

$manifest_path = WP_CONTENT_DIR . '/hws-sangens-vvd-processed.json';
$upload_dir = wp_upload_dir();
$processed_dir = trailingslashit($upload_dir['basedir']) . 'hws-processed-media';
$processed_url = trailingslashit($upload_dir['baseurl']) . 'hws-processed-media';

$payload = json_decode(file_get_contents($manifest_path), true);
if (!$payload || empty($payload['processed'])) {
    echo "processed=0\n";
    return;
}

$applied = 0;
$failed = 0;
foreach ($payload['processed'] as $row) {
    $product_id = (int) ($row['product_id'] ?? 0);
    $source_attachment_id = (int) ($row['attachment_id'] ?? 0);
    $filename = sanitize_file_name($row['processed_file'] ?? '');
    if (!$product_id || !$source_attachment_id || !$filename) {
        $failed++;
        continue;
    }

    $file_path = trailingslashit($processed_dir) . $filename;
    if (!file_exists($file_path)) {
        echo "missing file {$file_path}\n";
        $failed++;
        continue;
    }

    $existing = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'fields' => 'ids',
        'posts_per_page' => 1,
        'meta_key' => '_hws_processed_for_attachment_id',
        'meta_value' => $source_attachment_id,
    ]);

    if ($existing) {
        $attachment_id = (int) $existing[0];
    } else {
        $attachment_id = wp_insert_attachment([
            'post_mime_type' => 'image/png',
            'post_title' => pathinfo($filename, PATHINFO_FILENAME),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => trailingslashit($processed_url) . $filename,
        ], $file_path, $product_id);

        if (is_wp_error($attachment_id) || !$attachment_id) {
            echo "attachment failed {$product_id}\n";
            $failed++;
            continue;
        }
        update_post_meta($attachment_id, '_hws_processed_for_attachment_id', $source_attachment_id);
        update_post_meta($attachment_id, '_hws_background_removed', 'white-edge-v1');
        update_post_meta($attachment_id, '_hws_source_attachment_url', $row['url'] ?? '');
        $metadata = wp_generate_attachment_metadata($attachment_id, $file_path);
        wp_update_attachment_metadata($attachment_id, $metadata);
    }

    set_post_thumbnail($product_id, $attachment_id);
    update_post_meta($product_id, '_hws_processed_thumbnail_id', $attachment_id);
    $applied++;
}

wc_delete_product_transients();
wp_cache_flush();

echo "applied={$applied} failed={$failed}\n";
