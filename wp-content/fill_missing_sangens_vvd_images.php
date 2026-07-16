<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

function hws_abs_url($base, $url) {
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
    if (str_starts_with($url, '/')) {
        return $origin . $url;
    }
    return $origin . '/' . ltrim($url, '/');
}

function hws_remote_image_size($url) {
    $tmp = download_url($url, 30);
    if (is_wp_error($tmp)) {
        return [0, 0];
    }
    $size = @getimagesize($tmp);
    @unlink($tmp);
    return $size ? [(int) $size[0], (int) $size[1]] : [0, 0];
}

function hws_best_supplier_image($source_url) {
    $response = wp_remote_get($source_url, [
        'timeout' => 30,
        'redirection' => 5,
        'headers' => ['User-Agent' => 'HWS Catalog Image Importer/1.0'],
    ]);
    if (is_wp_error($response)) {
        return '';
    }
    $html = wp_remote_retrieve_body($response);
    if (!$html) {
        return '';
    }

    $candidates = [];
    preg_match_all('~(?:src|href|data-src|data-lazy|data-original)=["\']([^"\']+\.(?:png|jpe?g|webp))(?:\?[^"\']*)?["\']~iu', $html, $matches);
    foreach ($matches[1] as $candidate) {
        $url = hws_abs_url($source_url, $candidate);
        if (!$url || !str_contains($url, '/upload/')) {
            continue;
        }
        $lower = mb_strtolower($url);
        if (str_contains($lower, 'beeline') || str_contains($lower, 'megafon') || str_contains($lower, '/callcorp3/')) {
            continue;
        }
        $priority = 10;
        if (str_contains($url, '/upload/iblock/')) {
            $priority = 1;
        } elseif (str_contains($url, '/upload/resize_cache/iblock/')) {
            $priority = 3;
        }
        $candidates[$url] = min($candidates[$url] ?? 99, $priority);
    }

    uasort($candidates, fn($a, $b) => $a <=> $b);
    foreach (array_keys($candidates) as $url) {
        [$width, $height] = hws_remote_image_size($url);
        if ($width >= 300 && $height >= 300) {
            return $url;
        }
    }
    return '';
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

$fixed = 0;
$missing = [];
foreach ($query->posts as $post) {
    if (get_post_thumbnail_id($post->ID)) {
        continue;
    }
    $source_url = get_post_meta($post->ID, '_hws_source_url', true);
    $image_url = hws_best_supplier_image($source_url);
    if (!$image_url) {
        $missing[] = [$post->ID, get_the_title($post), $source_url];
        continue;
    }
    $attachment_id = media_sideload_image($image_url, $post->ID, get_the_title($post), 'id');
    if (is_wp_error($attachment_id)) {
        $missing[] = [$post->ID, get_the_title($post), $attachment_id->get_error_message()];
        continue;
    }
    update_post_meta((int) $attachment_id, '_hws_source_url', $image_url);
    set_post_thumbnail($post->ID, (int) $attachment_id);
    $fixed++;
    echo "fixed {$post->ID} | " . get_the_title($post) . " | {$image_url}\n";
}

wc_delete_product_transients();
wp_cache_flush();

echo "fixed={$fixed} missing=" . count($missing) . "\n";
foreach ($missing as $row) {
    echo "missing {$row[0]} | {$row[1]} | {$row[2]}\n";
}
