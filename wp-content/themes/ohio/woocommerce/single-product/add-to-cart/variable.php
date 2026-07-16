<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

$variations_layout = OhioOptions::get( 'woocommerce_product_variations_layout', 'horizontal' );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart woo_c-cart-form" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<button type="submit" class="single_add_to_cart_button btn btn-small alt" disabled="true" data-product-added-text="<?php echo esc_attr( 'Product Added' ); ?>">
			<?php esc_html_e( 'This product is currently out of stock and unavailable.', 'ohio' ); ?>
		</button>
	<?php else : ?>
		<div class="variations<?php if ( $variations_layout != 'horizontal' ) { echo esc_html( ' -vertical' ); } ?>"  role="presentation">

			<?php foreach ( $attributes as $attribute_name => $options ) : ?>
	

				<div id="variation_<?php echo esc_attr($attribute_name) ?>" class="variation">
					<div class="label">
						<label for="pa_color"><?php echo wc_attribute_label( $attribute_name ) ?>:</label>
					</div>
					<?php 
						$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );

						wc_dropdown_variation_attribute_options(
							array(
								'options' => $options,
								'attribute' => $attribute_name,
								'product' => $product,
								'class'=> '-small',
								'show_option_none' => wc_attribute_label( $attribute_name )
							)
						);
					?>
				</div>

				<?php
				/**
				 * Filters the reset variation button.
				 *
				 * @since 2.5.0
				 *
				 * @param string  $button The reset variation button HTML.
				 */
				echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<div class="reset variation"><button class="button -flat -small reset_variations" aria-label="' . esc_html__( 'Clear options', 'ohio' ) . '"><i class="icon -left fa-solid fa-xmark"></i> ' . esc_html__( 'Clear', 'ohio' ) . '</button></div>' ) ) : '';
				?>

			<?php endforeach; ?>
		</div>

		<div class="reset_variations_alert screen-reader-text" role="alert" aria-live="polite" aria-relevant="all"></div>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
