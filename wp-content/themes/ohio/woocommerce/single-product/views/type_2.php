<?php
/**
 * Ohio WordPress Theme
 *
 * Single product layout template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post;
global $product;

// Get theme options
$shop_page_id = wc_get_page_id( 'shop' );
$show_sharing = OhioOptions::get_global( 'woocommerce_sharing_visibility' );
$image_zoom = OhioOptions::get_global( 'woocommerce_product_zoom', 'top' );
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );
$featured_video = function_exists( 'YITH_Featured_Audio_Video_Init' );
$is_related_products = OhioOptions::get( 'woocommerce_product_related', true );
if ( $is_related_products ) {
	$related_products_number = (int)OhioOptions::get_global( 'woocommerce_product_related_amount', 3 );
	if ( $related_products_number < 1 || $related_products_number > 12 ) {
		$related_products_number = 3;
	}
}

if ( $previous_btn ) {
    get_template_part( 'parts/elements/back_link' );
}

?>

<div class="page-container -full-w">

    <?php wc_get_template_part( "single-product/sticky", "product" ); ?>

    <div class="vc_row">
        <div class="vc_col-md-6 vc_col-sm-12 woo-product-image<?php if ( $featured_video ) { echo esc_attr(' -with-featured-video'); } ?> <?php echo $image_zoom ? esc_attr('with-zoom') : '' ?>" data-sticky-share-bar="true">
            <div class="woo-product-image-slider" data-gallery="ohio-custom-<?php echo esc_attr( $product->get_id()); ?>">

                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>

                <?php if ( $show_sharing ) {
                    do_shortcode( '[ohio_share_woo]' );
                    }
                ?>
            </div>
            <div class="clb-popup ohio-gallery-opened-sc clb-gallery-lightbox" id="ohio-custom-<?php echo esc_attr( $product->get_id()); ?>">
                <div class="close-bar">
                    <button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
                        <?php get_template_part( 'parts/elements/icon_close' ); ?>
                    </button>
                </div>
                <div class="clb-popup-holder"></div>
            </div>
        </div>
        <div class="vc_col-md-6 vc_col-sm-12 woo-product-details -sticky-block">
            <div class="summary entry-summary woo-product-details-inner">
                <div class="holder">

                    <?php /**
                     * Hook: woocommerce_before_single_product.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     */
                    do_action( 'woocommerce_before_single_product' );
                    ?>

                    <?php wc_get_template_part( "single-product/views/breadcrumbs" ); ?>

                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
wc_get_template_part( 'single-product/tabs/tabs' );
woocommerce_upsell_display();
if ( $is_related_products ) {
	woocommerce_related_products([
		'posts_per_page' => $related_products_number,
	]);
}
