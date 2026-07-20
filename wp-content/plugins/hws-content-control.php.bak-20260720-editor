<?php
/**
 * Plugin Name: HWS Content Control
 * Description: Управление текстами и надписями на фронтенде.
 * Version: 1.2.0
 */

defined('ABSPATH') || exit;

final class HWS_Content_Control {

    private const OPTION = 'hws_site_texts';

    private const DEFAULTS = [
        // Главная
        'home_categories_title'     => 'Решения для любых задач',
        'home_products_title'       => 'Подобранная коллекция',
        'home_blog_title'           => 'База знаний',
        'home_how_title'            => 'Как мы работаем',
        'home_how_1_number'         => 'Шаг 1.',
        'home_how_1_title'          => 'Консультация.',
        'home_how_1_description'    => 'Обсуждаем задачи и пожелания.',
        'home_how_2_number'         => 'Шаг 2.',
        'home_how_2_title'          => 'Расчёт.',
        'home_how_2_description'    => 'Подбираем оптимальное решение.',
        'home_how_3_number'         => 'Шаг 3.',
        'home_how_3_title'          => 'Подбор.',
        'home_how_3_description'    => 'Формируем спецификацию оборудования.',
        'home_how_4_number'         => 'Шаг 4.',
        'home_how_4_title'          => 'Поставка.',
        'home_how_4_description'    => 'Доставляем оборудование на объект.',
        'home_how_5_number'         => 'Шаг 5.',
        'home_how_5_title'          => 'Монтаж.',
        'home_how_5_description'    => 'Профессиональная установка.',
        'home_how_6_number'         => 'Шаг 6.',
        'home_how_6_title'          => 'Запуск.',
        'home_how_6_description'    => 'Проверка и запуск системы.',
        'home_how_7_number'         => 'Шаг 7.',
        'home_how_7_title'          => 'Обслуживание.',
        'home_how_7_description'    => 'Постгарантийное сопровождение: плановое ТО, замена расходников, консультации по эксплуатации.',
        // Каталог
        'catalog_overview_title'    => 'Каталог HWS',
        'catalog_overview_lead'     => 'Каталог организован по реальным сценариям выбора: сначала тип решения, затем подкатегория, и только после этого фильтры по мощности, объёму, серии и бренду.',
        'catalog_collections_title' => 'Популярные подборки по ключевым разделам',
        // Страница бренда
        'brand_categories_title'    => 'Ключевые разделы бренда',
        // База знаний
        'knowledge_page_title'      => 'База знаний',
        // Страница товара
        'product_description_title' => 'Описание товара',
    ];

    private const LABELS = [
        'home_categories_title'     => 'Заголовок раздела «Решения для задач»',
        'home_products_title'       => 'Заголовок раздела «Подобранная коллекция»',
        'home_blog_title'           => 'Заголовок раздела «База знаний»',
        'home_how_title'            => 'Заголовок блока «Как мы работаем»',
        'catalog_overview_title'    => 'H1 страницы каталога',
        'catalog_overview_lead'     => 'Подзаголовок страницы каталога',
        'catalog_collections_title' => 'Заголовок блока «Популярные подборки»',
        'brand_categories_title'    => 'Заголовок раздела категорий на странице бренда',
        'knowledge_page_title'      => 'Заголовок страницы базы знаний',
        'product_description_title' => 'Заголовок блока описания товара',
    ];

    private const SECTIONS = [
        'Главная страница'  => ['home_categories_title', 'home_products_title', 'home_blog_title', 'home_how_title'],
        'Как мы работаем'   => [
            'home_how_1_number', 'home_how_1_title', 'home_how_1_description',
            'home_how_2_number', 'home_how_2_title', 'home_how_2_description',
            'home_how_3_number', 'home_how_3_title', 'home_how_3_description',
            'home_how_4_number', 'home_how_4_title', 'home_how_4_description',
            'home_how_5_number', 'home_how_5_title', 'home_how_5_description',
            'home_how_6_number', 'home_how_6_title', 'home_how_6_description',
            'home_how_7_number', 'home_how_7_title', 'home_how_7_description',
        ],
        'Каталог'           => ['catalog_overview_title', 'catalog_overview_lead', 'catalog_collections_title'],
        'Страница бренда'   => ['brand_categories_title'],
        'База знаний'       => ['knowledge_page_title'],
        'Страница товара'   => ['product_description_title'],
    ];

    public static function init(): void {
        add_action('admin_menu',             [__CLASS__, 'admin_menu']);
        add_action('admin_post_hws_cc_save', [__CLASS__, 'handle_save']);
        add_action('graphql_register_types', [__CLASS__, 'register_graphql']);
    }

    public static function admin_menu(): void {
        add_submenu_page(
            'woocommerce',
            'Тексты сайта',
            'Тексты сайта',
            'manage_woocommerce',
            'hws-content-control',
            [__CLASS__, 'render_page']
        );
    }

    public static function handle_save(): void {
        check_admin_referer('hws_cc_save');
        if (!current_user_can('manage_woocommerce')) wp_die('Forbidden', 403);

        $texts = get_option(self::OPTION, []);
        if (!is_array($texts)) $texts = [];

        foreach (array_keys(self::DEFAULTS) as $key) {
            $val = sanitize_textarea_field(wp_unslash($_POST[$key] ?? ''));
            if ($val !== '') {
                $texts[$key] = $val;
            } else {
                unset($texts[$key]); // empty = revert to default
            }
        }

        update_option(self::OPTION, $texts, false);
        if (function_exists('hws_revalidate')) hws_revalidate();

        wp_redirect(add_query_arg(['page' => 'hws-content-control', 'saved' => '1'], admin_url('admin.php')));
        exit;
    }

    public static function render_page(): void {
        $texts = get_option(self::OPTION, []);
        if (!is_array($texts)) $texts = [];

        $saved = !empty($_GET['saved']);
        ?>
        <div class="wrap" style="max-width:800px">
            <h1>Тексты сайта</h1>
            <?php if ($saved): ?>
            <div class="notice notice-success is-dismissible"><p>✓ Сохранено и кэш обновлён</p></div>
            <?php endif; ?>
            <p style="color:#666;margin-bottom:0">Измените текст и нажмите «Сохранить». Очистите поле чтобы вернуть текст по умолчанию.</p>

            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <?php wp_nonce_field('hws_cc_save'); ?>
                <input type="hidden" name="action" value="hws_cc_save">

                <?php foreach (self::SECTIONS as $section_title => $keys): ?>
                <h2 style="margin-top:28px;border-bottom:1px solid #ddd;padding-bottom:6px"><?php echo esc_html($section_title); ?></h2>
                <table class="form-table" style="margin-top:8px">
                    <?php foreach ($keys as $key):
                        $default = self::DEFAULTS[$key];
                        $current = $texts[$key] ?? $default;
                        $label   = self::LABELS[$key] ?? $key;
                        if (preg_match('/^home_how_(\d+)_(number|title|description)$/', $key, $matches)) {
                            $step_labels = [
                                'number' => 'Номер шага',
                                'title' => 'Название шага',
                                'description' => 'Описание шага',
                            ];
                            $label = 'Шаг ' . $matches[1] . ' — ' . $step_labels[$matches[2]];
                        }
                        $is_long = str_contains($key, 'lead') || str_contains($key, 'description');
                    ?>
                    <tr>
                        <th style="width:30%;vertical-align:top;padding-top:14px">
                            <label for="<?php echo esc_attr($key); ?>">
                                <strong><?php echo esc_html($label); ?></strong>
                            </label>
                        </th>
                        <td>
                            <?php if ($is_long): ?>
                            <textarea
                                id="<?php echo esc_attr($key); ?>"
                                name="<?php echo esc_attr($key); ?>"
                                rows="4"
                                class="large-text"
                            ><?php echo esc_textarea($current); ?></textarea>
                            <?php else: ?>
                            <input
                                type="text"
                                id="<?php echo esc_attr($key); ?>"
                                name="<?php echo esc_attr($key); ?>"
                                class="large-text"
                                value="<?php echo esc_attr($current); ?>"
                            >
                            <?php endif; ?>
                            <?php if (isset($texts[$key]) && $texts[$key] !== $default): ?>
                            <p class="description" style="margin-top:4px;color:#999">
                                По умолчанию: «<?php echo esc_html($default); ?>»
                            </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endforeach; ?>

                <div style="margin-top:24px"><?php submit_button('Сохранить', 'primary', 'submit', false); ?></div>
            </form>
        </div>
        <?php
    }

    public static function get_texts(): array {
        $saved = get_option(self::OPTION, []);
        if (!is_array($saved)) $saved = [];
        return array_merge(self::DEFAULTS, $saved);
    }

    public static function register_graphql(): void {
        register_graphql_object_type('HwsHowStep', [
            'description' => 'Шаг блока «Как мы работаем»',
            'fields' => [
                'number' => ['type' => 'String'],
                'title' => ['type' => 'String'],
                'description' => ['type' => 'String'],
            ],
        ]);

        register_graphql_object_type('HwsSiteTexts', [
            'description' => 'Редактируемые тексты фронтенда',
            'fields'      => [
                'catalogCollectionsTitle' => ['type' => 'String'],
                'catalogOverviewTitle'    => ['type' => 'String'],
                'catalogOverviewLead'     => ['type' => 'String'],
                'homeCategoriesTitle'     => ['type' => 'String'],
                'homeProductsTitle'       => ['type' => 'String'],
                'homeBlogTitle'           => ['type' => 'String'],
                'homeHowTitle'            => ['type' => 'String'],
                'homeHowSteps'            => ['type' => ['list_of' => 'HwsHowStep']],
                'brandCategoriesTitle'    => ['type' => 'String'],
                'knowledgePageTitle'      => ['type' => 'String'],
                'productDescriptionTitle' => ['type' => 'String'],
            ],
        ]);

        register_graphql_field('RootQuery', 'hwsSiteTexts', [
            'type'        => 'HwsSiteTexts',
            'description' => 'Редактируемые тексты фронтенда (управляются из WP Admin → Тексты сайта)',
            'resolve'     => function () {
                $t = self::get_texts();
                return [
                    'catalogCollectionsTitle' => $t['catalog_collections_title'],
                    'catalogOverviewTitle'    => $t['catalog_overview_title'],
                    'catalogOverviewLead'     => $t['catalog_overview_lead'],
                    'homeCategoriesTitle'     => $t['home_categories_title'],
                    'homeProductsTitle'       => $t['home_products_title'],
                    'homeBlogTitle'           => $t['home_blog_title'],
                    'homeHowTitle'            => $t['home_how_title'],
                    'homeHowSteps'            => array_map(static function (int $i) use ($t): array {
                        return [
                            'number' => $t['home_how_' . $i . '_number'],
                            'title' => $t['home_how_' . $i . '_title'],
                            'description' => $t['home_how_' . $i . '_description'],
                        ];
                    }, range(1, 7)),
                    'brandCategoriesTitle'    => $t['brand_categories_title'],
                    'knowledgePageTitle'      => $t['knowledge_page_title'],
                    'productDescriptionTitle' => $t['product_description_title'],
                ];
            },
        ]);
    }
}

HWS_Content_Control::init();
