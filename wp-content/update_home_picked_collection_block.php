<?php
require_once '/var/www/html/wp-load.php';

$page_id = 232276;
$data = json_decode(get_post_meta($page_id, '_elementor_data', true), true);
if (!is_array($data)) {
    fwrite(STDERR, "Elementor data not found\n");
    exit(1);
}

function hws_home_picked_walk(&$elements, $callback) {
    foreach ($elements as &$element) {
        $callback($element);
        if (!empty($element['elements']) && is_array($element['elements'])) {
            hws_home_picked_walk($element['elements'], $callback);
        }
    }
}

hws_home_picked_walk($data, function (&$element) {
    $id = $element['id'] ?? '';
    if (empty($element['settings']) || !is_array($element['settings'])) {
        return;
    }

    if ($id === '53bc2d4') {
        $element['settings']['title'] = 'Подборка для хаммама и пара';
    }

    if ($id === 'a377d0d') {
        $element['settings']['title'] = 'Решения<br>для пара';
        $element['settings']['subtitle'] = 'Парогенераторы и паротермальные печи для хаммама, русской бани и коммерческих объектов.';
        $element['settings']['button_title'] = 'Смотреть подборку';
        $element['settings']['link'] = [
            'url' => home_url('/product-category/bath-sauna-stoves/hammam-stoves/'),
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

echo "updated picked collection block\n";
