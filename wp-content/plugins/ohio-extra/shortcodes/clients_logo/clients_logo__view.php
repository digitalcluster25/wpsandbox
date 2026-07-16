<?php

/**
* WPBakery Page Builder Ohio Clients logo shortcode view
*/

?>
<div class="ohio-widget logo<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $link ) : ?>
		<a class="-undash -unlink" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
	<?php endif; ?>

	<?php if ( $image_logo ) : ?>
		<img class="image-primary<?php if ( $image_logo_inverse ) { echo esc_attr( ' -dm-hidden' ); } ?>" <?php echo $image_logo_atts; ?>>
	<?php endif; ?>

	<?php if ( $image_logo_inverse ) : ?>
		<img class="image-inverse -dm-visible" <?php echo $image_logo_inverse_atts; ?>>
	<?php endif; ?>

	<?php if ( !empty( $description ) ): ?>
		<div class="logo-details">
			<p><?php echo $description; ?></p>
		</div>
	<?php endif; ?>

	<?php if ( $link ) : ?>
		</a>
	<?php endif; ?>

</div>