<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

const HWS_IMPORT_USER_AGENT = 'HWS Catalog Importer/0.2 (+https://wpsandbox.spaces.community)';

function hws_import_fetch_url($url) {
    $response = wp_remote_get($url, [
        'timeout' => 30,
        'redirection' => 5,
        'headers' => ['User-Agent' => HWS_IMPORT_USER_AGENT],
    ]);
    if (is_wp_error($response)) {
        throw new RuntimeException($url . ': ' . $response->get_error_message());
    }
    $body = wp_remote_retrieve_body($response);
    if (!$body) {
        throw new RuntimeException($url . ': empty response');
    }
    return $body;
}

function hws_import_clean($value) {
    $value = html_entity_decode((string) $value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $value = wp_strip_all_tags($value);
    $value = preg_replace('/\s+/u', ' ', $value);
    return trim($value);
}

function hws_import_abs_url($base, $url) {
    $url = html_entity_decode(trim((string) $url), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    if (!$url) {
        return '';
    }
    if (str_starts_with($url, '//')) {
        return 'https:' . $url;
    }
    if (preg_match('~^https?://~i', $url)) {
        return $url;
    }
    $parts = wp_parse_url($base);
    $origin = ($parts['scheme'] ?? 'https') . '://' . ($parts['host'] ?? '');
    if (str_starts_with($url, '/')) {
        return $origin . $url;
    }
    $path = isset($parts['path']) ? preg_replace('~/[^/]*$~', '/', $parts['path']) : '/';
    return $origin . $path . $url;
}

function hws_import_first_match($pattern, $html) {
    return preg_match($pattern, $html, $m) ? hws_import_clean($m[1]) : '';
}

function hws_import_price_rub($text) {
    if (!$text) {
        return 0;
    }
    $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    if (!preg_match('/(\d[\d\s\x{00a0}.]*)\s*(?:₽|&#8381;|руб)/iu', $text, $m)) {
        if (!preg_match('/(?:От\s*)?(\d[\d\s\x{00a0}.]{3,})/iu', $text, $m)) {
            return 0;
        }
    }
    $digits = preg_replace('/[^\d]/u', '', $m[1]);
    return $digits ? (int) $digits : 0;
}

function hws_import_cbr_usd_rate() {
    $cached = get_transient('hws_cbr_usd_rub_rate');
    if ($cached) {
        return (float) $cached;
    }
    $xml = hws_import_fetch_url('https://www.cbr.ru/scripts/XML_daily.asp');
    $data = simplexml_load_string($xml);
    if (!$data) {
        return 0;
    }
    foreach ($data->Valute as $valute) {
        if ((string) $valute->CharCode === 'USD') {
            $rate = (float) str_replace(',', '.', (string) $valute->Value);
            if ($rate > 0) {
                set_transient('hws_cbr_usd_rub_rate', $rate, DAY_IN_SECONDS);
                return $rate;
            }
        }
    }
    return 0;
}

function hws_import_rub_to_usd($rub) {
    $rate = hws_import_cbr_usd_rate();
    if (!$rub || !$rate) {
        return '';
    }
    return (string) (ceil(((float) $rub / $rate) / 10) * 10);
}

function hws_import_brand_id($brand_name) {
    if (!taxonomy_exists('product_brand')) {
        return 0;
    }
    $term = get_term_by('name', $brand_name, 'product_brand');
    if ($term) {
        return (int) $term->term_id;
    }
    $created = wp_insert_term($brand_name, 'product_brand', ['slug' => sanitize_title($brand_name)]);
    return is_wp_error($created) ? 0 : (int) $created['term_id'];
}

function hws_import_category_id($slug, $name, $parent_slug = 'bath-sauna-stoves') {
    $term = get_term_by('slug', $slug, 'product_cat');
    if ($term) {
        return (int) $term->term_id;
    }
    $parent_id = 0;
    if ($parent_slug) {
        $parent = get_term_by('slug', $parent_slug, 'product_cat');
        $parent_id = $parent ? (int) $parent->term_id : 0;
    }
    $created = wp_insert_term($name, 'product_cat', ['slug' => $slug, 'parent' => $parent_id]);
    return is_wp_error($created) ? 0 : (int) $created['term_id'];
}

function hws_import_attachment($url, $post_id, $alt) {
    $url = trim((string) $url);
    if (!$url) {
        return 0;
    }
    $existing = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_key' => '_hws_source_url',
        'meta_value' => $url,
    ]);
    if ($existing) {
        return (int) $existing[0];
    }
    $id = media_sideload_image($url, $post_id, $alt, 'id');
    if (is_wp_error($id)) {
        return 0;
    }
    update_post_meta((int) $id, '_hws_source_url', $url);
    return (int) $id;
}

function hws_import_specs_from_text($text) {
    $specs = [];
    $patterns = [
        'Мощность' => '/(?:Мощность|Номинальная мощность)[^\d]*(\d+(?:[,.]\d+)?(?:\s*[;–-]\s*\d+(?:[,.]\d+)?)?\s*кВт)/iu',
        'Объем парной' => '/(?:до|об[ъе]м[^,\n]*)\s*(\d+(?:[,.]\d+)?(?:\s*[;–-]\s*\d+(?:[,.]\d+)?)?\s*м[³3])/iu',
        'Напряжение' => '/(\d{3}\s*(?:\/\s*\d{3})?\s*В)/u',
    ];
    foreach ($patterns as $name => $pattern) {
        if (preg_match($pattern, $text, $m)) {
            $specs[$name] = hws_import_clean($m[1]);
        }
    }
    return $specs;
}

function hws_import_specs_html($specs) {
    if (!$specs) {
        return '';
    }
    $rows = [];
    foreach ($specs as $name => $value) {
        $rows[] = '<tr><th>' . esc_html($name) . '</th><td>' . esc_html($value) . '</td></tr>';
    }
    return '<table class="shop_attributes hws-specs"><tbody>' . implode('', $rows) . '</tbody></table>';
}

function hws_import_product($item) {
    $sku = $item['sku'];
    $product_id = wc_get_product_id_by_sku($sku);
    $product = $product_id ? wc_get_product($product_id) : new WC_Product_Simple();
    if (!$product || !($product instanceof WC_Product_Simple)) {
        $product = new WC_Product_Simple();
    }

    $product->set_name($item['name']);
    $product->set_slug($item['slug']);
    $product->set_sku($sku);
    $product->set_status('publish');
    $product->set_catalog_visibility('visible');
    $product->set_description(wpautop(esc_html($item['description'])));
    $product->set_short_description($item['short_description']);
    $product->set_regular_price($item['price_usd']);
    $product->set_manage_stock(false);
    $product->set_stock_status('instock');

    if ($item['category_id']) {
        $product->set_category_ids([$item['category_id']]);
    }
    $product_id = $product->save();

    if ($item['brand_id']) {
        wp_set_object_terms($product_id, [$item['brand_id']], 'product_brand', false);
    }

    if ($item['image']) {
        $image_id = hws_import_attachment($item['image'], $product_id, $item['name']);
        if ($image_id) {
            set_post_thumbnail($product_id, $image_id);
        }
    }

    update_post_meta($product_id, '_hws_source_url', $item['source_url']);
    update_post_meta($product_id, '_hws_source_brand', $item['brand']);
    update_post_meta($product_id, '_hws_price_rub_source', $item['price_rub']);
    update_post_meta($product_id, '_hws_price_currency', 'USD');
    update_post_meta($product_id, '_hws_specs_html', hws_import_specs_html($item['specs']));
    update_post_meta($product_id, '_hws_import_payload', wp_json_encode($item, JSON_UNESCAPED_UNICODE));

    return $product_id;
}

function hws_import_is_non_stove_item($item) {
    $text = mb_strtolower(($item['name'] ?? '') . ' ' . ($item['source_url'] ?? ''));
    $skip_needles = [
        'пульт',
        'pulty',
        'труба-каменка',
        'dvertsy-topochnogo',
    ];
    foreach ($skip_needles as $needle) {
        if (str_contains($text, $needle)) {
            return true;
        }
    }
    return false;
}

function hws_import_dedupe_items($items) {
    $deduped = [];
    foreach ($items as $item) {
        if (hws_import_is_non_stove_item($item)) {
            continue;
        }
        $key = mb_strtolower(($item['brand'] ?? '') . '|' . ($item['name'] ?? '') . '|' . ($item['price_rub'] ?? ''));
        if (!isset($deduped[$key])) {
            $deduped[$key] = $item;
            continue;
        }

        $current = $deduped[$key];
        $current_url = $current['source_url'] ?? '';
        $next_url = $item['source_url'] ?? '';
        $current_is_listing = preg_match('~/(parogeneratory|parotermalnye-pechi|pechi-parizhar)/$~', $current_url);
        $next_is_listing = preg_match('~/(parogeneratory|parotermalnye-pechi|pechi-parizhar)/$~', $next_url);
        if ($current_is_listing && !$next_is_listing) {
            $deduped[$key] = $item;
        }
    }
    return array_values($deduped);
}

function hws_import_sangens_urls() {
    $urls = [];
    foreach ([
        'https://sangens.com/ru/catalog/furnaces/',
        'https://sangens.com/ru/catalog/furnaces/page/2/',
        'https://sangens.com/ru/catalog/furnaces/page/3/',
    ] as $page) {
        $html = hws_import_fetch_url($page);
        preg_match_all('~href=["\']([^"\']*/ru/catalog/furnaces/[^"\']+/[^"\']+)["\']~u', $html, $matches);
        foreach ($matches[1] as $href) {
            $url = hws_import_abs_url($page, $href);
            $url = strtok($url, '?');
            if (preg_match('~/series-[^/]+/[^/]+/$~', $url)) {
                $urls[$url] = true;
            }
        }
    }
    return array_keys($urls);
}

function hws_import_parse_sangens($url) {
    $html = hws_import_fetch_url($url);
    $title = hws_import_first_match('~<h1[^>]*>(.*?)</h1>~isu', $html);
    if (!$title) {
        $title = hws_import_first_match('~<meta property="og:title" content="([^"]+)"~isu', $html);
    }
    $title = preg_replace('/\s+—\s+Купить.*$/u', '', $title);
    $title = preg_replace('/^Электрическая печь для бани и сауны\s+/u', '', $title);
    $title = hws_import_clean($title);

    $price_rub = hws_import_price_rub($html);
    $description = hws_import_first_match('~<meta name="description" content="([^"]+)"~isu', $html);
    if (!$description) {
        $description = hws_import_first_match('~<meta property="og:description" content="([^"]+)"~isu', $html);
    }

    $image = hws_import_first_match('~<meta property="og:image" content="([^"]+)"~isu', $html);
    if (!$image) {
        $image = hws_import_first_match('~data-splide-lazy=["\']([^"\']+)["\']~isu', $html);
    }

    $plain = hws_import_clean($html);
    $specs = hws_import_specs_from_text($plain);
    $short_lines = [];
    foreach (['Мощность', 'Объем парной', 'Напряжение'] as $key) {
        if (!empty($specs[$key])) {
            $short_lines[] = '<li><strong>' . esc_html($key) . ':</strong> ' . esc_html($specs[$key]) . '</li>';
        }
    }

    return [
        'brand' => 'Sangens',
        'brand_id' => hws_import_brand_id('Sangens'),
        'category_id' => hws_import_category_id('sauna-stoves', 'Печи для сауны'),
        'source_url' => $url,
        'sku' => 'SG-' . strtoupper(substr(md5($url), 0, 10)),
        'name' => $title ?: 'Sangens',
        'slug' => sanitize_title('sangens-' . basename(trim(wp_parse_url($url, PHP_URL_PATH), '/'))),
        'description' => $description ?: $title,
        'short_description' => $short_lines ? '<ul class="hws-product-highlights">' . implode('', $short_lines) . '</ul>' : '',
        'image' => hws_import_abs_url($url, $image),
        'price_rub' => $price_rub,
        'price_usd' => hws_import_rub_to_usd($price_rub),
        'specs' => $specs,
    ];
}

function hws_import_vvd_urls() {
    $urls = [];
    $pages = [
        'https://vvd.su/product/elektricheskie-pechi-dlya-bani/',
        'https://vvd.su/product/drovyanye-pechi-dlya-bani-i-sauny/',
    ];
    foreach ($pages as $page) {
        $html = hws_import_fetch_url($page);
        preg_match_all('~href=["\']([^"\']*/product/[^"\']+)["\']~u', $html, $matches);
        foreach ($matches[1] as $href) {
            $url = hws_import_abs_url($page, $href);
            $url = strtok($url, '?');
            if (preg_match('~/product/(elektricheskie-pechi-dlya-bani|drovyanye-pechi-dlya-bani-i-sauny)/[^/]+/$~', $url)) {
                $urls[$url] = true;
            }
        }
    }
    return array_keys($urls);
}

function hws_import_vvd_category($title, $url) {
    $haystack = mb_strtolower($title . ' ' . $url);
    if (str_contains($haystack, 'parogenerator') || str_contains($haystack, 'аэгпп') || str_contains($haystack, 'egpp')) {
        return hws_import_category_id('steam-generators', 'Парогенераторы');
    }
    if (str_contains($haystack, 'parizhar') || str_contains($haystack, 'futurus') || str_contains($haystack, 'паротерм')) {
        return hws_import_category_id('hammam-stoves', 'Печи для хаммама');
    }
    if (str_contains($haystack, 'drovyanye') || str_contains($haystack, 'дров')) {
        return hws_import_category_id('russian-bath-stoves', 'Печи для русской бани');
    }
    return hws_import_category_id('sauna-stoves', 'Печи для сауны');
}

function hws_import_parse_vvd($url) {
    $html = hws_import_fetch_url($url);
    $title = hws_import_first_match('~<meta itemprop="name" content="([^"]+)"~isu', $html);
    if (!$title) {
        $title = hws_import_first_match('~<h1[^>]*>(.*?)</h1>~isu', $html);
    }
    if (!$title) {
        $title = hws_import_first_match('~<title>(.*?)</title>~isu', $html);
    }
    $title = hws_import_clean($title);

    $price_rub = hws_import_price_rub($html);
    $description = hws_import_first_match('~<meta itemprop="description" content="([^"]+)"~isu', $html);
    if (!$description) {
        $description = hws_import_first_match('~<meta name="description" content="([^"]+)"~isu', $html);
    }

    $image = hws_import_first_match('~<link href="([^"]+)" itemprop="image"~isu', $html);
    if (!$image) {
        $image = hws_import_first_match('~<a href="([^"]+)"[^>]*catalog-detail__gallery__link~isu', $html);
    }

    $plain = hws_import_clean($html);
    $specs = hws_import_specs_from_text($plain);
    $short_lines = [];
    foreach (['Мощность', 'Объем парной', 'Напряжение'] as $key) {
        if (!empty($specs[$key])) {
            $short_lines[] = '<li><strong>' . esc_html($key) . ':</strong> ' . esc_html($specs[$key]) . '</li>';
        }
    }

    return [
        'brand' => 'ВВД',
        'brand_id' => hws_import_brand_id('ВВД'),
        'category_id' => hws_import_vvd_category($title, $url),
        'source_url' => $url,
        'sku' => 'VVD-' . strtoupper(substr(md5($url), 0, 10)),
        'name' => $title ?: 'ВВД',
        'slug' => sanitize_title('vvd-' . basename(trim(wp_parse_url($url, PHP_URL_PATH), '/'))),
        'description' => $description ?: $title,
        'short_description' => $short_lines ? '<ul class="hws-product-highlights">' . implode('', $short_lines) . '</ul>' : '',
        'image' => hws_import_abs_url($url, $image),
        'price_rub' => $price_rub,
        'price_usd' => hws_import_rub_to_usd($price_rub),
        'specs' => $specs,
    ];
}

$brand_filter = strtolower((string) getenv('HWS_IMPORT_BRAND'));
$items = [];
if (!$brand_filter || $brand_filter === 'sangens') {
    foreach (hws_import_sangens_urls() as $url) {
        $items[] = hws_import_parse_sangens($url);
    }
}
if (!$brand_filter || $brand_filter === 'vvd') {
    foreach (hws_import_vvd_urls() as $url) {
        $items[] = hws_import_parse_vvd($url);
    }
}
$items = hws_import_dedupe_items($items);

$results = [];
foreach ($items as $item) {
    if (empty($item['name']) || empty($item['price_usd'])) {
        $results[] = ['status' => 'skipped', 'name' => $item['name'] ?? '', 'url' => $item['source_url'] ?? '', 'reason' => 'missing name or price'];
        continue;
    }
    $results[] = [
        'status' => 'ok',
        'brand' => $item['brand'],
        'name' => $item['name'],
        'sku' => $item['sku'],
        'price_rub' => $item['price_rub'],
        'price_usd' => $item['price_usd'],
        'product_id' => hws_import_product($item),
    ];
}

update_option('woocommerce_currency', 'USD');
wc_delete_product_transients();
wp_cache_flush();

echo wp_json_encode([
    'cbr_usd_rub_rate' => hws_import_cbr_usd_rate(),
    'found' => count($items),
    'results' => $results,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . PHP_EOL;
