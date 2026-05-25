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

add_filter('woocommerce_dropdown_variation_attribute_options_html', function($html, $args) {
    $product = $args['product'] ?? null;
    if (!$product || !($product instanceof WC_Product)) {
        return $html;
    }

    $payload = json_decode((string) get_post_meta($product->get_id(), '_hws_source_payload', true), true);
    if (!is_array($payload) || empty($payload['option_groups'])) {
        return $html;
    }

    $attribute = (string) ($args['attribute'] ?? '');
    $group = easysteam_find_option_group($payload, $attribute);
    if (!$group) {
        return $html;
    }

    $selected = (string) ($args['selected'] ?? '');
    $chips = '<div class="hws-variation-chips" data-hws-attribute="' . esc_attr($attribute) . '">';
    foreach (($group['values'] ?? []) as $value) {
        $label = trim((string) ($value['name'] ?? ''));
        if (!$label) {
            continue;
        }

        $delta = isset($value['delta_price']) ? (float) $value['delta_price'] : 0;
        $display_delta = easysteam_display_delta_price($product->get_id(), $delta);
        $chip_label = esc_html($label);
        if ($display_delta > 0) {
            $chip_label .= ' <span class="hws-chip-price">+' . wp_kses_post(wc_price($display_delta)) . '</span>';
        }

        $is_selected = $selected === $label || (!$selected && !empty($value['is_default']));
        $chips .= '<button type="button" class="hws-variation-chip' . ($is_selected ? ' is-selected' : '') . '" data-hws-value="' . esc_attr($label) . '">' . $chip_label . '</button>';
    }
    $chips .= '</div>';

    return '<div class="hws-variation-select-wrap">' . $html . $chips . '</div>';
}, 20, 2);

add_action('wp_footer', function() {
    if (!is_product()) {
        return;
    }
    ?>
    <style>
        .variations_form.cart .variations {
            border-top: 1px solid rgba(17, 24, 39, 0.12);
            border-bottom: 1px solid rgba(17, 24, 39, 0.12);
            padding: 24px 0 18px;
            margin: 24px 0;
        }
        .variations_form.cart .variation {
            margin-bottom: 20px;
        }
        .variations_form.cart .variation label {
            display: block;
            margin: 0 0 10px;
            color: #4b4b48;
            font-size: 17px;
            line-height: 1.25;
            font-weight: 600;
        }
        .hws-variation-select-wrap select {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }
        .hws-variation-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 0;
        }
        .hws-variation-chip {
            border: 1px solid rgba(17, 24, 39, 0.18);
            background: transparent;
            color: #111111;
            border-radius: 18px;
            padding: 10px 16px;
            font-size: 15px;
            line-height: 1.2;
            text-align: left;
            cursor: pointer;
            min-height: 44px;
            transition: border-color .15s ease, box-shadow .15s ease, color .15s ease, background .15s ease;
        }
        .hws-variation-chip:hover {
            border-color: rgba(17, 24, 39, 0.45);
            color: #111111;
        }
        .hws-variation-chip.is-selected {
            background: transparent;
            border-color: #111827;
            color: #111111;
            box-shadow: inset 0 0 0 2px #fff, 0 0 0 2px #111827;
        }
        .hws-chip-price {
            display: inline-block;
            margin-left: 6px;
            font-size: 12px;
            color: #111111;
            white-space: nowrap;
        }
        .hws-variation-chip.is-selected .hws-chip-price {
            color: #111111;
        }
        .variations_form.cart .reset_variations {
            display: inline-flex !important;
            align-items: center;
            gap: 8px;
            margin-top: 2px;
            color: #2f2f2d;
            font-weight: 600;
            text-decoration: none;
        }
        .variations_form.cart .reset_variations:before {
            content: none;
        }
        .variations_form.cart .reset_variations .icon,
        .variations_form.cart .reset_variations svg,
        .variations_form.cart .reset_variations i {
            margin-right: 4px;
        }
        .variations_form.cart .reset_variations:empty:before {
            content: "×";
            font-size: 28px;
            line-height: 1;
            font-weight: 400;
        }
        .variations_form.cart .woocommerce-variation-add-to-cart {
            border-top: 0 !important;
            padding-top: 0 !important;
        }
        .variations_form.cart .single_variation_wrap {
            border-top: 0 !important;
            padding-top: 18px;
        }
        .variations_form.cart .woocommerce-variation {
            border: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        @media (max-width: 640px) {
            .hws-variation-chip {
                flex: 1 1 100%;
                justify-content: center;
                text-align: center;
            }
        }
    </style>
    <script>
        document.addEventListener('click', function(event) {
            var chip = event.target.closest('.hws-variation-chip');
            if (!chip) return;

            var wrap = chip.closest('.hws-variation-select-wrap');
            if (!wrap) return;

            var select = wrap.querySelector('select');
            if (!select) return;

            select.value = chip.getAttribute('data-hws-value') || '';
            select.dispatchEvent(new Event('change', { bubbles: true }));

            wrap.querySelectorAll('.hws-variation-chip').forEach(function(item) {
                item.classList.toggle('is-selected', item === chip);
            });
        });

        document.addEventListener('change', function(event) {
            if (!event.target.matches('.hws-variation-select-wrap select')) return;
            var select = event.target;
            var wrap = select.closest('.hws-variation-select-wrap');
            if (!wrap) return;
            wrap.querySelectorAll('.hws-variation-chip').forEach(function(chip) {
                chip.classList.toggle('is-selected', chip.getAttribute('data-hws-value') === select.value);
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.reset_variations')) return;
            document.querySelectorAll('.hws-variation-chip').forEach(function(chip) {
                chip.classList.remove('is-selected');
            });
        });
    </script>
    <?php
});

function easysteam_find_option_group($payload, $attribute) {
    $attribute = urldecode((string) $attribute);
    foreach (($payload['option_groups'] ?? []) as $group) {
        $name = (string) ($group['name'] ?? '');
        if (!$name) {
            continue;
        }
        if ($attribute === $name || sanitize_title($name) === $attribute || sanitize_title($name) === sanitize_title($attribute)) {
            return $group;
        }
    }
    return null;
}

function easysteam_display_delta_price($product_id, $rub_delta) {
    if ($rub_delta <= 0) {
        return 0;
    }

    $rate = (float) get_post_meta($product_id, '_hws_usd_rub_rate', true);
    $currency = get_woocommerce_currency();
    if ($currency === 'USD' && $rate > 0) {
        return ceil(($rub_delta / $rate) / 10) * 10;
    }

    return $rub_delta;
}
