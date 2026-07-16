<?php
/**
 * Plugin Name: HWS Category Toggle
 * Description: Включение/выключение категорий товаров. Выключенные категории и их товары скрыты с сайта.
 * Version: 1.0.0
 */

defined('ABSPATH') || exit;

final class HWS_Cat_Toggle {

    private const OPT = 'hws_disabled_cats';

    public static function init(): void {
        add_action('admin_menu',                    [__CLASS__, 'admin_menu']);
        add_action('wp_ajax_hws_cat_toggle',        [__CLASS__, 'ajax_toggle']);

        // Frontend: hide disabled categories and their products
        add_action('pre_get_posts',                 [__CLASS__, 'filter_products']);
        add_filter('get_terms',                     [__CLASS__, 'filter_terms'], 10, 3);
        add_filter('woocommerce_product_query_tax_query', [__CLASS__, 'filter_wc_tax_query']);
        add_action('template_redirect',             [__CLASS__, 'block_direct_access']);

        // WPGraphQL: filter categories and products in GraphQL responses
        add_filter('graphql_term_object_connection_query_args', [__CLASS__, 'graphql_filter_terms'], 10, 1);
        add_filter('graphql_product_connection_query_args',     [__CLASS__, 'graphql_filter_products'], 10, 1);

        // Pre-query filter: exclude disabled cats before WP_Term_Query runs (works in all contexts)
        add_filter('get_terms_args', [__CLASS__, 'pre_filter_terms_args'], 10, 2);
    }

    // ─── Admin page ───────────────────────────────────────────────────────

    public static function admin_menu(): void {
        add_submenu_page(
            'woocommerce',
            'Категории товаров',
            'Категории товаров',
            'manage_woocommerce',
            'hws-cat-toggle',
            [__CLASS__, 'render_page']
        );
    }

    public static function render_page(): void {
        $disabled = self::disabled_ids();
        $all_off  = self::all_disabled_ids(); // includes children of disabled
        ?>
        <div class="wrap" style="max-width:800px">
            <h1>Категории товаров</h1>
            <p style="color:#666">Выключенные категории (и все их подкатегории) скрыты с сайта вместе с товарами.</p>

            <div style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:4px 0">
                <?php self::render_tree(0, $disabled, $all_off, 0); ?>
            </div>
        </div>

        <style>
        .hws-cat-row { display:flex; align-items:center; padding:10px 16px; border-bottom:1px solid #f0f0f1; gap:12px; }
        .hws-cat-row:last-child { border-bottom:none; }
        .hws-cat-row.hws-disabled { opacity:.5; }
        .hws-cat-row.hws-inherited { opacity:.4; background:#fff8e1; }
        .hws-cat-name { flex:1; font-size:14px; }
        .hws-cat-count { color:#999; font-size:12px; }
        .hws-toggle { position:relative; display:inline-block; width:44px; height:24px; cursor:pointer; }
        .hws-toggle input { opacity:0; width:0; height:0; }
        .hws-slider { position:absolute; inset:0; background:#ccc; border-radius:24px; transition:.2s; }
        .hws-slider:before { content:""; position:absolute; width:18px; height:18px; left:3px; bottom:3px; background:#fff; border-radius:50%; transition:.2s; }
        .hws-toggle input:checked + .hws-slider { background:#2271b1; }
        .hws-toggle input:checked + .hws-slider:before { transform:translateX(20px); }
        .hws-toggle.hws-inherited-toggle .hws-slider { background:#f0c040; cursor:not-allowed; }
        </style>

        <script>
        (function($){
            var nonce = <?php echo wp_json_encode(wp_create_nonce('hws_cat_toggle')); ?>;
            var url   = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;

            $(document).on('change', '.hws-toggle input', function(){
                var $cb  = $(this);
                var id   = $cb.data('id');
                var val  = $cb.is(':checked') ? 1 : 0;
                $cb.prop('disabled', true);
                $.post(url, { action:'hws_cat_toggle', id:id, enabled:val, _ajax_nonce:nonce }, function(r){
                    $cb.prop('disabled', false);
                    if (r.success) { location.reload(); }
                });
            });
        })(jQuery);
        </script>
        <?php
    }

    private static function render_tree(int $parent, array $disabled, array $all_off, int $depth): void {
        $terms = get_terms([
            'taxonomy'   => 'product_cat',
            'parent'     => $parent,
            'hide_empty' => false,
            'orderby'    => 'name',
        ]);
        if (is_wp_error($terms) || empty($terms)) return;

        foreach ($terms as $term) {
            $is_disabled  = in_array($term->term_id, $disabled, true);  // explicitly off
            $is_inherited = !$is_disabled && in_array($term->term_id, $all_off, true); // off via parent

            $row_class = $is_inherited ? 'hws-cat-row hws-inherited' : ($is_disabled ? 'hws-cat-row hws-disabled' : 'hws-cat-row');
            ?>
            <div class="<?php echo $row_class; ?>">
                <div class="hws-cat-name" style="padding-left:<?php echo $depth * 24; ?>px">
                    <?php if ($depth > 0): ?><span style="color:#ccc;margin-right:6px">└</span><?php endif; ?>
                    <?php echo esc_html($term->name); ?>
                    <span class="hws-cat-count">(<?php echo $term->count; ?>)</span>
                    <?php if ($is_inherited): ?>
                        <span style="font-size:11px;color:#999;margin-left:8px">— скрыта через родителя</span>
                    <?php endif; ?>
                </div>
                <?php if (!$is_inherited): ?>
                <label class="hws-toggle">
                    <input type="checkbox" data-id="<?php echo $term->term_id; ?>"
                           <?php checked(!$is_disabled); ?>>
                    <span class="hws-slider"></span>
                </label>
                <?php else: ?>
                <label class="hws-toggle hws-inherited-toggle">
                    <input type="checkbox" disabled>
                    <span class="hws-slider"></span>
                </label>
                <?php endif; ?>
            </div>
            <?php
            self::render_tree($term->term_id, $disabled, $all_off, $depth + 1);
        }
    }

    // ─── AJAX toggle ─────────────────────────────────────────────────────

    public static function ajax_toggle(): void {
        check_ajax_referer('hws_cat_toggle');
        if (!current_user_can('manage_woocommerce')) wp_die();

        $id      = absint($_POST['id'] ?? 0);
        $enabled = (bool)absint($_POST['enabled'] ?? 1);
        $disabled = self::disabled_ids();

        if ($enabled) {
            $disabled = array_values(array_diff($disabled, [$id]));
        } else {
            $disabled[] = $id;
            $disabled   = array_unique($disabled);
        }

        update_option(self::OPT, $disabled);
        hws_revalidate();
        wp_send_json_success();
    }

    // ─── Frontend filters ─────────────────────────────────────────────────

    public static function filter_products(\WP_Query $query): void {
        if (is_admin()) return;
        $off = self::all_disabled_ids();
        if (empty($off)) return;

        $tq   = $query->get('tax_query') ?: [];
        $tq[] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $off,
            'operator' => 'NOT IN',
        ];
        $query->set('tax_query', $tq);
    }

    public static function filter_wc_tax_query(array $tax_query): array {
        $off = self::all_disabled_ids();
        if (empty($off)) return $tax_query;
        $tax_query[] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $off,
            'operator' => 'NOT IN',
        ];
        return $tax_query;
    }

    public static function filter_terms(array $terms, $taxonomies, $args): array {
        // Allow in admin EXCEPT during GraphQL requests (WPGraphQL runs as admin)
        if (is_admin() && !defined('GRAPHQL_REQUEST')) return $terms;
        $taxs = (array)$taxonomies;
        if (!in_array('product_cat', $taxs, true)) return $terms;

        $off = self::all_disabled_ids();
        if (empty($off)) return $terms;

        return array_values(array_filter($terms, fn($t) => !in_array((int)$t->term_id, $off, true)));
    }

    public static function block_direct_access(): void {
        $off = self::all_disabled_ids();
        if (empty($off)) return;

        // Block category archive pages
        if (is_tax('product_cat')) {
            $term = get_queried_object();
            if ($term && in_array($term->term_id, $off, true)) {
                global $wp_query;
                $wp_query->set_404();
                status_header(404);
                nocache_headers();
            }
            return;
        }

        // Block product pages if all their categories are disabled
        if (is_singular('product')) {
            global $post;
            $cats = wp_get_post_terms($post->ID, 'product_cat', ['fields' => 'ids']);
            if (!is_wp_error($cats) && !empty($cats) && empty(array_diff($cats, $off))) {
                global $wp_query;
                $wp_query->set_404();
                status_header(404);
                nocache_headers();
            }
        }
    }

    // ─── Pre-query arg filter (most reliable, runs before WP_Term_Query) ──

    public static function pre_filter_terms_args(array $args, $taxonomies): array {
        if (!in_array('product_cat', (array)$taxonomies, true)) return $args;
        // Skip on admin category management pages (not GraphQL)
        if (is_admin() && !defined('GRAPHQL_REQUEST')) return $args;
        $off = self::all_disabled_ids();
        if (empty($off)) return $args;
        $existing        = isset($args['exclude']) ? (array)$args['exclude'] : [];
        $args['exclude'] = array_unique(array_merge($existing, $off));
        return $args;
    }

    // ─── WPGraphQL filters ────────────────────────────────────────────────

    public static function graphql_filter_terms(array $args): array {
        if (isset($args['taxonomy']) && $args['taxonomy'] !== 'product_cat') {
            return $args;
        }
        $off = self::all_disabled_ids();
        if (!empty($off)) {
            $existing         = isset($args['exclude']) ? (array)$args['exclude'] : [];
            $args['exclude']  = array_unique(array_merge($existing, $off));
        }
        return $args;
    }

    public static function graphql_filter_products(array $args): array {
        $off = self::all_disabled_ids();
        if (empty($off)) return $args;

        $tq   = $args['tax_query'] ?? [];
        $tq[] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $off,
            'operator' => 'NOT IN',
        ];
        $args['tax_query'] = $tq;
        return $args;
    }

    // ─── Helpers ─────────────────────────────────────────────────────────

    private static function disabled_ids(): array {
        $data = get_option(self::OPT, []);
        return is_array($data) ? array_map('intval', $data) : [];
    }

    // Returns disabled IDs + all their descendant IDs
    private static function all_disabled_ids(): array {
        static $running = false;
        if ($running) return []; // prevent re-entry: get_terms→get_terms_args→all_disabled_ids→get_term_children→get_terms loop
        $running = true;

        $disabled = self::disabled_ids();
        if (empty($disabled)) {
            $running = false;
            return [];
        }

        $all = $disabled;
        foreach ($disabled as $id) {
            $children = get_term_children($id, 'product_cat');
            if (!is_wp_error($children)) {
                $all = array_merge($all, $children);
            }
        }
        $running = false;
        return array_unique($all);
    }
}

HWS_Cat_Toggle::init();
