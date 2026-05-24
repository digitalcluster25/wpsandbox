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

    $specs = get_post_meta($pid, '_hws_specs_html', true);
    if ($specs) {
        $tabs['hws_specs'] = [
            'title'    => __('Характеристики'),
            'priority' => 12,
            'callback' => 'easysteam_tab_specs',
        ];
    }

    return $tabs;
}, 99);

function easysteam_tab_specs() {
    global $product;
    $payload = json_decode((string) get_post_meta($product->get_id(), '_hws_source_payload', true), true);
    if (!is_array($payload)) {
        echo '<div class="easysteam-tab-content hws-specs-tab">' . wp_kses_post(get_post_meta($product->get_id(), '_hws_specs_html', true)) . '</div>';
        return;
    }

    $tabs = easysteam_build_specs_tabs($payload);
    if (!$tabs) {
        echo '<div class="easysteam-tab-content hws-specs-tab">' . wp_kses_post(get_post_meta($product->get_id(), '_hws_specs_html', true)) . '</div>';
        return;
    }

    $uid = 'hws-specs-' . (int) $product->get_id();
    echo '<div id="' . esc_attr($uid) . '" class="easysteam-tab-content hws-specs-tab hws-specs-tabs">';
    echo '<div class="hws-specs-tabs-nav" role="tablist">';
    $index = 0;
    foreach ($tabs as $title => $tab) {
        $active = $index === 0 ? ' is-active' : '';
        echo '<button type="button" class="hws-specs-tabs-button' . esc_attr($active) . '" data-hws-spec-tab="' . esc_attr(sanitize_title($title)) . '" role="tab">' . esc_html($title) . '</button>';
        $index++;
    }
    echo '</div>';

    $index = 0;
    foreach ($tabs as $title => $tab) {
        $active = $index === 0 ? ' is-active' : '';
        echo '<section class="hws-specs-tabs-panel' . esc_attr($active) . '" data-hws-spec-panel="' . esc_attr(sanitize_title($title)) . '" role="tabpanel">';
        echo '<h3>' . esc_html($title) . '</h3>';
        if (!empty($tab['specs'])) {
            echo easysteam_render_specs_table($tab['specs']);
        }
        if (!empty($tab['options'])) {
            echo '<div class="hws-option-values">';
            echo '<h4>Доступные варианты</h4>';
            echo easysteam_render_options_table($tab['options']);
            echo '</div>';
        }
        echo '</section>';
        $index++;
    }
    echo '</div>';
    easysteam_specs_tabs_assets();
}

function easysteam_build_specs_tabs($payload) {
    $tabs = [];
    $general_groups = ['Основная информация', 'Основные характеристики', 'Общие характеристики'];
    $specs = $payload['raw_data']['detail']['specs'] ?? [];

    foreach ($specs as $spec) {
        $name = trim((string) ($spec['name'] ?? ''));
        $value = trim((string) ($spec['value'] ?? $spec['normalized_value'] ?? $spec['raw_value'] ?? ''));
        if (!$name || !$value) {
            continue;
        }
        $source_group = trim((string) ($spec['group'] ?? 'Характеристики'));
        $tab_title = in_array($source_group, $general_groups, true) ? 'Общие характеристики' : $source_group;
        if (!isset($tabs[$tab_title])) {
            $tabs[$tab_title] = ['specs' => [], 'options' => []];
        }
        $tabs[$tab_title]['specs'][] = [
            'name' => $name,
            'value' => $value,
        ];
    }

    foreach (($payload['option_groups'] ?? []) as $group) {
        $title = trim((string) ($group['name'] ?? 'Опции'));
        if (!$title) {
            continue;
        }
        if (!isset($tabs[$title])) {
            $tabs[$title] = ['specs' => [], 'options' => []];
        }
        foreach (($group['values'] ?? []) as $value) {
            $label = trim((string) ($value['name'] ?? ''));
            if (!$label) {
                continue;
            }
            $tabs[$title]['options'][] = [
                'name' => $label,
                'delta_price' => isset($value['delta_price']) ? (float) $value['delta_price'] : 0,
                'is_default' => !empty($value['is_default']),
                'sku_suffix' => trim((string) ($value['sku_suffix'] ?? '')),
            ];
        }
    }

    $preferred_order = [
        'Общие характеристики',
        'Вид топлива',
        'Варианты кожуха',
        'Вид кожуха',
        'Защита топки',
        'Марка стали',
        'Боковое подключение дымохода',
        'Боковой вход в каменку',
        'Исполнение дверки',
        'Варианты дверки',
        'Габариты и вес',
    ];

    $ordered = [];
    foreach ($preferred_order as $title) {
        if (isset($tabs[$title])) {
            $ordered[$title] = $tabs[$title];
            unset($tabs[$title]);
        }
    }
    foreach ($tabs as $title => $tab) {
        $ordered[$title] = $tab;
    }

    return $ordered;
}

function easysteam_render_specs_table($specs) {
    $rows = [];
    foreach ($specs as $spec) {
        $rows[] = '<tr><th>' . esc_html($spec['name']) . '</th><td>' . esc_html($spec['value']) . '</td></tr>';
    }
    return '<table class="shop_attributes hws-specs-table"><tbody>' . implode('', $rows) . '</tbody></table>';
}

function easysteam_render_options_table($options) {
    $rows = [];
    foreach ($options as $option) {
        $price = (float) $option['delta_price'];
        if ($price > 0) {
            $price_label = '+' . wc_price($price);
        } elseif (!empty($option['is_default'])) {
            $price_label = 'Базовая комплектация';
        } else {
            $price_label = 'Без доплаты';
        }
        $badges = [];
        if (!empty($option['is_default'])) {
            $badges[] = '<span class="hws-spec-badge">по умолчанию</span>';
        }
        if (!empty($option['sku_suffix'])) {
            $badges[] = '<span class="hws-spec-code">' . esc_html($option['sku_suffix']) . '</span>';
        }
        $rows[] = '<tr><th>' . esc_html($option['name']) . implode(' ', $badges) . '</th><td>' . wp_kses_post($price_label) . '</td></tr>';
    }
    return '<table class="shop_attributes hws-options-table"><tbody>' . implode('', $rows) . '</tbody></table>';
}

function easysteam_specs_tabs_assets() {
    static $printed = false;
    if ($printed) {
        return;
    }
    $printed = true;
    ?>
    <style>
        .hws-specs-tabs-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 0 0 22px;
        }
        .hws-specs-tabs-button {
            border: 1px solid rgba(17, 24, 39, 0.16);
            background: #fff;
            color: #111827;
            border-radius: 4px;
            padding: 9px 13px;
            font-size: 14px;
            line-height: 1.2;
            cursor: pointer;
        }
        .hws-specs-tabs-button.is-active {
            background: #111827;
            border-color: #111827;
            color: #fff;
        }
        .hws-specs-tabs-panel {
            display: none;
        }
        .hws-specs-tabs-panel.is-active {
            display: block;
        }
        .hws-specs-tabs-panel h3 {
            margin: 0 0 16px;
            font-size: 22px;
        }
        .hws-option-values {
            margin-top: 24px;
        }
        .hws-option-values h4 {
            margin: 0 0 12px;
            font-size: 16px;
        }
        .hws-spec-badge,
        .hws-spec-code {
            display: inline-block;
            margin-left: 8px;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
            line-height: 1.3;
            font-weight: 500;
            vertical-align: middle;
        }
        .hws-spec-badge {
            background: #e8f3e8;
            color: #315c31;
        }
        .hws-spec-code {
            background: #f3f4f6;
            color: #4b5563;
            font-family: monospace;
        }
        @media (max-width: 640px) {
            .hws-specs-tabs-button {
                flex: 1 1 calc(50% - 8px);
            }
        }
    </style>
    <script>
        document.addEventListener('click', function(event) {
            var button = event.target.closest('.hws-specs-tabs-button');
            if (!button) return;
            var root = button.closest('.hws-specs-tabs');
            if (!root) return;
            var key = button.getAttribute('data-hws-spec-tab');
            root.querySelectorAll('.hws-specs-tabs-button').forEach(function(item) {
                item.classList.toggle('is-active', item === button);
            });
            root.querySelectorAll('.hws-specs-tabs-panel').forEach(function(panel) {
                panel.classList.toggle('is-active', panel.getAttribute('data-hws-spec-panel') === key);
            });
        });
    </script>
    <?php
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
