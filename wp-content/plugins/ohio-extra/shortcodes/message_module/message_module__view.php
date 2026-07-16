<?php

/**
* WPBakery Page Builder Ohio Message Module shortcode view
*/

?>
<div class="ohio-widget-holder<?php echo esc_attr( $align_classes ); ?>">
	<div class="ohio-widget alert<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

		<?php if ( $add_icon ) : ?>
			<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
				<i class="icon <?php echo $icon_as_icon; ?>"></i>
			<?php elseif ( $icon_as_image ) : ?>
				<img src="<?php echo esc_url( $icon_as_image ); ?>" alt="<?php echo esc_attr( $text ); ?>">
			<?php endif; ?>
		<?php endif; ?>

		<p class="alert-message -unspace">

			<?php echo $text; ?>

			<?php if ( $use_link ) : ?>
				<a href="<?php echo esc_url( $link['url'] ); ?>" <?php if ( $link['blank'] ) { echo ' target="_blank"'; } ?>><?php echo $link['caption']; ?></a>
			<?php endif; ?>
		</p>
		<?php if ( $without_close_button ) : ?>
			<button class="icon-button -extra-small" data-js="close-alert" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
			    <i class="icon"><svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg></i>
			</button>
		<?php endif; ?>
	</div>
</div>