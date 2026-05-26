<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

function hws_sg_abs_url($base, $url) {
    $url = html_entity_decode(trim((string) $url), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    if (!$url || str_starts_with($url, 'data:')) {
        return '';
    }
    if (str_starts_with($url, '//')) {
        return 'https:' . $url;
    }
    if (preg_match('~^https?://~i', $url)) {
        return $url;
    }
    $parts = wp_parse_url($base);
    $origin = ($parts['scheme'] ?? 'https') . '://' . ($parts['host'] ?? '');
    return $origin . '/' . ltrim($url, '/');
}

function hws_sg_remote_size($url) {
    $tmp = download_url($url, 30);
    if (is_wp_error($tmp)) {
        return [0, 0];
    }
    $size = @getimagesize($tmp);
    @unlink($tmp);
    return $size ? [(int) $size[0], (int) $size[1]] : [0, 0];
}

function hws_sg_best_highres_image($source_url) {
    $response = wp_remote_get($source_url, [
        'timeout' => 30,
        'redirection' => 5,
        'headers' => ['User-Agent' => 'HWS Sangens Image Refresh/1.0'],
    ]);
    if (is_wp_error($response)) {
        return '';
    }
    $html = wp_remote_retrieve_body($response);
    if (!$html) {
        return '';
    }

    $candidates = [];
    preg_match_all('~(?:data-splide-lazy|data-lazy-src|src|content)=["\']([^"\']+\.(?:png|jpe?g|webp))(?:\?[^"\']*)?["\']~iu', $html, $matches);
    foreach ($matches[1] as $candidate) {
        $url = hws_sg_abs_url($source_url, $candidate);
        if (!$url || !str_contains($url, 'sangens.com/wp-content/uploads/')) {
            continue;
        }
        $lower = mb_strtolower($url);
        if (str_contains($lower, '-150x150') || str_contains($lower, 'favicon') || str_contains($lower, 'cropped-')) {
            continue;
        }
        $priority = 10;
        if (str_contains($lower, 'prod-image') || preg_match('~/uploads/\d{4}/\d{2}/[^/]+_[1234]\.(?:png|webp|jpg|jpeg)$~i', $url)) {
            $priority = 1;
        } elseif (str_contains($lower, '1200h850')) {
            $priority = 5;
        }
        $candidates[$url] = min($candidates[$url] ?? 99, $priority);
    }

    uasort($candidates, fn($a, $b) => $a <=> $b);
    $fallback = '';
    foreach (array_keys($candidates) as $url) {
        [$width, $height] = hws_sg_remote_size($url);
        if ($width >= 1500 && $height >= 1500) {
            return $url;
        }
        if (!$fallback && $width >= 1000 && $height >= 800) {
            $fallback = $url;
        }
    }
    return $fallback;
}

function hws_sg_attachment_for_source($url, $product_id, $title) {
    $existing = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_key' => '_hws_source_url',
        'meta_value' => $url,
    ]);
    if ($existing) {
        return (int) $existing[0];
    }
    $attachment_id = media_sideload_image($url, $product_id, $title, 'id');
    if (is_wp_error($attachment_id)) {
        echo "failed {$product_id} | {$url} | " . $attachment_id->get_error_message() . "\n";
        return 0;
    }
    update_post_meta((int) $attachment_id, '_hws_source_url', $url);
    update_post_meta((int) $attachment_id, '_hws_background_removed', 'source-transparent-or-highres');
    return (int) $attachment_id;
}

$query = new WP_Query([
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => [[
        'taxonomy' => 'product_brand',
        'field' => 'name',
        'terms' => ['Sangens'],
    ]],
]);

$updated = 0;
$missing = 0;
foreach ($query->posts as $post) {
    $source_url = get_post_meta($post->ID, '_hws_source_url', true);
    $image_url = hws_sg_best_highres_image($source_url);
    if (!$image_url) {
        $missing++;
        echo "missing {$post->ID} | " . get_the_title($post) . " | {$source_url}\n";
        continue;
    }
    $attachment_id = hws_sg_attachment_for_source($image_url, $post->ID, get_the_title($post));
    if (!$attachment_id) {
        $missing++;
        continue;
    }
    set_post_thumbnail($post->ID, $attachment_id);
    update_post_meta($post->ID, '_hws_sangens_highres_source_url', $image_url);
    $file = get_attached_file($attachment_id);
    $size = $file && file_exists($file) ? @getimagesize($file) : [0, 0];
    echo "updated {$post->ID} | {$size[0]}x{$size[1]} | {$image_url}\n";
    $updated++;
}

wc_delete_product_transients();
wp_cache_flush();

echo "updated={$updated} missing={$missing}\n";
