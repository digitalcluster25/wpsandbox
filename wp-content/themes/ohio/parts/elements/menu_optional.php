<?php
	$have_woocomerce = function_exists( 'WC' );
	$have_woocomerce_wl = function_exists( 'YITH_WCWL' );
	$have_wpml = function_exists( 'icl_get_languages' );
	$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
	$cart_visibility = OhioOptions::get_global( 'woocommerce_cart_icon', true );
	$account_visibility = OhioOptions::get_global( 'woocommerce_account_icon', false );
	$account_custom_img = OhioOptions::get_global( 'woocommerce_account_custom_image', false );
	$header_style = OhioOptions::get( 'page_header_menu_style', 'style1' );
	$header_dynamic_typo = OhioOptions::get( 'page_header_dynamic_typography_color', false );
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
	$search_visibility = OhioOptions::get( 'page_header_search_visibility', true );
	$search_visibility_mobile = OhioOptions::get( 'page_mobile_search_visibility', false );

	OhioOptions::get( 'page_header_search_visibility' ); // trigger selection chain
	$style_settings_select_type = OhioOptions::get_last_select_type();
	$search_position = OhioOptions::get_by_type( 'page_header_search_position', $style_settings_select_type );

	$include_search = $search_visibility && $search_position === 'standard' || $search_visibility_mobile && $search_position === 'fixed';

	$search_extra_classes = '';
	if ( ! $search_visibility_mobile && $search_position == 'standard' ) {
		$search_extra_classes .= ' vc_hidden-xs';
	}
	if ( $search_visibility_mobile && $search_position == 'fixed' ) {
		$search_extra_classes .= ' vc_hidden-lg vc_hidden-md vc_hidden-sm';
	}
?>

<?php if (
	$have_wpml && $wpml_show_in_header
	|| $have_woocomerce
	|| $have_woocomerce_wl
	|| $header_button
	|| $include_search ) :
	?>

	<ul class="menu-optional -unlist<?php if ( $header_dynamic_typo && $header_style === 'style5' || $header_dynamic_typo && $header_style === 'style6' || $header_dynamic_typo && $header_style === 'style7' ) { echo esc_attr( ' header-dynamic-typo' ); } ?>">

		<?php if ( $have_wpml && $wpml_show_in_header ) : ?>

			<li class="vc_hidden-xs vc_hidden-sm">
		        <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $header_button ) : ?>

			<li class="button-group">
				<?php get_template_part( 'parts/elements/menu_button' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $include_search ) : ?>

			<li class="icon-button-holder<?php echo esc_attr( $search_extra_classes ); ?>">
				<?php get_template_part( 'parts/elements/search' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $have_woocomerce ) : ?>

			<?php if ( $account_visibility ) : ?>

				<li class="icon-button-holder">
		            <a class="-unlink -undash icon-button favorites-global wishlist" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" aria-label="<?php esc_html_e( 'Wishlist', 'ohio' ); ?>">
		            	<?php if ( $account_custom_img ) : ?>
							<img class="custom-icon" src="<?php echo esc_url( $account_custom_img ); ?>" alt="<?php esc_html_e( 'Cart image', 'ohio' ); ?>">
						<?php else: ?>
							<i class="icon">
						    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-479q-64.5 0-109.75-45.25T325-634q0-64.5 45.25-109.75T480-789q64.5 0 109.75 45.25T635-634q0 64.5-45.25 109.75T480-479ZM169-173v-106q0-33 16.75-60.25t45.272-41.761Q292-411 354.25-426.25 416.5-441.5 480-441.5t125.75 15.25Q668-411 728.978-381.011 757.5-366.5 774.25-339.25 791-312 791-279v106H169Zm75-75h472v-31q0-11.19-5.5-20.345t-15-14.155Q642-340 588.325-353.25 534.651-366.5 480-366.5q-55 0-108.5 13.25t-107 39.75q-9.5 5-15 14.155T244-279v31Zm236-306q33 0 56.5-23.5T560-634q0-33-23.5-56.5T480-714q-33 0-56.5 23.5T400-634q0 33 23.5 56.5T480-554Zm0-80Zm0 386Z"/></svg>
						    </i>
						<?php endif; ?>
					</a>
				</li>

			<?php endif; ?>

			<?php if ( $cart_visibility ) : ?>

				<?php if ( $have_woocomerce_wl ) : ?>

					<li class="icon-button-holder">
						<a class="-unlink -undash icon-button favorites-global wishlist" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url('user' . '/' . get_current_user_id()) ); ?>" aria-label="<?php esc_html_e( 'Wishlist', 'ohio' ); ?>">
							<i class="icon">
						    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m480-131-54-48.5q-99.266-89.572-164.133-154.536T158.716-450.402q-38.285-51.401-53.5-94.481Q90-587.962 90-633q0-91.009 60.995-152.005Q211.991-846 303-846q51.288 0 97.644 22Q447-802 480-761q34.5-41 80-63t97-22q91.009 0 152.005 60.995Q870-724.009 870-633q0 45.038-15.216 88.117-15.215 43.08-53.5 94.481Q763-399 698.133-334.036 633.266-269.072 534-179.5L480-131Zm0-101q94-85 155-145.5T731.5-483q35.5-45 49.5-80.179t14-69.863q0-59.458-39.358-98.708Q716.283-771 657.246-771 611-771 571.25-744.5 531.5-718 515-675.5h-70q-16.5-42.5-56.25-69T302.754-771q-59.037 0-98.396 39.25Q165-692.5 165-633.042q0 34.684 14 69.863T228.5-483Q264-438 325-377.5T480-232Zm0-269.5Z"/></svg>
						    </i>
						</a>
					</li>

				<?php endif; ?>

				<li class="icon-button-holder">
					<?php get_template_part( 'parts/elements/menu_cart' ); ?>
				</li>

			<?php endif; ?>

		<?php endif; ?>

	</ul>

<?php endif; ?>