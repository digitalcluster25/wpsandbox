<?php

add_action( 'admin_menu', 'register_ohio_hub_page' );
function register_ohio_hub_page() {
    $side_menu_title = sprintf( '%s%s', __( 'Ohio Theme', 'ohio-extra' ), get_plugins_to_update_label() );
    add_menu_page(
        'Ohio Theme',
        $side_menu_title,
        'edit_others_posts',
        'ohio_hub',
        false,
        get_template_directory_uri() . '/inc/tgmpa/theme_settings.png', // icon
        2 // order
    );
}

add_filter( 'option_page_capability_ohio_hub', 'ohio_hub_capability' );
function ohio_hub_capability( $capability ) {
    return 'edit_others_posts';
}

/**
 * Subpages
 */

// Dashboard
add_action( 'admin_menu', 'register_ohio_hub_subpage_dashboard' );
function register_ohio_hub_subpage_dashboard() {
    $submenu_name = sprintf( '%s%s', __( 'Dashboard', 'ohio-extra' ), get_plugins_to_update_label() );
    add_submenu_page( 'ohio_hub', 'Help page', $submenu_name, 'edit_others_posts', 'ohio_hub', 'ohio_hub_dashboard_page' );
}
function prepare_plugin_meta() {
    $ordered_plugins = [
        'ohio-extra' => [
            'description' => __( 'Supercharge your WordPress site.', 'ohio-extra' ),
            'is_premium' => false,
        ],
        'ohio-importer' => [
            'description' => __( 'Import demo templates.', 'ohio-extra' ),
            'is_premium' => false,
        ],
        'ohio-portfolio' => [
            'description' => __( 'Enables portfolio functionality.', 'ohio-extra' ),
            'is_premium' => false,
        ],
        'advanced-custom-fields-pro' => [
            'description' => __( 'Enables Theme Settings panel.', 'ohio-extra' ),
            'is_premium' => true,
        ],
        'slider-revolution' => [
            'description' => __( 'Create captivating slideshows.', 'ohio-extra' ),
            'is_premium' => true,
        ],
        'js_composer' => [
            'description' => __( 'Front-end and back-end editors.', 'ohio-extra' ),
            'is_premium' => true,
        ],
        'contact-form-7' => [
            'description' => __( 'Subscribe and contact forms.', 'ohio-extra' ),
            'is_premium' => false,
        ],
        'elementor' => [
            'description' => __( 'Drag & drop page builder.', 'ohio-extra' ),
            'is_premium' => false,
        ],
        'woocommerce' => [
            'description' => __( 'Store functionality for your site.', 'ohio-extra' ),
            'is_premium' => false,
        ]
    ];

    global $tgmpa;
    foreach ( $ordered_plugins as $slug => &$meta ) {
        $meta['name'] = $tgmpa->plugins[$slug]['name'];
        $meta['is_active'] = $tgmpa->is_plugin_active( $slug );
        $meta['is_installed'] = $tgmpa->is_plugin_installed( $slug );
        $meta['needs_update'] = $tgmpa->is_plugin_updatetable( $slug );
        $meta['current_version'] = $tgmpa->get_installed_version( $slug );
    }

    return $ordered_plugins;
}

function get_plugins_to_update_count( $plugin_meta ) {
    $plugins_need_update = 0;
    foreach ( array_values( $plugin_meta ) as $meta ) {
        if ( $meta['needs_update'] ) {
            $plugins_need_update++;
        }
    }

    return $plugins_need_update;
}

function get_plugins_to_update_label() {
    $plugins_need_update = get_plugins_to_update_count( prepare_plugin_meta() );

    if ( $plugins_need_update > 0 ) {
        ob_start();
        ?>
            <span class="update-plugins count-<?php echo $plugins_need_update; ?>">
                <span class="plugin-count">
                    <?php echo $plugins_need_update; ?>
                </span>
            </span>
        <?php
        return ob_get_clean();
    }

    return '';
}

function ohio_hub_dashboard_page() {
    $ordered_plugins = prepare_plugin_meta();
    $plugins_need_update = get_plugins_to_update_count( $ordered_plugins );
    include 'pages/dashboard-page.php';
}

// Settings
add_action( 'admin_menu', 'register_ohio_hub_subpage_settings' );
function register_ohio_hub_subpage_settings() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Theme Settings', 'edit_others_posts', 'ohio_hub_settings', 'ohio_hub_settings_page' ); 
}
function ohio_hub_settings_page() {
    include 'pages/settings-page.php';
}

// AJAX license registration and removing
add_action( 'wp_ajax_ohio_save_license_code', 'ohio_save_license_code' );
function ohio_save_license_code() {
    $data = str_replace( '\"', '"', $_POST['license'] );
    $data = json_decode( $data );

    if ( !$data ) return false;

    if ( !empty( $data->code ) && !empty( $data->sold_at ) && !empty( $data->supported_until ) ) {
        add_option( 'ohio_license_code', $data->code );
        add_option( 'ohio_license_sold_at', $data->sold_at );

        $timestamp = ( new \DateTime( $data->supported_until ) )->getTimestamp();
        add_option( 'ohio_license_support_until', $timestamp );

        if ( !empty( $data->type ) ) {
            add_option( 'ohio_license_type', $data->type );
        }

        if ( !empty( $data->buyer ) ) {
            add_option( 'ohio_buyer_username', $data->buyer );
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_remove_license_code', 'ohio_remove_license_code' );
function ohio_remove_license_code() {
    $response = wp_remote_post( 'https://demo.clbthemes.com/v1/deregister', [
        'timeout' => 15,
        'redirection' => 15,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => [
            'X-COLABRIO-REFERER' => 'https://' . $_SERVER['HTTP_HOST']
        ],
        'cookies' => [],
        'body' => [
            'code' => get_option( 'ohio_license_code', '' )
        ],
    ] );

    if ( !is_wp_error( $response ) && $response['body'] == 'OK' ) {
        delete_option( 'ohio_license_code' );
        delete_option( 'ohio_license_sold_at' );
        delete_option( 'ohio_license_support_until' );
        delete_option( 'ohio_license_type' );
        delete_option( 'ohio_buyer_username' );
    } else {
        // error_log(json_encode($response['body']));
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_check_last_version', 'ohio_check_last_version' );
function ohio_check_last_version() {
    $ohio_theme = wp_get_theme( get_template() );
    $current = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '3.0.0';
    $response = wp_remote_get( 'https://demo.clbthemes.com/v1/version/ohio' );
    $actual = wp_remote_retrieve_body( $response );

    echo json_encode([
        'current' => $current,
        'actual' => $actual
    ]);

    update_option( 'ohio_last_available_version', $actual );

    wp_die();
}

/* Sync other languages */
add_action( 'wp_ajax_ohio_sync_settings_with_main_lang', 'ohio_sync_settings_with_main_lang' );
function ohio_sync_settings_with_main_lang() {
    $current_lang = $_POST['current_lang'];
    if ( ! $current_lang) wp_die();

    function ohio_mock_acf_post_id($post_id) {
        return 'options';
    }

    add_filter( 'acf/validate_post_id', 'ohio_mock_acf_post_id' );
    $options = get_field_objects( 'options' );

    $values = [];
    foreach ( $options as $field ) {
        $values[$field['name']] = get_field( $field['name'], 'options', false );
    }

    remove_filter( 'acf/validate_post_id', 'ohio_mock_acf_post_id' );
    foreach ($values as $key => $value) {
        update_field( $key, $value, 'options_' . $current_lang );
    }

    wp_die( 'OK' );
}

add_action( 'wp_ajax_ohio_update_supported_until', 'ohio_update_supported_until' );
function ohio_update_supported_until() {
    $license_code = get_option( 'ohio_license_code' );
    $timestamp_raw = wp_remote_retrieve_body( wp_remote_get( 'https://demo.clbthemes.com/v1/supported-until/' . $license_code ), [
        'headers' => [
            'X-COLABRIO-REFERER' => 'https://' . $_SERVER['HTTP_HOST']
        ],
    ]);

    if ( empty( $timestamp_raw ) ) {
        wp_die();
        return;
    }

    $timestamp = ( new \DateTime( $timestamp_raw ) )->getTimestamp();

    update_option( 'ohio_license_support_until', $timestamp );

    wp_die();
}

// License message
add_action( 'admin_notices', 'ohio_hub_license_notice' );
function ohio_hub_license_notice() {
    if ( ! get_option( 'ohio_license_code', '' ) ): ?>
    <div class="notice o-notice activation warning is-dismissible -hidden">
        <i class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
        </i>
        <div class="holder">
            <p class="title"><?php _e( 'License activation is required!', 'ohio-extra' ); ?></p>
            <?php _e( 'Activate your license to be able to use all the built-in features.', 'ohio-extra' ); ?>
            <div class="_button-group">
                <a class="btn" href="admin.php?page=ohio_hub">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M684-180v-108H576v-72h108v-108h72v108h108v72H756v108h-72ZM432-288H288q-79.68 0-135.84-56.23Q96-400.45 96-480.23 96-560 152.16-616q56.16-56 135.84-56h144v72H288q-50 0-85 35t-35 85q0 50 35 85t85 35h144v72Zm-96-156v-72h288v72H336Zm528-36h-72q0-50-35-85t-85-35H528v-72h144q79.68 0 135.84 56.16T864-480Z"/></svg>
                    <?php _e( 'Connect & Activate', 'ohio-extra' ); ?>
                </a>
                <a class="btn btn-flat" target="_blank" href="https://1.envato.market/5Q25j"><?php _e( 'Buy License', 'ohio-extra' ); ?></a>
            </div>
        </div>
    </div>
    <?php endif;
}

add_action( 'admin_notices', 'ohio_hub_save_settings_notice' );
function ohio_hub_save_settings_notice() {
    ?>
    <div class="notice o-notice o-notice-settings success notice-success">
        <i class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M382-336.16 176.92-541.23 219.69-584 382-421.69 740.31-780l42.77 42.77L382-336.16ZM220-180v-60h520v60H220Z"/></svg>
        </i>
        <div class="holder">
            <?php _e( 'Theme Settings have been successfully updated.', 'ohio-extra' ); ?>
        </div>
    </div>
    <div class="notice o-notice o-notice-settings error notice-error is-dismissible">
        <i class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
        </i>
        <div class="holder">
            <?php _e( 'Oops, something went wrong. Please try again.', 'ohio-extra' ); ?>
        </div>
    </div>
    <?php
}

function ohio_export_theme_settings() {
    global $wpdb;

    $options = $wpdb->get_results( 'SELECT option_name, option_value FROM ' . $wpdb->options .' WHERE option_name LIKE "%options_global%" AND option_name NOT LIKE "%_google_maps_api_key"' );

    echo json_encode( $options );
    wp_die();
}

add_action( 'wp_ajax_ohio_export_theme_settings', 'ohio_export_theme_settings' );

function ohio_import_theme_settings() {
    global $wpdb;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $settings = json_decode( file_get_contents( $_FILES['settings']['tmp_name'] ) );
    if ( ! empty( $settings ) ) {
        $options_table = $wpdb->prefix . 'options';
        foreach ( $settings as $key => $value ) {
            if ( ! empty( $value->option_name ) && ! empty ( $value->option_value ) ) {
                $exists = $wpdb->get_var( $wpdb->prepare('SELECT COUNT(*) FROM ' . $options_table . ' WHERE option_name = %s', $value->option_name ) );
                if ( $exists ) {
                    $wpdb->update( $options_table, ['option_value' => $value->option_value], ['option_name' => $value->option_name], ['%s'] );
                } else {
                    $wpdb->insert( $options_table, ['option_value' => $value->option_value, 'option_name' => $value->option_name, 'autoload' => 'no'], ['%s', '%s', '%s'] );
                }
            }
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_import_theme_settings', 'ohio_import_theme_settings' );

function ohio_reset_theme_settings() {
    global $wpdb;

    check_admin_referer( 'ohio_reset_theme_settings' );

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $options_table = $wpdb->prefix . 'options';
    $wpdb->query( 'DELETE FROM ' . $options_table . ' WHERE option_name LIKE "%options_global%"' );

    wp_die();
}

add_action( 'wp_ajax_ohio_reset_theme_settings', 'ohio_reset_theme_settings' );

include 'ohio-options-pages-class.php';
