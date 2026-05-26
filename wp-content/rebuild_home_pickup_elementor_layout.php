<?php
require_once '/var/www/html/wp-load.php';

$page_id = 232276;
$data = json_decode(get_post_meta($page_id, '_elementor_data', true), true);
if (!is_array($data)) {
    fwrite(STDERR, "Elementor data not found\n");
    exit(1);
}

function hws_percent_width($size) {
    return [
        'unit' => '%',
        'size' => $size,
        'sizes' => [],
    ];
}

function hws_px_gap($size) {
    return [
        'column' => $size,
        'row' => $size,
        'isLinked' => true,
        'unit' => 'px',
        'size' => $size,
    ];
}

function hws_walk_home_layout(&$elements) {
    foreach ($elements as &$element) {
        $id = $element['id'] ?? '';
        if (!isset($element['settings']) || !is_array($element['settings'])) {
            $element['settings'] = [];
        }

        switch ($id) {
            case '950ea57':
                $element['settings']['content_width'] = 'full';
                $element['settings']['flex_direction'] = 'row';
                $element['settings']['flex_gap'] = hws_px_gap(32);
                $element['settings']['align_items'] = 'flex-start';
                $element['settings']['flex_align_items'] = 'flex-start';
                break;

            case 'fbfb2bb':
                $element['settings']['width'] = hws_percent_width(50);
                $element['settings']['content_width'] = 'full';
                break;

            case '12a3ef6':
                $element['settings']['width'] = hws_percent_width(50);
                $element['settings']['content_width'] = 'full';
                $element['settings']['align_self'] = 'flex-start';
                break;

            case '177558b':
                $element['settings']['columns'] = 2;
                $element['settings']['products'] = ['248503', '248501'];
                $element['settings']['order_by'] = 'post__in';
                break;

            case 'a377d0d':
                $element['settings']['title'] = 'Решения<br>для пара';
                $element['settings']['subtitle'] = 'Парогенераторы и паротермальные печи для хаммама, русской бани и коммерческих объектов.';
                $element['settings']['button_title'] = 'Смотреть подборку';
                $element['settings']['equal_height'] = 'yes';
                $element['settings']['stretch_to_fit'] = 'yes';
                $element['settings']['link'] = [
                    'url' => home_url('/product-category/bath-sauna-stoves/hammam-stoves/'),
                    'is_external' => '',
                    'nofollow' => '',
                    'custom_attributes' => '',
                ];
                break;

            case 'b65c4f9':
                $element['settings']['content_width'] = 'full';
                $element['settings']['flex_direction'] = 'row';
                $element['settings']['flex_gap'] = hws_px_gap(32);
                $element['settings']['align_items'] = 'stretch';
                $element['settings']['flex_align_items'] = 'stretch';
                break;

            case 'cffcfeb':
                $element['settings']['width'] = hws_percent_width(75);
                $element['settings']['content_width'] = 'full';
                break;

            case 'd89af63':
                $element['settings']['width'] = hws_percent_width(25);
                $element['settings']['content_width'] = 'full';
                $element['settings']['align_self'] = 'stretch';
                break;

            case '4063e47':
                $element['settings']['columns'] = 3;
                $element['settings']['products'] = ['234056', '248559', '248547'];
                $element['settings']['order_by'] = 'post__in';
                break;

            case '7cd0d7b':
                $element['settings']['title'] = 'Бесплатный<br>расчёт проекта';
                $element['settings']['subtitle'] = 'Подберём печь, мощность, облицовку и комплект поставки под вашу парную.';
                $element['settings']['button_title'] = 'Получить расчёт';
                $element['settings']['equal_height'] = 'yes';
                $element['settings']['stretch_to_fit'] = 'yes';
                $element['settings']['link'] = [
                    'url' => home_url('/konsultatsii-po-podboru/'),
                    'is_external' => '',
                    'nofollow' => '',
                    'custom_attributes' => '',
                ];
                break;
        }

        if (!empty($element['elements']) && is_array($element['elements'])) {
            hws_walk_home_layout($element['elements']);
        }
    }
}

hws_walk_home_layout($data);

update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($data, JSON_UNESCAPED_UNICODE)));

if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

wp_cache_flush();

echo "rebuilt pickup blocks in Elementor data\n";
