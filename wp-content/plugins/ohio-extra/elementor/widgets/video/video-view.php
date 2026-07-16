<div class="video-button open-popup <?php echo $this->getWrapperClasses(); ?>" <?php if ( !empty( $settings['link'] ) ) { echo esc_attr( $video_attrs ); } ?>>

    <?php if ( $settings['module_layout'] == 'with_preview' ) : ?>

        <?php if ( !empty( $settings['preview_image']['url'] ) ): ?>
            <img class="preview-image"
                src="<?php echo esc_attr( $settings['preview_image']['url'] ); ?>"
                srcset="<?php echo wp_get_attachment_image_srcset( $settings['preview_image']['id'], 'large' ) ?>"
                sizes="<?php echo wp_get_attachment_image_sizes( $settings['preview_image']['id'], 'large' ) ?>"
                alt="<?php if ( !empty($settings['title']) ) { echo $settings['title']; } ?>"
                <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
        <?php endif; ?>
        <div class="video-button-holder">
            <button class="icon-button <?php echo $settings['size_classes'] ?>" aria-label="<?php esc_html_e( 'Play', 'ohio-extra' ); ?>">
                <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg></i>
            </button>
            <?php if ( !empty($settings['title']) ): ?>
                <span class="video-button-caption">
                    <?php echo $settings['title']; ?>
                </span>
            <?php endif; ?>
        </div>

    <?php else: ?>

        <button class="icon-button <?php echo $settings['size_classes'] ?>" aria-label="<?php esc_html_e( 'Play', 'ohio-extra' ); ?>">
            <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg></i>
        </button>
        <?php if ( !empty($settings['title']) ): ?>
            <span class="video-button-caption">
                <?php echo $settings['title']; ?>
            </span>
        <?php endif; ?>

    <?php endif; ?>

</div>
