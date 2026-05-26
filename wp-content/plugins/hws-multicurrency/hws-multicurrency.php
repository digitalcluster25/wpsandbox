<?php
/**
 * Plugin Name: HWS Multicurrency
 * Description: Displays WooCommerce USD prices in UZS/AZN by visitor country using official central bank rates.
 * Version: 0.1.0
 * Author: HWS
 */

if (!defined('ABSPATH')) {
    exit;
}

final class HWS_Multicurrency {
    private const BASE = 'USD';
    private const COOKIE = 'hws_currency';
    private const OPTION_RATES = 'hws_multicurrency_rates';
    private const CRON_HOOK = 'hws_multicurrency_update_rates';

    private static ?string $currency = null;

    public static function init(): void {
        add_action('init', [__CLASS__, 'maybe_set_currency_cookie'], 1);
        add_action('init', [__CLASS__, 'schedule_rate_updates']);
        add_action(self::CRON_HOOK, [__CLASS__, 'update_rates']);

        add_filter('woocommerce_currency', [__CLASS__, 'woocommerce_currency']);
        add_filter('woocommerce_currency_symbol', [__CLASS__, 'currency_symbol'], 10, 2);
        add_filter('wc_price_args', [__CLASS__, 'price_args']);

        foreach ([
            'woocommerce_product_get_price',
            'woocommerce_product_get_regular_price',
            'woocommerce_product_get_sale_price',
            'woocommerce_product_variation_get_price',
            'woocommerce_product_variation_get_regular_price',
            'woocommerce_product_variation_get_sale_price',
            'woocommerce_variation_prices_price',
            'woocommerce_variation_prices_regular_price',
            'woocommerce_variation_prices_sale_price',
        ] as $filter) {
            add_filter($filter, [__CLASS__, 'convert_price'], 20, 2);
        }

        add_filter('woocommerce_get_variation_prices_hash', [__CLASS__, 'variation_prices_hash'], 20, 3);
        add_shortcode('hws_currency_switcher', [__CLASS__, 'currency_switcher_shortcode']);

        if (!self::rates_are_fresh()) {
            add_action('wp_loaded', [__CLASS__, 'update_rates']);
        }
    }

    public static function activate(): void {
        self::update_rates();
        self::schedule_rate_updates();
    }

    public static function deactivate(): void {
        wp_clear_scheduled_hook(self::CRON_HOOK);
    }

    public static function schedule_rate_updates(): void {
        if (!wp_next_scheduled(self::CRON_HOOK)) {
            wp_schedule_event(time() + HOUR_IN_SECONDS, 'twicedaily', self::CRON_HOOK);
        }
    }

    public static function maybe_set_currency_cookie(): void {
        if (is_admin() && !wp_doing_ajax()) {
            return;
        }

        $requested = isset($_GET['hws_currency']) ? strtoupper(sanitize_text_field(wp_unslash($_GET['hws_currency']))) : '';
        if ($requested && self::is_supported_currency($requested)) {
            self::$currency = $requested;
            self::set_cookie($requested);
        }
    }

    public static function woocommerce_currency(string $currency): string {
        if (is_admin() && !wp_doing_ajax()) {
            return $currency;
        }

        return self::current_currency();
    }

    public static function currency_symbol(string $symbol, string $currency): string {
        $symbols = [
            'USD' => '$',
            'UZS' => 'сум',
            'AZN' => '₼',
        ];

        return $symbols[$currency] ?? $symbol;
    }

    public static function price_args(array $args): array {
        $currency = self::current_currency();
        if ($currency === 'UZS') {
            $args['decimals'] = 0;
            $args['price_format'] = '%2$s&nbsp;%1$s';
        } elseif ($currency === 'AZN') {
            $args['decimals'] = 0;
            $args['price_format'] = '%1$s%2$s';
        } else {
            $args['decimals'] = 0;
            $args['price_format'] = '%1$s%2$s';
        }

        return $args;
    }

    public static function convert_price($price, $product = null) {
        if ($price === '' || $price === null) {
            return $price;
        }

        if (is_admin() && !wp_doing_ajax()) {
            return $price;
        }

        $currency = self::current_currency();
        if ($currency === self::BASE) {
            return $price;
        }

        $rate = self::rate_for($currency);
        if (!$rate) {
            return $price;
        }

        return (string) round((float) $price * $rate, 0);
    }

    public static function variation_prices_hash(array $hash, WC_Product $product, bool $for_display): array {
        $hash['hws_currency'] = self::current_currency();
        $hash['hws_rates_updated_at'] = self::rates()['updated_at'] ?? '';
        return $hash;
    }

    public static function currency_switcher_shortcode(): string {
        $current = self::current_currency();
        $items = [];
        foreach (['USD', 'UZS', 'AZN'] as $currency) {
            $url = add_query_arg('hws_currency', $currency);
            $class = $currency === $current ? ' is-active' : '';
            $items[] = sprintf(
                '<a class="hws-currency-switcher__item%s" href="%s">%s</a>',
                esc_attr($class),
                esc_url($url),
                esc_html($currency)
            );
        }

        return '<nav class="hws-currency-switcher" aria-label="Currency">' . implode('', $items) . '</nav>';
    }

    public static function current_currency(): string {
        if (self::$currency && self::is_supported_currency(self::$currency)) {
            return self::$currency;
        }

        $cookie = isset($_COOKIE[self::COOKIE]) ? strtoupper(sanitize_text_field(wp_unslash($_COOKIE[self::COOKIE]))) : '';
        if ($cookie && self::is_supported_currency($cookie)) {
            self::$currency = $cookie;
            return self::$currency;
        }

        $country = self::visitor_country();
        self::$currency = match ($country) {
            'UZ' => 'UZS',
            'AZ' => 'AZN',
            default => self::BASE,
        };

        return self::$currency;
    }

    public static function update_rates(): void {
        $existing = self::rates();
        $rates = [
            'USD' => [
                'rate' => 1.0,
                'date' => gmdate('Y-m-d'),
                'source' => 'base',
            ],
        ];

        $uzs = self::fetch_uzs_rate();
        if ($uzs) {
            $rates['UZS'] = $uzs;
        } elseif (isset($existing['currencies']['UZS'])) {
            $rates['UZS'] = $existing['currencies']['UZS'];
        }

        $azn = self::fetch_azn_rate();
        if ($azn) {
            $rates['AZN'] = $azn;
        } elseif (isset($existing['currencies']['AZN'])) {
            $rates['AZN'] = $existing['currencies']['AZN'];
        }

        update_option(self::OPTION_RATES, [
            'updated_at' => gmdate('c'),
            'currencies' => $rates,
        ], false);
    }

    private static function fetch_uzs_rate(): ?array {
        $response = wp_remote_get('https://cbu.uz/ru/arkhiv-kursov-valyut/json/USD/', ['timeout' => 12]);
        if (is_wp_error($response)) {
            return null;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (!is_array($body) || empty($body[0]['Rate'])) {
            return null;
        }

        return [
            'rate' => (float) str_replace(',', '.', $body[0]['Rate']),
            'date' => isset($body[0]['Date']) ? sanitize_text_field($body[0]['Date']) : gmdate('Y-m-d'),
            'source' => 'Central Bank of Uzbekistan',
        ];
    }

    private static function fetch_azn_rate(): ?array {
        for ($i = 0; $i < 10; $i++) {
            $timestamp = current_time('timestamp') - ($i * DAY_IN_SECONDS);
            $date_for_url = gmdate('d.m.Y', $timestamp);
            $response = wp_remote_get('https://www.cbar.az/currencies/' . $date_for_url . '.xml', ['timeout' => 12]);
            if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
                continue;
            }

            $xml = simplexml_load_string(wp_remote_retrieve_body($response));
            if (!$xml) {
                continue;
            }

            foreach ($xml->ValType as $type) {
                foreach ($type->Valute as $valute) {
                    if ((string) $valute['Code'] !== 'USD') {
                        continue;
                    }

                    return [
                        'rate' => (float) str_replace(',', '.', (string) $valute->Value),
                        'date' => sanitize_text_field((string) $xml['Date']),
                        'source' => 'Central Bank of Azerbaijan',
                    ];
                }
            }
        }

        return null;
    }

    private static function visitor_country(): string {
        if (isset($_GET['hws_country'])) {
            return strtoupper(substr(sanitize_text_field(wp_unslash($_GET['hws_country'])), 0, 2));
        }

        if (class_exists('WC_Geolocation')) {
            $location = WC_Geolocation::geolocate_ip('', true, true);
            if (!empty($location['country'])) {
                return strtoupper($location['country']);
            }
        }

        return '';
    }

    private static function is_supported_currency(string $currency): bool {
        return in_array($currency, ['USD', 'UZS', 'AZN'], true);
    }

    private static function set_cookie(string $currency): void {
        if (headers_sent()) {
            return;
        }

        setcookie(self::COOKIE, $currency, [
            'expires' => time() + MONTH_IN_SECONDS,
            'path' => COOKIEPATH ?: '/',
            'domain' => COOKIE_DOMAIN,
            'secure' => is_ssl(),
            'httponly' => false,
            'samesite' => 'Lax',
        ]);
        $_COOKIE[self::COOKIE] = $currency;
    }

    private static function rate_for(string $currency): ?float {
        $rates = self::rates();
        $rate = $rates['currencies'][$currency]['rate'] ?? null;

        return $rate ? (float) $rate : null;
    }

    private static function rates(): array {
        $rates = get_option(self::OPTION_RATES, []);
        return is_array($rates) ? $rates : [];
    }

    private static function rates_are_fresh(): bool {
        $rates = self::rates();
        if (empty($rates['updated_at'])) {
            return false;
        }

        return strtotime($rates['updated_at']) > (time() - DAY_IN_SECONDS);
    }
}

HWS_Multicurrency::init();
register_activation_hook(__FILE__, ['HWS_Multicurrency', 'activate']);
register_deactivation_hook(__FILE__, ['HWS_Multicurrency', 'deactivate']);

