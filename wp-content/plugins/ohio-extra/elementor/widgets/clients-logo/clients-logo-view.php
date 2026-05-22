<div class="ohio-widget logo <?php echo $this->getWrapperClasses(); ?>">
	<?php if ( $has_link ) : ?>
        <a class="-undash -unlink" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
    <?php endif; ?>

    <?php if ( $settings['clients_logo_image'] ) : ?>
        <img class="image-primary<?php if ( !empty( $settings['clients_logo_image_inverse']['id'] ) ) { echo esc_attr( ' -dm-hidden' ); } ?>"
			src="<?php echo $settings['clients_logo_image']['url']; ?>"
			srcset="<?php echo wp_get_attachment_image_srcset( $settings['clients_logo_image']['id'], 'large' ) ?>"
			sizes="<?php echo wp_get_attachment_image_sizes( $settings['clients_logo_image']['id'], 'large' ) ?>"
			alt="<?php echo esc_attr( get_post_meta( $settings['clients_logo_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
    <?php endif; ?>

    <?php if ( !empty( $settings['clients_logo_image_inverse']['id'] ) ) : ?>
        <img class="image-inverse -dm-visible"
			src="<?php echo $settings['clients_logo_image_inverse']['url']; ?>"
			srcset="<?php echo wp_get_attachment_image_srcset( $settings['clients_logo_image_inverse']['id'], 'large' ) ?>"
			sizes="<?php echo wp_get_attachment_image_sizes( $settings['clients_logo_image_inverse']['id'], 'large' ) ?>"
			alt="<?php echo esc_attr( get_post_meta( $settings['clients_logo_image_inverse']['id'], '_wp_attachment_image_alt', true ) ); ?>">
    <?php endif; ?>

	<?php if ( !empty( $settings['description'] ) ): ?>
		<div class="logo-details">
			<p><?php echo $settings['description']; ?></p>
		</div>
	<?php endif; ?>

	<?php if ( $has_link ) : ?>
        </a>
    <?php endif; ?>
</div>