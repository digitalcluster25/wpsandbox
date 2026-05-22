<?php
/*
    WooCommerce

    Table of contents: (use search)

    # Grid
        ## 1. Contained Layout Color
        ## 2. Sale Tag Color
        ## 3. Out of Stock Tag Color
        ## 4. Title Typography
        ## 5. Categories Typography
        ## 6. Price Typography

    # Single Product
        ## 7. Title Typography
        ## 8. Price Typography
        ## 9. Meta Typography
*/


# Grid

if ( OhioSettings::page_is( 'ecommerce' ) ) {

    ## 1. Contained Layout Color
    $product_fill_color =  OhioOptions::get( 'woocommerce_shop_title_wrap_background_color' );
    if ( $product_fill_color ) {
        $_selector = [
            '.woocommerce .woo-products .-contained .card-details'
        ];
        $_css = 'background-color:' . $product_fill_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 2. Sale Tag Color
    $sale_tag_color =  OhioOptions::get( 'woocommerce_shop_sale_tag_background_color' );
    if ( $sale_tag_color ) {
        $_selector = [
            '.woocommerce .tag.tag-sale'
        ];
        $_css = 'background-color:' . $sale_tag_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 3. Out of Stock Tag Color
    $out_of_stock_tag_color =  OhioOptions::get( 'woocommerce_shop_out_stock_tag_background_color' );
    if ( $out_of_stock_tag_color ) {
        $_selector = [
            '.woocommerce .tag.tag-out-of-stock',
            '.woocommerce .tag.out-of-stock'
        ];
        $_css = 'background-color:' . $out_of_stock_tag_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 4. Title Typography
    $product_title_typo = OhioOptions::get( 'woocommerce_shop_product_title_typo' );
    if ( $product_title_typo ) {
        $_selector = '.woocommerce .woo-products .woo-product-name';
        $_css = OhioHelper::parse_acf_typo_to_css( $product_title_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 5. Categories Typography
    $product_categories_typo = OhioOptions::get( 'woocommerce_shop_product_category_typo' );
    if ( $product_categories_typo ) {
        $_selector = '.woocommerce .woo-products .woo-category';
        $_css = OhioHelper::parse_acf_typo_to_css( $product_categories_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 6. Price Typography
    $product_price_typo = OhioOptions::get( 'woocommerce_shop_product_price_typo' );
    if ( $product_price_typo ) {
        $_selector = '.woocommerce .woo-products .woo-price';
        $_css = OhioHelper::parse_acf_typo_to_css( $product_price_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }


    # Single Product

    ## 7. Title Typography
    $single_product_title_typo = OhioOptions::get( 'page_woocommerce_single_product_title_typo' );
    if ( $single_product_title_typo ) {
        $_selector = '.woocommerce .woo-product .product_title';
        $_css = OhioHelper::parse_acf_typo_to_css( $single_product_title_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 8. Price Typography
    $single_product_price_typo = OhioOptions::get( 'page_woocommerce_single_product_price_typo' );
    if ( $single_product_price_typo ) {
        $_selector = '.woocommerce .woo-product .woo-product-details .price';
        $_css = OhioHelper::parse_acf_typo_to_css( $single_product_price_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    ## 9. Price Typography
    $single_product_meta_typo = OhioOptions::get( 'page_woocommerce_single_product_meta_typo' );
    if ( $single_product_meta_typo ) {
        $_selector = '.woocommerce .woo-product .product_meta';
        $_css = OhioHelper::parse_acf_typo_to_css( $single_product_meta_typo );
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}
    