<?php
/**
 * Plugin Name: HWS Adminko API (compat shim)
 * Description: Minimal compatibility REST endpoints for hws-adminko local development.
 * Version: 0.1.0
 * Author: Dev
 */

defined('ABSPATH') || exit;

// Activation: ensure there is a stored API key for adminko
register_activation_hook(__FILE__, function () {
    $opt = get_option('hws_adminko_api_key', '');
    if (empty($opt)) {
        $key = bin2hex(random_bytes(16));
        update_option('hws_adminko_api_key', $key);
        @file_put_contents(plugin_dir_path(__FILE__) . 'adminko_key.txt', $key);
    }
});

function hws_adminko_check_key($request) {
    // header lookup is case-insensitive in WP
    $provided = $request->get_header('x-adminko-key');
    $provided = is_array($provided) ? $provided[0] : $provided;
    $provided = trim((string)$provided);
    $env = getenv('ADMINKO_API_KEY');
    $stored = get_option('hws_adminko_api_key', '');
    $expected = $env ?: $stored;
    $expected = trim((string)$expected);
    // tolerate accidental trailing percent or whitespace from environment/echo
    $provided = rtrim($provided, "%\r\n\t %");
    $expected = rtrim($expected, "%\r\n\t %");
    if ($expected === '' || $provided === '') return false;
    return hash_equals($expected, $provided);
}

add_action('rest_api_init', function () {
    register_rest_route('hws-adminko/v1', '/settings/commerce-info', array(
        'methods' => array('GET', 'POST'),
        'callback' => function ($request) {
            if ($request->get_method() === 'GET') {
                $v = get_option('hws_adminko_commerce_info', array());
                return rest_ensure_response($v);
            }
            $body = $request->get_body();
            $data = json_decode($body, true);
            if (is_null($data)) return new WP_Error('invalid_json', 'Invalid JSON', array('status' => 400));
            // Merge incoming patch with existing commerce info so partial updates
            // (PUT/POST from adminko) don't erase other vendor entries.
            $existing = get_option('hws_adminko_commerce_info', array());
            if (!is_array($existing)) $existing = array();
            if (!is_array($data)) $data = array();
            $merged = array_replace_recursive($existing, $data);
            update_option('hws_adminko_commerce_info', $merged);
            return rest_ensure_response($merged);
        },
        'permission_callback' => function ($request) { return hws_adminko_check_key($request); },
    ));

    register_rest_route('hws-adminko/v1', '/filters/(?P<id>\d+)', array(
        array(
            'methods' => 'GET',
            'callback' => function ($request) {
                $id = $request['id'];
                $all = get_option('hws_adminko_filters', array());
                return rest_ensure_response(isset($all[$id]) ? $all[$id] : array());
            },
            'permission_callback' => function ($request) { return hws_adminko_check_key($request); },
        ),
        array(
            'methods' => 'POST',
            'callback' => function ($request) {
                $id = $request['id'];
                $data = json_decode($request->get_body(), true);
                if (is_null($data)) return new WP_Error('invalid_json', 'Invalid JSON', array('status' => 400));
                $all = get_option('hws_adminko_filters', array());
                $all[$id] = $data;
                update_option('hws_adminko_filters', $all);
                return rest_ensure_response($data);
            },
            'permission_callback' => function ($request) { return hws_adminko_check_key($request); },
        ),
    ));

    register_rest_route('hws-adminko/v1', '/settings/markup', array(
        'methods' => array('GET', 'POST'),
        'callback' => function ($request) {
            if ($request->get_method() === 'GET') {
                return rest_ensure_response(get_option('hws_adminko_markup', array()));
            }
            $data = json_decode($request->get_body(), true);
            if (is_null($data)) return new WP_Error('invalid_json', 'Invalid JSON', array('status' => 400));
            update_option('hws_adminko_markup', $data);
            return rest_ensure_response($data);
        },
        'permission_callback' => function ($request) { return hws_adminko_check_key($request); },
    ));
});
