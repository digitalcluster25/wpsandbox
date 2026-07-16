<?php
require_once '/var/www/html/wp-load.php';

$contact_page_id = 20823;

$content = <<<'HTML'
<h4>Наши офисы</h4>
Запланируйте визит или напишите менеджеру заранее, чтобы мы подготовили консультацию по вашему объекту.

<h5>Ташкент</h5>
Узбекистан, Ташкент, Мирабадский район, ул. Афросиаб, 12
<strong>Телефон: </strong>
<strong>8 800 200-00-00</strong>

<strong>Время работы:</strong>
Понедельник - пятница
10:00 - 19:00

<h5>Баку</h5>
Азербайджан, Баку, район Насими, проспект Азадлыг, 45
<strong>Телефон: </strong>
<strong>8 800 200-00-00</strong>

<strong>Время работы:</strong>
Понедельник - пятница
10:00 - 19:00

<h4>Запрос на консультацию</h4>
Заполните форму или напишите на <strong><a href="mailto:sales@wpsandbox.spaces.community">sales@wpsandbox.spaces.community</a></strong>. Мы поможем подобрать печь, уточним сроки поставки и подготовим предложение.

<form action="/wp-admin/admin-ajax.php#wpcf7-f18-o1" method="post" novalidate="novalidate" aria-label="Форма обратной связи" data-status="init">
<fieldset><input name="_wpcf7" type="hidden" value="18" /><input name="_wpcf7_version" type="hidden" value="6.1.6" /><input name="_wpcf7_locale" type="hidden" value="ru_RU" /><input name="_wpcf7_unit_tag" type="hidden" value="wpcf7-f18-o1" /><input name="_wpcf7_container_post" type="hidden" value="0" /><input name="_wpcf7_posted_data_hash" type="hidden" value="" /></fieldset>
<label> Имя
<input maxlength="400" name="your-name" size="40" type="text" value="" placeholder="Ваше имя" aria-required="true" aria-invalid="false" /> </label>

<label> Компания или объект
<input maxlength="400" name="company-name" size="40" type="text" value="" placeholder="Название компании или объекта" aria-required="true" aria-invalid="false" /> </label>

<label> Email
<input maxlength="400" name="your-email" size="40" type="email" value="" placeholder="Рабочий email" aria-required="true" aria-invalid="false" /> </label>

<label> Телефон
<input maxlength="400" name="your-phone" size="40" type="tel" value="" placeholder="Номер телефона" aria-invalid="false" /> </label>

<label> Тема обращения
<input maxlength="400" name="subject" size="40" type="text" value="" placeholder="Например: подбор печи для хаммама" aria-invalid="false" /> </label>

<label> Бюджет
<select name="menu-18" aria-invalid="false">
<option value="До 2 000 USD">До 2 000 USD</option>
<option value="2 000 - 6 000 USD">2 000 - 6 000 USD</option>
<option value="6 000 - 15 000 USD">6 000 - 15 000 USD</option>
<option value="Нужна консультация">Нужна консультация</option>
</select></label>

<label> Детали проекта
<textarea cols="40" maxlength="2000" name="message" rows="10" placeholder="Опишите объект, город, объём парной и желаемый режим: баня, сауна или хаммам" aria-invalid="false"></textarea> </label>

<label><input name="acceptance-4" type="checkbox" value="1" aria-invalid="false" />Отправляя форму, я соглашаюсь с обработкой данных для ответа на запрос.</label>
<input type="submit" value="Отправить запрос" />

</form><button data-button-loading="true"></button>
HTML;

wp_update_post([
    'ID' => $contact_page_id,
    'post_title' => 'Представительства',
    'post_content' => $content,
]);

update_post_meta(
    $contact_page_id,
    'page_header_title_custom_subtitle_text',
    'Свяжитесь с нами для подбора банной печи, уточнения сроков поставки или консультации по объекту.'
);

$widgets = get_option('widget_block', []);
if (is_array($widgets)) {
    $widgets[21] = [
        'content' => '<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Контакты</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<ul>
    <li><strong>8 800 200-00-00</strong></li>
    <li>Понедельник - пятница</li>
    <li>10:00 - 19:00</li>
    <li><a href="mailto:sales@wpsandbox.spaces.community">sales@wpsandbox.spaces.community</a></li>
</ul>
<!-- /wp:html --></div>
<!-- /wp:group -->',
    ];
    update_option('widget_block', $widgets);
}

wp_cache_flush();

echo "updated contact page and footer contact widget\n";
