<?php

/**
* WPBakery Page Builder Ohio Testimonial shortcode view
*/

?>
<div class="ohio-widget testimonial<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( !empty( $photo ) && $block_type_layout == 'photo_top' ) : ?>
		<div class="avatar<?php echo esc_attr( $size_classes ); ?>" style="background-image: url(<?php echo esc_url( $photo ); ?>);"></div>
	<?php endif; ?>

	<?php if ( $headline ) : ?>
		<div class="testimonial-headline"><?php echo $headline; ?></div>
	<?php endif;?>

	<p><?php echo $quote; ?></p>
	<div class="holder">

		<?php if ( ( !empty( $photo ) && $block_type_layout == 'photo_middle' )  ) : ?>
			<div class="avatar<?php echo esc_attr( $size_classes ); ?>" style="background-image: url(<?php echo esc_url( $photo ); ?>);"></div>
		<?php endif; ?>

		<div class="author">
	        <h6 class="title -unspace"><?php echo $author; ?></h6>
	        <p class="author-details -unspace"><?php echo $position; ?></p>
	    </div>
	</div>
</div>