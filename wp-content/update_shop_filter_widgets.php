<?php
require_once '/var/www/html/wp-load.php';

$filters = [
    7 => '<!-- wp:woocommerce/filter-wrapper {"filterType":"active-filters","heading":"Выбранные фильтры"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:woocommerce/active-filters {"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-active-filters is-loading"><span aria-hidden="true" class="wc-block-active-filters__placeholder"></span></div>
<!-- /wp:woocommerce/active-filters --></div>
<!-- /wp:woocommerce/filter-wrapper -->',
    8 => '<!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"Цена"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Цена</h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-price-filter is-loading"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->',
    9 => '<!-- wp:woocommerce/filter-wrapper {"filterType":"stock-filter","heading":"Наличие"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Наличие</h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/stock-filter {"showCounts":true,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-stock-filter is-loading"></div>
<!-- /wp:woocommerce/stock-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->',
    10 => hws_attribute_filter_block(4, 'Тип топлива'),
    11 => hws_attribute_filter_block(5, 'Объем парной'),
    12 => hws_attribute_filter_block(7, 'Тип облицовки'),
    13 => hws_attribute_filter_block(8, 'Материал облицовки'),
    14 => hws_attribute_filter_block(9, 'Тип подключения'),
    15 => hws_attribute_filter_block(10, 'Класс использования'),
];

$widget_block = get_option('widget_block', []);
if (!is_array($widget_block)) {
    $widget_block = [];
}

foreach ($filters as $id => $content) {
    $widget_block[$id] = ['content' => $content];
}
$widget_block['_multiwidget'] = 1;
update_option('widget_block', $widget_block);

$sidebars = get_option('sidebars_widgets', []);
if (is_array($sidebars)) {
    $sidebars['wc_shop'] = array_map(fn($id) => 'block-' . $id, array_keys($filters));
    update_option('sidebars_widgets', $sidebars);
}

if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

echo "Updated wc_shop filters: " . implode(', ', array_map(fn($id) => 'block-' . $id, array_keys($filters))) . PHP_EOL;

function hws_attribute_filter_block($attribute_id, $heading) {
    $attribute_id = (int) $attribute_id;
    $heading_json = wp_json_encode($heading, JSON_UNESCAPED_UNICODE);

    return '<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":' . $heading_json . '} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">' . esc_html($heading) . '</h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":' . $attribute_id . ',"showCounts":true,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->';
}

