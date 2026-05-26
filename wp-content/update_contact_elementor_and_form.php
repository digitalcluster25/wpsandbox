<?php
require_once '/var/www/html/wp-load.php';

$page_id = 20823;

function hws_walk_elements(&$elements, $callback) {
    foreach ($elements as &$element) {
        $callback($element);
        if (!empty($element['elements']) && is_array($element['elements'])) {
            hws_walk_elements($element['elements'], $callback);
        }
    }
}

function hws_remove_element_by_id(&$elements, $remove_id) {
    foreach ($elements as $index => &$element) {
        if (($element['id'] ?? '') === $remove_id) {
            array_splice($elements, $index, 1);
            return true;
        }
        if (!empty($element['elements']) && is_array($element['elements'])) {
            if (hws_remove_element_by_id($element['elements'], $remove_id)) {
                return true;
            }
        }
    }
    return false;
}

$data = json_decode(get_post_meta($page_id, '_elementor_data', true), true);
if (is_array($data)) {
    hws_walk_elements($data, function (&$element) {
        $id = $element['id'] ?? '';
        if (empty($element['settings']) || !is_array($element['settings'])) {
            return;
        }
        switch ($id) {
            case '9012399':
                $element['settings']['title'] = 'Наши офисы';
                break;
            case 'a2fa34b':
                $element['settings']['editor'] = '<p>Запланируйте визит или напишите менеджеру заранее, чтобы мы подготовили консультацию по вашему объекту.</p>';
                break;
            case '9616e69':
                $element['settings']['title'] = 'Ташкент';
                break;
            case '4f79725':
                $element['settings']['editor'] = '<p>Узбекистан, Ташкент, Мирабадский район, ул. Афросиаб, 12<br><strong>Телефон: </strong><br><strong>8 800 200-00-00</strong></p>';
                break;
            case '37429e1':
                $element['settings']['editor'] = '<p><strong>Время работы:</strong><br>Понедельник - пятница<br>10:00 - 19:00</p>';
                break;
            case '9d9f2d7':
                $element['settings']['title'] = 'Баку';
                break;
            case 'c0ea56a':
                $element['settings']['editor'] = '<p>Азербайджан, Баку, район Насими, проспект Азадлыг, 45<br><strong>Телефон: </strong><br><strong>8 800 200-00-00</strong></p>';
                break;
            case 'd392440':
                $element['settings']['editor'] = '<p><strong>Время работы:</strong><br>Понедельник - пятница<br>10:00 - 19:00</p>';
                break;
            case 'd6f16a6':
                $element['settings']['title'] = 'Запрос на консультацию';
                break;
            case 'dcb7854':
                $element['settings']['editor'] = '<p>Заполните форму или напишите на <strong><a href="mailto:sales@wpsandbox.spaces.community">sales@wpsandbox.spaces.community</a></strong><br>Мы поможем подобрать печь, уточним сроки поставки и подготовим предложение.</p>';
                break;
        }
    });

    hws_remove_element_by_id($data, 'e8f51cd');
    hws_remove_element_by_id($data, '57e42fb');

    update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($data, JSON_UNESCAPED_UNICODE)));
}

$form = <<<'FORM'
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Имя
    [text* your-name placeholder "Ваше имя"] </label>
</div>
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Компания или объект
    [text* company-name placeholder "Название компании или объекта"] </label>
</div>
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Email
    [email* your-email placeholder "Рабочий email"] </label>
</div>
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Телефон
    [tel your-phone placeholder "Номер телефона"] </label>
</div>
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Тема обращения
    [text subject placeholder "Например: подбор печи для хаммама"] </label>
</div>
<div class="vc_col-lg-4 vc_col-sm-12">
<label> Бюджет
    [select menu-18 "До 2 000 USD" "2 000 - 6 000 USD" "6 000 - 15 000 USD" "Нужна консультация"]</label>
</div>
<div class="vc_col-lg-12 vc_col-sm-12">
<label> Детали проекта
    [textarea message placeholder "Опишите объект, город, объём парной и желаемый режим: баня, сауна или хаммам"] </label>
</div>
<div class="vc_col-lg-12 vc_col-sm-12">
[acceptance acceptance-4 optional] Отправляя форму, я соглашаюсь с обработкой данных для ответа на запрос. [/acceptance]
[submit "Отправить запрос"]
</div>
FORM;

delete_post_meta(18, '_form');
add_post_meta(18, '_form', $form);
delete_post_meta(18, '_locale');
add_post_meta(18, '_locale', 'ru_RU');

$mail = [
    'active' => true,
    'subject' => 'Запрос с сайта: [subject]',
    'sender' => 'HWS Catalog <wordpress@wpsandbox.spaces.community>',
    'recipient' => 'sales@wpsandbox.spaces.community',
    'body' => "Имя: [your-name]\nEmail: [your-email]\nТелефон: [your-phone]\nКомпания/объект: [company-name]\nБюджет: [menu-18]\n\nСообщение:\n[message]\n\n--\nОтправлено с формы контактов wpsandbox.spaces.community",
    'additional_headers' => 'Reply-To: [your-email]',
    'attachments' => '',
    'use_html' => false,
    'exclude_blank' => false,
];
delete_post_meta(18, '_mail');
add_post_meta(18, '_mail', $mail);

$messages = [
    'mail_sent_ok' => 'Спасибо, сообщение отправлено.',
    'mail_sent_ng' => 'Не удалось отправить сообщение. Попробуйте позже.',
    'validation_error' => 'Проверьте поля формы и попробуйте ещё раз.',
    'spam' => 'Не удалось отправить сообщение. Попробуйте позже.',
    'accept_terms' => 'Нужно согласиться с условиями перед отправкой.',
    'invalid_required' => 'Поле обязательно для заполнения.',
    'invalid_too_long' => 'Значение слишком длинное.',
    'invalid_too_short' => 'Значение слишком короткое.',
    'upload_failed' => 'Не удалось загрузить файл.',
    'upload_file_type_invalid' => 'Недопустимый тип файла.',
    'upload_file_too_large' => 'Файл слишком большой.',
    'upload_failed_php_error' => 'Ошибка при загрузке файла.',
    'invalid_date' => 'Некорректный формат даты.',
    'date_too_early' => 'Дата раньше допустимой.',
    'date_too_late' => 'Дата позже допустимой.',
    'invalid_number' => 'Некорректный формат числа.',
    'number_too_small' => 'Число меньше допустимого.',
    'number_too_large' => 'Число больше допустимого.',
    'quiz_answer_not_correct' => 'Неверный ответ.',
    'invalid_email' => 'Некорректный email.',
    'invalid_url' => 'Некорректный URL.',
    'invalid_tel' => 'Некорректный телефон.',
];
delete_post_meta(18, '_messages');
add_post_meta(18, '_messages', $messages);

update_post_meta(
    $page_id,
    'page_header_title_custom_subtitle_text',
    'Свяжитесь с нами для подбора банной печи, уточнения сроков поставки или консультации по объекту.'
);

if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

wp_cache_flush();

echo "updated elementor contact page and contact form\n";
