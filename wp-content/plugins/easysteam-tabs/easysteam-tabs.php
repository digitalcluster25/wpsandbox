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
    $has_hws_payload = (bool) get_post_meta($pid, '_hws_source_payload', true);

    if ($has_hws_payload && isset($tabs['additional_information'])) {
        unset($tabs['additional_information']);
    }

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

    $payload = json_decode((string) get_post_meta($pid, '_hws_source_payload', true), true);
    if (is_array($payload)) {
        $info_tabs = easysteam_build_info_tabs($payload);
        $priority = 12;
        foreach ($info_tabs as $title => $specs) {
            $key = 'hws_specs_' . sanitize_title($title);
            $tabs[$key] = [
                'title' => __($title),
                'priority' => $priority,
                'callback' => 'easysteam_tab_info_specs',
                'hws_specs' => $specs,
            ];
            $priority += 2;
        }
    }

    return $tabs;
}, 99);

function easysteam_build_info_tabs($payload) {
    $tabs = [];
    $specs = $payload['raw_data']['detail']['specs'] ?? [];

    foreach ($specs as $spec) {
        $name = trim((string) ($spec['name'] ?? ''));
        $value = trim((string) ($spec['value'] ?? $spec['normalized_value'] ?? $spec['raw_value'] ?? ''));
        if (!$name || !$value) {
            continue;
        }
        $source_group = trim((string) ($spec['group'] ?? 'Характеристики'));
        $tab_title = easysteam_info_tab_title($source_group, $name);
        if (!isset($tabs[$tab_title])) {
            $tabs[$tab_title] = ['specs' => [], 'options' => []];
        }
        $tabs[$tab_title]['specs'][] = [
            'name' => $name,
            'value' => $value,
        ];
    }

    $preferred_order = [
        'Обзор',
        'Основные параметры',
        'Материалы',
        'Конструкция',
        'Вид топлива',
        'Габариты и вес',
    ];

    $ordered = [];
    foreach ($preferred_order as $title) {
        if (isset($tabs[$title])) {
            $ordered[$title] = $tabs[$title]['specs'];
            unset($tabs[$title]);
        }
    }
    foreach ($tabs as $title => $tab) {
        $ordered[$title] = $tab['specs'];
    }

    return $ordered;
}

function easysteam_info_tab_title($source_group, $name) {
    if ($source_group === 'Основная информация') {
        return 'Обзор';
    }

    if ($source_group === 'Основные характеристики') {
        return 'Основные параметры';
    }

    if ($source_group === 'Общие характеристики') {
        $name_lower = mb_strtolower($name);
        if (strpos($name_lower, 'материал') !== false || strpos($name_lower, 'толщина') !== false) {
            return 'Материалы';
        }
        return 'Конструкция';
    }

    return $source_group;
}

function easysteam_tab_info_specs($key, $tab) {
    $specs = $tab['hws_specs'] ?? [];
    if (!$specs) {
        return;
    }
    echo '<div class="easysteam-tab-content hws-specs-tab">';
    echo easysteam_render_specs_table($specs);
    echo '</div>';
}

function easysteam_render_specs_table($specs) {
    $rows = [];
    foreach ($specs as $spec) {
        $rows[] = '<tr><th>' . esc_html($spec['name']) . '</th><td>' . esc_html($spec['value']) . '</td></tr>';
    }
    return '<table class="shop_attributes hws-specs-table"><tbody>' . implode('', $rows) . '</tbody></table>';
}

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
