<?php
defined('ABSPATH') || exit;

/* ============================================================
   THEME SETUP
   ============================================================ */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    register_nav_menus([
        'primary' => __('Main Menu', 'warsaw-rentals'),
        'footer'  => __('Footer Menu', 'warsaw-rentals'),
    ]);
});

/* ============================================================
   ENQUEUE ASSETS
   ============================================================ */
add_action('wp_enqueue_scripts', function () {
    // Google Fonts — Syne + DM Sans
    wp_enqueue_style(
        'warsaw-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Syne:wght@600;700;800&display=swap',
        [], null
    );

    wp_enqueue_style('warsaw-style', get_stylesheet_uri(), ['warsaw-fonts'], '1.0.0');

    wp_enqueue_script('warsaw-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);
});

/* ============================================================
   VARIANT 1 — ACF REST API ENQUEUE (only on v1 page)
   ============================================================ */
add_action('wp_enqueue_scripts', function () {
    if (!is_page_template('page-variant1-acf.php')) return;

    // React + ReactDOM from CDN
    wp_enqueue_script('react',     'https://unpkg.com/react@18/umd/react.production.min.js', [], '18', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@18/umd/react-dom.production.min.js', ['react'], '18', true);
    wp_enqueue_script(
        'warsaw-react-app',
        get_template_directory_uri() . '/assets/js/variant1-app.js',
        ['react', 'react-dom'], '1.0.0', true
    );

    // Pass WP REST API base to JS
    wp_localize_script('warsaw-react-app', 'WarsawData', [
        'apiBase'  => esc_url(rest_url('warsaw/v1')),
        'wpApiBase'=> esc_url(rest_url('wp/v2')),
        'nonce'    => wp_create_nonce('wp_rest'),
        'pageId'   => get_the_ID(),
    ]);
});

/* ============================================================
   VARIANT 1 — CUSTOM REST ENDPOINT (returns ACF data)
   ============================================================ */
add_action('rest_api_init', function () {
    register_rest_route('warsaw/v1', '/landing/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'warsaw_get_landing_data',
        'permission_callback' => '__return_true',
        'args'                => [
            'id' => ['validate_callback' => fn($v) => is_numeric($v)],
        ],
    ]);
});

function warsaw_get_landing_data(\WP_REST_Request $request): \WP_REST_Response {
    $id = absint($request['id']);
    $post = get_post($id);
    if (!$post) return new \WP_REST_Response(['error' => 'Not found'], 404);

    $acf = function_exists('get_fields') ? (get_fields($id) ?: []) : [];

    return new \WP_REST_Response([
        'id'    => $id,
        'title' => get_the_title($id),
        'hero'  => [
            'badge'    => $acf['hero_badge']    ?? 'Варшава · Аренда квартир',
            'title'    => $acf['hero_title']    ?? 'Найди идеальную квартиру <span>в Варшаве</span>',
            'subtitle' => $acf['hero_subtitle'] ?? 'Проверенные квартиры в центре Варшавы. Без скрытых платежей, без агентских сборов. Въезд с первого дня.',
            'cta_text' => $acf['hero_cta']      ?? 'Смотреть квартиры',
            'cta2_text'=> $acf['hero_cta2']     ?? 'Узнать цены',
            'stat1_n'  => $acf['stat1_number']  ?? '200+',
            'stat1_l'  => $acf['stat1_label']   ?? 'квартир',
            'stat2_n'  => $acf['stat2_number']  ?? '5 лет',
            'stat2_l'  => $acf['stat2_label']   ?? 'на рынке',
            'stat3_n'  => $acf['stat3_number']  ?? '98%',
            'stat3_l'  => $acf['stat3_label']   ?? 'довольных жильцов',
        ],
        'features' => [
            'eyebrow' => $acf['features_eyebrow'] ?? 'Почему мы',
            'title'   => $acf['features_title']   ?? 'Аренда без стресса',
            'items'   => $acf['features']          ?? [
                ['icon' => '📍', 'title' => 'Центр Варшавы', 'desc' => 'Все квартиры в радиусе 3 км от Рыночной площади'],
                ['icon' => '💳', 'title' => 'Честная цена',  'desc' => 'Никаких агентских и скрытых платежей'],
                ['icon' => '⚡', 'title' => 'Быстрый въезд', 'desc' => 'Подписание договора и ключи за 24 часа'],
                ['icon' => '🔧', 'title' => 'Поддержка 24/7', 'desc' => 'Служба поддержки ответит в любое время'],
            ],
        ],
        'apartments' => $acf['apartments'] ?? [
            ['title' => 'Студия на Śródmieście', 'location' => 'ул. Марszałkowska 12', 'price' => '3 200 zł/мес', 'rooms' => '1', 'area' => '32 m²', 'floor' => '4 эт.', 'emoji' => '🏙️'],
            ['title' => '2-комн. на Mokotów',    'location' => 'ул. Puławska 48',     'price' => '4 500 zł/мес', 'rooms' => '2', 'area' => '55 m²', 'floor' => '2 эт.', 'emoji' => '🌳'],
            ['title' => '3-комн. на Żoliborz',   'location' => 'ул. Mickiewicza 7',   'price' => '6 200 zł/мес', 'rooms' => '3', 'area' => '78 m²', 'floor' => '3 эт.', 'emoji' => '🏛️'],
        ],
        'cta' => [
            'title'   => $acf['cta_title']   ?? 'Готов к переезду в Варшаву?',
            'desc'    => $acf['cta_desc']    ?? 'Оставь заявку и мы подберём квартиру под твой бюджет и район в течение 24 часов.',
            'btn_text'=> $acf['cta_btn']     ?? 'Оставить заявку',
            'btn2_text'=> $acf['cta_btn2']   ?? 'Позвонить нам',
        ],
    ]);
}

/* ============================================================
   ACF FIELD GROUPS — Variant 1
   ============================================================ */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key'   => 'group_warsaw_hero',
        'title' => 'Hero секция',
        'fields' => [
            ['key' => 'field_hero_badge',    'label' => 'Бейдж',          'name' => 'hero_badge',    'type' => 'text'],
            ['key' => 'field_hero_title',    'label' => 'Заголовок',      'name' => 'hero_title',    'type' => 'text'],
            ['key' => 'field_hero_subtitle', 'label' => 'Подзаголовок',   'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 2],
            ['key' => 'field_hero_cta',      'label' => 'Кнопка 1',       'name' => 'hero_cta',      'type' => 'text'],
            ['key' => 'field_hero_cta2',     'label' => 'Кнопка 2',       'name' => 'hero_cta2',     'type' => 'text'],
            ['key' => 'field_stat1_number',  'label' => 'Стат 1 цифра',   'name' => 'stat1_number',  'type' => 'text'],
            ['key' => 'field_stat1_label',   'label' => 'Стат 1 подпись', 'name' => 'stat1_label',   'type' => 'text'],
            ['key' => 'field_stat2_number',  'label' => 'Стат 2 цифра',   'name' => 'stat2_number',  'type' => 'text'],
            ['key' => 'field_stat2_label',   'label' => 'Стат 2 подпись', 'name' => 'stat2_label',   'type' => 'text'],
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-variant1-acf.php']]],
    ]);

    acf_add_local_field_group([
        'key'   => 'group_warsaw_features',
        'title' => 'Features секция',
        'fields' => [
            ['key' => 'field_features_eyebrow', 'label' => 'Надпись над заголовком', 'name' => 'features_eyebrow', 'type' => 'text'],
            ['key' => 'field_features_title',   'label' => 'Заголовок секции',       'name' => 'features_title',   'type' => 'text'],
            ['key' => 'field_features_repeater', 'label' => 'Карточки', 'name' => 'features', 'type' => 'repeater',
             'button_label' => 'Добавить карточку',
             'sub_fields' => [
                 ['key' => 'field_f_icon',  'label' => 'Эмодзи/иконка', 'name' => 'icon',  'type' => 'text'],
                 ['key' => 'field_f_title', 'label' => 'Заголовок',     'name' => 'title', 'type' => 'text'],
                 ['key' => 'field_f_desc',  'label' => 'Описание',      'name' => 'desc',  'type' => 'textarea', 'rows' => 2],
             ]],
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-variant1-acf.php']]],
    ]);
});

/* ============================================================
   GUTENBERG BLOCKS — Variant 3
   ============================================================ */
add_action('init', function () {
    if (!function_exists('register_block_type')) return;

    $blocks = ['warsaw-hero', 'warsaw-features', 'warsaw-apartments', 'warsaw-cta'];
    foreach ($blocks as $block) {
        $block_path = get_template_directory() . '/blocks/' . $block;
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
});

/* ============================================================
   WIDGET AREAS
   ============================================================ */
add_action('widgets_init', function () {
    register_sidebar(['name' => 'Sidebar', 'id' => 'sidebar-1', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>']);
});

/* ============================================================
   GUTENBERG — Register custom block category
   ============================================================ */
add_filter('block_categories_all', function ($categories) {
    array_unshift($categories, [
        'slug'  => 'warsaw-rentals',
        'title' => 'Warsaw Rentals',
        'icon'  => null,
    ]);
    return $categories;
}, 10, 1);

/* ============================================================
   GUTENBERG EDITOR SCRIPT — регистрация блоков для редактора
   ============================================================ */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'warsaw-blocks-editor',
        get_template_directory_uri() . '/assets/js/blocks-editor.js',
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render'],
        filemtime(get_template_directory() . '/assets/js/blocks-editor.js'),
        true
    );
    // Шрифты Syne в редакторе
    wp_enqueue_style(
        'warsaw-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Syne:wght@700;800&display=swap',
        [], null
    );
});
