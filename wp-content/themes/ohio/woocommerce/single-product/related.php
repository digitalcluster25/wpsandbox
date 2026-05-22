<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     10.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $related_products ) {
	return;
}

$wrap_container = OhioOptions::get( 'page_add_wrapper', true );

$wrap_container_class = '';
if ( ! $wrap_container ) {
	$wrap_container_class .= ' -full-w';
}

$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );
if ( is_string( $products_in_row ) ) {
    $products_in_row = json_decode( $products_in_row );
}
if ( $products_in_row == NULL ) {
    $products_in_row = (object) array(
        "large" => "3",
        "medium" => "2",
        "small" => "2"
    );
}

$row_class = '';
if ( is_object( $products_in_row ) ) {
    $row_class = ' columns-lg-' . $products_in_row->large;
    $row_class .= ' columns-md-' . $products_in_row->medium;
    $row_class .= ' columns-sm-' . $products_in_row->small;
}
?>

<section class="related products shop-product-type_1">
	<div class="page-container<?php echo esc_attr( $wrap_container_class ); ?>">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'ohio' ) );

		if ( $heading ) :
			?>
			<h3 class="heading-md title"><?php echo esc_html( $heading ); ?></h3>
		<?php endif; ?>

		<div class="<?php echo esc_attr( $row_class ); ?>">

			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] = $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>
