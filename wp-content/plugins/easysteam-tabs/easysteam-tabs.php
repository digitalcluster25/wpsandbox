<?php
/**
 * Plugin Name: EasySteam Product Tabs
 * Description: Custom WooCommerce product tabs for stove products
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key' => 'group_easysteam_tabs',
        'title' => 'EasySteam Tabs',
        'fields' => [
            [
                'key' => 'field_cutaway',
                'label' => 'Pech v razreze',
                'name' => 'cutaway',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ],
            [
                'key' => 'field_purpose',
                'label' => 'Naznachenie',
                'name' => 'purpose',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ],
            [
                'key' => 'field_advantages',
                'label' => 'Preimuschestva',
                'name' => 'advantages',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);
});

add_filter('woocommerce_product_tabs', function($tabs) {
    global $product;
    if (!$product) return $tabs;
    $pid = $product->get_id();

    $cutaway = get_field('cutaway', $pid);
    if ($cutaway) {
        $tabs['cutaway'] = [
            'title'    => __('Печь в разрезе'),
            'priority' => 15,
            'callback' => 'easysteam_tab_cutaway',
        ];
    }

    $purpose = get_field('purpose', $pid);
    if ($purpose) {
        $tabs['purpose'] = [
            'title'    => __('Назначение'),
            'priority' => 20,
            'callback' => 'easysteam_tab_purpose',
        ];
    }

    $advantages = get_field('advantages', $pid);
    if ($advantages) {
        $tabs['advantages'] = [
            'title'    => __('Преимущества'),
            'priority' => 25,
            'callback' => 'easysteam_tab_advantages',
        ];
    }

    return $tabs;
});

function easysteam_tab_cutaway() {
    global $product;
    echo '<div class="easysteam-tab-content">' . wp_kses_post(get_field('cutaway', $product->get_id())) . '</div>';
}

function easysteam_tab_purpose() {
    global $product;
    echo '<div class="easysteam-tab-content">' . wp_kses_post(get_field('purpose', $product->get_id())) . '</div>';
}

function easysteam_tab_advantages() {
    global $product;
    echo '<div class="easysteam-tab-content">' . wp_kses_post(get_field('advantages', $product->get_id())) . '</div>';
}
