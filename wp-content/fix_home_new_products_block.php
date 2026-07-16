<?php
require_once '/var/www/html/wp-load.php';

$page_id = 232276;
$data = json_decode(get_post_meta($page_id, '_elementor_data', true), true);
if (!is_array($data)) {
    fwrite(STDERR, "Elementor data not found\n");
    exit(1);
}

function hws_home_walk(&$elements, $callback) {
    foreach ($elements as &$element) {
        $callback($element);
        if (!empty($element['elements']) && is_array($element['elements'])) {
            hws_home_walk($element['elements'], $callback);
        }
    }
}

$featured_products = ['233015', '248457', '248466'];
$picked_products = ['248503', '248501'];
$bath_products = ['234056', '248559', '248547'];

hws_home_walk($data, function (&$element) use ($featured_products, $picked_products, $bath_products) {
    $id = $element['id'] ?? '';
    if (empty($element['settings']) || !is_array($element['settings'])) {
        return;
    }

    if ($id === 'ca357e1') {
        $element['settings']['title'] = 'Новые товары';
    }

    if ($id === '1b32053') {
        $element['settings']['columns'] = 3;
        $element['settings']['products'] = $featured_products;
        $element['settings']['order_by'] = 'post__in';
    }

    if ($id === '177558b') {
        $element['settings']['columns'] = 2;
        $element['settings']['products'] = $picked_products;
        $element['settings']['order_by'] = 'post__in';
    }

    if ($id === '4063e47') {
        $element['settings']['columns'] = 3;
        $element['settings']['products'] = $bath_products;
        $element['settings']['order_by'] = 'post__in';
    }

    if ($id === '0e3d86e') {
        $element['settings']['title'] = 'Подберите<br>печь под ваш объект';
        $element['settings']['subtitle'] = 'Поможем выбрать модель, мощность, облицовку и комплектацию для бани, сауны или хаммама.';
        $element['settings']['button_title'] = 'Начать подбор';
        $element['settings']['link'] = [
            'url' => home_url('/konsultatsii-po-podboru/'),
            'is_external' => '',
            'nofollow' => '',
            'custom_attributes' => '',
        ];
    }
});

update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($data, JSON_UNESCAPED_UNICODE)));

if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

wp_cache_flush();

echo "updated home new products block\n";
