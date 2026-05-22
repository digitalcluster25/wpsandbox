<?php
	$show_sum = OhioOptions::get( 'page_header_cart_sum_visibility', true );
	$empty_cart_visibility = OhioOptions::get_global( 'woocommerce_cart_icon_empty_visibility', true );
	$cart_custom_img = OhioOptions::get_global( 'woocommerce_cart_custom_image', false );
?>

<div class="cart-button <?php if ( WC()->cart->is_empty() && $empty_cart_visibility == false ) { echo '-hidden'; } ?>">

	<?php if ( $show_sum ) : ?>
		<span class="cart-button-total">
			<a class="cart-customlocation -unlink -undash" href="<?php echo wc_get_cart_url(); ?>"><?php echo WC()->cart->get_total(); ?></a>
		</span>
	<?php endif; ?>

	<span class="holder">
		<button class="icon-button cart" data-js="open-mini-cart" aria-label="<?php esc_html_e( 'Cart', 'ohio' ); ?>">

			<?php if ( $cart_custom_img ) : ?>
				<img class="custom-icon" src="<?php echo esc_url( $cart_custom_img ); ?>" alt="<?php esc_html_e( 'Cart image', 'ohio' ); ?>">
			<?php else: ?>
				<i class="icon">
			    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M205-90q-30.938 0-52.969-22.031Q130-134.062 130-165v-472q0-30.938 22.031-52.969Q174.062-712 205-712h82q0-80.5 56.25-136.75T480-905q80.5 0 136.75 56.25T673-712h82q30.938 0 52.969 22.031Q830-667.938 830-637v472q0 30.938-22.031 52.969Q785.938-90 755-90H205Zm0-75h550v-472H205v472Zm274.933-240Q560-405 616.5-461.453 673-517.905 673-598h-75q0 49-34.382 83.5-34.383 34.5-83.5 34.5Q431-480 396.5-514.417 362-548.833 362-598h-75q0 80 56.433 136.5t136.5 56.5ZM362-712h236q0-49-34.382-83.5-34.383-34.5-83.5-34.5Q431-830 396.5-795.583 362-761.167 362-712ZM205-165v-472 472Z"/></svg>
			    </i>
			<?php endif; ?>

		</button>
		<span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	</span>
	<div class="cart-mini">
		<div class="headline">
			<h5 class="title"><?php esc_html_e( 'Cart review', 'ohio' ); ?></h5>
			<button class="icon-button -extra-small clb-close -reset" data-js="close-mini-cart" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
			    <?php get_template_part( 'parts/elements/icon_close' ); ?>
			</button>
		</div>
		<div class="widget_shopping_cart_content">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
</div>