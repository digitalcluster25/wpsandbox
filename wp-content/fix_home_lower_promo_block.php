<?php
require_once '/var/www/html/wp-load.php';

$page_id = 232276;
$data = json_decode(get_post_meta($page_id, '_elementor_data', true), true);
if (!is_array($data)) {
    fwrite(STDERR, "Elementor data not found\n");
    exit(1);
}

function hws_fix_lower_promo_walk(&$elements) {
    foreach ($elements as &$element) {
        $id = $element['id'] ?? '';
        if (!isset($element['settings']) || !is_array($element['settings'])) {
            $element['settings'] = [];
        }

        if ($id === 'b65c4f9') {
            $element['settings']['align_items'] = 'flex-start';
            $element['settings']['flex_align_items'] = 'flex-start';
        }

        if ($id === 'd89af63') {
            $element['settings']['align_self'] = 'flex-start';
        }

        if ($id === '7cd0d7b') {
            $element['settings']['title'] = 'Бесплатный<br>расчёт проекта';
            $element['settings']['subtitle'] = 'Подберём печь, мощность, облицовку и комплект поставки под вашу парную.';
            $element['settings']['button_title'] = 'Получить расчёт';
            $element['settings']['link'] = [
                'url' => home_url('/konsultatsii-po-podboru/'),
                'is_external' => '',
                'nofollow' => '',
                'custom_attributes' => '',
            ];
        }

        if (!empty($element['elements']) && is_array($element['elements'])) {
            hws_fix_lower_promo_walk($element['elements']);
        }
    }
}

hws_fix_lower_promo_walk($data);

update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($data, JSON_UNESCAPED_UNICODE)));

if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

wp_cache_flush();

echo "fixed lower promo block\n";
