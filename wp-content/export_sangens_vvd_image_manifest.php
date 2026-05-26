<?php
if (!defined('ABSPATH')) {
    exit;
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

$rows = [];
foreach ($query->posts as $post) {
    $attachment_id = get_post_thumbnail_id($post->ID);
    if (!$attachment_id) {
        continue;
    }
    $file = get_attached_file($attachment_id);
    if (!$file || !file_exists($file)) {
        continue;
    }
    $brand = wp_get_post_terms($post->ID, 'product_brand', ['fields' => 'names'])[0] ?? '';
    $rows[] = [
        'product_id' => $post->ID,
        'product_title' => get_the_title($post),
        'brand' => $brand,
        'attachment_id' => $attachment_id,
        'file' => $file,
        'url' => wp_get_attachment_url($attachment_id),
    ];
}

echo wp_json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . PHP_EOL;
