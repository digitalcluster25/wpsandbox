<?php
/**
 * Plugin Name: HWS Bulk Price Markup
 * Description: Массовая наценка товаров по бренду/категории/подкатегории.
 * Version: 1.0.0
 */

defined('ABSPATH') || exit;

final class HWS_Bulk_Markup {

    public static function init(): void {
        add_action('admin_menu',                   [__CLASS__, 'admin_menu']);
        add_action('wp_ajax_hws_markup_terms',     [__CLASS__, 'ajax_terms']);
        add_action('wp_ajax_hws_markup_count',     [__CLASS__, 'ajax_count']);
        add_action('wp_ajax_hws_markup_apply',     [__CLASS__, 'ajax_apply']);
    }

    public static function admin_menu(): void {
        add_submenu_page(
            'woocommerce',
            'Массовая наценка',
            'Массовая наценка',
            'manage_woocommerce',
            'hws-bulk-markup',
            [__CLASS__, 'render_page']
        );
    }

    public static function render_page(): void {
        $brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => true, 'orderby' => 'name']);
        $cats   = get_terms(['taxonomy' => 'product_cat',   'hide_empty' => true, 'parent'   => 0, 'orderby' => 'name']);
        ?>
        <div class="wrap" style="max-width:700px">
            <h1>Массовая наценка товаров</h1>

            <div style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:24px;margin-bottom:20px">
                <table class="form-table" style="max-width:100%">
                    <tr>
                        <th style="width:160px">Бренд</th>
                        <td>
                            <select id="hws-brand" style="width:100%;max-width:400px">
                                <option value="">— Все бренды —</option>
                                <?php if (!is_wp_error($brands)) foreach ($brands as $t): ?>
                                <option value="<?php echo esc_attr($t->term_id); ?>"><?php echo esc_html($t->name); ?> (<?php echo $t->count; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Категория</th>
                        <td>
                            <select id="hws-cat" style="width:100%;max-width:400px">
                                <option value="">— Все категории —</option>
                                <?php if (!is_wp_error($cats)) foreach ($cats as $t): ?>
                                <option value="<?php echo esc_attr($t->term_id); ?>"><?php echo esc_html($t->name); ?> (<?php echo $t->count; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Подкатегория</th>
                        <td>
                            <select id="hws-subcat" style="width:100%;max-width:400px" disabled>
                                <option value="">— Выберите категорию —</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Наценка %</th>
                        <td>
                            <input type="number" id="hws-pct" value="10" min="-99" max="1000" step="0.1" style="width:120px">
                            <span style="margin-left:8px;color:#666">% (отрицательное = скидка)</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Применять к</th>
                        <td>
                            <label><input type="radio" name="hws-price-type" value="regular" checked> Обычная цена</label>&nbsp;&nbsp;
                            <label><input type="radio" name="hws-price-type" value="sale"> Цена со скидкой</label>&nbsp;&nbsp;
                            <label><input type="radio" name="hws-price-type" value="both"> Обе</label>
                        </td>
                    </tr>
                </table>

                <div style="margin-top:16px;display:flex;gap:12px;align-items:center">
                    <button class="button" id="hws-count-btn">Посчитать товары</button>
                    <button class="button button-primary" id="hws-apply-btn" disabled>▶ Применить наценку</button>
                    <button class="button" id="hws-stop-btn" style="display:none">⏹ Остановить</button>
                    <span id="hws-count-label" style="color:#666"></span>
                </div>
            </div>

            <div id="hws-progress-wrap" style="display:none;background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:20px">
                <div style="height:20px;background:#f0f0f1;border-radius:10px;overflow:hidden;margin-bottom:8px">
                    <div id="hws-bar" style="height:100%;background:#2271b1;border-radius:10px;width:0%;transition:width .3s"></div>
                </div>
                <div id="hws-bar-label" style="margin-bottom:12px;font-size:13px">0 / 0</div>
                <div id="hws-log" style="max-height:250px;overflow-y:auto;background:#f6f7f7;border:1px solid #ddd;
                    padding:10px;font-family:monospace;font-size:12px;border-radius:4px"></div>
            </div>
        </div>

        <script>
        (function($){
            var nonce   = <?php echo wp_json_encode(wp_create_nonce('hws_bulk_markup')); ?>;
            var ajaxUrl = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;
            var running = false;
            var ids     = [];
            var done    = 0;

            // Load subcategories on category change
            $('#hws-cat').on('change', function(){
                var catId = $(this).val();
                var $sub  = $('#hws-subcat');
                $sub.html('<option value="">Загрузка…</option>').prop('disabled', true);
                if (!catId) {
                    $sub.html('<option value="">— Подкатегория —</option>').prop('disabled', false);
                    return;
                }
                $.post(ajaxUrl, { action: 'hws_markup_terms', parent: catId, _ajax_nonce: nonce }, function(r){
                    $sub.html('<option value="">— Все подкатегории —</option>');
                    if (r.success && r.data.length) {
                        $.each(r.data, function(_, t){
                            $sub.append('<option value="' + t.id + '">' + t.name + ' (' + t.count + ')</option>');
                        });
                        $sub.prop('disabled', false);
                    } else {
                        $sub.html('<option value="">— Нет подкатегорий —</option>');
                    }
                });
            });

            $('#hws-count-btn').on('click', function(){
                loadIds(function(cnt){
                    $('#hws-count-label').text('Найдено товаров: ' + cnt);
                    $('#hws-apply-btn').prop('disabled', cnt === 0);
                });
            });

            function loadIds(cb) {
                $.post(ajaxUrl, {
                    action: 'hws_markup_count',
                    brand:  $('#hws-brand').val(),
                    cat:    $('#hws-subcat').val() || $('#hws-cat').val(),
                    _ajax_nonce: nonce
                }, function(r){
                    if (r.success) { ids = r.data.ids; cb(ids.length); }
                });
            }

            $('#hws-apply-btn').on('click', function(){
                if (!confirm('Применить наценку ' + $('#hws-pct').val() + '% к ' + ids.length + ' товарам?')) return;
                running = true;
                done    = 0;
                $(this).hide();
                $('#hws-stop-btn').show();
                $('#hws-progress-wrap').show();
                $('#hws-log').empty();
                log('Запуск… (' + ids.length + ' товаров)', 'info');
                processNext();
            });

            $('#hws-stop-btn').on('click', function(){
                running = false;
                log('Остановлено', 'info');
                finish();
            });

            function processNext(){
                if (!running || done >= ids.length) {
                    if (running) log('✓ Готово', 'ok');
                    running = false;
                    finish();
                    return;
                }
                var id = ids[done];
                $.post(ajaxUrl, {
                    action:      'hws_markup_apply',
                    product_id:  id,
                    pct:         $('#hws-pct').val(),
                    price_type:  $('input[name="hws-price-type"]:checked').val(),
                    _ajax_nonce: nonce
                }, function(r){
                    done++;
                    updateBar(done, ids.length);
                    if (r.success) {
                        var d = r.data;
                        log('✓ #' + id + ' ' + d.title + '  ' + d.old_price + ' → ' + d.new_price, 'ok');
                    } else {
                        log('✗ #' + id + ' — ' + (r.data || '?'), 'err');
                    }
                    setTimeout(processNext, 50);
                }).fail(function(){
                    log('Сетевая ошибка, повтор…', 'err');
                    setTimeout(processNext, 2000);
                });
            }

            function updateBar(d, t){
                var pct = t > 0 ? Math.round(d/t*100) : 0;
                $('#hws-bar').css('width', pct + '%');
                $('#hws-bar-label').text(d + ' / ' + t + '  (' + pct + '%)');
            }

            function finish(){
                $('#hws-stop-btn').hide();
                $('#hws-apply-btn').show().prop('disabled', false);
            }

            function log(msg, cls){
                var colors = {ok:'#2a7e2e', err:'#b32d2e', info:'#2271b1'};
                var ts = new Date().toLocaleTimeString();
                $('#hws-log').append('<div style="color:' + (colors[cls]||'#333') + '">[' + ts + '] ' + msg + '</div>');
                var el = document.getElementById('hws-log');
                el.scrollTop = el.scrollHeight;
            }
        })(jQuery);
        </script>
        <?php
    }

    // ─── AJAX: subcategory terms ──────────────────────────────────────────

    public static function ajax_terms(): void {
        check_ajax_referer('hws_bulk_markup');
        if (!current_user_can('manage_woocommerce')) wp_die();

        $parent = absint($_POST['parent'] ?? 0);
        $terms  = get_terms(['taxonomy' => 'product_cat', 'parent' => $parent, 'hide_empty' => true, 'orderby' => 'name']);

        if (is_wp_error($terms) || empty($terms)) {
            wp_send_json_success([]);
        }

        wp_send_json_success(array_map(fn($t) => [
            'id'    => $t->term_id,
            'name'  => $t->name,
            'count' => $t->count,
        ], $terms));
    }

    // ─── AJAX: count / list product IDs ──────────────────────────────────

    public static function ajax_count(): void {
        check_ajax_referer('hws_bulk_markup');
        if (!current_user_can('manage_woocommerce')) wp_die();

        $ids = self::query_ids(
            absint($_POST['brand'] ?? 0),
            absint($_POST['cat']   ?? 0)
        );

        wp_send_json_success(['ids' => $ids]);
    }

    // ─── AJAX: apply markup to one product ───────────────────────────────

    public static function ajax_apply(): void {
        check_ajax_referer('hws_bulk_markup');
        if (!current_user_can('manage_woocommerce')) wp_die();

        $product_id = absint($_POST['product_id'] ?? 0);
        $pct        = (float)($_POST['pct'] ?? 0);
        $type       = sanitize_key($_POST['price_type'] ?? 'regular');

        $product = wc_get_product($product_id);
        if (!$product) {
            wp_send_json_error('Товар не найден');
        }

        $multiplier = 1 + $pct / 100;
        $old_price  = $product->get_regular_price();

        // Apply to simple product or parent (variable shows no price itself)
        if ($product->is_type('variable')) {
            $variations = $product->get_children();
            foreach ($variations as $var_id) {
                self::update_price(wc_get_product($var_id), $type, $multiplier);
            }
            $new_price = '(переменный)';
        } else {
            self::update_price($product, $type, $multiplier);
            $new_price = $product->get_regular_price() . ' ₽';
        }

        wp_send_json_success([
            'title'     => $product->get_name(),
            'old_price' => $old_price ? $old_price . ' ₽' : '—',
            'new_price' => $new_price,
        ]);
    }

    // ─── Helpers ─────────────────────────────────────────────────────────

    private static function update_price(\WC_Product $product, string $type, float $multiplier): void {
        if (in_array($type, ['regular', 'both'], true)) {
            $price = (float)$product->get_regular_price();
            if ($price > 0) {
                $new = round($price * $multiplier, 2);
                $product->set_regular_price($new);
            }
        }
        if (in_array($type, ['sale', 'both'], true)) {
            $price = (float)$product->get_sale_price();
            if ($price > 0) {
                $new = round($price * $multiplier, 2);
                $product->set_sale_price($new);
            }
        }
        $product->save();
    }

    private static function query_ids(int $brand_id, int $cat_id): array {
        $tax_query = [['relation' => 'AND']];

        if ($brand_id) {
            $tax_query[] = [
                'taxonomy' => 'product_brand',
                'field'    => 'term_id',
                'terms'    => $brand_id,
            ];
        }
        if ($cat_id) {
            $tax_query[] = [
                'taxonomy'         => 'product_cat',
                'field'            => 'term_id',
                'terms'            => $cat_id,
                'include_children' => true,
            ];
        }

        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => count($tax_query) > 1 ? $tax_query : [],
        ];

        $q = new WP_Query($args);
        return array_map('intval', $q->posts);
    }
}

HWS_Bulk_Markup::init();
