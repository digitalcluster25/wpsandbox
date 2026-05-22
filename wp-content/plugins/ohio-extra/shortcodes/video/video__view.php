<?php

/**
* WPBakery Page Builder Ohio Video shortcode view
*/

if ( $layout == 'with_preview' ) : ?>

	<div class="video-button open-popup<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs . $video_type_attrs ); ?>>
        <?php if ( $preview_image ): ?>
			<img class="preview-image" <?php echo $preview_image_atts; ?> <?php echo esc_attr( $tilt_attrs ); ?>>
		<?php endif; ?>
		<div class="video-button-holder">
			<button class="icon-button<?php echo esc_attr( $size_classes ); ?>" aria-label="<?php esc_html_e( 'Play', 'ohio-extra' ); ?>">
			    <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg></i>
			</button>
			<?php if ( $title ) : ?>
				<span class="video-button-caption">
					<?php echo $title; ?>
				</span>
			<?php endif; ?>
		</div>
    </div>

<?php else: ?>

	<div class="video-button open-popup<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs . $video_type_attrs ); ?>>
		<button class="icon-button<?php echo esc_attr( $size_classes ); ?>" aria-label="<?php esc_html_e( 'Play', 'ohio-extra' ); ?>">
		    <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg></i>
		</button>
		<?php if ( $title ) : ?>
			<span class="video-button-caption">
				<?php echo $title; ?>
			</span>
		<?php endif; ?>
	</div>

<?php endif; ?>