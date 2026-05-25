<?php
/**
 * Plugin Name: EasySteam Product Tabs
 * Description: Custom WooCommerce product tabs for stove products
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

function hws_ru_template_string($translated, $text) {
    $map = [
        'In stock' => 'В наличии',
        'Out of stock' => 'Нет в наличии',
        'SKU' => 'Артикул',
        'SKU:' => 'Артикул:',
        'Brand' => 'Бренд',
        'Brand:' => 'Бренд:',
        'Clear' => 'Сбросить',
        'Clear options' => 'Сбросить опции',
        'Product Added' => 'Товар добавлен',
        'Related products' => 'Похожие товары',
        'Scroll to top' => 'Наверх',
        'No products in the cart.' => 'В корзине нет товаров.',
        'Cart review' => 'Корзина',
        'Purchase' => 'Оформить заказ',
        'Skip to content' => 'Перейти к содержимому',
    ];

    return $map[$text] ?? $translated;
}
add_filter('gettext', 'hws_ru_template_string', 20, 2);
add_filter('gettext_with_context', function($translated, $text) {
    return hws_ru_template_string($translated, $text);
}, 20, 2);

add_action('woocommerce_before_calculate_totals', function($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    if (!$cart || !method_exists($cart, 'get_cart')) {
        return;
    }

    foreach ($cart->get_cart() as $cart_item) {
        $product = $cart_item['data'] ?? null;
        if (!$product || !($product instanceof WC_Product)) {
            continue;
        }

        $current_price = $product->get_regular_price();
        if ($current_price !== '') {
            $product->set_price($current_price);
        }
    }
}, 20);

add_action('woocommerce_product_meta_end', function() {
    global $product;
    if (!$product) {
        return;
    }

    $brands = [];
    if (taxonomy_exists('product_brand')) {
        $brands = wp_get_object_terms($product->get_id(), 'product_brand', ['fields' => 'names']);
    }

    if (is_wp_error($brands) || empty($brands)) {
        $payload = json_decode((string) get_post_meta($product->get_id(), '_hws_source_payload', true), true);
        $brand = $payload['brand'] ?? ($payload['raw_data']['brand'] ?? '');
        $brands = $brand ? [$brand] : [];
    }

    if (!$brands) {
        return;
    }

    echo '<span class="hws_brand_wrapper">Бренд: <span class="hws_product_brand">' . esc_html(implode(', ', $brands)) . '</span></span>';
}, 25);

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

    if ($has_hws_payload && isset($tabs['description'])) {
        $tabs['description']['callback'] = 'easysteam_tab_description_with_cta';
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

function easysteam_tab_description_with_cta() {
    global $product;

    if (function_exists('woocommerce_product_description_tab')) {
        woocommerce_product_description_tab();
    } elseif ($product) {
        echo '<div class="easysteam-tab-content">' . wp_kses_post(wpautop($product->get_description())) . '</div>';
    }

    if ($product) {
        echo easysteam_consultation_cta($product);
    }
}

function easysteam_consultation_cta($product) {
    $product_name = $product->get_name();
    $sku = $product->get_sku();
    ob_start();
    ?>
    <section class="hws-consultation-cta" data-hws-product-name="<?php echo esc_attr($product_name); ?>" data-hws-product-sku="<?php echo esc_attr($sku); ?>">
        <div class="hws-consultation-cta__content">
            <p class="hws-consultation-cta__eyebrow">Подбор перед заказом</p>
            <h3 class="hws-consultation-cta__title">Поможем проверить печь под вашу парную</h3>
            <p class="hws-consultation-cta__text">Печь зависит от объема, дымохода, топлива, облицовки и монтажа. Отправьте выбранную комплектацию менеджеру — сверим мощность, сроки поставки и комплект для установки.</p>
            <div class="hws-consultation-cta__selection">
                <div>
                    <span>Товар</span>
                    <strong class="hws-cta-product-name"><?php echo esc_html($product_name); ?></strong>
                </div>
                <div>
                    <span>Комплектация</span>
                    <strong class="hws-cta-options">Выберите опции выше</strong>
                </div>
            </div>
        </div>
        <div class="hws-consultation-cta__actions">
            <a class="hws-consultation-cta__button hws-consultation-cta__button--telegram" href="#" target="_blank" rel="noopener">
                <?php echo easysteam_messenger_icon('telegram'); ?>
                <span>Telegram</span>
            </a>
            <a class="hws-consultation-cta__button hws-consultation-cta__button--whatsapp" href="#" target="_blank" rel="noopener">
                <?php echo easysteam_messenger_icon('whatsapp'); ?>
                <span>WhatsApp</span>
            </a>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function easysteam_messenger_icon($type) {
    if ($type === 'telegram') {
        return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21.7 3.4 18.5 20c-.2 1.1-.9 1.4-1.8.9l-5-3.7-2.4 2.3c-.3.3-.5.5-1 .5l.4-5.2 9.4-8.5c.4-.4-.1-.6-.6-.2L5.9 13.4.9 11.8c-1.1-.3-1.1-1.1.2-1.6L20.5 2.7c.9-.3 1.7.2 1.2.7Z"/></svg>';
    }
    return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2a9.8 9.8 0 0 0-8.5 14.8L2.2 22l5.3-1.4A9.8 9.8 0 1 0 12 2Zm0 17.8a7.8 7.8 0 0 1-4-1.1l-.3-.2-3.1.8.8-3-.2-.3A7.8 7.8 0 1 1 12 19.8Zm4.3-5.8c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1-.2.2-.7.8-.8 1-.2.2-.3.2-.6.1a6.4 6.4 0 0 1-3.2-2.8c-.2-.3 0-.4.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5l-.7-1.7c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.2-.9.9-.9 2.1s.9 2.4 1 2.6c.1.2 1.8 2.8 4.4 3.9.6.3 1.1.4 1.5.5.6.2 1.2.1 1.6.1.5-.1 1.4-.6 1.6-1.1.2-.6.2-1 .1-1.1-.1-.2-.3-.2-.5-.3Z"/></svg>';
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
    global $product;
    $brand_names = [];
    if ($product && taxonomy_exists('product_brand')) {
        $brand_names = wp_get_object_terms($product->get_id(), 'product_brand', ['fields' => 'names']);
    }
    if (is_wp_error($brand_names)) {
        $brand_names = [];
    }
    $brand_label = $brand_names ? implode(', ', $brand_names) : '';
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
        .product_meta .hws_brand_wrapper:before {
            content: " · ";
        }
        .product_meta .hws_brand_wrapper {
            display: inline;
        }
        .product_meta .hws_product_brand {
            font-weight: 400;
        }
        body.single-product .breadcrumb-holder .breadcrumb-item:has(a[href*="/product-category/bath-sauna-stoves/"]:not([href*="/russian-bath-stoves/"])) {
            display: none;
        }
        @media (min-width: 1200px) {
            body.single-product .vc_row > .woo-product-image.vc_col-lg-8,
            body.single-product .vc_row > .woo-product-details.vc_col-lg-4 {
                width: 50%;
                max-width: 50%;
                flex-basis: 50%;
            }
        }
        .hws-consultation-cta {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 28px;
            align-items: center;
            width: 100%;
            margin: 38px 0 0;
            padding: 44px 46px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.64);
            box-shadow: 0 18px 44px rgba(17, 24, 39, 0.08);
        }
        .hws-consultation-cta__eyebrow {
            margin: 0 0 10px;
            color: #4f4f4b;
            font-size: 15px;
            line-height: 1.35;
            font-weight: 600;
        }
        .hws-consultation-cta__title {
            max-width: 760px;
            margin: 0;
            color: #111111;
            font-size: 36px;
            line-height: 1.08;
            font-weight: 700;
            letter-spacing: 0;
        }
        .hws-consultation-cta__text {
            max-width: 780px;
            margin: 18px 0 0;
            color: #4f4f4b;
            font-size: 17px;
            line-height: 1.55;
        }
        .hws-consultation-cta__selection {
            display: grid;
            grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
            gap: 12px;
            max-width: 860px;
            margin-top: 24px;
        }
        .hws-consultation-cta__selection > div {
            padding: 14px 16px;
            border: 1px solid rgba(17, 24, 39, 0.12);
            border-radius: 14px;
            background: rgba(245, 242, 234, 0.58);
        }
        .hws-consultation-cta__selection span {
            display: block;
            margin-bottom: 5px;
            color: #77746e;
            font-size: 12px;
            line-height: 1.2;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0;
        }
        .hws-consultation-cta__selection strong {
            display: block;
            color: #111111;
            font-size: 15px;
            line-height: 1.4;
            font-weight: 600;
        }
        .hws-consultation-cta__actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 210px;
        }
        .hws-consultation-cta__button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 58px;
            padding: 16px 24px;
            border-radius: 18px;
            color: #ffffff !important;
            background: #141414;
            text-decoration: none !important;
            font-size: 16px;
            line-height: 1;
            font-weight: 700;
            transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
        }
        .hws-consultation-cta__button:hover {
            transform: translateY(-1px);
            background: #000000;
            box-shadow: 0 12px 26px rgba(17, 24, 39, 0.14);
        }
        .hws-consultation-cta__button svg {
            width: 21px;
            height: 21px;
            fill: currentColor;
            flex: 0 0 21px;
        }
        @media (max-width: 640px) {
            .hws-variation-chip {
                flex: 1 1 100%;
                justify-content: center;
                text-align: center;
            }
            .hws-consultation-cta {
                grid-template-columns: 1fr;
                padding: 28px 22px;
                border-radius: 18px;
            }
            .hws-consultation-cta__title {
                font-size: 28px;
            }
            .hws-consultation-cta__selection {
                grid-template-columns: 1fr;
            }
            .hws-consultation-cta__actions {
                min-width: 0;
            }
        }
    </style>
    <script>
        window.hwsProductBrand = <?php echo wp_json_encode($brand_label, JSON_UNESCAPED_UNICODE); ?>;
        window.hwsParentSku = <?php echo wp_json_encode($product ? $product->get_sku() : '', JSON_UNESCAPED_UNICODE); ?>;

        function hwsEnsureProductBrandMeta() {
            var meta = document.querySelector('.product_meta');
            var sku = meta ? meta.querySelector('.sku_wrapper') : null;
            if (!meta || !sku) return;

            if (window.hwsParentSku) {
                var skuValue = sku.querySelector('.sku');
                if (skuValue) {
                    skuValue.textContent = window.hwsParentSku;
                }
            }

            if (!window.hwsProductBrand || meta.querySelector('.hws_brand_wrapper')) return;

            var brand = document.createElement('span');
            brand.className = 'hws_brand_wrapper';
            brand.innerHTML = 'Бренд: <span class="hws_product_brand"></span>';
            brand.querySelector('.hws_product_brand').textContent = window.hwsProductBrand;
            sku.insertAdjacentElement('afterend', brand);
        }

        function hwsTrimProductBreadcrumbs() {
            document.querySelectorAll('body.single-product .breadcrumb-holder .breadcrumb-item a[href*="/product-category/bath-sauna-stoves/"]').forEach(function(link) {
                if (link.href.indexOf('/russian-bath-stoves/') !== -1) return;

                var item = link.closest('.breadcrumb-item');
                if (item) {
                    item.remove();
                }
            });
        }

        function hwsTranslateTemplateText() {
            var translations = {
                'In stock': 'В наличии',
                'Out of stock': 'Нет в наличии',
                'SKU:': 'Артикул:',
                'Brand:': 'Бренд:',
                'Clear': 'Сбросить',
                'Clear options': 'Сбросить опции',
                'Product Added': 'Товар добавлен',
                'Related products': 'Похожие товары',
                'Scroll to top': 'Наверх',
                'No products in the cart.': 'В корзине нет товаров.',
                'Follow Us': 'Мы в соцсетях',
                'Follow us': 'Мы в соцсетях',
                'About us': 'О нас',
                'Company': 'Компания',
                'Contact Us': 'Контакты',
                'Customer service': 'Сервис',
                'Assembly manuals': 'Инструкции по сборке',
                'Care and maintenance': 'Уход и обслуживание',
                'Fabric overview': 'Обзор материалов',
                'Get Help': 'Помощь',
                'Get In Touch': 'Связаться',
                'Help center': 'Центр помощи',
                'Live chat': 'Онлайн-чат',
                'Product fact sheets': 'Характеристики товаров',
                'Products': 'Товары',
                'Responsibility': 'Ответственность',
                'Security': 'Безопасность',
                'Accessories': 'Аксессуары',
                'Lighting': 'Освещение',
                'Seating': 'Мебель для сидения',
                'Shelving & storage': 'Полки и хранение',
                'Shipping and delivery': 'Доставка',
                'Returns & warranty': 'Возврат и гарантия',
                'Order cancellation': 'Отмена заказа',
                'Privacy & Cookie Policy': 'Политика конфиденциальности',
                'Terms of Service': 'Условия сервиса',
                'Accessibility statement': 'Доступность сайта',
                'Shopping assistance': 'Помощь с покупкой',
                'Secure and easy payments': 'Безопасная оплата',
                'Styling sessions': 'Консультации по подбору',
                'Gift card balance': 'Баланс подарочной карты',
                'Weekly hours': 'Часы работы',
                'Work Inquiries': 'Рабочие запросы',
                'Sign up': 'Подписаться',
                'Welcome,': 'Добро пожаловать,',
                'here and take 10% off': 'и получите скидку 10%',
                'EU delivery within 2-5 days*': 'Доставка по региону по согласованию',
                'Free shipping on EU orders, some exclusions apply*': 'Доставка и монтаж рассчитываются индивидуально',
                'Open. Closes at 11:55\u202fPM ET.': 'Открыто',
                'Open. Closes at 11:59\u202fPM ET.': 'Открыто'
            };

            document.querySelectorAll('[aria-label], [title], [data-product-added-text]').forEach(function(node) {
                ['aria-label', 'title', 'data-product-added-text'].forEach(function(attr) {
                    var value = node.getAttribute(attr);
                    if (value && translations[value]) {
                        node.setAttribute(attr, translations[value]);
                    }
                });
            });

            var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
                acceptNode: function(node) {
                    if (!node.nodeValue || !node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
                    var parent = node.parentElement;
                    if (!parent || ['SCRIPT', 'STYLE', 'NOSCRIPT', 'TEXTAREA'].indexOf(parent.tagName) !== -1) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    return NodeFilter.FILTER_ACCEPT;
                }
            });

            var nodes = [];
            while (walker.nextNode()) {
                nodes.push(walker.currentNode);
            }

            nodes.forEach(function(node) {
                var raw = node.nodeValue;
                var trimmed = raw.trim();
                if (translations[trimmed]) {
                    node.nodeValue = raw.replace(trimmed, translations[trimmed]);
                    return;
                }

                var replaced = raw;
                Object.keys(translations).forEach(function(source) {
                    if (replaced.indexOf(source) !== -1) {
                        replaced = replaced.split(source).join(translations[source]);
                    }
                });

                if (replaced !== raw) {
                    node.nodeValue = replaced;
                }
            });
        }

        function hwsSelectedOptionsText() {
            var form = document.querySelector('.variations_form.cart');
            if (!form) return '';

            var options = [];
            form.querySelectorAll('.hws-variation-select-wrap select').forEach(function(select) {
                if (!select.value) return;

                var row = select.closest('.variation');
                var label = row ? row.querySelector('label') : null;
                var labelText = label ? label.textContent.replace(':', '').trim() : (select.getAttribute('data-attribute_name') || select.name || '').replace(/^attribute_/, '');
                options.push(labelText + ': ' + select.value);
            });

            return options.join('; ');
        }

        function hwsUpdateConsultationCta() {
            var cta = document.querySelector('.hws-consultation-cta');
            if (!cta) return;

            var titleNode = document.querySelector('.product_title');
            var productName = cta.getAttribute('data-hws-product-name') || (titleNode ? titleNode.textContent.trim() : '');
            var productSku = cta.getAttribute('data-hws-product-sku') || '';
            var optionsText = hwsSelectedOptionsText();
            var optionsNode = cta.querySelector('.hws-cta-options');
            if (optionsNode) {
                optionsNode.textContent = optionsText || 'Опции пока не выбраны';
            }

            var message = 'Здравствуйте! Хочу подобрать печь: ' + productName;
            if (productSku) {
                message += ' (арт. ' + productSku + ')';
            }
            if (optionsText) {
                message += '. Выбранная комплектация: ' + optionsText;
            }
            message += '. Подскажите, подойдет ли она для моей парной и что нужно для монтажа?';

            var pageUrl = window.location.href.split('#')[0];
            var telegram = cta.querySelector('.hws-consultation-cta__button--telegram');
            var whatsapp = cta.querySelector('.hws-consultation-cta__button--whatsapp');
            if (telegram) {
                telegram.href = 'https://t.me/share/url?url=' + encodeURIComponent(pageUrl) + '&text=' + encodeURIComponent(message);
            }
            if (whatsapp) {
                whatsapp.href = 'https://wa.me/?text=' + encodeURIComponent(message + ' ' + pageUrl);
            }
        }

        function hwsTriggerVariationChange(select) {
            select.dispatchEvent(new Event('change', { bubbles: true }));

            if (window.jQuery) {
                var $select = window.jQuery(select);
                var $form = $select.closest('.variations_form');
                $select.trigger('change');
                if ($form.length) {
                    $form.trigger('check_variations');
                }
            }
        }

        function hwsSetSelectFromChip(chip) {
            var wrap = chip.closest('.hws-variation-select-wrap');
            if (!wrap) return;

            var select = wrap.querySelector('select');
            if (!select) return;

            var value = chip.getAttribute('data-hws-value') || '';
            var option = Array.prototype.find.call(select.options, function(item) {
                return item.value === value;
            });
            if (!option) return;

            select.value = value;
            hwsTriggerVariationChange(select);

            wrap.querySelectorAll('.hws-variation-chip').forEach(function(item) {
                item.classList.toggle('is-selected', item === chip);
            });
        }

        function hwsInitVariationChips() {
            document.querySelectorAll('.hws-variation-select-wrap').forEach(function(wrap) {
                var select = wrap.querySelector('select');
                var selectedChip = wrap.querySelector('.hws-variation-chip.is-selected');
                if (!select || !selectedChip) return;

                if (!select.value) {
                    hwsSetSelectFromChip(selectedChip);
                }
            });

            if (window.jQuery) {
                window.jQuery('.variations_form').each(function() {
                    window.jQuery(this).trigger('check_variations');
                });
            }
            hwsUpdateConsultationCta();
        }

        document.addEventListener('click', function(event) {
            var chip = event.target.closest('.hws-variation-chip');
            if (!chip) return;

            hwsSetSelectFromChip(chip);
        });

        document.addEventListener('change', function(event) {
            if (!event.target.matches('.hws-variation-select-wrap select')) return;
            var select = event.target;
            var wrap = select.closest('.hws-variation-select-wrap');
            if (!wrap) return;
            wrap.querySelectorAll('.hws-variation-chip').forEach(function(chip) {
                chip.classList.toggle('is-selected', chip.getAttribute('data-hws-value') === select.value);
            });
            hwsUpdateConsultationCta();
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.reset_variations')) return;
            document.querySelectorAll('.hws-variation-chip').forEach(function(chip) {
                chip.classList.remove('is-selected');
            });
            setTimeout(hwsUpdateConsultationCta, 0);
        });

        document.addEventListener('DOMContentLoaded', function() {
            hwsTrimProductBreadcrumbs();
            hwsTranslateTemplateText();
            hwsEnsureProductBrandMeta();
            hwsInitVariationChips();
            hwsUpdateConsultationCta();
        });
        window.addEventListener('load', function() {
            hwsTrimProductBreadcrumbs();
            hwsTranslateTemplateText();
            hwsEnsureProductBrandMeta();
            hwsInitVariationChips();
            hwsUpdateConsultationCta();
        });
        if (window.jQuery) {
            window.jQuery(document).on('found_variation reset_data', '.variations_form', function() {
                hwsEnsureProductBrandMeta();
                hwsUpdateConsultationCta();
            });
        }
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
