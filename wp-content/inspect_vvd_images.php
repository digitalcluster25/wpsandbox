<?php
if (!defined('ABSPATH')) {
    exit;
}

$url = getenv('HWS_INSPECT_URL') ?: ($argv[1] ?? '');
if (!$url) {
    echo "missing url\n";
    return;
}

$response = wp_remote_get($url, ['timeout' => 30, 'redirection' => 5]);
$html = wp_remote_retrieve_body($response);

preg_match_all('~(?:src|href|data-src|data-lazy)=["\']([^"\']+\.(?:png|jpe?g|webp))(?:\?[^"\']*)?["\']~iu', $html, $matches);
$urls = [];
foreach ($matches[1] as $candidate) {
    if (!str_contains($candidate, '/upload/')) {
        continue;
    }
    if (str_contains($candidate, 'beeline') || str_contains($candidate, 'megafon')) {
        continue;
    }
    if (str_starts_with($candidate, '//')) {
        $candidate = 'https:' . $candidate;
    } elseif (!preg_match('~^https?://~i', $candidate)) {
        $candidate = 'https://vvd.su' . $candidate;
    }
    $urls[$candidate] = true;
}

foreach (array_keys($urls) as $candidate) {
    echo $candidate . "\n";
}
