<?php
/**
 * Plugin Name: HWS Specs Groups
 * Description: Grouped product specifications metabox for WooCommerce.
 * Version: 0.1.0
 * Author: HWS
 */

if (!defined('ABSPATH')) exit;

final class HWS_Specs_Groups {
    private const META_KEY = '_hws_specs_groups';

    public static function init(): void {
        add_action('add_meta_boxes', [__CLASS__, 'add_metabox']);
        add_action('save_post_product', [__CLASS__, 'save'], 10, 1);
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
    }

    public static function add_metabox(): void {
        add_meta_box(
            'hws_specs_groups',
            'Характеристики (по группам)',
            [__CLASS__, 'render_metabox'],
            'product',
            'normal',
            'default'
        );
    }

    public static function get_specs(int $product_id): array {
        $data = get_post_meta($product_id, self::META_KEY, true);
        return is_array($data) ? $data : [];
    }

    public static function render_metabox(\WP_Post $post): void {
        wp_nonce_field('hws_specs_groups_save', 'hws_specs_groups_nonce');
        $groups = self::get_specs($post->ID);
        if (empty($groups)) {
            $groups = [['title' => 'Характеристики', 'rows' => [['label' => '', 'value' => '']]]];
        }
        ?>
        <div id="hws-specs-groups-wrap">
            <?php foreach ($groups as $gi => $group): ?>
            <div class="hws-sg-group" data-gi="<?php echo $gi; ?>">
                <div class="hws-sg-group-header" style="margin-bottom:8px">
                    <input type="text" class="hws-sg-group-title"
                           name="hws_specs[<?php echo $gi; ?>][title]"
                           value="<?php echo esc_attr($group['title'] ?? ''); ?>"
                           placeholder="Название группы" style="font-weight:700;font-size:14px;width:300px;" />
                    <button type="button" class="button hws-sg-remove-group">&times; Удалить группу</button>
                </div>
                <table class="widefat hws-sg-table">
                    <thead><tr><th style="width:40%">Название</th><th style="width:55%">Значение</th><th style="width:5%"></th></tr></thead>
                    <tbody>
                    <?php
                    $rows = $group['rows'] ?? [];
                    if (empty($rows)) $rows = [['label' => '', 'value' => '']];
                    foreach ($rows as $ri => $row): ?>
                        <tr>
                            <td><input type="text" name="hws_specs[<?php echo $gi; ?>][rows][<?php echo $ri; ?>][label]"
                                       value="<?php echo esc_attr($row['label'] ?? ''); ?>" style="width:100%" /></td>
                            <td><input type="text" name="hws_specs[<?php echo $gi; ?>][rows][<?php echo $ri; ?>][value]"
                                       value="<?php echo esc_attr($row['value'] ?? ''); ?>" style="width:100%" /></td>
                            <td><button type="button" class="button hws-sg-remove-row">&times;</button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p><button type="button" class="button hws-sg-add-row">+ Добавить строку</button></p>
                <hr style="margin:16px 0" />
            </div>
            <?php endforeach; ?>
            <p><button type="button" class="button button-secondary" id="hws-sg-add-group">+ Добавить группу</button></p>
        </div>
        <?php
    }

    public static function save(int $post_id): void {
        if (!isset($_POST['hws_specs_groups_nonce']) ||
            !wp_verify_nonce($_POST['hws_specs_groups_nonce'], 'hws_specs_groups_save')) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $post_id)) return;

        $raw = isset($_POST['hws_specs']) && is_array($_POST['hws_specs']) ? $_POST['hws_specs'] : [];
        $clean = [];

        foreach ($raw as $group) {
            $title = sanitize_text_field($group['title'] ?? '');
            $rows = [];
            if (!empty($group['rows']) && is_array($group['rows'])) {
                foreach ($group['rows'] as $row) {
                    $label = sanitize_text_field($row['label'] ?? '');
                    $value = sanitize_text_field($row['value'] ?? '');
                    if ($label !== '' || $value !== '') {
                        $rows[] = ['label' => $label, 'value' => $value];
                    }
                }
            }
            if (!empty($rows) || $title !== '') {
                $clean[] = ['title' => $title, 'rows' => $rows];
            }
        }

        update_post_meta($post_id, self::META_KEY, $clean);
    }

    public static function enqueue_scripts(string $hook): void {
        if (!in_array($hook, ['post.php', 'post-new.php'])) return;
        global $post;
        if (!$post || $post->post_type !== 'product') return;

        wp_add_inline_script('jquery-core', "
jQuery(function($){
    var wrap = $('#hws-specs-groups-wrap');
    if (!wrap.length) return;

    function reindex() {
        wrap.find('.hws-sg-group').each(function(gi){
            $(this).attr('data-gi', gi);
            $(this).find('.hws-sg-group-title').attr('name', 'hws_specs['+gi+'][title]');
            $(this).find('.hws-sg-table tbody tr').each(function(ri){
                $(this).find('input').each(function(){
                    var field = $(this).closest('td').index() === 0 ? 'label' : 'value';
                    $(this).attr('name', 'hws_specs['+gi+'][rows]['+ri+']['+field+']');
                });
            });
        });
    }

    wrap.on('click', '.hws-sg-add-row', function(){
        var tbody = $(this).closest('.hws-sg-group').find('tbody');
        tbody.append('<tr><td><input type=\"text\" style=\"width:100%\"></td><td><input type=\"text\" style=\"width:100%\"></td><td><button type=\"button\" class=\"button hws-sg-remove-row\">&times;</button></td></tr>');
        reindex();
    });

    wrap.on('click', '.hws-sg-remove-row', function(){
        $(this).closest('tr').remove();
        reindex();
    });

    wrap.on('click', '.hws-sg-remove-group', function(){
        $(this).closest('.hws-sg-group').remove();
        reindex();
    });

    $('#hws-sg-add-group').on('click', function(){
        var html = '<div class=\"hws-sg-group\">'
            + '<div class=\"hws-sg-group-header\" style=\"margin-bottom:8px\">'
            + '<input type=\"text\" class=\"hws-sg-group-title\" placeholder=\"Название группы\" style=\"font-weight:700;font-size:14px;width:300px;\" />'
            + ' <button type=\"button\" class=\"button hws-sg-remove-group\">&times; Удалить группу</button>'
            + '</div>'
            + '<table class=\"widefat hws-sg-table\"><thead><tr><th style=\"width:40%\">Название</th><th style=\"width:55%\">Значение</th><th style=\"width:5%\"></th></tr></thead>'
            + '<tbody><tr><td><input type=\"text\" style=\"width:100%\"></td><td><input type=\"text\" style=\"width:100%\"></td><td><button type=\"button\" class=\"button hws-sg-remove-row\">&times;</button></td></tr></tbody></table>'
            + '<p><button type=\"button\" class=\"button hws-sg-add-row\">+ Добавить строку</button></p><hr style=\"margin:16px 0\" />'
            + '</div>';
        $(this).before(html);
        reindex();
    });
});
");
    }
}

HWS_Specs_Groups::init();
