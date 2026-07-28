<?php
/**
 * Plugin Name: HWS Multicurrency
 * Description: Displays WooCommerce prices (stored in RUB) converted to the visitor's currency, using rates and settings from HWS Currency Converter (WooCommerce → Конвертер валют).
 * Version: 0.2.0
 * Author: HWS
 */

if (!defined('ABSPATH')) {
    exit;
}

final class HWS_Multicurrency {
    // Product prices are stored in WooCommerce in this currency — see HWS_Currency_Converter's
    // "Хранить цены в" setting, which must stay RUB for this multiplier math to be correct.
    private const STORAGE_CURRENCY = 'RUB';
    private const COOKIE = 'hws_currency';

    private static ?string $currency = null;

    public static function init(): void {
        add_action('init', [__CLASS__, 'maybe_set_currency_cookie'], 1);

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
        add_action('wp_footer', [__CLASS__, 'render_header_switcher']);
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
        if (self::is_api_request()) {
            return $currency;
        }

        return self::current_currency();
    }

    // GraphQL (WPGraphQL, checked via the GRAPHQL_REQUEST constant it defines) and the WC REST
    // API (REST_REQUEST) both serve the headless frontend, which expects raw storage-currency
    // values, not visitor-currency-converted ones.
    private static function is_api_request(): bool {
        return (defined('GRAPHQL_REQUEST') && GRAPHQL_REQUEST)
            || (defined('REST_REQUEST') && REST_REQUEST);
    }

    public static function currency_symbol(string $symbol, string $currency): string {
        $symbols = [
            'USD' => '$',
            'UZS' => 'сум',
            'AZN' => '₼',
            'RUB' => '₽',
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

        // The headless storefront (Next.js) reads raw RUB prices via WPGraphQL/REST and does
        // its own client-side conversion (see hws-graphql-bridge's hwsPriceCurrency field +
        // the frontend's CurrencyProvider). Converting here too would double-convert.
        if (self::is_api_request()) {
            return $price;
        }

        $currency = self::current_currency();
        if ($currency === self::STORAGE_CURRENCY) {
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
        $hash['hws_rates_updated_at'] = self::rates()['updatedAt'] ?? '';
        return $hash;
    }

    public static function currency_switcher_shortcode(): string {
        return self::currency_switcher_html();
    }

    public static function render_header_switcher(): void {
        if (is_admin()) {
            return;
        }

        echo '<template id="hws-currency-switcher-template">' . self::currency_switcher_html('hws-currency-switcher--header') . '</template>';
        ?>
        <style>
            .hws-currency-switcher {
                display: inline-flex;
                align-items: center;
                gap: 2px;
                padding: 3px;
                border: 1px solid rgba(40, 40, 40, 0.12);
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.42);
                white-space: nowrap;
            }
            .hws-currency-switcher__item {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 42px;
                min-height: 30px;
                padding: 0 10px;
                border-radius: 999px;
                color: rgba(40, 40, 40, 0.72);
                font-size: 13px;
                font-weight: 700;
                line-height: 1;
                text-decoration: none;
            }
            .hws-currency-switcher__item:hover,
            .hws-currency-switcher__item.is-active {
                background: #282828;
                color: #fff;
            }
            .menu-optional .hws-currency-switcher-holder {
                display: flex;
                align-items: center;
                margin-right: 8px;
            }
            @media (max-width: 768px) {
                .menu-optional .hws-currency-switcher-holder {
                    display: none;
                }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var menu = document.querySelector('.menu-optional');
                var firstIcon = menu ? menu.querySelector('.icon-button-holder') : null;
                var template = document.getElementById('hws-currency-switcher-template');
                if (!menu || !firstIcon || !template || menu.querySelector('.hws-currency-switcher-holder')) return;

                var holder = document.createElement('li');
                holder.className = 'hws-currency-switcher-holder';
                holder.innerHTML = template.innerHTML;
                firstIcon.insertAdjacentElement('beforebegin', holder);
            });
        </script>
        <?php
    }

    private static function currency_switcher_html(string $modifier = ''): string {
        $current = self::current_currency();
        $items = [];
        foreach (self::enabled_currencies() as $currency) {
            $url = add_query_arg('hws_currency', $currency);
            $class = $currency === $current ? ' is-active' : '';
            $items[] = sprintf(
                '<a class="hws-currency-switcher__item%s" href="%s">%s</a>',
                esc_attr($class),
                esc_url($url),
                esc_html($currency)
            );
        }

        $class = trim('hws-currency-switcher ' . $modifier);

        return '<nav class="' . esc_attr($class) . '" aria-label="Валюта">' . implode('', $items) . '</nav>';
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
            default => self::default_display_currency(),
        };

        return self::$currency;
    }

    // Rates and the base/display/enabled-currency settings live in HWS Currency Converter's
    // admin page (WooCommerce → Конвертер валют) — this plugin only applies them to price
    // output, it doesn't maintain its own rate source.
    private static function default_display_currency(): string {
        if (!class_exists('HWS_Currency_Converter')) {
            return 'USD';
        }
        $settings = HWS_Currency_Converter::settings();
        return $settings['display_currency'] ?: 'USD';
    }

    private static function enabled_currencies(): array {
        if (!class_exists('HWS_Currency_Converter')) {
            return ['USD', 'AZN', 'UZS', 'RUB'];
        }
        $settings = HWS_Currency_Converter::settings();
        $enabled = array_values(array_diff((array) $settings['enabled'], [self::STORAGE_CURRENCY]));
        $enabled[] = self::STORAGE_CURRENCY;

        return $enabled;
    }

    private static function rates(): array {
        if (!class_exists('HWS_Currency_Converter')) {
            return [];
        }
        return HWS_Currency_Converter::get_rates();
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
        return in_array($currency, self::enabled_currencies(), true);
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

    // HWS_Currency_Converter::get_rates() returns each currency's value expressed as
    // "units per 1 USD" (USD itself = 1). Prices are stored in RUB, so converting to a
    // target currency needs a RUB-based multiplier: target-units per 1 RUB =
    // rates[target] / rates['RUB'].
    private static function rate_for(string $currency): ?float {
        $rates = self::rates();
        $rub = $rates[self::STORAGE_CURRENCY] ?? null;
        $target = $rates[$currency] ?? null;
        if (!$rub || !$target) {
            return null;
        }

        return (float) $target / (float) $rub;
    }
}

HWS_Multicurrency::init();
