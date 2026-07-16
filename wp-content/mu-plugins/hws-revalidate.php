<?php
/**
 * HWS Revalidate — вызывает Next.js on-demand revalidation.
 * Вызывай hws_revalidate() после любого изменения данных.
 */

defined('ABSPATH') || exit;

function hws_revalidate(): void {
    $url    = 'https://hwsstore.spaces.community/api/revalidate-catalog';
    $secret = '272f9bd3b31f07fec5fa4e6bd27b07424553f25e0fc2d2e6';

    wp_remote_post($url, [
        'timeout'  => 10,
        'blocking' => false, // fire-and-forget, не тормозим админку
        'headers'  => [
            'x-revalidate-secret' => $secret,
            'Content-Type'        => 'application/json',
        ],
    ]);
}
