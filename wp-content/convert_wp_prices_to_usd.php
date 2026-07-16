<?php
$rate = (float) getenv('HWS_USD_RUB_RATE');
if ($rate <= 0) {
    fwrite(STDERR, "HWS_USD_RUB_RATE is required\n");
    exit(1);
}

function hws_usd_round_price($rub, $rate) {
    if ($rub === '' || $rub === null) {
        return '';
    }
    return (string) (ceil(((float) $rub / $rate) / 10) * 10);
}

$updated_variations = 0;
$variation_ids = get_posts([
    'post_type' => 'product_variation',
    'post_status' => ['publish', 'private'],
    'posts_per_page' => -1,
    'fields' => 'ids',
]);

foreach ($variation_ids as $variation_id) {
    $sku = get_post_meta($variation_id, '_sku', true);
    if (strpos((string) $sku, 'ES-') !== 0) {
        continue;
    }

    $variation = wc_get_product($variation_id);
    if (!$variation) {
        continue;
    }

    $source_rub = get_post_meta($variation_id, '_hws_price_rub_source', true);
    if ($source_rub === '') {
        $source_rub = $variation->get_regular_price();
        update_post_meta($variation_id, '_hws_price_rub_source', $source_rub);
    }

    $usd = hws_usd_round_price($source_rub, $rate);
    $variation->set_regular_price($usd);
    $variation->set_sale_price('');
    $variation->set_price($usd);
    update_post_meta($variation_id, '_hws_usd_rub_rate', $rate);
    $variation->save();
    $updated_variations++;
}

$updated_products = 0;
$product_ids = get_posts([
    'post_type' => 'product',
    'post_status' => ['publish', 'private'],
    'posts_per_page' => -1,
    'fields' => 'ids',
]);

foreach ($product_ids as $product_id) {
    $product = wc_get_product($product_id);
    if (!$product) {
        continue;
    }

    $sku = $product->get_sku();
    if (!preg_match('/^\d+$/', (string) $sku)) {
        continue;
    }

    update_post_meta($product_id, '_hws_usd_rub_rate', $rate);
    update_post_meta($product_id, '_hws_price_currency', 'USD');

    if ($product->is_type('variable')) {
        WC_Product_Variable::sync($product_id);
    } else {
        $source_rub = get_post_meta($product_id, '_hws_price_rub_source', true);
        if ($source_rub === '') {
            $source_rub = $product->get_regular_price();
            update_post_meta($product_id, '_hws_price_rub_source', $source_rub);
        }
        $usd = hws_usd_round_price($source_rub, $rate);
        $product->set_regular_price($usd);
        $product->set_sale_price('');
        $product->set_price($usd);
        $product->save();
    }

    wc_delete_product_transients($product_id);
    $updated_products++;
}

update_option('woocommerce_currency', 'USD');
delete_transient('wc_attribute_taxonomies');
wc_delete_shop_order_transients();

echo wp_json_encode([
    'rate' => $rate,
    'updated_products' => $updated_products,
    'updated_variations' => $updated_variations,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
