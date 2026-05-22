<?php

/**
* WPBakery Page Builder Ohio Banner shortcode view
*/

?>
<div class="ohio-widget banner card<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $block_type_layout == 'inner' ) : ?>

		<?php if ( $use_link ) : ?>
			<a class="-unlink" data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>

                <?php if ( $image ) : ?>
                    <img <?php echo $image; ?>>
                <?php endif; ?>

                <div class="overlay-details">
                    <div class="card-details">
                        <div class="heading">
                            <div class="subtitle"><?php echo $subtitle; ?></div>
                            <<?php echo $heading_tag; ?> class="title"><?php echo $title; ?></<?php echo $heading_tag; ?>>
                        </div>
                    </div>
                    <div class="description -flex -flex-column">
                        <p><?php echo $description; ?></p>

                        <?php if ( $show_button ) : ?>
                            <button class="icon-button" aria-label="<?php esc_html_e( 'Navigate', 'ohio-extra' ); ?>">
                                <i class="icon">
                                    <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                                </i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

	<?php elseif ( $block_type_layout == 'inner_hover' ) : ?>

		<?php if ( $use_link ) : ?>
			<a class="-unlink" data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>

                <?php if ( $image ) : ?>
                    <img <?php echo $image; ?>>
                <?php endif; ?>

                <div class="overlay-details">
                    <div class="card-details -fade-down">
                        <div class="heading">
                            <div class="subtitle"><?php echo $subtitle; ?></div>
                            <<?php echo $heading_tag; ?> class="title"><?php echo $title; ?></<?php echo $heading_tag; ?>>
                        </div>
                    </div>
                    <div class="description -fade-up -flex -flex-column">
                        <p><?php echo $description; ?></p>

                        <?php if ( $show_button ) : ?>
                            <button class="icon-button" aria-label="<?php esc_html_e( 'Navigate', 'ohio-extra' ); ?>">
                                <i class="icon">
                                    <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                                </i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

    <?php elseif ( $block_type_layout == 'overlay_image' ) : ?>

    <?php if ( $use_link ) : ?>
        <a class="-unlink" data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
    <?php endif; ?>

        <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>

            <?php if ( $image ) : ?>
                <img <?php echo $image; ?>>
            <?php endif; ?>

            <div class="overlay-details -flex-column -flex-just-space-between">
                <div class="card-details">
                    <div class="heading">
                        <div class="subtitle"><?php echo $subtitle; ?></div>
                        <<?php echo $heading_tag; ?> class="title"><?php echo $title; ?></<?php echo $heading_tag; ?>>
                    </div>
                </div>
                <div class="description -flex -flex-column">
                    <p><?php echo $description; ?></p>

                    <?php if ( $show_button ) : ?>
                        <button class="icon-button" aria-label="<?php esc_html_e( 'Navigate', 'ohio-extra' ); ?>">
                            <i class="icon">
                                <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                            </i>
                        </button>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    <?php if ( $use_link ) : ?>
        </a>
    <?php endif; ?>

	<?php else : ?>

		<?php if ( $use_link ) : ?>
			<a class="-unlink" data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>

                <?php if ( $image ) : ?>
                    <img <?php echo $image; ?>>
                <?php endif; ?>

                <div class="overlay-details description -fade-up -flex-column">
                    <p><?php echo $description; ?></p>

                    <?php if ( $show_button ) : ?>
                        <button class="icon-button" aria-label="<?php esc_html_e( 'Navigate', 'ohio-extra' ); ?>">
                            <i class="icon">
                                <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                            </i>
                        </button>
                    <?php endif; ?>

                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

        <?php if ( !empty( $title || $subtitle ) ) : ?>
            <div class="card-details">
                <div class="heading">
                    <div class="subtitle"><?php echo $subtitle; ?></div>
                    <<?php echo $heading_tag; ?> class="title"><?php echo $title; ?></<?php echo $heading_tag; ?>>
                </div>
            </div>
        <?php endif; ?>

	<?php endif; ?>

</div>