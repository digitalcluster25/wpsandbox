<?php
/**
 * Ohio WordPress Theme
 *
 * Archive layout template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

defined( 'ABSPATH' ) || exit;

global $product, $post;

// Get theme options
$quickview_btn = OhioOptions::get_global( 'woocommerce_quickview_button', true );
$show_price = OhioOptions::get_global( 'woocommerce_shop_price_visibility', true );
$show_category = OhioOptions::get_global( 'woocommerce_shop_category_visibility', true );
$show_rating = OhioOptions::get_global( 'woocommerce_shop_rating_visibility', false );
$use_boxed_layout = OhioOptions::get_global( 'product_items_boxed_style', false );
$photos_count = OhioOptions::get_global( 'woocommerce_product_images_count', 2 );
$hover_effect = OhioOptions::get_global( 'shop_item_hover_type', 'none' );
$ajax_cart = OhioOptions::get( 'woocommerce_product_ajax_cart', true );

$parallax_data = '';
$tilt_effect = OhioOptions::get_global( 'shop_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'shop_tilt_effect_perspective', 6000 );

if ( $tilt_effect ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective . '';
}

?>

<div class="product-item-thumbnail">

	<?php if ( $quickview_btn || is_null( $quickview_btn ) ) : ?>

		<button class="icon-button button-quickview -fade-down -top" data-product-id="<?php echo esc_attr( $product->get_id()) ?>" aria-label="<?php esc_html_e( 'Quickview', 'ohio' ); ?>">
		    <i class="icon">
		    	<svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2V6H2V2H6V0H2C0.9 0 0 0.9 0 2ZM2 12H0V16C0 17.1 0.9 18 2 18H6V16H2V12ZM16 16H12V18H16C17.1 18 18 17.1 18 16V12H16V16ZM16 0H12V2H16V6H18V2C18 0.9 17.1 0 16 0Z"></path></svg>
		    </i>
		</button>

	<?php endif; ?>

	<div data-js="add-to-cart" class="product-item-buttons -fade-up">
    	<div class="button-group">

    		<?php if ( ! $ajax_cart ) : ?>
                  
				<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' );
				?>

	        <?php else: ?>
			
				<?php
					$classes = '';
					if ( !$product->managing_stock() && !$product->is_in_stock() )
					$classes = 'out-of-stock';
					echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s single_add_to_cart_button data_button_ajax button -dm-ignore %s" data-button-loading="true">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button' : '',
					esc_attr( $product->get_type() ),
					$classes,
					esc_html( $product->add_to_cart_text() )
				),
				$product );
				?>

				<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
				<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
				<input type="hidden" name="variation_id" class="variation_id" value="0" />

			<?php endif; ?>

		</div>
           
		<?php if ( function_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '<div class="button-group">[yith_wcwl_add_to_wishlist]</div>' );
		}?>

	</div>

	<?php woocommerce_show_product_loop_sale_flash(); ?>

	<div data-cursor-class="cursor-link" <?php if ( ! $use_boxed_layout ) { echo esc_attr( $parallax_data ); } ?>>
		<div class="image-holder">

		<?php if ( $hover_effect != 'transition' ) : ?>
			<div class="slider -woo-slider">
		<?php endif; ?>

			<?php echo woocommerce_get_product_thumbnail(); ?>
			<?php
				$attachment_ids = $product->get_gallery_image_ids();
	            $i = 1;
	            foreach ( $attachment_ids as $attachment_id ) {
	                $i++;
	                if ( $i > $photos_count ) {
	                    break;
                	} ?>
					<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail' ); ?>
					<?php
				}
			?>

		<?php if ( $hover_effect != 'transition' ) : ?>
			</div>
		<?php endif; ?>

		<a href="<?php echo esc_url( get_post_permalink() ); ?>" aria-label="<?php esc_html_e( 'Product thumbnail', 'ohio-extra' ); ?>"></a>

		</div>
	</div>
</div>

<?php
/**
* woocommerce_after_shop_loop_item hook.
*
* @hooked woocommerce_template_loop_product_link_close - 5
* @hooked woocommerce_template_loop_add_to_cart - 10
*/
?>
<div class="card-details">

	<a href="<?php echo esc_url( get_post_permalink() ); ?>" class="woo-product-name title titles-typo -undash">
		<?php echo esc_attr( get_post( $product->get_id() )->post_title ); ?>
	</a>

	<?php if ( $show_category ) : ?>

		<div class="woo-category category-holder">

		<?php
			$categories = explode( ', ', wc_get_product_category_list( $product->get_id() ) );
			$categories = array_filter( $categories );
			$i = 0;
			if ( !empty( $categories ) ) :
				foreach ( $categories as $category ):
		?>
		<?php echo preg_replace('/(<a)(.+\/a>)/i', '${1} ${2}', $category ); ?>
		<?php
				endforeach;
			endif;
		?>
		</div>

	<?php endif; ?>

	<?php if ( $show_price ) : ?>

		<div class="woo-price<?php if ( $show_rating ) { echo esc_attr( ' -with-rating' ); } ?>">

			<?php
				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			
		</div>

	<?php endif; ?>
	
</div>