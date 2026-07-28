<?php
/**
 * Plugin Name: HWS Catalog Filters
 * Description: Настройка фильтров каталога по атрибутам продуктов.
 * Version: 3.0.0
 */

defined('ABSPATH') || exit;

final class HWS_Catalog_Filters {

    private const OPTION_FILTERS = 'hws_catalog_filter_config';
    private const META_SUBCAT    = '_hws_filter_subcat_label';
    private const META_BRAND     = '_hws_filter_brand_label';
    private const ATTRIBUTE_LABELS = [
        'pa_steam-room-volume'       => 'Объем парной',
        'pa_color'                   => 'Цвет',
        'pa_leg-material'            => 'Материал ножек',
        'pa_firebox-protection'      => 'Защита топки',
        'pa_usage-class'             => 'Класс использования',
        'pa_steel-grade'             => 'Марка стали',
        'pa_cladding-material'       => 'Материал облицовки',
        'pa_voltage'                 => 'Напряжение',
        'pa_power'                   => 'Мощность',
        'pa_facing'                  => 'Облицовочный материал',
        'pa_series'                  => 'Серия',
        'pa_stone-entry-side'        => 'Сторона входа в каменку',
        'pa_door-side'               => 'Сторона дверки',
        'pa_chimney-connection-side' => 'Сторона подключения дымохода',
        'pa_cladding-type'           => 'Тип облицовки',
        'pa_equipment-type'          => 'Тип оборудования',
        'pa_connection-type'         => 'Тип подключения',
        'pa_room-type'               => 'Тип помещения',
        'pa_fuel-type'               => 'Тип топлива',
    ];

    public static function init(): void {
        add_action('admin_menu',               [__CLASS__, 'admin_menu']);
        add_action('wp_ajax_hws_cf_get_attrs', [__CLASS__, 'ajax_get_attrs']);
        add_action('wp_ajax_hws_cf_save',      [__CLASS__, 'ajax_save']);
        add_action('graphql_register_types',   [__CLASS__, 'register_graphql']);
    }

    public static function admin_menu(): void {
        add_submenu_page(
            'woocommerce',
            'Фильтры каталога',
            'Фильтры каталога',
            'manage_woocommerce',
            'hws-catalog-filters',
            [__CLASS__, 'render_page']
        );
    }

    public static function ajax_get_attrs(): void {
        check_ajax_referer('hws_catalog_filters');
        if (!current_user_can('manage_woocommerce')) wp_send_json_error('Forbidden', 403);

        $cat_id = absint($_POST['cat_id'] ?? 0);
        if (!$cat_id) wp_send_json_error('No category');

        $labels = [];
        foreach (self::global_product_attributes() as $attr) {
            $labels[$attr['slug']] = $attr['label'];
        }

        wp_send_json_success([
            'available' => self::category_product_attributes($cat_id),
            'labels'    => $labels,
            'counts'    => self::category_attribute_counts($cat_id),
        ]);
    }

    // Product IDs actually in this category (used to check which attributes really have data
    // here, instead of listing every attribute taxonomy that exists site-wide regardless of
    // whether this category's products carry it at all).
    private static function category_product_ids(int $cat_id): array {
        return get_posts([
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => [['taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $cat_id]],
        ]);
    }

    // slug => number of this category's products that actually carry that attribute.
    private static function category_attribute_counts(int $cat_id): array {
        global $wpdb;
        $product_ids = self::category_product_ids($cat_id);
        if (!$product_ids) {
            return [];
        }

        $ids_sql = implode(',', array_map('intval', $product_ids));
        $rows = $wpdb->get_results("
            SELECT tt.taxonomy, COUNT(DISTINCT tr.object_id) AS cnt
            FROM {$wpdb->term_relationships} tr
            JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
            WHERE tr.object_id IN ($ids_sql) AND tt.taxonomy LIKE 'pa\_%'
            GROUP BY tt.taxonomy
        ");
        $counts = [];
        foreach ($rows as $row) {
            $counts[$row->taxonomy] = (int) $row->cnt;
        }

        // pa_steam-room-volume isn't actually taxonomy-driven on the storefront — the frontend
        // computes the "Объем парной" filter from the hwsSpecs characteristics text, not a term
        // assignment (see extractSteamRoomVolumeRange() in the frontend repo). Approximate its
        // real availability the same way, so this one attribute's admin count isn't always 0.
        $steam_count = 0;
        foreach ($product_ids as $product_id) {
            $json = (string) get_post_meta($product_id, '_hws_source_characteristics_json', true);
            if ($json !== '' && (str_contains($json, 'объем пар') || str_contains($json, 'объём пар'))) {
                $steam_count++;
            }
        }
        if ($steam_count > 0) {
            $counts['pa_steam-room-volume'] = $steam_count;
        }

        return $counts;
    }

    // Same shape as global_product_attributes() but scoped to what this category's products
    // actually have — this is what the admin UI should offer to add as a new filter, and what
    // it uses to flag already-active filters that have no real data here.
    private static function category_product_attributes(int $cat_id): array {
        $counts = self::category_attribute_counts($cat_id);
        $result = [];
        foreach (self::global_product_attributes() as $attr) {
            if (empty($counts[$attr['slug']])) {
                continue;
            }
            $attr['count'] = $counts[$attr['slug']];
            $result[] = $attr;
        }
        return $result;
    }

    private static function global_product_attributes(): array {
        global $wpdb;

        $result = [];
        $taxonomies = function_exists('wc_get_attribute_taxonomies') ? wc_get_attribute_taxonomies() : [];
        foreach ((array) $taxonomies as $taxonomy) {
            $name = (string) ($taxonomy->attribute_name ?? '');
            if ($name === '') {
                continue;
            }

            $result[] = [
                'slug'  => 'pa_' . $name,
                'label' => self::attribute_label('pa_' . $name, (string) (($taxonomy->attribute_label ?? '') ?: $name)),
            ];
        }

        if (empty($result)) {
            $rows = $wpdb->get_results("SELECT attribute_name, attribute_label FROM {$wpdb->prefix}woocommerce_attribute_taxonomies ORDER BY attribute_label ASC");
            foreach ((array) $rows as $row) {
                $name = (string) ($row->attribute_name ?? '');
                if ($name === '') {
                    continue;
                }

                $result[] = [
                    'slug'  => 'pa_' . $name,
                    'label' => self::attribute_label('pa_' . $name, (string) (($row->attribute_label ?? '') ?: $name)),
                ];
            }
        }

        usort($result, fn($a, $b) => strcmp($a['label'], $b['label']));
        return $result;
    }

    private static function attribute_label(string $slug, string $fallback): string {
        return self::ATTRIBUTE_LABELS[$slug] ?? $fallback;
    }

    public static function ajax_save(): void {
        check_ajax_referer('hws_catalog_filters');
        if (!current_user_can('manage_woocommerce')) wp_send_json_error('Forbidden', 403);

        $cat_id = absint($_POST['cat_id'] ?? 0);
        $raw    = is_array($_POST['filters'] ?? null) ? $_POST['filters'] : [];

        $filters = [];
        foreach ($raw as $item) {
            $slug = sanitize_text_field($item['slug'] ?? '');
            $type = in_array($item['type'] ?? '', ['multicheck', 'input'], true) ? $item['type'] : 'multicheck';
            if (str_starts_with($slug, 'pa_')) {
                $filters[] = ['slug' => $slug, 'type' => $type];
            }
        }

        $config = get_option(self::OPTION_FILTERS, []);
        if (!is_array($config)) $config = [];

        if (empty($filters)) {
            unset($config[(string) $cat_id]);
        } else {
            $config[(string) $cat_id] = $filters;
        }

        update_option(self::OPTION_FILTERS, $config, false);
        if (function_exists('hws_revalidate')) hws_revalidate();
        wp_send_json_success();
    }

    public static function render_page(): void {
        $config = get_option(self::OPTION_FILTERS, []);
        if (!is_array($config)) $config = [];

        // Normalize legacy string format → {slug, type}
        foreach ($config as $cid => $items) {
            $config[$cid] = array_map(function ($item) {
                if (is_string($item)) return ['slug' => $item, 'type' => 'multicheck'];
                return $item;
            }, $items);
        }

        $cats = get_terms([
            'taxonomy'   => 'product_cat',
            'parent'     => 0,
            'hide_empty' => false,
            'orderby'    => 'name',
        ]);

        ?>
        <div class="wrap" style="max-width:1000px">
            <h1>Фильтры каталога</h1>
            <p style="color:#666;max-width:700px">
                «Доступные атрибуты» ниже показывает только то, что реально есть хотя бы у одного
                товара этой категории (с количеством товаров). Уже выбранные фильтры, у которых
                в этой категории нет ни одного товара со значением, помечены красным — их стоит
                удалить, иначе на сайте они всё равно не покажутся (и не выберутся сами).
            </p>

            <?php if (!is_wp_error($cats)) foreach ($cats as $cat):
                $saved = $config[(string) $cat->term_id] ?? [];
                $saved_count = count($saved);
                $active_slugs = array_column($saved, 'slug');
                $counts = self::category_attribute_counts((int) $cat->term_id);
                $available_attrs = self::category_product_attributes((int) $cat->term_id);
                $broken_count = 0;
                foreach ($saved as $f) {
                    if (empty($counts[$f['slug'] ?? ''])) $broken_count++;
                }
            ?>
            <?php
                $labels_map = [];
                foreach (self::global_product_attributes() as $attr) {
                    $labels_map[$attr['slug']] = $attr['label'];
                }
            ?>
            <div class="hws-cat-card"
                 data-cat-id="<?php echo (int) $cat->term_id; ?>"
                 data-saved='<?php echo wp_json_encode($saved); ?>'
                 data-all-attrs='<?php echo wp_json_encode($available_attrs); ?>'
                 data-labels='<?php echo wp_json_encode($labels_map); ?>'
                 data-counts='<?php echo wp_json_encode($counts); ?>'
                 style="background:#fff;border:1px solid #ddd;border-radius:4px;padding:16px;margin-bottom:12px">

                <!-- Header -->
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px">
                    <strong style="font-size:15px"><?php echo esc_html($cat->name); ?></strong>
                    <span style="color:#999;font-size:12px">(<?php echo (int) $cat->count; ?> тов.)</span>
                    <span class="hws-saved-indicator" style="font-size:12px;color:<?php echo $saved_count ? '#2a7e2e' : '#999'; ?>">
                        <?php echo $saved_count ? "✓ $saved_count фильтров" : 'не настроено'; ?>
                    </span>
                    <?php if ($broken_count > 0): ?>
                        <span style="font-size:12px;color:#d63638">⚠ <?php echo $broken_count; ?> без данных</span>
                    <?php endif; ?>
                    <button class="button hws-load-attrs" type="button" style="margin-left:auto">Обновить список атрибутов</button>
                </div>

                <!-- Two-panel editor: rendered server-side so the current config is visible
                     immediately, no click required to see or edit what's active. -->
                <div class="hws-editor" style="display:flex;gap:24px;align-items:flex-start">

                    <!-- Available attrs -->
                    <div style="flex:1;min-width:200px">
                        <div style="font-weight:600;font-size:13px;margin-bottom:8px;color:#555">Доступные атрибуты (есть в товарах этой категории)</div>
                        <div class="hws-available" style="border:1px solid #ddd;border-radius:4px;padding:8px;min-height:80px;display:flex;flex-direction:column;gap:4px">
                            <?php
                            $has_available = false;
                            foreach ($available_attrs as $attr):
                                if (in_array($attr['slug'], $active_slugs, true)) continue;
                                $has_available = true;
                            ?>
                                <button class="hws-attr-chip is-available" type="button" data-slug="<?php echo esc_attr($attr['slug']); ?>" data-label="<?php echo esc_attr($attr['label']); ?>">
                                    + <?php echo esc_html($attr['label']); ?> <small style="opacity:.6">(<?php echo (int) ($attr['count'] ?? 0); ?> тов.)</small>
                                </button>
                            <?php endforeach; ?>
                            <?php if (!$has_available): ?>
                                <span style="color:#999;font-size:13px">Нет атрибутов с данными в этой категории</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Active filters -->
                    <div style="flex:1;min-width:200px">
                        <div style="font-weight:600;font-size:13px;margin-bottom:8px;color:#555">Активные фильтры</div>
                        <div class="hws-active" style="border:1px solid #ddd;border-radius:4px;padding:8px;min-height:80px;display:flex;flex-direction:column;gap:6px">
                            <?php if (!$saved): ?>
                                <span style="color:#999;font-size:13px">Нет активных фильтров</span>
                            <?php endif; ?>
                            <?php foreach ($saved as $filter):
                                $slug = $filter['slug'] ?? '';
                                $type = $filter['type'] ?? 'multicheck';
                                $label = self::attribute_label($slug, $slug);
                                $product_count = $counts[$slug] ?? 0;
                                $is_broken = $product_count === 0;
                            ?>
                                <div class="hws-active-row<?php echo $is_broken ? ' hws-active-row--broken' : ''; ?>" data-slug="<?php echo esc_attr($slug); ?>">
                                    <span style="font-size:13px;flex:1">
                                        <?php echo esc_html($label . ' (' . $slug . ')'); ?>
                                        <?php if ($is_broken): ?>
                                            <br><small style="color:#d63638">⚠ нет товаров с этим значением в категории — на сайте не покажется</small>
                                        <?php else: ?>
                                            <br><small style="color:#2a7e2e"><?php echo $product_count; ?> тов.</small>
                                        <?php endif; ?>
                                    </span>
                                    <select class="hws-type-sel">
                                        <option value="multicheck" <?php selected($type, 'multicheck'); ?>>Мультивыбор</option>
                                        <option value="input" <?php selected($type, 'input'); ?>>Ввод текста/числа</option>
                                    </select>
                                    <button class="hws-remove" type="button" title="Удалить">×</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Save button -->
                    <div style="padding-top:28px">
                        <button class="button button-primary hws-save-cat" type="button">Сохранить</button>
                        <div class="hws-status" style="margin-top:6px;font-size:12px;min-height:16px;text-align:center"></div>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

        <style>
        .hws-attr-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            background: #f0f0f0;
            border: 1px solid #ddd;
            text-align: left;
            transition: background .15s;
        }
        .hws-attr-chip:hover { background: #e5e5e5; }
        .hws-attr-chip.is-available { background: #f0f6ff; border-color: #b3d4ff; color: #0a6ecf; }
        .hws-attr-chip.is-available:hover { background: #dceeff; }
        .hws-active-row {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
        }
        .hws-active-row .hws-type-sel {
            font-size: 12px;
            padding: 2px 4px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background: #fff;
        }
        .hws-active-row .hws-remove {
            margin-left: auto;
            cursor: pointer;
            color: #999;
            font-size: 16px;
            line-height: 1;
            border: none;
            background: none;
            padding: 0 2px;
        }
        .hws-active-row .hws-remove:hover { color: #d63638; }
        .hws-active-row--broken { background: #fcf0f1; border-color: #f5c2c7; }
        .hws-editor { display: flex !important; }
        </style>

        <script>
        (function($){
            var nonce   = <?php echo wp_json_encode(wp_create_nonce('hws_catalog_filters')); ?>;
            var ajaxUrl = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;

            function escHtml(s) {
                return $('<span>').text(s).html();
            }

            function renderAvailable($card, availableAttrs, activeFilters) {
                var activeSlugs = activeFilters.map(function(f){ return f.slug; });
                var $avail = $card.find('.hws-available').empty();
                availableAttrs.forEach(function(attr) {
                    if (activeSlugs.indexOf(attr.slug) !== -1) return;
                    $avail.append(
                        $('<button class="hws-attr-chip is-available" type="button">')
                            .data('slug', attr.slug)
                            .data('label', attr.label)
                            .html('+ ' + escHtml(attr.label) + ' <small style="opacity:.6">(' + (attr.count || 0) + ' тов.)</small>')
                    );
                });
                if ($avail.children().length === 0) {
                    $avail.append('<span style="color:#999;font-size:13px">Нет атрибутов с данными в этой категории</span>');
                }
            }

            // labels: {slug: label}, counts: {slug: count} — both cover every attribute, not
            // just the ones with data, so an active-but-empty filter still gets a real label
            // and its zero count (instead of falling back to showing the raw slug).
            function renderActive($card, labels, counts, activeFilters) {
                var $active = $card.find('.hws-active').empty();
                if (activeFilters.length === 0) {
                    $active.append('<span style="color:#999;font-size:13px">Нет активных фильтров</span>');
                    return;
                }
                activeFilters.forEach(function(filter) {
                    var label = labels[filter.slug] || filter.slug;
                    var count = counts[filter.slug] || 0;
                    var broken = count === 0;
                    var $row = $('<div class="hws-active-row">')
                        .toggleClass('hws-active-row--broken', broken)
                        .data('slug', filter.slug);
                    var $label = $('<span style="font-size:13px;flex:1">')
                        .html(
                            escHtml(label + ' (' + filter.slug + ')') + '<br>' +
                            (broken
                                ? '<small style="color:#d63638">⚠ нет товаров с этим значением в категории — на сайте не покажется</small>'
                                : '<small style="color:#2a7e2e">' + count + ' тов.</small>')
                        );
                    var $type = $('<select class="hws-type-sel">')
                        .append('<option value="multicheck">Мультивыбор</option>')
                        .append('<option value="input">Ввод текста/числа</option>')
                        .val(filter.type || 'multicheck');
                    var $rm = $('<button class="hws-remove" type="button" title="Удалить">×</button>');
                    $row.append($label).append($type).append($rm);
                    $active.append($row);
                });
            }

            function getActiveFilters($card) {
                var filters = [];
                $card.find('.hws-active-row').each(function() {
                    filters.push({
                        slug: $(this).data('slug'),
                        type: $(this).find('.hws-type-sel').val()
                    });
                });
                return filters;
            }

            // Load attrs button
            $(document).on('click', '.hws-load-attrs', function(){
                var $card = $(this).closest('.hws-cat-card');
                var catId = String($card.data('cat-id'));
                var $btn  = $(this).prop('disabled', true).text('Загрузка…');

                $.post(ajaxUrl, {
                    action: 'hws_cf_get_attrs',
                    cat_id: catId,
                    _ajax_nonce: nonce
                }, function(r){
                    $btn.prop('disabled', false).text('Обновить список атрибутов');
                    if (!r.success) return;

                    // Re-read current in-DOM active filters (not the stale server-rendered
                    // data-saved) so a refresh doesn't discard unsaved add/remove edits.
                    var saved = getActiveFilters($card);
                    var activeFilters = saved.map(function(s){
                        return typeof s === 'string' ? {slug: s, type: 'multicheck'} : s;
                    });

                    $card.data('all-attrs', r.data.available);
                    $card.data('labels', r.data.labels);
                    $card.data('counts', r.data.counts);
                    $card.data('active-filters', activeFilters);
                    renderAvailable($card, r.data.available, activeFilters);
                    renderActive($card, r.data.labels, r.data.counts, activeFilters);
                    $card.find('.hws-editor').css('display', 'flex');
                });
            });

            // Add attr to active
            $(document).on('click', '.hws-available .hws-attr-chip', function(){
                var $card   = $(this).closest('.hws-cat-card');
                var allAttrs = $card.data('all-attrs') || [];
                var labels = $card.data('labels') || {};
                var counts = $card.data('counts') || {};
                var activeFilters = getActiveFilters($card);
                var slug    = $(this).data('slug');
                if (activeFilters.find(function(f){ return f.slug === slug; })) return;
                activeFilters.push({ slug: slug, type: 'multicheck' });
                $card.data('active-filters', activeFilters);
                renderAvailable($card, allAttrs, activeFilters);
                renderActive($card, labels, counts, activeFilters);
            });

            // Remove attr from active
            $(document).on('click', '.hws-active-row .hws-remove', function(){
                var $card = $(this).closest('.hws-cat-card');
                var allAttrs = $card.data('all-attrs') || [];
                var labels = $card.data('labels') || {};
                var counts = $card.data('counts') || {};
                var activeFilters = getActiveFilters($card);
                var slug = $(this).closest('.hws-active-row').data('slug');
                activeFilters = activeFilters.filter(function(f){ return f.slug !== slug; });
                $card.data('active-filters', activeFilters);
                renderAvailable($card, allAttrs, activeFilters);
                renderActive($card, labels, counts, activeFilters);
            });

            // Save
            $(document).on('click', '.hws-save-cat', function(){
                var $card  = $(this).closest('.hws-cat-card');
                var catId  = String($card.data('cat-id'));
                var filters = getActiveFilters($card);
                var $btn   = $(this).prop('disabled', true).text('Сохранение…');
                var $stat  = $card.find('.hws-status');
                var $ind   = $card.find('.hws-saved-indicator');

                $.post(ajaxUrl, {
                    action:  'hws_cf_save',
                    cat_id:  catId,
                    filters: filters,
                    _ajax_nonce: nonce
                }, function(r){
                    $btn.prop('disabled', false).text('Сохранить');
                    if (r.success) {
                        $card.data('saved', filters);
                        $ind.text(filters.length ? '✓ ' + filters.length + ' фильтров' : 'не настроено')
                            .css('color', filters.length ? '#2a7e2e' : '#999');
                        $stat.text('✓ Сохранено').css('color', '#2a7e2e');
                        setTimeout(function(){ $stat.text(''); }, 2000);
                    } else {
                        $stat.text('Ошибка').css('color', '#d63638');
                    }
                });
            });
        })(jQuery);
        </script>
        <?php
    }

    // Returns normalized filter list: [{slug, type}]
    public static function get_filters_for_category(int $cat_id): array {
        $config = get_option(self::OPTION_FILTERS, []);
        $items  = is_array($config) ? ($config[(string) $cat_id] ?? []) : [];
        // backward compat: normalize string → {slug, type}
        return array_map(function ($item) {
            if (is_string($item)) return ['slug' => $item, 'type' => 'multicheck'];
            return $item;
        }, $items);
    }

    public static function register_graphql(): void {
        register_graphql_field('ProductCategory', 'hwsFilterSubcatLabel', [
            'type'    => 'String',
            'resolve' => fn($term) => get_term_meta($term->databaseId, self::META_SUBCAT, true) ?: null,
        ]);
        register_graphql_field('ProductCategory', 'hwsFilterBrandLabel', [
            'type'    => 'String',
            'resolve' => fn($term) => get_term_meta($term->databaseId, self::META_BRAND, true) ?: null,
        ]);

        register_graphql_object_type('HwsCatalogFilter', [
            'description' => 'Фильтр каталога: атрибут + тип UI',
            'fields'      => [
                'slug' => ['type' => 'String'],
                'type' => ['type' => 'String'], // multicheck | input
            ],
        ]);

        register_graphql_field('ProductCategory', 'hwsCatalogFilters', [
            'type'        => ['list_of' => 'HwsCatalogFilter'],
            'description' => 'Настроенные фильтры для каталога этой категории',
            'resolve'     => function ($term) {
                return self::get_filters_for_category((int) $term->databaseId) ?: null;
            },
        ]);
    }
}

HWS_Catalog_Filters::init();
