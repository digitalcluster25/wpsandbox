<?php
/**
 * Plugin Name: HWS Product Parser
 * Description: Parser status and field mapping console for confirmed supplier product sources.
 * Version: 0.1.0
 * Author: HWS
 */

defined('ABSPATH') || exit;

final class HWS_Product_Parser {

    private const MENU_SLUG = 'hws-product-parser';
    private const OPTION    = 'hws_product_parser_state';
    private const NONCE     = 'hws_product_parser_action';
    private const STATE_VERSION = '0.2.0';

    private const MANUFACTURERS = [
        'easysteam' => [
            'label'      => 'EasySteam',
            'categories' => ['gelendzhik', 'anapa', 'sochi', 'yuzhnaya', 'vivarte', 'montfort', 'yalta-15', 'yalta-25', 'yalta-35', 'yalta-40', 'anapa-k', 'sochi-k', 'gelendzhik-k', 'domna-45-k', 'domna-60-k', 'domna-80-k', 'domna-90-tvin-k', 'domna-120-tvin-k', 'yalta-15-k', 'yalta-25-k', 'yalta-35-k', 'yalta-40-k', 'yalta-50-k', 'yalta-60-k', 'yalta-80-k', 'yalta-100-k'],
        ],
        'sangens' => [
            'label'      => 'Sangens',
            'categories' => ['sangens-electric-furnaces'],
        ],
        'eos' => [
            'label'      => 'EOS',
            'categories' => ['eos-sauna-heaters'],
        ],
        'vvd' => [
            'label'      => 'Инжкомцентр ВВД',
            'categories' => ['vvd-electric-furnaces', 'vvd-wood-furnaces'],
        ],
    ];

    private const CATEGORIES = [
        'gelendzhik' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Геленджик',
            'url'          => 'https://easysteam.ru/products/stoves/pechi/gelendzhik',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 18,
        ],
        'anapa' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Анапа',
            'url'          => 'https://easysteam.ru/products/stoves/pechi/anapa',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 15,
        ],
        'sochi' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Сочи',
            'url'          => 'https://easysteam.ru/products/stoves/pechi/sochi',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 14,
        ],
        'yuzhnaya' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Южная',
            'url'          => 'https://easysteam.ru/products/stoves/pechi/yuzhnaya',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 16,
        ],
        'vivarte' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Электропечь VIVARTE',
            'url'          => 'https://easysteam.ru/products/stoves/pechi/elektricheskie-pechi',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 6,
        ],
        'montfort' => [
            'manufacturer' => 'easysteam',
            'label'        => 'MONTFORT',
            // Single-product line: no dedicated category listing page exists on the source,
            // this "category" URL is the product's own detail page. See the manual state
            // seed used when parsing this category (extract_category_products can't crawl
            // a single product page as a listing).
            'url'          => 'https://easysteam.ru/products/show/7c4c8926-3383-47c7-a3da-451459496f97',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'yalta-15' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 15',
            'url'          => 'https://easysteam.ru/products/category/yalta-15',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-25' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 25',
            'url'          => 'https://easysteam.ru/products/category/yalta-25',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-35' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 35',
            'url'          => 'https://easysteam.ru/products/category/yalta-35',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-40' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 40',
            'url'          => 'https://easysteam.ru/products/category/yalta-40',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'anapa-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Анапа К',
            'url'          => 'https://easysteam.ru/products/category/anapa-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 4,
        ],
        'sochi-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Сочи К',
            'url'          => 'https://easysteam.ru/products/category/sochi-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 4,
        ],
        'gelendzhik-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Геленджик К',
            'url'          => 'https://easysteam.ru/products/category/gelendzhik-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 4,
        ],
        'domna-45-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Домна 45 К',
            'url'          => 'https://easysteam.ru/products/category/domna-45-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 4,
        ],
        'domna-60-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Домна 60 К',
            'url'          => 'https://easysteam.ru/products/category/domna-60-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 4,
        ],
        'domna-80-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Домна 80 К',
            'url'          => 'https://easysteam.ru/products/category/domna-80-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'domna-90-tvin-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Домна 90 К ТВИН',
            // Single-product line, no dedicated listing page — see MONTFORT for the manual
            // state-seed pattern this requires.
            'url'          => 'https://easysteam.ru/products/show/6620e428-83e6-49d6-a6a5-9bf104a740b3',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'domna-120-tvin-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Домна 120 К ТВИН',
            'url'          => 'https://easysteam.ru/products/show/d593f90a-2997-447c-a86c-b9a340786846',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'yalta-15-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 15 К',
            'url'          => 'https://easysteam.ru/products/category/yalta-15-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-25-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 25 К',
            'url'          => 'https://easysteam.ru/products/category/yalta-25-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-35-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 35 К',
            'url'          => 'https://easysteam.ru/products/category/yalta-35-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-40-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 40 К',
            'url'          => 'https://easysteam.ru/products/category/yalta-40-k',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 2,
        ],
        'yalta-50-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 50 К',
            'url'          => 'https://easysteam.ru/products/product/1014104',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'yalta-60-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 60 К',
            'url'          => 'https://easysteam.ru/products/show/4e8b062d-2e02-4e62-a21e-6a90b288d835',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'yalta-80-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 80 К',
            'url'          => 'https://easysteam.ru/products/show/ae8c6389-fe58-4fda-91f4-c74e0fb735fd',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'yalta-100-k' => [
            'manufacturer' => 'easysteam',
            'label'        => 'Ялта 100 К',
            'url'          => 'https://easysteam.ru/products/show/f8df82bf-21a6-4550-91b5-ccfb656e20b2',
            'base_url'     => 'https://easysteam.ru/',
            'expected'     => 1,
        ],
        'sangens-electric-furnaces' => [
            'manufacturer' => 'sangens',
            'label'        => 'Электрические печи',
            'url'          => 'https://sangens.com/ru/catalog/furnaces/',
            'base_url'     => 'https://sangens.com/',
            'expected'     => 25,
        ],
        'eos-sauna-heaters' => [
            'manufacturer' => 'eos',
            'label'        => 'Электрические печи для сауны',
            'url'          => 'https://www.eos-sauna.com/en/product-overview/sauna-heaters',
            'base_url'     => 'https://www.eos-sauna.com/',
            'expected'     => 0,
        ],
        'vvd-electric-furnaces' => [
            'manufacturer' => 'vvd',
            'label'        => 'Электрические печи',
            'url'          => 'https://vvd.su/product/elektricheskie-pechi-dlya-bani/',
            'base_url'     => 'https://vvd.su/',
            'expected'     => 0,
        ],
        'vvd-wood-furnaces' => [
            'manufacturer' => 'vvd',
            'label'        => 'Дровяные печи',
            'url'          => 'https://vvd.su/product/drovyanye-pechi-dlya-bani-i-sauny/',
            'base_url'     => 'https://vvd.su/',
            'expected'     => 0,
        ],
    ];

    private const PRODUCT_FIELDS = [
        'brand'             => ['source' => 'Бренд', 'target' => 'Product brand'],
        'source_url'        => ['source' => 'URL источника', 'target' => 'Source URL'],
        'title'             => ['source' => 'Название карточки', 'target' => 'WooCommerce product name'],
        'article'           => ['source' => 'Артикул offer', 'target' => 'SKU / variation SKU'],
        'price'             => ['source' => 'Цена offer', 'target' => 'Variation regular price'],
        'offer_image'       => ['source' => 'Фото offer', 'target' => 'Variation image'],
        'short_description' => ['source' => 'Описание', 'target' => 'Short description'],
        'long_description'  => ['source' => 'Назначение + Преимущества', 'target' => 'Long description source'],
        'characteristics'   => ['source' => 'Информация о товаре / характеристики', 'target' => 'Structured attributes + specs'],
        'fuel_type'         => ['source' => 'Вид топлива', 'target' => 'Тип топлива'],
        'purpose'           => ['source' => 'Назначение', 'target' => 'Назначение'],
        'steam_volume'      => ['source' => 'Объем парной', 'target' => 'Объем парной'],
        'model'             => ['source' => 'Модель', 'target' => 'Модель'],
        'jacket_material'   => ['source' => 'Вид кожуха / Варианты кожуха', 'target' => 'Материал кожуха'],
        'firebox_protection' => ['source' => 'Защита топки', 'target' => 'Защита топки'],
        'steel_grade'       => ['source' => 'Марка стали', 'target' => 'Марка стали'],
        'door_side'         => ['source' => 'Исполнение дверки', 'target' => 'Сторона дверки'],
        'stone_side'        => ['source' => 'Боковой вход в каменку', 'target' => 'Сторона входа в каменку'],
        'chimney_side'      => ['source' => 'Боковое подключение дымохода', 'target' => 'Сторона подключения дымохода'],
        'series'            => ['source' => 'Серия', 'target' => 'Серия'],
        'power'             => ['source' => 'Мощность', 'target' => 'Мощность'],
        'voltage'           => ['source' => 'Напряжение', 'target' => 'Напряжение'],
        'material'          => ['source' => 'Материал', 'target' => 'Материал'],
        'color'             => ['source' => 'Цвет', 'target' => 'Цвет'],
        'control'           => ['source' => 'Управление', 'target' => 'Управление'],
        'mode'              => ['source' => 'Режим', 'target' => 'Режим'],
    ];

    private const REQUIRED_PRODUCT_FIELDS = [
        'brand',
        'source_url',
        'title',
        'article',
        'price',
        'offer_image',
        'short_description',
        'long_description',
        'characteristics',
        'fuel_type',
        'purpose',
        'steam_volume',
        'model',
        'steel_grade',
    ];

    private const SANGENS_REQUIRED_PRODUCT_FIELDS = [
        'brand',
        'source_url',
        'title',
        'article',
        'price',
        'offer_image',
        'fuel_type',
        'steam_volume',
        'power',
    ];

    private const EOS_REQUIRED_PRODUCT_FIELDS = [
        'brand', 'source_url', 'title', 'article', 'offer_image', 'fuel_type', 'power',
    ];

    private const VVD_REQUIRED_PRODUCT_FIELDS = [
        'brand', 'source_url', 'title', 'article', 'offer_image', 'fuel_type',
    ];

    private const OPTIONAL_PRODUCT_FIELDS = [
        'jacket_material',
        'firebox_protection',
        'door_side',
        'stone_side',
        'chimney_side',
    ];

    private const SANGENS_OPTIONAL_PRODUCT_FIELDS = [
        'short_description',
        'long_description',
        'characteristics',
        'series',
        'voltage',
        'material',
        'color',
        'control',
        'mode',
    ];

    private const SOURCE_DEPENDENT_PRODUCT_FIELDS = [
        'short_description',
    ];

    private const EASYSTEAM_OFFER_ATTRIBUTE_MAP = [
        'Исполнение дверки' => 'door-side',
        'Сторона дверки' => 'door-side',
        'Варианты дверки' => 'door-side',
        'Защита топки' => 'firebox-protection',
        'Вид топлива' => 'fuel-type',
        'Виды топлива' => 'fuel-type',
        'Тип топлива' => 'fuel-type',
        'Марка стали' => 'steel-grade',
        'Боковой вход в каменку' => 'stone-entry-side',
        'Боковое подключение дымохода' => 'chimney-connection-side',
        'Варианты кожуха' => 'cladding-type',
        'Вариант кожуха' => 'cladding-type',
        'Вид кожуха' => 'cladding-type',
    ];

    private const MANUFACTURER_MAPPING = [
        ['source' => 'EasySteam', 'target' => 'Product brand'],
        ['source' => 'Печи для русской бани / Геленджик', 'target' => 'WooCommerce category scope'],
        ['source' => 'Карточки товаров производителя', 'target' => 'WooCommerce variable products'],
    ];

    private const CATEGORY_MAPPING = [
        ['source' => 'https://easysteam.ru/products/stoves/pechi/gelendzhik', 'target' => 'Category source URL'],
        ['source' => '18 карточек товаров', 'target' => 'Products in category'],
        ['source' => 'Опции radio', 'target' => 'Real offers / variations'],
        ['source' => 'Артикул + цена + фото offer', 'target' => 'Variation SKU + price + image'],
        ['source' => 'Описание', 'target' => 'Short description'],
        ['source' => 'Назначение + Преимущества', 'target' => 'Long description source'],
        ['source' => 'Информация о товаре', 'target' => 'Attributes, filters, specs table'],
    ];

    private const BLOCKED_TABS = [
        'Печь в разрезе',
        'Схема работы печи',
        'Документация',
        'Видео',
        'Для проектов',
    ];

    private const SANGENS_BLOCKED_ITEMS = [
        'Оросительные устройства',
        'Управление',
        'Снежные генераторы',
        'Интеграция',
        'Второе дыхание',
        'Дополнительные товары и промо-блоки',
    ];

    public static function init(): void {
        add_action('admin_init', [__CLASS__, 'maybe_migrate_state']);
        add_action('admin_menu', [__CLASS__, 'admin_menu']);
        add_action('admin_post_hws_product_parser_parse', [__CLASS__, 'handle_parse']);
    }

    public static function admin_menu(): void {
        add_menu_page(
            'HWS Parser',
            'HWS Parser',
            'manage_woocommerce',
            self::MENU_SLUG,
            [__CLASS__, 'render_page'],
            'dashicons-database-import',
            56
        );

        add_submenu_page(
            self::MENU_SLUG,
            'HWS Parser',
            'HWS Parser',
            'manage_woocommerce',
            self::MENU_SLUG,
            [__CLASS__, 'render_page']
        );
    }

    public static function maybe_migrate_state(): void {
        $state = get_option(self::OPTION, []);
        if (!is_array($state)) {
            update_option(self::OPTION, ['version' => self::STATE_VERSION], false);
            return;
        }
        if (($state['version'] ?? '') === self::STATE_VERSION) {
            return;
        }

        $state['version']  = self::STATE_VERSION;
        $state['statuses'] = [];
        update_option(self::OPTION, $state, false);
    }

    public static function handle_parse(): void {
        check_admin_referer(self::NONCE);
        if (!current_user_can('manage_woocommerce')) {
            wp_die('Forbidden', 403);
        }

        $manufacturer = self::sanitize_manufacturer(wp_unslash($_POST['manufacturer'] ?? 'easysteam'));
        $category     = self::sanitize_category(wp_unslash($_POST['category'] ?? ''));
        $product      = self::sanitize_product_id(wp_unslash($_POST['product'] ?? ''));
        $scope        = sanitize_key(wp_unslash($_POST['scope'] ?? ''));
        $field        = sanitize_key(wp_unslash($_POST['field'] ?? ''));
        $message      = 'parsed';

        if ($category === '' && !in_array($scope, ['empty_fields', 'overview'], true)) {
            $category = self::default_category($manufacturer);
        }

        try {
            if ($scope === 'manufacturer') {
                self::parse_manufacturer($manufacturer);
            } elseif ($scope === 'category') {
                self::parse_category($manufacturer, $category);
            } elseif ($scope === 'product') {
                self::parse_product($manufacturer, $category, $product, null);
            } elseif ($scope === 'field') {
                self::parse_product($manufacturer, $category, $product, $field);
            } elseif ($scope === 'overview') {
                self::make_overview($manufacturer, $category);
                $message = 'overview_report';
            } elseif ($scope === 'empty_fields') {
                self::parse_empty_fields($manufacturer, $category);
                $message = 'empty_fields_report';
            } else {
                throw new RuntimeException('Unknown parse scope.');
            }
        } catch (Throwable $e) {
            $message = 'error:' . rawurlencode($e->getMessage());
        }

        $redirect = add_query_arg(
            [
                'page'         => self::MENU_SLUG,
                'manufacturer' => $manufacturer,
                'category'     => $category,
                'product'      => $product,
                'hws_message'  => $message,
            ],
            admin_url('admin.php')
        );
        if (in_array($message, ['empty_fields_report', 'overview_report'], true)) {
            $redirect .= '#hws-empty-parse-report';
        }

        wp_redirect($redirect);
        exit;
    }

    public static function render_page(): void {
        if (!current_user_can('manage_woocommerce')) {
            wp_die('Forbidden', 403);
        }

        $manufacturer = self::sanitize_manufacturer(wp_unslash($_GET['manufacturer'] ?? 'easysteam'));
        $category     = self::sanitize_category(wp_unslash($_GET['category'] ?? ''));
        $product      = self::sanitize_product_id(wp_unslash($_GET['product'] ?? ''));
        $state        = self::state();
        $active_category = $category !== '' ? $category : self::default_category($manufacturer);
        $products        = self::products_for_category($state, $manufacturer, $active_category);

        if ($product !== '' && !isset($products[$product])) {
            $product = '';
        }

        ?>
        <div class="wrap hws-parser-wrap">
            <h1>HWS Parser</h1>
            <?php self::render_notice(); ?>
            <?php self::render_styles(); ?>
            <?php self::render_filters($manufacturer, $category, $product, $products); ?>
            <?php self::render_scope_actions($manufacturer, $category, $product); ?>
            <?php self::render_empty_parse_report($state, $manufacturer, $category); ?>

            <?php if ($category === '' && $product === ''): ?>
                <?php self::render_mapping_table('Производитель', self::manufacturer_mapping($manufacturer), self::status_key('manufacturer', $manufacturer)); ?>
            <?php endif; ?>

            <?php if ($product === ''): ?>
                <?php self::render_mapping_table('Категория: ' . self::CATEGORIES[$active_category]['label'], self::category_mapping($active_category), self::status_key('category', $manufacturer, $active_category)); ?>
                <?php self::render_products_table($manufacturer, $active_category, $products); ?>
            <?php else: ?>
                <?php self::render_product_detail($manufacturer, $active_category, $product, $products[$product]); ?>
            <?php endif; ?>
        </div>
        <?php
    }

    private static function render_notice(): void {
        $message = sanitize_text_field(wp_unslash($_GET['hws_message'] ?? ''));
        if ($message === '') {
            return;
        }

        if (str_starts_with($message, 'error:')) {
            $text = rawurldecode(substr($message, 6));
            echo '<div class="notice notice-error"><p>' . esc_html($text) . '</p></div>';
            return;
        }

        if ($message === 'empty_fields_report') {
            echo '<div class="notice notice-success"><p>Парсинг пустых полей завершен. Отчет ниже.</p></div>';
            return;
        }
        if ($message === 'overview_report') {
            echo '<div class="notice notice-success"><p>Обзор сформирован. Отчет ниже.</p></div>';
            return;
        }

        echo '<div class="notice notice-success"><p>Статус парсинга обновлен.</p></div>';
    }

    private static function render_empty_parse_report(array $state, string $manufacturer, string $category): void {
        $message = sanitize_text_field(wp_unslash($_GET['hws_message'] ?? ''));
        if (!in_array($message, ['empty_fields_report', 'overview_report'], true)) {
            return;
        }

        $is_overview = $message === 'overview_report';
        $report = $state[$is_overview ? 'last_overview_report' : 'last_empty_parse_report'] ?? [];
        if (!is_array($report) || empty($report)) {
            return;
        }
        if (($report['manufacturer'] ?? '') !== $manufacturer) {
            return;
        }
        if (($report['category'] ?? '') !== $category) {
            return;
        }

        $total = max(1, (int) ($report['total_products'] ?? 0));
        $checked = max(0, (int) ($report['checked_products'] ?? 0));
        $percent = min(100, (int) floor(($checked / $total) * 100));
        $errors = is_array($report['errors'] ?? null) ? $report['errors'] : [];
        ?>
        <div id="hws-empty-parse-report" class="hws-parser-panel">
            <h2><?php echo esc_html($is_overview ? 'Отчет: Обзор пустых полей' : 'Отчет: Спарсить пустые поля'); ?></h2>
            <div class="hws-parser-progress" aria-label="Прогресс">
                <span style="width:<?php echo esc_attr((string) $percent); ?>%"></span>
            </div>
            <p class="hws-parser-meta">
                Сформирован: <?php echo esc_html((string) ($report['date'] ?? '')); ?>.
                Проверено товаров: <?php echo esc_html((string) $checked); ?> из <?php echo esc_html((string) $total); ?>.
                Уровень: <?php echo esc_html((string) ($report['scope_label'] ?? '')); ?>.
                Пустых полей найдено: <?php echo esc_html((string) ($report['empty_fields'] ?? 0)); ?>.
                <?php echo esc_html($is_overview ? 'Можно заполнить' : 'Заполнено'); ?>: <?php echo esc_html((string) ($report['filled_fields'] ?? 0)); ?>.
                Уже заполнено: <?php echo esc_html((string) ($report['skipped_fields'] ?? 0)); ?>.
                Ошибок: <?php echo esc_html((string) count($errors)); ?>.
            </p>
            <?php if ($errors): ?>
                <details class="hws-parser-accordion" open>
                    <summary>Ошибки</summary>
                    <ul>
                        <?php foreach (array_slice($errors, 0, 30) as $error): ?>
                            <li><?php echo esc_html((string) $error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </details>
            <?php endif; ?>
        </div>
        <?php
    }

    private static function render_styles(): void {
        ?>
        <style>
        .hws-parser-wrap { max-width: 1180px; }
        .hws-parser-panel { background:#fff;border:1px solid #c3c4c7;border-radius:4px;margin:16px 0;padding:16px; }
        .hws-parser-filters { display:flex;gap:12px;align-items:flex-end;flex-wrap:wrap; }
        .hws-parser-filters label { display:block;font-weight:600;margin-bottom:4px; }
        .hws-parser-filters select { min-width:220px; }
        .hws-parser-actions { display:flex;gap:8px;flex-wrap:wrap;margin-top:12px; }
        .hws-parser-status { display:inline-flex;align-items:center;border-radius:999px;padding:2px 8px;font-size:12px;font-weight:600; }
        .hws-parser-status--ok { background:#edfaef;color:#0a6b24; }
        .hws-parser-status--empty { background:#f6f7f7;color:#646970; }
        .hws-parser-meta { color:#646970;font-size:12px; }
        .hws-parser-table th, .hws-parser-table td { vertical-align:top; }
        .hws-parser-table code { white-space:normal; }
        .hws-parser-products td:first-child { width:35%; }
        .hws-parser-field-actions { display:flex;gap:6px;flex-wrap:wrap; }
        .hws-parser-accordion { margin:0; }
        .hws-parser-accordion summary { cursor:pointer;font-weight:600;color:#2271b1; }
        .hws-parser-accordion__body { margin-top:12px; }
        .hws-parser-store-link { margin:8px 0;color:#646970; }
        .hws-parser-progress { background:#f0f0f1;border:1px solid #c3c4c7;height:14px;margin:8px 0;max-width:520px; }
        .hws-parser-progress span { background:#2271b1;display:block;height:100%; }
        </style>
        <?php
    }

    private static function render_filters(string $manufacturer, string $category, string $product, array $products): void {
        ?>
        <form class="hws-parser-panel hws-parser-filters" method="get" action="<?php echo esc_url(admin_url('admin.php')); ?>">
            <input type="hidden" name="page" value="<?php echo esc_attr(self::MENU_SLUG); ?>">
            <div>
                <label for="hws-parser-manufacturer">Производитель</label>
                <select id="hws-parser-manufacturer" name="manufacturer">
                    <?php foreach (self::MANUFACTURERS as $manufacturer_id => $item): ?>
                        <option value="<?php echo esc_attr($manufacturer_id); ?>" <?php selected($manufacturer, $manufacturer_id); ?>>
                            <?php echo esc_html($item['label']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="hws-parser-category">Категория производителя</label>
                <select id="hws-parser-category" name="category">
                    <option value="" <?php selected($category, ''); ?>>Все категории <?php echo esc_html(self::MANUFACTURERS[$manufacturer]['label']); ?></option>
                    <?php foreach (self::MANUFACTURERS[$manufacturer]['categories'] as $category_id): ?>
                        <option value="<?php echo esc_attr($category_id); ?>" <?php selected($category, $category_id); ?>>
                            <?php echo esc_html(self::CATEGORIES[$category_id]['label']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="hws-parser-product">Товар</label>
                <select id="hws-parser-product" name="product">
                    <option value="" <?php selected($product, ''); ?>>Все товары</option>
                    <?php foreach ($products as $product_id => $item): ?>
                        <option value="<?php echo esc_attr($product_id); ?>" <?php selected($product, $product_id); ?>>
                            <?php echo esc_html($item['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="button button-primary" type="submit">Показать</button>
        </form>
        <?php
    }

    private static function render_scope_actions(string $manufacturer, string $category, string $product): void {
        $scope = 'manufacturer';
        if ($product !== '') {
            $scope = 'product';
        } elseif ($category !== '') {
            $scope = 'category';
        }
        ?>
        <div class="hws-parser-panel">
            <strong>Парсинг выбранного уровня</strong>
            <div class="hws-parser-actions">
                <?php self::render_action_button('Сделать обзор', 'overview', $manufacturer, $category, $product); ?>
                <?php self::render_action_button('Спарсить с нуля', $scope, $manufacturer, $category ?: self::default_category($manufacturer), $product); ?>
                <?php self::render_action_button('Спарсить пустые поля', 'empty_fields', $manufacturer, $category, $product); ?>
            </div>
        </div>
        <?php
    }

    private static function render_mapping_table(string $title, array $rows, string $status_key): void {
        $status = self::status($status_key);
        ?>
        <div class="hws-parser-panel">
            <h2><?php echo esc_html($title); ?></h2>
            <p>
                <?php self::render_status_badge($status); ?>
                <span class="hws-parser-meta"><?php echo esc_html(self::status_date($status)); ?></span>
            </p>
            <table class="widefat striped hws-parser-table">
                <thead><tr><th>Поле у производителя</th><th>Поле магазина</th></tr></thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo esc_html($row['source']); ?></td>
                        <td><?php echo esc_html($row['target']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    private static function render_products_table(string $manufacturer, string $category, array $products): void {
        ?>
        <div class="hws-parser-panel">
            <h2>Товары для парсинга</h2>
            <table class="widefat striped hws-parser-table hws-parser-products">
                <thead><tr><th>Товар у производителя</th><th>URL</th><th>Статус</th><th>Действие</th></tr></thead>
                <tbody>
                <?php if (!$products): ?>
                    <tr><td colspan="4">Товары еще не спарсены. Запустите парсинг категории.</td></tr>
                <?php endif; ?>
                <?php foreach ($products as $product_id => $item): ?>
                    <?php
                    $status = self::product_status($manufacturer, $category, $product_id);
                    $parsed = self::parsed_product($manufacturer, $category, $product_id);
                    $product_url = add_query_arg(
                        [
                            'page'         => self::MENU_SLUG,
                            'manufacturer' => $manufacturer,
                            'category'     => $category,
                            'product'      => $product_id,
                        ],
                        admin_url('admin.php')
                    );
                    ?>
                    <tr>
                        <td><a href="<?php echo esc_url($product_url); ?>"><?php echo esc_html($item['title']); ?></a></td>
                        <td><a href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noreferrer"><?php echo esc_html($item['url']); ?></a></td>
                        <td><?php self::render_status_badge($status); ?><br><span class="hws-parser-meta"><?php echo esc_html(self::status_date($status)); ?></span></td>
                        <td><?php self::render_action_button('Спарсить товар с нуля', 'product', $manufacturer, $category, $product_id); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <details class="hws-parser-accordion">
                                <summary>Показать поля товара</summary>
                                <div class="hws-parser-accordion__body">
                                    <?php self::render_product_fields_table($manufacturer, $category, $product_id, $parsed); ?>
                                </div>
                            </details>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    private static function render_product_detail(string $manufacturer, string $category, string $product_id, array $item): void {
        $parsed = self::parsed_product($manufacturer, $category, $product_id);
        ?>
        <div class="hws-parser-panel">
            <h2><?php echo esc_html($item['title']); ?></h2>
            <p>Источник: <a href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noreferrer"><?php echo esc_html($item['url']); ?></a></p>
            <?php self::render_store_product_link($parsed); ?>
            <?php self::render_product_fields_table($manufacturer, $category, $product_id, $parsed); ?>
        </div>
        <div class="hws-parser-panel">
            <h2>Не импортировать по ТЗ</h2>
            <p><?php echo esc_html(implode(', ', self::blocked_items($manufacturer))); ?></p>
        </div>
        <?php
    }

    private static function render_product_fields_table(string $manufacturer, string $category, string $product_id, array $parsed): void {
        ?>
        <table class="widefat striped hws-parser-table">
            <thead>
                <tr>
                    <th>Поле у производителя</th>
                    <th>Поле магазина</th>
                    <th>Текущее значение парсера</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach (self::display_product_fields($manufacturer, $parsed) as $field): ?>
                <?php $mapping = self::PRODUCT_FIELDS[$field]; ?>
                <?php $status = self::status(self::status_key('field', $manufacturer, $category, $product_id, $field)); ?>
                <tr>
                    <td><?php echo esc_html($mapping['source']); ?></td>
                    <td><?php echo esc_html($mapping['target']); ?></td>
                    <td><?php echo esc_html(self::format_value($parsed[$field] ?? null)); ?></td>
                    <td><?php self::render_status_badge($status); ?><br><span class="hws-parser-meta"><?php echo esc_html(self::status_date($status)); ?></span></td>
                    <td class="hws-parser-field-actions">
                        <?php self::render_action_button('Перепарсить поле', 'field', $manufacturer, $category, $product_id, $field); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }

    private static function render_store_product_link(array $parsed): void {
        $url = self::store_product_url($parsed);
        echo '<p class="hws-parser-store-link">Товар на сайте HWS: ';
        if ($url !== '') {
            echo '<a href="' . esc_url($url) . '" target="_blank" rel="noreferrer">' . esc_html($url) . '</a>';
        } else {
            echo 'не найден';
        }
        echo '</p>';
    }

    private static function render_action_button(string $label, string $scope, string $manufacturer, string $category, string $product = '', string $field = ''): void {
        ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline">
            <?php wp_nonce_field(self::NONCE); ?>
            <input type="hidden" name="action" value="hws_product_parser_parse">
            <input type="hidden" name="scope" value="<?php echo esc_attr($scope); ?>">
            <input type="hidden" name="manufacturer" value="<?php echo esc_attr($manufacturer); ?>">
            <input type="hidden" name="category" value="<?php echo esc_attr($category); ?>">
            <input type="hidden" name="product" value="<?php echo esc_attr($product); ?>">
            <input type="hidden" name="field" value="<?php echo esc_attr($field); ?>">
            <button class="button" type="submit"><?php echo esc_html($label); ?></button>
        </form>
        <?php
    }

    private static function render_status_badge(array $status): void {
        $parsed = !empty($status['parsed']);
        $class  = $parsed ? 'hws-parser-status--ok' : 'hws-parser-status--empty';
        $label  = $parsed ? 'parsed' : 'not parsed';
        echo '<span class="hws-parser-status ' . esc_attr($class) . '">' . esc_html($label) . '</span>';
    }

    private static function parse_manufacturer(string $manufacturer): void {
        $all_parsed = true;
        foreach (self::MANUFACTURERS[$manufacturer]['categories'] as $category) {
            self::parse_category($manufacturer, $category);
            $status = self::status(self::status_key('category', $manufacturer, $category));
            $all_parsed = $all_parsed && !empty($status['parsed']);
        }
        self::mark_status(self::status_key('manufacturer', $manufacturer), $all_parsed);
    }

    private static function parse_category(string $manufacturer, string $category): void {
        $products = self::parse_category_index($manufacturer, $category);

        $parsed_products = 0;
        $errors = [];
        foreach ($products as $product_id => $item) {
            try {
                self::parse_product($manufacturer, $category, $product_id, null);
                $status = self::status(self::status_key('product', $manufacturer, $category, $product_id));
                if (!empty($status['parsed'])) {
                    $parsed_products++;
                }
            } catch (Throwable $e) {
                $errors[] = $item['title'] . ': ' . $e->getMessage();
                self::mark_status(
                    self::status_key('product', $manufacturer, $category, $product_id),
                    false,
                    $e->getMessage()
                );
            }
        }

        $expected = (int) (self::CATEGORIES[$category]['expected'] ?? 0);
        self::mark_status(
            self::status_key('category', $manufacturer, $category),
            (($expected > 0 ? count($products) === $expected : count($products) > 0)
                && $parsed_products === count($products) && !$errors),
            'products=' . count($products) . '; parsed_products=' . $parsed_products . '; errors=' . count($errors)
        );
    }

    private static function parse_category_index(string $manufacturer, string $category): array {
        if (!isset(self::CATEGORIES[$category]) || self::CATEGORIES[$category]['manufacturer'] !== $manufacturer) {
            throw new RuntimeException('Category is not allowed by parser manifest.');
        }

        $html     = self::fetch_html(self::CATEGORIES[$category]['url']);
        $products = self::extract_category_products($html, $manufacturer, $category);

        $state = self::state();
        $state['products'][$manufacturer][$category] = $products;
        update_option(self::OPTION, $state, false);

        return $products;
    }

    private static function make_overview(string $manufacturer, string $category): void {
        if ($category === '') {
            $report = [
                'date'             => current_time('mysql'),
                'manufacturer'     => $manufacturer,
                'category'         => '',
                'scope_label'      => self::MANUFACTURERS[$manufacturer]['label'] . ' / все категории',
                'total_products'   => 0,
                'checked_products' => 0,
                'empty_fields'     => 0,
                'filled_fields'    => 0,
                'skipped_fields'   => 0,
                'errors'           => [],
            ];

            foreach (self::MANUFACTURERS[$manufacturer]['categories'] as $item_category) {
                $category_report = self::make_overview_for_category($manufacturer, $item_category);
                $report['total_products'] += (int) ($category_report['total_products'] ?? 0);
                $report['checked_products'] += (int) ($category_report['checked_products'] ?? 0);
                $report['empty_fields'] += (int) ($category_report['empty_fields'] ?? 0);
                $report['filled_fields'] += (int) ($category_report['filled_fields'] ?? 0);
                $report['skipped_fields'] += (int) ($category_report['skipped_fields'] ?? 0);
                $report['errors'] = array_merge($report['errors'], is_array($category_report['errors'] ?? null) ? $category_report['errors'] : []);
            }

            $state = self::state();
            $state['last_overview_report'] = $report;
            update_option(self::OPTION, $state, false);
            return;
        }

        $report = self::make_overview_for_category($manufacturer, $category);
        $state = self::state();
        $state['last_overview_report'] = $report;
        update_option(self::OPTION, $state, false);
    }

    private static function make_overview_for_category(string $manufacturer, string $category): array {
        if (!isset(self::CATEGORIES[$category]) || self::CATEGORIES[$category]['manufacturer'] !== $manufacturer) {
            throw new RuntimeException('Category is not allowed by parser manifest.');
        }

        $state = self::state();
        $products = self::products_for_category($state, $manufacturer, $category);
        if (!$products) {
            self::parse_category_index($manufacturer, $category);
            $state = self::state();
            $products = self::products_for_category($state, $manufacturer, $category);
        }

        $report = [
            'date'             => current_time('mysql'),
            'manufacturer'     => $manufacturer,
            'category'         => $category,
            'scope_label'      => self::MANUFACTURERS[$manufacturer]['label'] . ' / ' . self::CATEGORIES[$category]['label'],
            'total_products'   => count($products),
            'checked_products' => 0,
            'empty_fields'     => 0,
            'filled_fields'    => 0,
            'skipped_fields'   => 0,
            'errors'           => [],
        ];

        foreach ($products as $product_id => $item) {
            $report['checked_products']++;
            try {
                $html = self::fetch_html($item['url']);
                $parsed = self::extract_product_fields($html, $manufacturer, $item['url']);
                $applicable_fields = self::applicable_product_fields($manufacturer, $parsed);
            } catch (Throwable $e) {
                $report['errors'][] = $item['title'] . ': ' . $e->getMessage();
                continue;
            }

            $current = self::parsed_product($manufacturer, $category, $product_id);
            foreach ($applicable_fields as $field) {
                if (self::product_field_has_formatted_content($parsed, $field)) {
                    $report['skipped_fields']++;
                    continue;
                }

                if (self::field_is_valid($field, $current[$field] ?? null)) {
                    $report['skipped_fields']++;
                    continue;
                }

                $report['empty_fields']++;
                if (self::field_is_valid($field, $parsed[$field] ?? null)) {
                    $report['filled_fields']++;
                } else {
                    $report['errors'][] = $item['title'] . ': источник не вернул поле "' . self::PRODUCT_FIELDS[$field]['source'] . '"';
                }
            }
        }

        return $report;
    }

    private static function parse_empty_fields(string $manufacturer, string $category): void {
        if ($category === '') {
            $report = [
                'date'             => current_time('mysql'),
                'manufacturer'     => $manufacturer,
                'category'         => '',
                'scope_label'      => self::MANUFACTURERS[$manufacturer]['label'] . ' / все категории',
                'total_products'   => 0,
                'checked_products' => 0,
                'empty_fields'     => 0,
                'filled_fields'    => 0,
                'skipped_fields'   => 0,
                'errors'           => [],
            ];

            foreach (self::MANUFACTURERS[$manufacturer]['categories'] as $item_category) {
                $category_report = self::parse_empty_fields_for_category($manufacturer, $item_category);
                $report['total_products'] += (int) ($category_report['total_products'] ?? 0);
                $report['checked_products'] += (int) ($category_report['checked_products'] ?? 0);
                $report['empty_fields'] += (int) ($category_report['empty_fields'] ?? 0);
                $report['filled_fields'] += (int) ($category_report['filled_fields'] ?? 0);
                $report['skipped_fields'] += (int) ($category_report['skipped_fields'] ?? 0);
                $report['errors'] = array_merge($report['errors'], is_array($category_report['errors'] ?? null) ? $category_report['errors'] : []);
            }

            $state = self::state();
            $state['last_empty_parse_report'] = $report;
            update_option(self::OPTION, $state, false);
            return;
        }

        $report = self::parse_empty_fields_for_category($manufacturer, $category);
        $state = self::state();
        $state['last_empty_parse_report'] = $report;
        update_option(self::OPTION, $state, false);
    }

    private static function parse_empty_fields_for_category(string $manufacturer, string $category): array {
        if (!isset(self::CATEGORIES[$category]) || self::CATEGORIES[$category]['manufacturer'] !== $manufacturer) {
            throw new RuntimeException('Category is not allowed by parser manifest.');
        }

        $state = self::state();
        $products = self::products_for_category($state, $manufacturer, $category);
        if (!$products) {
            self::parse_category_index($manufacturer, $category);
            $state = self::state();
            $products = self::products_for_category($state, $manufacturer, $category);
        }

        $report = [
            'date'             => current_time('mysql'),
            'manufacturer'     => $manufacturer,
            'category'         => $category,
            'scope_label'      => self::MANUFACTURERS[$manufacturer]['label'] . ' / ' . self::CATEGORIES[$category]['label'],
            'total_products'   => count($products),
            'checked_products' => 0,
            'empty_fields'     => 0,
            'filled_fields'    => 0,
            'skipped_fields'   => 0,
            'errors'           => [],
        ];

        foreach ($products as $product_id => $item) {
            $report['checked_products']++;
            try {
                $html = self::fetch_html($item['url']);
                $parsed = self::extract_product_fields($html, $manufacturer, $item['url']);
                $applicable_fields = self::applicable_product_fields($manufacturer, $parsed);
            } catch (Throwable $e) {
                $report['errors'][] = $item['title'] . ': ' . $e->getMessage();
                continue;
            }

            $current = self::parsed_product($manufacturer, $category, $product_id);
            $state = self::state();
            $state['parsed_products'][$manufacturer][$category][$product_id]['_applicable_fields'] = $applicable_fields;
            foreach (array_merge(self::optional_product_fields($manufacturer), self::SOURCE_DEPENDENT_PRODUCT_FIELDS) as $optional_field) {
                if (!in_array($optional_field, $applicable_fields, true)) {
                    unset($state['parsed_products'][$manufacturer][$category][$product_id][$optional_field]);
                }
            }
            update_option(self::OPTION, $state, false);

            $empty_fields = [];

            foreach ($applicable_fields as $field) {
                if (self::product_field_has_formatted_content($parsed, $field)) {
                    $report['skipped_fields']++;
                    continue;
                }

                if (self::field_is_valid($field, $current[$field] ?? null)) {
                    $report['skipped_fields']++;
                    continue;
                }
                $empty_fields[] = $field;
            }

            if (!$empty_fields) {
                continue;
            }

            $report['empty_fields'] += count($empty_fields);

            try {
                $state = self::state();
                $field_statuses = [];

                foreach ($empty_fields as $field) {
                    $value = $parsed[$field] ?? null;
                    $state['parsed_products'][$manufacturer][$category][$product_id][$field] = $value;
                    $valid = self::field_is_valid($field, $value);
                    $field_statuses[$field] = $valid;
                    if ($valid) {
                        $report['filled_fields']++;
                    } else {
                        $report['errors'][] = $item['title'] . ': поле "' . self::PRODUCT_FIELDS[$field]['source'] . '" осталось пустым';
                    }
                }

                update_option(self::OPTION, $state, false);
                foreach ($field_statuses as $field => $valid) {
                    self::mark_status(self::status_key('field', $manufacturer, $category, $product_id, $field), $valid);
                }
                self::sync_product_to_woocommerce($parsed, $empty_fields);

                $merged = array_merge($current, array_intersect_key($parsed, array_flip($empty_fields)));
                self::mark_status(
                    self::status_key('product', $manufacturer, $category, $product_id),
                    self::product_has_parsed_data($manufacturer, $merged),
                    'empty_fields=' . count($empty_fields)
                );
            } catch (Throwable $e) {
                $report['errors'][] = $item['title'] . ': ' . $e->getMessage();
            }
        }

        return $report;
    }

    private static function parse_product(string $manufacturer, string $category, string $product_id, ?string $only_field): void {
        $products = self::products_for_category(self::state(), $manufacturer, $category);
        if (!isset($products[$product_id])) {
            self::parse_category_index($manufacturer, $category);
            $products = self::products_for_category(self::state(), $manufacturer, $category);
        }
        if (!isset($products[$product_id])) {
            throw new RuntimeException('Product is not found in parsed category list.');
        }
        if ($only_field !== null && !isset(self::PRODUCT_FIELDS[$only_field])) {
            throw new RuntimeException('Field is not allowed by parser mapping.');
        }

        $html   = self::fetch_html($products[$product_id]['url']);
        $parsed = self::extract_product_fields($html, $manufacturer, $products[$product_id]['url']);
        // EasySteam "-k" category lines (Анапа К, Сочи К, Геленджик К, Ялта NN К, ...) are the
        // commercial variants — the site itself files them under "коммерческих бань и саун".
        // Without this they'd fall through to the residential default (russian-bath-stoves).
        if (empty($parsed['hws_category_slug']) && str_ends_with($category, '-k')) {
            $parsed['hws_category_slug'] = 'commercial';
        }
        $applicable_fields = self::applicable_product_fields($manufacturer, $parsed);
        $fields = $only_field === null ? $applicable_fields : [$only_field];
        $state  = self::state();

        if ($only_field === null) {
            $state['parsed_products'][$manufacturer][$category][$product_id]['_applicable_fields'] = $applicable_fields;
            foreach (array_merge(self::optional_product_fields($manufacturer), self::SOURCE_DEPENDENT_PRODUCT_FIELDS) as $optional_field) {
                if (!in_array($optional_field, $applicable_fields, true)) {
                    unset($state['parsed_products'][$manufacturer][$category][$product_id][$optional_field]);
                }
            }
        }

        foreach ($fields as $field) {
            $state['parsed_products'][$manufacturer][$category][$product_id][$field] = $parsed[$field] ?? null;
        }
        update_option(self::OPTION, $state, false);
        $sync_fields = $fields;
        if ($only_field === null) {
            $sync_fields = array_values(array_unique(array_merge($sync_fields, self::SOURCE_DEPENDENT_PRODUCT_FIELDS)));
        }
        self::sync_product_to_woocommerce($parsed, $sync_fields);

        if ($manufacturer === 'easysteam' && $only_field === null) {
            $wc_product_id = self::store_product_id($parsed);
            if ($wc_product_id > 0) {
                self::sync_easysteam_offer_variations($wc_product_id, $product_id, $html, $parsed);
            }
        }

        foreach ($fields as $field) {
            self::mark_status(
                self::status_key('field', $manufacturer, $category, $product_id, $field),
                self::field_is_valid($field, $parsed[$field] ?? null)
            );
        }
        if ($only_field === null) {
            self::mark_status(
                self::status_key('product', $manufacturer, $category, $product_id),
                self::product_has_parsed_data($manufacturer, $parsed),
                'fields=' . count(array_filter($parsed, static fn($value): bool => self::value_is_not_empty($value)))
            );
        }
    }

    private static function sync_product_to_woocommerce(array $parsed, array $fields): void {
        $product_id = self::ensure_store_product_id($parsed);
        if ($product_id <= 0) {
            return;
        }

        self::sync_store_product_core($product_id, $parsed, $fields);

        $post_updates = ['ID' => $product_id];
        $should_update_post = false;

        if (in_array('short_description', $fields, true)) {
            if (!self::product_field_has_formatted_content($parsed, 'short_description')) {
                if (self::field_is_valid('short_description', $parsed['short_description'] ?? '')) {
                    $post_updates['post_excerpt'] = wp_kses_post((string) $parsed['short_description']);
                    $should_update_post = true;
                } else {
                    $post_updates['post_excerpt'] = '';
                    $should_update_post = true;
                }
            }
        }

        if (in_array('long_description', $fields, true)) {
            if (!self::product_field_has_formatted_content($parsed, 'long_description') && self::field_is_valid('long_description', $parsed['long_description'] ?? '')) {
                $post_updates['post_content'] = self::paragraphs_to_html((string) $parsed['long_description']);
                $should_update_post = true;
            }
        }

        if ($should_update_post) {
            wp_update_post(wp_slash($post_updates));
        }

        if (in_array('article', $fields, true) && self::field_is_valid('article', $parsed['article'] ?? '')) {
            $article = trim((string) $parsed['article']);
            update_post_meta($product_id, '_hws_source_base_article', $article);
            update_post_meta($product_id, '_hws_source_article', $article);
        }

        if (in_array('brand', $fields, true) && self::field_is_valid('brand', $parsed['brand'] ?? '')) {
            update_post_meta($product_id, '_hws_source_brand', trim((string) $parsed['brand']));
        }

        if (in_array('source_url', $fields, true) && self::field_is_valid('source_url', $parsed['source_url'] ?? '')) {
            update_post_meta($product_id, '_hws_source_url', trim((string) $parsed['source_url']));
        }

        if (in_array('offer_image', $fields, true) && self::field_is_valid('offer_image', $parsed['offer_image'] ?? '')) {
            update_post_meta($product_id, '_hws_source_base_image', trim((string) $parsed['offer_image']));
        }

        if (in_array('price', $fields, true)) {
            update_post_meta($product_id, '_hws_price_currency', 'RUB');
            update_post_meta(
                $product_id,
                '_hws_price_on_request',
                self::field_is_valid('price', $parsed['price'] ?? '') ? 'no' : 'yes'
            );
        }

        if (in_array('characteristics', $fields, true) && self::field_is_valid('characteristics', $parsed['characteristics'] ?? [])) {
            $characteristics = is_array($parsed['characteristics']) ? $parsed['characteristics'] : [];
            update_post_meta(
                $product_id,
                '_hws_source_characteristics_json',
                wp_json_encode($characteristics, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            );
            update_post_meta($product_id, '_hws_specs_html', self::specs_to_html($characteristics));
        }

        if (function_exists('wc_delete_product_transients')) {
            wc_delete_product_transients($product_id);
        }
        clean_post_cache($product_id);
        if (function_exists('hws_revalidate')) {
            hws_revalidate();
        }
    }

    private static function extract_category_products(string $html, string $manufacturer, string $category): array {
        if ($manufacturer === 'sangens') {
            return self::extract_sangens_category_products($html, $category);
        }
        if ($manufacturer === 'vvd') {
            return self::extract_vvd_category_products($html, $category);
        }
        if ($manufacturer === 'eos') {
            return self::extract_eos_category_products($html, $category);
        }

        $products = [];
        if (!preg_match_all('~<div class=["\'][^"\']*(?<![\w-])product-card(?![\w-])[^"\']*["\'][\s\S]*?<a href=["\']([^"\']+)["\'][^>]*class=["\'][^"\']*product-card__link[^"\']*["\'][^>]*>[\s\S]*?<div class=["\'][^"\']*product-card__title[^"\']*["\'][^>]*>(.*?)</div>\s*(?:<div class=["\'][^"\']*product-card__text[^"\']*["\'][^>]*>(.*?)</div>)?~isu', $html, $matches, PREG_SET_ORDER)) {
            return $products;
        }

        foreach ($matches as $match) {
            $url = html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if (!str_contains($url, '/products/show/') && !str_contains($url, '/products/product/')) {
                continue;
            }
            $title = trim(wp_strip_all_tags($match[2]));
            $subtitle = trim(wp_strip_all_tags($match[3] ?? ''));
            if ($subtitle !== '') {
                $title .= ' — ' . $subtitle;
            }
            if ($title === '' || mb_strlen($title) < 4) {
                continue;
            }
            $absolute = self::absolute_url($url, self::CATEGORIES[$category]['base_url'] ?? 'https://easysteam.ru/');
            $id       = self::product_id_from_url($absolute);
            $products[$id] = [
                'title' => $title,
                'url'   => $absolute,
            ];
        }

        uasort($products, static fn(array $a, array $b): int => strnatcasecmp($a['title'], $b['title']));

        return $products;
    }

    private static function extract_vvd_category_products(string $html, string $category): array {
        $products = [];
        $root = $category === 'vvd-electric-furnaces'
            ? '/product/elektricheskie-pechi-dlya-bani/'
            : '/product/drovyanye-pechi-dlya-bani-i-sauny/';
        $blocked = ['pulty-', 'dymokhod', 'obliv', 'dopolnit', 'nebulayzer', 'filter', 'clear'];
        if (!preg_match_all("~<a\\b[^>]*href=[\"']([^\"']+)[\"'][^>]*>(.*?)</a>~isu", $html, $matches, PREG_SET_ORDER)) {
            return [];
        }
        foreach ($matches as $match) {
            $absolute = self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'https://vvd.su/');
            $path = (string) wp_parse_url($absolute, PHP_URL_PATH);
            if (!str_starts_with($path, $root) || trim($path, '/') === trim($root, '/')) {
                continue;
            }
            $lower = mb_strtolower($path);
            $skip = false;
            foreach ($blocked as $word) {
                if (str_contains($lower, $word)) {
                    $skip = true;
                    break;
                }
            }
            if ($skip) {
                continue;
            }
            $title = trim((string) preg_replace('~\\s+~u', ' ', wp_strip_all_tags($match[2])));
            if ($title === '' || mb_strlen($title) < 4) {
                $title = ucwords(str_replace(['-', '_'], ' ', basename(trim($path, '/'))));
            }
            $products[self::product_id_from_url($absolute)] = ['title' => $title, 'url' => $absolute];
        }
        uasort($products, static fn(array $a, array $b): int => strnatcasecmp($a['title'], $b['title']));
        return $products;
    }

    private static function extract_eos_category_products(string $html, string $category): array {
        $products = [];
        $pages = [$html];
        if (preg_match_all("~href=[\"']([^\"']*/en/products/[^\"']*/sauna-heaters/[^\"']+)[\"']~iu", $html, $matches)) {
            foreach (array_unique($matches[1]) as $url) {
                $pages[] = self::fetch_html(self::absolute_url(html_entity_decode($url, ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'https://www.eos-sauna.com/'));
            }
        }
        foreach ($pages as $page) {
            if (!preg_match_all("~<a\\b[^>]*href=[\"']([^\"']*/en/products/[^\"']+)[\"'][^>]*>(.*?)</a>~isu", $page, $matches, PREG_SET_ORDER)) {
                continue;
            }
            foreach ($matches as $match) {
                $absolute = self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'https://www.eos-sauna.com/');
                $path = (string) wp_parse_url($absolute, PHP_URL_PATH);
                if (!str_contains($path, '/sauna-heaters/') || str_ends_with($path, '/sauna-heaters')) {
                    continue;
                }
                $title = trim((string) preg_replace('~\\s+~u', ' ', wp_strip_all_tags($match[2])));
                if ($title === '' || mb_strlen($title) < 4) {
                    $title = ucwords(str_replace(['-', '_'], ' ', basename(trim($path, '/'))));
                }
                $products[self::product_id_from_url($absolute)] = ['title' => $title, 'url' => $absolute];
            }
        }
        uasort($products, static fn(array $a, array $b): int => strnatcasecmp($a['title'], $b['title']));
        return $products;
    }

    private static function extract_sangens_category_products(string $html, string $category): array {
        $products = [];
        $seen_pages = [];
        $pages = [$html];
        $next_url = self::extract_sangens_next_url($html);

        while ($next_url !== '' && count($pages) < 8 && empty($seen_pages[$next_url])) {
            $seen_pages[$next_url] = true;
            $next_html = self::fetch_html($next_url);
            $pages[] = $next_html;
            $next_url = self::extract_sangens_next_url($next_html);
        }

        foreach ($pages as $page_html) {
            if (!preg_match_all('~<a\b[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)</a>~isu', $page_html, $matches, PREG_SET_ORDER)) {
                continue;
            }

            foreach ($matches as $match) {
                $url = html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $absolute = self::absolute_url($url, self::CATEGORIES[$category]['base_url'] ?? 'https://sangens.com/');
                $path = (string) wp_parse_url($absolute, PHP_URL_PATH);
                if (!preg_match('~/ru/catalog/furnaces/series-[^/]+/sangens_[^/]+/?$~u', $path)) {
                    continue;
                }
                if (str_ends_with(trim($path, '/'), '/sangens_w12g')) {
                    continue;
                }

                $title = trim(wp_strip_all_tags($match[2]));
                $title = preg_replace('~\s+~u', ' ', $title);
                if ($title === '' || mb_strlen($title) < 4) {
                    $title = self::title_from_sangens_url($absolute);
                }
                if ($title === '') {
                    continue;
                }

                $id = self::product_id_from_url($absolute);
                $products[$id] = [
                    'title' => $title,
                    'url'   => $absolute,
                ];
            }
        }

        foreach ($products as $id => $item) {
            try {
                $product_html = self::fetch_html($item['url']);
                $page_title = self::extract_first_text($product_html, [
                    '~<h1[^>]*class=["\'][^"\']*info-title[^"\']*["\'][^>]*>(.*?)</h1>~isu',
                    '~<h1[^>]*>(.*?)</h1>~isu',
                ]);
                if ($page_title !== '') {
                    $products[$id]['title'] = $page_title;
                }
            } catch (Throwable $e) {
                continue;
            }
        }

        uasort($products, static fn(array $a, array $b): int => strnatcasecmp($a['title'], $b['title']));

        return $products;
    }

    private static function extract_sangens_next_url(string $html): string {
        if (preg_match('~<link\s+rel=["\']next["\']\s+href=["\']([^"\']+)["\']~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'https://sangens.com/');
        }
        if (preg_match('~<a\b[^>]*href=["\']([^"\']+)["\'][^>]*class=["\'][^"\']*(?:next|pagination__next)[^"\']*["\']~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'https://sangens.com/');
        }
        return '';
    }

    private static function title_from_sangens_url(string $url): string {
        $path = trim((string) wp_parse_url($url, PHP_URL_PATH), '/');
        $slug = basename($path);
        $slug = preg_replace('~^sangens_~', 'Sangens ', $slug);
        $slug = str_replace(['_', '-'], ' ', $slug);
        return trim((string) preg_replace('~\s+~u', ' ', $slug));
    }

    private static function extract_product_fields(string $html, string $manufacturer, string $source_url = ''): array {
        if ($manufacturer === 'sangens') {
            return self::extract_sangens_product_fields($html, $source_url);
        }
        if ($manufacturer === 'eos' || $manufacturer === 'vvd') {
            return self::extract_generic_manufacturer_product_fields($html, $manufacturer, $source_url);
        }

        $text_blocks = self::extract_tab_texts($html);
        $chars       = self::extract_characteristics($html);
        $options     = self::extract_options($html);

        return [
            'brand'             => 'EasySteam',
            'source_url'        => $source_url,
            'title'             => self::extract_first_text($html, ['~<h1[^>]*>(.*?)</h1>~isu']),
            'article'           => self::extract_article($html),
            'price'             => self::extract_price($html),
            'offer_image'       => self::extract_image($html, 'https://easysteam.ru/'),
            'short_description' => $text_blocks['Описание'] ?? '',
            'long_description'  => trim(($text_blocks['Назначение'] ?? '') . "\n\n" . ($text_blocks['Преимущества'] ?? '')),
            'characteristics'   => $chars,
            'fuel_type'         => self::normalize_fuel_type(self::first_present($options, $chars, ['Вид топлива', 'Тип топлива'])),
            'purpose'           => self::first_present($options, $chars, ['Назначение']),
            'steam_volume'      => self::extract_steam_volume($chars),
            'model'             => self::first_present($options, $chars, ['Модель']),
            'jacket_material'   => self::normalize_jacket_material(self::first_present($options, $chars, ['Вид кожуха', 'Варианты кожуха', 'Материал кожуха'])),
            'firebox_protection' => self::normalize_firebox_protection(self::first_present($options, $chars, ['Защита топки'])),
            'steel_grade'       => self::first_present($options, $chars, ['Марка стали']),
            'door_side'         => self::normalize_side(self::first_present($options, $chars, ['Исполнение дверки', 'Сторона дверки'])),
            'stone_side'        => self::normalize_side(self::first_present($options, $chars, ['Боковой вход в каменку'])),
            'chimney_side'      => self::normalize_side(self::first_present($options, $chars, ['Боковое подключение дымохода'])),
        ];
    }

    private static function extract_generic_manufacturer_product_fields(string $html, string $manufacturer, string $source_url): array {
        $chars = self::extract_characteristics($html);
        $options = self::extract_options($html);
        $text = wp_strip_all_tags($html);
        $brand = $manufacturer === 'eos' ? 'EOS' : 'ВВД';
        $electric = $manufacturer === 'eos' || str_contains($source_url, 'elektricheskie');
        $title = self::extract_first_text($html, ['~<h1[^>]*>(.*?)</h1>~isu', '~<title[^>]*>(.*?)</title>~isu']);
        $power = self::first_present($options, $chars, ['Мощность', 'Power', 'Heating capacity']);
        if ($manufacturer === 'eos' && !preg_match('~\\d~', $power)) {
            $power = '';
        }
        if ($power === '' && preg_match('~(\\d+(?:[.,]\\d+)?)\\s*(?:кВт|kW)~iu', $text, $m)) {
            $power = $m[1] . ' кВт';
        }
        $article = self::extract_article($html);
        if ($manufacturer === 'eos' && !preg_match('~\\d{5,}~', $article)) {
            $article = '';
        }
        if ($article === '' && preg_match('~(?:article|артикул|art\\.?)[^A-Za-zА-Яа-я0-9]{0,10}([A-Za-zА-Яа-я0-9._/-]{3,})~iu', $text, $m)) {
            $article = trim($m[1]);
        }
        if ($manufacturer === 'eos' && !preg_match('~\\d{5,}~', $article) && preg_match('~\\b\\d{5,}\\b~', $text, $m)) {
            $article = trim($m[0]);
        }
        if ($article === '') {
            $article = strtoupper($manufacturer) . '-' . substr(md5($source_url), 0, 12);
        }
        $image = self::extract_image($html, $manufacturer === 'eos' ? 'https://www.eos-sauna.com/' : 'https://vvd.su/');
        if ($manufacturer === 'eos' && (str_contains($image, 'logo') || str_contains($image, 'icon'))) {
            $image = '';
        }
        if ($image === '' && $manufacturer === 'eos' && preg_match("~https?://[^\"']+/(?:_processed_|produktbilder/(?!Produktuebersicht/))[^\"']+\\.(?:jpg|jpeg|png|webp)~iu", $html, $m)) {
            $image = html_entity_decode($m[0], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        }
        $category = $manufacturer === 'eos' ? 'sauna-stoves' : (str_contains($source_url, 'elektricheskie') ? 'sauna-stoves' : 'russian-bath-stoves');
        return [
            'brand' => $brand, 'source_url' => $source_url, 'title' => $title, 'article' => $article,
            'price' => self::extract_price($html), 'offer_image' => $image,
            'short_description' => self::extract_meta_content($html, 'description'), 'long_description' => self::extract_meta_content($html, 'description'),
            'characteristics' => $chars, 'fuel_type' => $electric ? 'электричество' : 'дрова',
            'purpose' => 'баня и сауна', 'steam_volume' => self::extract_steam_volume($chars), 'model' => $title,
            'steel_grade' => self::first_present($options, $chars, ['Марка стали', 'Steel']), 'power' => $power,
            'voltage' => self::first_present($options, $chars, ['Напряжение', 'Voltage']), 'material' => self::first_present($options, $chars, ['Материал', 'Material']),
            'hws_category_slug' => $category,
        ];
    }

    private static function extract_sangens_product_fields(string $html, string $source_url): array {
        $chars = self::extract_characteristics($html);
        $description = self::extract_meta_content($html, 'description');
        $title = self::extract_first_text($html, [
            '~<h1[^>]*class=["\'][^"\']*info-title[^"\']*["\'][^>]*>(.*?)</h1>~isu',
            '~<h1[^>]*>(.*?)</h1>~isu',
            '~<meta\s+property=["\']og:title["\']\s+content=["\']([^"\']+)["\']~isu',
        ]);

        $power = self::first_present([], $chars, ['Мощность', 'Мощность печи', 'Потребляемая мощность']);
        if ($power === '' && preg_match('~(\d+(?:[.,]\d+)?)\s*кВт~iu', wp_strip_all_tags($html), $match)) {
            $power = $match[1] . ' кВт';
        }

        $steam_volume = self::extract_steam_volume($chars);
        if ($steam_volume === '' && preg_match('~(?:об[ъь]ем\s+парной|парная)[^\d]{0,40}(\d+(?:\s*[-–]\s*\d+)?)\s*м~iu', wp_strip_all_tags($html), $match)) {
            $steam_volume = $match[1] . ' м3';
        }

        return [
            'brand'             => 'Sangens',
            'source_url'        => $source_url,
            'title'             => $title,
            'article'           => self::extract_article($html),
            'price'             => self::extract_sangens_price($html),
            'offer_image'       => self::extract_image($html, 'https://sangens.com/'),
            'short_description' => $description,
            'long_description'  => self::extract_sangens_long_description($html, $description),
            'characteristics'   => $chars,
            'fuel_type'         => 'электричество',
            'steam_volume'      => $steam_volume,
            'series'            => self::extract_sangens_series($html, $source_url, $title),
            'power'             => $power,
            'voltage'           => self::first_present([], $chars, ['Напряжение', 'Питание', 'Напряжение питания']),
            'material'          => self::first_present([], $chars, ['Материал', 'Материал корпуса', 'Материал отделки']),
            'color'             => self::first_present([], $chars, ['Цвет']),
            'control'           => self::first_present([], $chars, ['Управление', 'Тип управления']),
            'mode'              => self::first_present([], $chars, ['Режим', 'Режим работы']),
        ];
    }

    private static function extract_tab_texts(string $html): array {
        $texts = [];

        if (preg_match('~<div class=["\'][^"\']*product__description-title[^"\']*["\'][^>]*>\s*Описание\s*</div>\s*<div[^>]*>(.*?)</div>~isu', $html, $match)) {
            $texts['Описание'] = trim(wp_strip_all_tags($match[1]));
        }
        if (preg_match('~<div class=["\'][^"\']*tab-pane[^"\']*["\'][^>]*id=["\']prod-purpose["\'][^>]*>(.*?)(?=<div class=["\'][^"\']*tab-pane[^"\']*["\'][^>]*id=|</div>\s*</div>\s*</div>)~isu', $html, $match)) {
            $texts['Назначение'] = trim(wp_strip_all_tags($match[1]));
        }
        if (preg_match('~<div class=["\'][^"\']*tab-pane[^"\']*["\'][^>]*id=["\']prod-advantage["\'][^>]*>(.*?)(?=<div class=["\'][^"\']*tab-pane[^"\']*["\'][^>]*id=|</div>\s*</div>\s*</div>)~isu', $html, $match)) {
            $texts['Преимущества'] = trim(wp_strip_all_tags($match[1]));
        }

        return $texts;
    }

    private static function extract_characteristics(string $html): array {
        $result = [];

        if (preg_match_all('~<tr[^>]*>\s*<t[hd][^>]*>(.*?)</t[hd]>\s*<t[hd][^>]*>(.*?)</t[hd]>\s*</tr>~isu', $html, $rows, PREG_SET_ORDER)) {
            foreach ($rows as $row) {
                $key = trim(wp_strip_all_tags($row[1]));
                $val = trim(wp_strip_all_tags($row[2]));
                if ($key !== '' && $val !== '') {
                    $result[$key] = $val;
                }
            }
        }

        if (preg_match_all('~<div[^>]*class=["\'][^"\']*product-specs-modal__info-attrs-item[^"\']*["\'][^>]*>\s*([^<]+?)\s*-\s*<span[^>]*>(.*?)</span>\s*</div>~isu', $html, $items, PREG_SET_ORDER)) {
            foreach ($items as $item) {
                $key = trim(wp_strip_all_tags($item[1]));
                $val = trim(wp_strip_all_tags($item[2]));
                if ($key !== '' && $val !== '') {
                    $result[$key] = $val;
                }
            }
        }

        if (preg_match_all('~<div[^>]*class=["\'][^"\']*product-specs-list__item[^"\']*["\'][^>]*>(.*?)</div>\s*</div>~isu', $html, $items, PREG_SET_ORDER)) {
            foreach ($items as $item) {
                if (
                    !preg_match('~<div[^>]*class=["\'][^"\']*product-specs-list__label[^"\']*["\'][^>]*>(.*?)</div>~isu', $item[1], $label_match)
                    || !preg_match('~<div[^>]*class=["\'][^"\']*product-specs-list__main[^"\']*["\'][^>]*>(.*?)</div>~isu', $item[1], $value_match)
                ) {
                    continue;
                }
                $key = trim(wp_strip_all_tags($label_match[1]));
                $val = trim(wp_strip_all_tags($value_match[1]));
                $key = preg_replace('~\s+~u', ' ', $key);
                $val = preg_replace('~\s+~u', ' ', $val);
                if ($key !== '' && $val !== '') {
                    $result[$key] = $val;
                }
            }
        }

        if (preg_match_all('~<dl[^>]*>(.*?)</dl>~isu', $html, $lists, PREG_SET_ORDER)) {
            foreach ($lists as $list) {
                if (!preg_match_all('~<dt[^>]*>(.*?)</dt>\s*<dd[^>]*>(.*?)</dd>~isu', $list[1], $rows, PREG_SET_ORDER)) {
                    continue;
                }
                foreach ($rows as $row) {
                    $key = trim(wp_strip_all_tags($row[1]));
                    $val = trim(wp_strip_all_tags($row[2]));
                    if ($key !== '' && $val !== '') {
                        $result[$key] = $val;
                    }
                }
            }
        }

        return $result;
    }

    private static function extract_options(string $html): array {
        $options = [];
        if (!preg_match_all('~<div class=["\'][^"\']*(?<![\w-])radio-group(?![\w-])[^"\']*["\'][^>]*>(.*?)(?=<div class=["\'][^"\']*(?<![\w-])radio-group(?![\w-])[^"\']*["\']|<button[^>]*class=["\'][^"\']*js-btn-item-cart-add|<div class=["\'][^"\']*product-tabs|$)~isu', $html, $items, PREG_SET_ORDER)) {
            return $options;
        }

        foreach ($items as $item) {
            $block = $item[1];
            $name  = self::extract_first_text($block, ['~class=["\'][^"\']*radio-group__title[^"\']*["\'][^>]*>(.*?)</~isu']);
            if ($name === '') {
                continue;
            }
            preg_match_all('~class=["\'][^"\']*radio-group__item-text[^"\']*["\'][^>]*>(.*?)</~isu', $block, $values);
            $clean_values = array_values(array_filter(array_map(static fn($value): string => trim(wp_strip_all_tags($value)), $values[1] ?? [])));
            if ($clean_values) {
                $options[$name] = implode(', ', array_unique($clean_values));
            }
        }

        return $options;
    }

    /**
     * Parses each `.radio-group` block into its title plus the list of selectable offer
     * items (id/text/price delta), mirroring the data the site's own JS reads client-side
     * to sum the offer price and build the `param-list` sent to /product/article.
     */
    private static function extract_radio_groups(string $html): array {
        $groups = [];
        if (!preg_match_all('~<div class=["\'][^"\']*(?<![\w-])radio-group(?![\w-])[^"\']*["\'][^>]*>(.*?)(?=<div class=["\'][^"\']*(?<![\w-])radio-group(?![\w-])[^"\']*["\']|<button[^>]*class=["\'][^"\']*js-btn-item-cart-add|<div class=["\'][^"\']*product-tabs|$)~isu', $html, $blocks, PREG_SET_ORDER)) {
            return $groups;
        }

        foreach ($blocks as $block) {
            $body  = $block[1];
            $title = self::extract_first_text($body, ['~class=["\'][^"\']*radio-group__title[^"\']*["\'][^>]*>(.*?)</~isu']);
            if ($title === '') {
                continue;
            }

            $items = [];
            if (preg_match_all('~class=["\']radio-group__item["\']>(.*?)(?=class=["\']radio-group__item["\']|class=["\'][^"\']*radio-group__items|$)~isu', $body, $item_blocks, PREG_SET_ORDER)) {
                foreach ($item_blocks as $item_block) {
                    $chunk = $item_block[1];
                    $price = 0;
                    if (preg_match('~data-price=["\'](-?\d+)["\']~isu', $chunk, $m)) {
                        $price = (int) $m[1];
                    }
                    $id = '';
                    if (preg_match('~<label[^>]*class=["\'][^"\']*radio-group__label[^"\']*["\'][^>]*data-id=["\']([a-f0-9-]+)["\']~isu', $chunk, $m)) {
                        $id = $m[1];
                    }
                    $text = self::extract_first_text($chunk, ['~radio-group__item-text[^"\']*["\'][^>]*>(.*?)</~isu']);
                    if ($id === '' || $text === '') {
                        continue;
                    }
                    $image = '';
                    if (preg_match('~data-image=["\']([^"\']+)["\']~isu', $chunk, $m) && $m[1] !== '') {
                        $image = str_starts_with($m[1], 'http') ? $m[1] : 'https://easysteam.ru' . $m[1];
                    }
                    // "checked" sits on its own line right before class= on the <input>
                    // for whichever item is selected by default.
                    $default = (bool) preg_match('~<input\s+checked\b~isu', $chunk);
                    $items[] = ['id' => $id, 'text' => $text, 'price' => $price, 'image' => $image, 'default' => $default];
                }
            }

            if ($items) {
                $groups[] = ['title' => $title, 'items' => $items];
            }
        }

        return $groups;
    }

    private static function extract_base_offer_price(string $html): int {
        if (preg_match('~data-base-price=["\'](\d+)["\']~isu', $html, $m)) {
            return (int) $m[1];
        }
        return 0;
    }

    /**
     * Writes the raw radio-groups as `_hws_source_payload` (option_groups), the format the
     * frontend's swatch UI and per-option image switching actually read (see
     * hws-graphql-bridge.php `hwsVariantGroups`). Matches the shape already present on the
     * reference "Геленджик М2" product: {name, delta_price, is_default, sort_order, image,
     * additional_image} per value, grouped under {name, values}.
     */
    private static function sync_easysteam_source_payload(int $wc_product_id, array $groups): void {
        if ($wc_product_id <= 0) {
            return;
        }

        $option_groups = [];
        foreach ($groups as $group) {
            $values = [];
            foreach ($group['items'] as $index => $item) {
                $values[] = [
                    'name'             => $item['text'],
                    'delta_price'      => $item['price'],
                    'is_default'       => (bool) $item['default'],
                    'sort_order'       => $index,
                    'image'            => $item['image'],
                    'additional_image' => '',
                ];
            }
            if ($values) {
                $option_groups[] = ['name' => $group['title'], 'values' => $values];
            }
        }

        if (!$option_groups) {
            return;
        }

        update_post_meta(
            $wc_product_id,
            '_hws_source_payload',
            wp_json_encode(['option_groups' => $option_groups], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    /**
     * Cartesian product across offer groups: one item picked per group. Mirrors the
     * combinations a shopper can build with the source site's radio selectors.
     */
    private static function cartesian_offer_combos(array $groups): array {
        $combos = [[]];
        foreach ($groups as $group) {
            $next = [];
            foreach ($combos as $combo) {
                foreach ($group['items'] as $item) {
                    $next[] = array_merge($combo, [['group' => $group, 'item' => $item]]);
                }
            }
            $combos = $next;
        }
        return $combos;
    }

    /**
     * The /product/article endpoint sits behind Laravel's CSRF middleware: a plain
     * stateless POST gets HTTP 419 "Page Expired". A normal GET of the product page
     * first establishes a session (izistim_session cookie) and an XSRF-TOKEN cookie
     * that must be echoed back as the X-XSRF-TOKEN header, exactly like axios's
     * built-in XSRF handling does for the site's own "Add to cart" button.
     */
    private static function fetch_easysteam_session(string $product_url): array {
        $response = wp_remote_get($product_url, [
            'timeout' => 20,
            'headers' => ['User-Agent' => 'HWS Product Parser/0.1'],
        ]);
        if (is_wp_error($response)) {
            return ['cookies' => [], 'xsrf' => ''];
        }

        $cookies = wp_remote_retrieve_cookies($response);
        $xsrf = '';
        foreach ($cookies as $cookie) {
            if ($cookie->name === 'XSRF-TOKEN') {
                $xsrf = urldecode($cookie->value);
            }
        }

        return ['cookies' => $cookies, 'xsrf' => $xsrf];
    }

    /**
     * Resolves the real article/SKU for a specific offer combination by calling the same
     * endpoint the source site's own "Add to cart" button uses
     * (see app.js: axios.post("/product/article", {product, param-list})).
     */
    private static function resolve_offer_article(string $product_uuid, array $param_ids, array $session): string {
        $response = wp_remote_post('https://easysteam.ru/product/article', [
            'timeout' => 20,
            'headers' => [
                'User-Agent'       => 'HWS Product Parser/0.1',
                'X-XSRF-TOKEN'     => $session['xsrf'] ?? '',
                'X-Requested-With' => 'XMLHttpRequest',
                'Referer'          => 'https://easysteam.ru/products/show/' . $product_uuid,
            ],
            'cookies' => $session['cookies'] ?? [],
            'body'    => [
                'product'    => $product_uuid,
                'param-list' => implode(',', $param_ids),
            ],
        ]);

        if (is_wp_error($response)) {
            return '';
        }
        $code = (int) wp_remote_retrieve_response_code($response);
        if ($code < 200 || $code >= 300) {
            return '';
        }
        // The endpoint double-encodes its JSON body (matches app.js: JSON.parse(t.data),
        // where t.data was already JSON-decoded once by axios's response transform).
        $decoded = json_decode(wp_remote_retrieve_body($response), true);
        if (is_string($decoded)) {
            $decoded = json_decode($decoded, true);
        }
        return isset($decoded['article']) ? trim((string) $decoded['article']) : '';
    }

    /**
     * Downloads a source offer image into the media library, reusing an existing
     * attachment if the same source URL was already sideloaded on a previous parse.
     */
    private static function sideload_offer_image(string $url): int {
        if ($url === '') {
            return 0;
        }

        $existing = get_posts([
            'post_type'      => 'attachment',
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_key'       => '_hws_original_source_image',
            'meta_value'     => $url,
        ]);
        if ($existing) {
            return (int) $existing[0];
        }

        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $attachment_id = media_sideload_image($url, 0, null, 'id');
        if (is_wp_error($attachment_id)) {
            return 0;
        }

        update_post_meta((int) $attachment_id, '_hws_original_source_image', $url);
        return (int) $attachment_id;
    }

    /**
     * Builds/refreshes a real WooCommerce variable product + variations for an EasySteam
     * product page that exposes offer selectors (radio-group blocks). Leaves the product
     * as a simple product when the page has no offers to combine.
     */
    private static function sync_easysteam_simple_image(int $wc_product_id, array $parsed): void {
        if ($wc_product_id <= 0 || get_post_type($wc_product_id) !== 'product') {
            return;
        }
        $product = wc_get_product($wc_product_id);
        if (!$product || $product->get_image_id()) {
            return;
        }
        $url = trim((string) ($parsed['offer_image'] ?? ''));
        if ($url === '') {
            return;
        }
        $image_id = self::sideload_offer_image($url);
        if ($image_id) {
            $product->set_image_id($image_id);
            $product->save();
        }
    }

    private static function sync_easysteam_offer_variations(int $wc_product_id, string $product_uuid, string $html, array $parsed): void {
        if ($wc_product_id <= 0 || !class_exists('WC_Product_Variable') || !class_exists('WC_Product_Variation')) {
            return;
        }

        $groups = self::extract_radio_groups($html);
        if (!$groups) {
            // No offer selectors on this page — it's a genuinely simple product.
            // create_store_product()/sync_store_product_core() only ever store the source
            // image as a URL in postmeta, never download it, so it still needs sideloading.
            self::sync_easysteam_simple_image($wc_product_id, $parsed);
            return;
        }

        // The frontend's swatch UI and per-option image switching read _hws_source_payload
        // directly (see hws-graphql-bridge.php: hwsVariantGroups prefers it over the native
        // WooCommerce attribute fallback, which carries no images at all). Write it from the
        // raw groups regardless of whether they map to a WooCommerce attribute taxonomy below.
        // Group "id" is left unset — the bridge slugifies the name when id is absent, which
        // is deterministic and avoids needing the category slug at this call site.
        self::sync_easysteam_source_payload($wc_product_id, $groups);

        // Groups whose title we don't recognise still need a value in every param-list
        // sent to /product/article (the endpoint 500s on incomplete combos), so they're
        // "pinned" to their first offered item instead of being dropped: they affect
        // price/article resolution but don't become a WooCommerce filter attribute.
        $mapped_groups = [];
        $pinned_items  = [];
        foreach ($groups as $group) {
            $slug = self::EASYSTEAM_OFFER_ATTRIBUTE_MAP[$group['title']] ?? '';
            if ($slug === '' || !taxonomy_exists('pa_' . $slug)) {
                if ($group['items']) {
                    $pinned_items[] = $group['items'][0];
                }
                continue;
            }
            $mapped_groups[] = $group + ['taxonomy' => $slug];
        }
        if (!$mapped_groups) {
            return;
        }

        $base_price = self::extract_base_offer_price($html);
        if ($base_price <= 0) {
            $base_price = (int) preg_replace('~\D~', '', (string) ($parsed['price'] ?? ''));
        }

        if (get_post_type($wc_product_id) !== 'product') {
            return;
        }
        if (wc_get_product($wc_product_id)?->get_type() !== 'variable') {
            wp_set_object_terms($wc_product_id, 'variable', 'product_type');
            clean_post_cache($wc_product_id);
        }
        // Bypass wc_get_product()'s type auto-detection: within this request an earlier
        // sync_product_to_woocommerce() call may already have cached this product as
        // WC_Product_Simple, and that stale instance would silently swallow the
        // variation attributes/variations built below.
        $product = new WC_Product_Variable($wc_product_id);
        if (!$product->get_id()) {
            return;
        }

        $wc_attributes = [];
        foreach ($mapped_groups as $group) {
            $taxonomy = 'pa_' . $group['taxonomy'];
            $term_ids = [];
            foreach ($group['items'] as $item) {
                $term = get_term_by('name', $item['text'], $taxonomy);
                if (!$term) {
                    $created = wp_insert_term($item['text'], $taxonomy);
                    if (is_wp_error($created)) {
                        continue;
                    }
                    $term = get_term((int) $created['term_id'], $taxonomy);
                }
                if ($term && !is_wp_error($term)) {
                    $term_ids[] = (int) $term->term_id;
                }
            }
            if (!$term_ids) {
                continue;
            }
            wp_set_object_terms($wc_product_id, $term_ids, $taxonomy, false);

            $attribute = new WC_Product_Attribute();
            $attribute->set_id((int) wc_attribute_taxonomy_id_by_name($group['taxonomy']));
            $attribute->set_name($taxonomy);
            $attribute->set_options($term_ids);
            $attribute->set_visible(true);
            $attribute->set_variation(true);
            $wc_attributes[] = $attribute;
        }
        if (!$wc_attributes) {
            return;
        }
        $product->set_attributes($wc_attributes);
        $product->save();

        $combos = self::cartesian_offer_combos($mapped_groups);
        $session = self::fetch_easysteam_session('https://easysteam.ru/products/show/' . $product_uuid);
        $pinned_ids   = array_column($pinned_items, 'id');
        $pinned_price = array_sum(array_column($pinned_items, 'price'));
        $first_image_id = 0;

        foreach ($combos as $combo) {
            $param_ids = array_merge(array_map(static fn(array $c): string => $c['item']['id'], $combo), $pinned_ids);
            $article = self::resolve_offer_article($product_uuid, $param_ids, $session);
            if ($article === '') {
                continue;
            }

            $price = $base_price + $pinned_price + array_sum(array_map(static fn(array $c): int => $c['item']['price'], $combo));
            $image_url = 'https://easysteam.ru/images/offers/' . $article . '.jpg';
            $image_id  = self::sideload_offer_image($image_url);
            if ($image_id && !$first_image_id) {
                $first_image_id = $image_id;
            }

            $variation_post_id = wc_get_product_id_by_sku($article);
            $variation = $variation_post_id > 0 ? wc_get_product($variation_post_id) : new WC_Product_Variation();
            if (!$variation instanceof WC_Product_Variation) {
                continue;
            }
            if ($variation_post_id <= 0) {
                $variation->set_parent_id($wc_product_id);
            }
            $variation->set_sku($article);
            $variation->set_status('publish');
            $variation->set_regular_price((string) $price);
            $variation->set_manage_stock(false);
            $variation->set_stock_status('instock');

            $attr_values = [];
            $options_json = [];
            foreach ($combo as $chosen) {
                $attr_values['pa_' . $chosen['group']['taxonomy']] = sanitize_title($chosen['item']['text']);
                $options_json[$chosen['group']['title']] = $chosen['item']['text'];
            }
            $variation->set_attributes($attr_values);
            if ($image_id) {
                $variation->set_image_id($image_id);
            }
            $variation_id = $variation->save();

            update_post_meta($variation_id, '_hws_source_price_rub', $price);
            update_post_meta($variation_id, '_hws_price_currency', 'RUB');
            update_post_meta($variation_id, '_hws_price_mode', 'source-rub');
            update_post_meta($variation_id, '_hws_source_api_param_list', implode(',', $param_ids));
            update_post_meta($variation_id, '_hws_source_options', wp_json_encode($options_json, JSON_UNESCAPED_UNICODE));
            if ($image_id) {
                update_post_meta($variation_id, '_hws_source_image', wp_get_attachment_url($image_id));
            }
            update_post_meta($variation_id, '_hws_original_source_image', $image_url);
        }

        if (!$product->get_image_id() && $first_image_id) {
            $product->set_image_id($first_image_id);
            $product->save();
        }

        if (function_exists('wc_delete_product_transients')) {
            wc_delete_product_transients($wc_product_id);
        }
        clean_post_cache($wc_product_id);
    }

    private static function extract_price(string $html): string {
        if (preg_match('~data-product-offer-price=["\']([^"\']+)["\']~isu', $html, $match)) {
            return trim($match[1]);
        }
        if (preg_match('~<meta\s+property=["\']product:price:amount["\']\s+content=["\']([^"\']+)["\']~isu', $html, $match)) {
            return trim($match[1]);
        }
        if (preg_match('~class=["\'][^"\']*price[^"\']*["\'][^>]*>(.*?)</~isu', $html, $match)) {
            return trim((string) preg_replace('~[^\d.,]~u', '', wp_strip_all_tags($match[1])), '.,');
        }
        return '';
    }

    private static function extract_sangens_price(string $html): string {
        $price = self::extract_price($html);
        if ($price !== '') {
            return $price;
        }

        if (preg_match_all('~([\d][\d\s\x{00A0},.]{3,})\s*(?:₽|руб\.?)~iu', $html, $matches)) {
            foreach ($matches[1] as $raw) {
                $normalized = preg_replace('~[^\d.,]~u', '', $raw);
                $normalized = trim((string) $normalized, '.,');
                if ((float) str_replace(',', '.', $normalized) > 0) {
                    return $normalized;
                }
            }
        }

        return '';
    }

    private static function extract_image(string $html, string $base_url = 'https://easysteam.ru/'): string {
        if (preg_match('~<meta\s+property=["\']og:image["\']\s+content=["\']([^"\']+)["\']~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), $base_url);
        }
        if (preg_match('~<img(?=[^>]+class=["\'][^"\']*(?:js-product-main-image|product__image)[^"\']*["\'])(?=[^>]+(?:src|data-src|data-lazy-src)=["\']([^"\']+)["\'])[^>]*>~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), $base_url);
        }
        if (preg_match('~class=["\'][^"\']*js-product-main-image-wrap[^"\']*["\'][^>]+href=["\']([^"\']+)["\']~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), $base_url);
        }
        if (preg_match('~<img\b[^>]+(?:src|data-src|data-lazy-src)=["\']([^"\']*wp-content/uploads/[^"\']+)["\']~isu', $html, $match)) {
            return self::absolute_url(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'), $base_url);
        }
        return '';
    }

    private static function extract_meta_content(string $html, string $name): string {
        $quoted = preg_quote($name, '~');
        foreach ([
            '~<meta\s+name=["\']' . $quoted . '["\']\s+content=["\']([^"\']+)["\']~isu',
            '~<meta\s+content=["\']([^"\']+)["\']\s+name=["\']' . $quoted . '["\']~isu',
            '~<meta\s+property=["\']og:' . $quoted . '["\']\s+content=["\']([^"\']+)["\']~isu',
        ] as $pattern) {
            if (preg_match($pattern, $html, $match)) {
                return trim(html_entity_decode(wp_strip_all_tags($match[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            }
        }
        return '';
    }

    private static function extract_sangens_long_description(string $html, string $fallback): string {
        $candidates = [];
        if (preg_match_all('~<div[^>]*class=["\'][^"\']*(?:text|description|content)[^"\']*["\'][^>]*>(.*?)</div>~isu', $html, $matches)) {
            foreach ($matches[1] as $block) {
                $text = trim(wp_strip_all_tags($block));
                if (mb_strlen($text) >= 80) {
                    $candidates[] = preg_replace('~\s+~u', ' ', $text);
                }
            }
        }

        if ($candidates) {
            usort($candidates, static fn(string $a, string $b): int => mb_strlen($b) <=> mb_strlen($a));
            return $candidates[0];
        }

        return $fallback;
    }

    private static function extract_sangens_series(string $html, string $source_url, string $title): string {
        $from_chars = self::first_present([], self::extract_characteristics($html), ['Серия', 'Модельный ряд']);
        if ($from_chars !== '') {
            return $from_chars;
        }
        if (preg_match('~/series-([^/]+)/~u', (string) wp_parse_url($source_url, PHP_URL_PATH), $match)) {
            return strtoupper(str_replace(['-', '_'], ' ', $match[1]));
        }
        if (preg_match('~\b([A-ZА-Я]{1,4})\b~u', $title, $match)) {
            return $match[1];
        }
        return '';
    }

    private static function extract_steam_volume(array $chars): string {
        $direct = self::first_present([], $chars, ['Объем парной', 'Объём парной']);
        if ($direct !== '') {
            return $direct;
        }

        $min = $chars['Минимальный объем парной'] ?? $chars['Минимальный объём парной'] ?? '';
        $max = $chars['Максимальный объем парной'] ?? $chars['Максимальный объём парной'] ?? '';
        if ($min !== '' && $max !== '') {
            return trim($min . ' - ' . $max);
        }
        if ($max !== '') {
            return 'до ' . $max;
        }
        if ($min !== '') {
            return 'от ' . $min;
        }

        return '';
    }

    private static function normalize_fuel_type(string $raw): string {
        $raw = mb_strtolower($raw);
        $values = [];

        if (str_contains($raw, 'газ, дрова') || str_contains($raw, 'газ + дрова')) {
            $values[] = 'газ + дрова';
        }
        if (str_contains($raw, 'дрова')) {
            $values[] = 'дрова';
        }
        if (str_contains($raw, 'подготовка')) {
            $values[] = 'подготовка под газ';
        }
        if (str_contains($raw, 'сабк') || preg_match('~(^|[,\s])газ([,\s]|$)~u', $raw)) {
            $values[] = 'газ';
        }

        return implode(', ', array_values(array_unique($values)));
    }

    private static function normalize_jacket_material(string $raw): string {
        $raw = mb_strtolower($raw);
        $values = [];

        foreach (['талькохлорит', 'змеевик', 'пироксенит', 'жадеит'] as $material) {
            if (str_contains($raw, $material)) {
                $values[] = $material;
            }
        }

        return implode(', ', array_values(array_unique($values)));
    }

    private static function normalize_firebox_protection(string $raw): string {
        $raw = mb_strtolower($raw);
        $values = [];

        if (str_contains($raw, 'защ')) {
            $values[] = 'защитные экраны';
        }
        if (str_contains($raw, 'футеровка')) {
            $values[] = 'футеровка';
        }

        return implode(', ', array_values(array_unique($values)));
    }

    private static function normalize_side(string $raw): string {
        $raw = mb_strtolower($raw);
        $values = [];

        foreach (['слева', 'справа', 'с тыла', 'сзади', 'спереди'] as $side) {
            if (str_contains($raw, $side)) {
                $values[] = $side;
            }
        }

        return implode(', ', array_values(array_unique($values)));
    }

    private static function extract_article(string $html): string {
        $article = self::extract_attr($html, 'data-product-offer');
        if ($article !== '') {
            return $article;
        }

        if (preg_match('~Артикул\s*:\s*([A-Za-zА-Яа-я0-9._/-]+)~u', wp_strip_all_tags($html), $match)) {
            return trim($match[1]);
        }

        return '';
    }

    private static function extract_attr(string $html, string $attr): string {
        if (preg_match('~' . preg_quote($attr, '~') . '=["\']([^"\']+)["\']~isu', $html, $match)) {
            return trim(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        }
        return '';
    }

    private static function extract_first_text(string $html, array $patterns): string {
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $html, $match)) {
                return trim(wp_strip_all_tags($match[1]));
            }
        }
        return '';
    }

    private static function first_present(array $options, array $chars, array $keys): string {
        foreach ($keys as $key) {
            if (!empty($options[$key])) {
                return $options[$key];
            }
            if (!empty($chars[$key])) {
                return $chars[$key];
            }
        }
        return '';
    }

    private static function fetch_html(string $url): string {
        $response = wp_remote_get($url, [
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'HWS Product Parser/0.1',
            ],
        ]);

        if (is_wp_error($response)) {
            throw new RuntimeException($response->get_error_message());
        }

        $code = (int) wp_remote_retrieve_response_code($response);
        if ($code < 200 || $code >= 300) {
            throw new RuntimeException('HTTP ' . $code . ' while fetching source.');
        }

        $body = wp_remote_retrieve_body($response);
        if (!is_string($body) || trim($body) === '') {
            throw new RuntimeException('Empty source response.');
        }

        return $body;
    }

    private static function state(): array {
        $state = get_option(self::OPTION, []);
        if (!is_array($state)) {
            return [];
        }
        return $state;
    }

    private static function products_for_category(array $state, string $manufacturer, string $category): array {
        $products = $state['products'][$manufacturer][$category] ?? [];
        return is_array($products) ? $products : [];
    }

    private static function parsed_product(string $manufacturer, string $category, string $product_id): array {
        $parsed = self::state()['parsed_products'][$manufacturer][$category][$product_id] ?? [];
        return is_array($parsed) ? $parsed : [];
    }

    private static function default_category(string $manufacturer): string {
        return self::MANUFACTURERS[$manufacturer]['categories'][0] ?? '';
    }

    private static function manufacturer_mapping(string $manufacturer): array {
        if ($manufacturer === 'sangens') {
            return [
                ['source' => 'Sangens', 'target' => 'Product brand'],
                ['source' => 'Электрические печи', 'target' => 'WooCommerce category scope'],
                ['source' => 'https://sangens.com/ru/catalog/furnaces/', 'target' => 'Category source URL'],
                ['source' => 'Только карточки электрических печей', 'target' => 'WooCommerce products'],
            ];
        }

        return self::MANUFACTURER_MAPPING;
    }

    private static function category_mapping(string $category): array {
        if ($category === 'sangens-electric-furnaces') {
            return [
                ['source' => 'https://sangens.com/ru/catalog/furnaces/', 'target' => 'Category source URL'],
                ['source' => '25 карточек электрических печей', 'target' => 'Products in category'],
                ['source' => 'Артикул', 'target' => 'SKU'],
                ['source' => 'Цена или явный статус отсутствия цены', 'target' => 'Regular price / parser status'],
                ['source' => 'Мощность', 'target' => 'Мощность'],
                ['source' => 'Объем парной', 'target' => 'Объем парной'],
                ['source' => 'Тип топлива', 'target' => 'электричество'],
                ['source' => 'Изображение и URL источника', 'target' => 'Product image + source URL'],
            ];
        }

        return self::CATEGORY_MAPPING;
    }

    private static function blocked_items(string $manufacturer): array {
        return $manufacturer === 'sangens' ? self::SANGENS_BLOCKED_ITEMS : self::BLOCKED_TABS;
    }

    private static function display_product_fields(string $manufacturer, array $parsed): array {
        $applicable = $parsed['_applicable_fields'] ?? [];
        if (is_array($applicable) && $applicable) {
            return array_values(array_filter($applicable, static fn(string $field): bool => isset(self::PRODUCT_FIELDS[$field])));
        }

        $fields = self::applicable_product_fields($manufacturer, $parsed);
        if ($fields) {
            return $fields;
        }

        $fields = self::required_product_fields($manufacturer);
        foreach (self::optional_product_fields($manufacturer) as $field) {
            if (self::field_is_valid($field, $parsed[$field] ?? null)) {
                $fields[] = $field;
            }
        }

        return $fields;
    }

    private static function applicable_product_fields(string $manufacturer, array $parsed): array {
        $fields = array_values(array_filter(
            self::required_product_fields($manufacturer),
            static fn(string $field): bool => !in_array($field, self::SOURCE_DEPENDENT_PRODUCT_FIELDS, true)
                || self::field_is_valid($field, $parsed[$field] ?? null)
        ));
        foreach (self::optional_product_fields($manufacturer) as $field) {
            if (self::field_is_valid($field, $parsed[$field] ?? null)) {
                $fields[] = $field;
            }
        }

        return $fields;
    }

    private static function required_product_fields(string $manufacturer): array {
        if ($manufacturer === 'sangens') {
            return self::SANGENS_REQUIRED_PRODUCT_FIELDS;
        }
        if ($manufacturer === 'eos') {
            return self::EOS_REQUIRED_PRODUCT_FIELDS;
        }
        if ($manufacturer === 'vvd') {
            return self::VVD_REQUIRED_PRODUCT_FIELDS;
        }
        return self::REQUIRED_PRODUCT_FIELDS;
    }

    private static function optional_product_fields(string $manufacturer): array {
        return $manufacturer === 'sangens' ? self::SANGENS_OPTIONAL_PRODUCT_FIELDS : self::OPTIONAL_PRODUCT_FIELDS;
    }

    private static function product_status(string $manufacturer, string $category, string $product_id): array {
        $status = self::status(self::status_key('product', $manufacturer, $category, $product_id));
        if (!empty($status['parsed'])) {
            return $status;
        }

        $parsed = self::parsed_product($manufacturer, $category, $product_id);
        if (self::product_has_parsed_data($manufacturer, $parsed)) {
            $status['parsed'] = true;
            $status['note'] = 'derived from parsed product data';
            return $status;
        }

        return $status;
    }

    private static function status(string $key): array {
        $status = self::state()['statuses'][$key] ?? [];
        return is_array($status) ? $status : ['parsed' => false, 'date' => ''];
    }

    private static function product_has_parsed_data(string $manufacturer, array $parsed): bool {
        $fields = $parsed['_applicable_fields'] ?? self::applicable_product_fields($manufacturer, $parsed);
        if (!is_array($fields) || !$fields) {
            $fields = self::applicable_product_fields($manufacturer, $parsed);
        }

        foreach ($fields as $field) {
            if (!self::field_is_valid($field, $parsed[$field] ?? null)) {
                return false;
            }
        }

        return true;
    }

    private static function value_is_not_empty($value): bool {
        if (is_array($value)) {
            return count($value) > 0;
        }
        return trim((string) $value) !== '';
    }

    private static function field_is_valid(string $field, $value): bool {
        if (is_array($value)) {
            return count($value) > 0;
        }

        $value = trim((string) $value);
        if ($value === '') {
            return false;
        }

        if ($field === 'price') {
            return (float) preg_replace('~[^\d.]~', '', str_replace(',', '.', $value)) > 0;
        }
        if ($field === 'offer_image') {
            return str_starts_with($value, 'http://') || str_starts_with($value, 'https://');
        }
        if ($field === 'source_url') {
            return str_starts_with($value, 'http://') || str_starts_with($value, 'https://');
        }
        if ($field === 'brand') {
            return mb_strlen($value) >= 2;
        }
        if ($field === 'fuel_type') {
            $allowed = ['дрова', 'подготовка под газ', 'газ', 'газ + дрова', 'электричество'];
            $parts = array_filter(array_map('trim', explode(',', $value)));
            return $parts !== [] && count(array_diff($parts, $allowed)) === 0;
        }
        if ($field === 'jacket_material') {
            $allowed = ['талькохлорит', 'змеевик', 'пироксенит', 'жадеит'];
            $parts = array_filter(array_map('trim', explode(',', $value)));
            return $parts !== [] && count(array_diff($parts, $allowed)) === 0;
        }
        if ($field === 'firebox_protection') {
            $allowed = ['защитные экраны', 'футеровка'];
            $parts = array_filter(array_map('trim', explode(',', $value)));
            return $parts !== [] && count(array_diff($parts, $allowed)) === 0;
        }
        if (in_array($field, ['door_side', 'stone_side'], true)) {
            $allowed = ['слева', 'справа', 'с тыла'];
            $parts = array_filter(array_map('trim', explode(',', $value)));
            return $parts !== [] && count(array_diff($parts, $allowed)) === 0;
        }
        if ($field === 'chimney_side') {
            $allowed = ['слева', 'справа', 'сзади', 'спереди'];
            $parts = array_filter(array_map('trim', explode(',', $value)));
            return $parts !== [] && count(array_diff($parts, $allowed)) === 0;
        }
        if ($field === 'steam_volume') {
            return preg_match('~\d~', $value) === 1;
        }
        if ($field === 'power') {
            return preg_match('~\d~', $value) === 1;
        }

        return true;
    }

    private static function mark_status(string $key, bool $parsed, string $note = ''): void {
        $state = self::state();
        $state['statuses'][$key] = [
            'parsed' => $parsed,
            'date'   => current_time('mysql'),
            'note'   => $note,
        ];
        update_option(self::OPTION, $state, false);
    }

    private static function store_product_url(array $parsed): string {
        $product_id = self::store_product_id($parsed);
        if ($product_id <= 0) {
            return '';
        }

        $url = get_permalink($product_id);
        return is_string($url) ? $url : '';
    }

    private static function ensure_store_product_id(array $parsed): int {
        $product_id = self::store_product_id($parsed);
        if ($product_id > 0) {
            return $product_id;
        }

        return self::create_store_product($parsed);
    }

    private static function store_product_id(array $parsed): int {
        $sku = trim((string) ($parsed['article'] ?? ''));
        if ($sku === '' || !function_exists('wc_get_product_id_by_sku')) {
            return 0;
        }

        $product_id = (int) wc_get_product_id_by_sku($sku);
        if ($product_id <= 0 || !function_exists('wc_get_product')) {
            return 0;
        }

        $product = wc_get_product($product_id);
        if (!$product) {
            return 0;
        }

        if (method_exists($product, 'is_type') && $product->is_type('variation') && method_exists($product, 'get_parent_id')) {
            $parent_id = (int) $product->get_parent_id();
            if ($parent_id > 0) {
                $product_id = $parent_id;
            }
        }

        return $product_id;
    }

    private static function create_store_product(array $parsed): int {
        if (!class_exists('WC_Product_Simple')) {
            return 0;
        }

        $sku = trim((string) ($parsed['article'] ?? ''));
        $title = trim((string) ($parsed['title'] ?? ''));
        if ($sku === '' || $title === '') {
            return 0;
        }

        $product = new WC_Product_Simple();
        $product->set_name($title);
        $product->set_slug(self::product_slug($parsed));
        $product->set_sku($sku);
        $product->set_status('publish');
        $product->set_catalog_visibility('visible');
        $product->set_manage_stock(false);
        $product->set_stock_status('instock');
        $product->set_reviews_allowed(false);
        $product->set_category_ids(self::default_category_ids($parsed));
        $product_id = $product->save();

        if ($product_id <= 0) {
            return 0;
        }

        self::assign_brand_terms($product_id, $parsed);

        return $product_id;
    }

    private static function sync_store_product_core(int $product_id, array $parsed, array $fields): void {
        if (!function_exists('wc_get_product')) {
            return;
        }

        $product = wc_get_product($product_id);
        if (!$product) {
            return;
        }

        $changed = false;
        $title = trim((string) ($parsed['title'] ?? ''));
        if ($title !== '' && method_exists($product, 'get_name') && $product->get_name() !== $title) {
            $product->set_name($title);
            $changed = true;
        }

        if (method_exists($product, 'set_status') && $product->get_status() !== 'publish') {
            $product->set_status('publish');
            $changed = true;
        }

        if (method_exists($product, 'set_catalog_visibility') && $product->get_catalog_visibility() !== 'visible') {
            $product->set_catalog_visibility('visible');
            $changed = true;
        }

        if (method_exists($product, 'set_stock_status') && $product->get_stock_status() !== 'instock') {
            $product->set_stock_status('instock');
            $changed = true;
        }

        $category_ids = self::default_category_ids($parsed);
        if ($category_ids && method_exists($product, 'set_category_ids')) {
            $current_ids = array_map('intval', $product->get_category_ids());
            if ($current_ids !== $category_ids) {
                $product->set_category_ids($category_ids);
                $changed = true;
            }
        }

        if (self::field_is_valid('price', $parsed['price'] ?? '') && method_exists($product, 'set_regular_price')) {
            $price = self::normalized_price_value((string) $parsed['price']);
            if ($price !== '') {
                $product->set_regular_price($price);
                $product->set_price($price);
                $changed = true;
            }
        }

        $attributes = self::build_product_attributes($parsed);
        if ($attributes && method_exists($product, 'set_attributes')) {
            $product->set_attributes($attributes);
            $changed = true;
        }

        if ($changed) {
            $product->save();
        }

        self::assign_brand_terms($product_id, $parsed);
    }

    private static function build_product_attributes(array $parsed): array {
        if (!class_exists('WC_Product_Attribute')) {
            return [];
        }

        $map = [
            'pa_fuel-type' => 'fuel_type',
            'pa_power' => 'power',
            'pa_voltage' => 'voltage',
            'pa_series' => 'series',
            'pa_cladding-material' => 'material',
            'pa_room-type' => 'mode',
        ];

        $attributes = [];
        $position = 0;
        foreach ($map as $attribute_name => $field) {
            $value = trim((string) ($parsed[$field] ?? ''));
            if ($value === '') {
                continue;
            }

            $attribute = new WC_Product_Attribute();
            $attribute->set_id(0);
            $attribute->set_name($attribute_name);
            $attribute->set_options([$value]);
            $attribute->set_position($position++);
            $attribute->set_visible(true);
            $attribute->set_variation(false);
            $attributes[] = $attribute;
        }

        return $attributes;
    }

    private static function assign_brand_terms(int $product_id, array $parsed): void {
        if ($product_id <= 0 || !taxonomy_exists('product_brand')) {
            return;
        }

        $brand = trim((string) ($parsed['brand'] ?? ''));
        if ($brand === '') {
            return;
        }

        $term = get_term_by('name', $brand, 'product_brand');
        if (!$term || is_wp_error($term)) {
            $created = wp_insert_term($brand, 'product_brand', ['slug' => sanitize_title($brand)]);
            if (!is_wp_error($created) && !empty($created['term_id'])) {
                $term = get_term((int) $created['term_id'], 'product_brand');
            }
        }

        if ($term && !is_wp_error($term)) {
            wp_set_object_terms($product_id, [(int) $term->term_id], 'product_brand', false);
        }
    }

    private static function default_category_ids(array $parsed): array {
        $slug = self::default_category_slug($parsed);
        if ($slug === '') {
            return [];
        }

        $term = get_term_by('slug', $slug, 'product_cat');
        if (!$term || is_wp_error($term)) {
            return [];
        }

        return [(int) $term->term_id];
    }

    private static function default_category_slug(array $parsed): string {
        if (!empty($parsed['hws_category_slug'])) {
            return sanitize_title((string) $parsed['hws_category_slug']);
        }
        $brand = trim((string) ($parsed['brand'] ?? ''));
        if (strcasecmp($brand, 'Sangens') === 0) {
            return 'sauna-stoves';
        }

        return 'russian-bath-stoves';
    }

    private static function product_slug(array $parsed): string {
        $brand = sanitize_title((string) ($parsed['brand'] ?? 'product'));
        $article = sanitize_title((string) ($parsed['article'] ?? ''));
        if ($brand !== '' && $article !== '') {
            return $brand . '-' . $article;
        }

        return sanitize_title((string) ($parsed['title'] ?? 'product'));
    }

    private static function normalized_price_value(string $value): string {
        $value = preg_replace('~[^\d.,]~u', '', $value);
        $value = str_replace(',', '.', (string) $value);
        $parts = explode('.', $value);
        if (count($parts) > 2) {
            $decimal = array_pop($parts);
            $value = implode('', $parts) . '.' . $decimal;
        }
        $number = (float) $value;
        return $number > 0 ? wc_format_decimal($number, 2) : '';
    }

    private static function paragraphs_to_html(string $value): string {
        $parts = preg_split('/\R{2,}/u', trim($value));
        $parts = is_array($parts) ? $parts : [$value];
        $html = '';
        foreach ($parts as $part) {
            $part = trim((string) $part);
            if ($part === '') {
                continue;
            }
            $html .= '<p>' . esc_html($part) . '</p>';
        }
        return $html;
    }

    private static function product_field_has_formatted_content(array $parsed, string $field): bool {
        if (!in_array($field, ['short_description', 'long_description'], true)) {
            return false;
        }

        $product_id = self::store_product_id($parsed);
        if ($product_id <= 0 || !function_exists('get_post')) {
            return false;
        }

        $post = get_post($product_id);
        if (!$post) {
            return false;
        }

        $html = $field === 'short_description'
            ? (string) ($post->post_excerpt ?? '')
            : (string) ($post->post_content ?? '');

        return self::content_is_formatted($html);
    }

    private static function content_is_formatted(string $html): bool {
        $text = function_exists('wp_strip_all_tags')
            ? trim(wp_strip_all_tags($html))
            : trim(strip_tags($html));

        $normalized_text = function_exists('mb_strtolower') ? mb_strtolower($text) : strtolower($text);
        if ($text === '' || $normalized_text === 'описание') {
            return false;
        }

        return preg_match('~<(p|br|ul|ol|li|h[1-6]|table|tbody|tr|td|th|strong|b|em|i)\b~i', $html) === 1;
    }

    private static function specs_to_html(array $characteristics): string {
        $rows = '';
        foreach ($characteristics as $label => $value) {
            $label = trim((string) $label);
            $value = trim((string) $value);
            if ($label === '' || $value === '') {
                continue;
            }
            $rows .= '<tr><th>' . esc_html($label) . '</th><td>' . esc_html($value) . '</td></tr>';
        }
        if ($rows === '') {
            return '';
        }
        return '<table><tbody>' . $rows . '</tbody></table>';
    }

    private static function status_key(string $scope, string $manufacturer, string $category = '', string $product = '', string $field = ''): string {
        return implode(':', array_filter([$scope, $manufacturer, $category, $product, $field], static fn(string $part): bool => $part !== ''));
    }

    private static function status_date(array $status): string {
        return !empty($status['date']) ? (string) $status['date'] : 'даты нет';
    }

    private static function format_value($value): string {
        if (is_array($value)) {
            if (!$value) {
                return '';
            }
            $pairs = [];
            foreach ($value as $key => $item) {
                $pairs[] = $key . ': ' . $item;
            }
            return implode('; ', array_slice($pairs, 0, 12));
        }
        return is_scalar($value) ? (string) $value : '';
    }

    private static function sanitize_manufacturer($value): string {
        $value = sanitize_key((string) $value);
        return isset(self::MANUFACTURERS[$value]) ? $value : 'easysteam';
    }

    private static function sanitize_category($value): string {
        $value = sanitize_key((string) $value);
        return isset(self::CATEGORIES[$value]) ? $value : '';
    }

    private static function sanitize_product_id($value): string {
        return preg_replace('~[^a-zA-Z0-9_-]~', '', (string) $value);
    }

    private static function product_id_from_url(string $url): string {
        $path = trim((string) wp_parse_url($url, PHP_URL_PATH), '/');
        $last = basename($path);
        $slug = sanitize_title($last);
        return $slug !== '' ? $slug : substr(md5($url), 0, 12);
    }

    private static function absolute_url(string $url, string $base_url = 'https://easysteam.ru/'): string {
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }
        return rtrim($base_url, '/') . '/' . ltrim($url, '/');
    }
}

HWS_Product_Parser::init();
