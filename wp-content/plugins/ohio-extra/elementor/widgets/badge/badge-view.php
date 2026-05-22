<div class="ohio-widget-holder <?php echo esc_attr( $align_classes ); ?>">

    <?php if ( $has_link ) : ?>
        <a class="-undash -unlink" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
    <?php endif; ?>

        <div class="ohio-widget badge <?php echo $this->getWrapperClasses(); ?>">

            <?php if ( ! empty( $settings['text_before'] ) ) : ?>
                <span class="badge-inner"><?php echo $settings['text_before']; ?></span>
            <?php endif; ?>

            <?php echo $settings['title']; ?>
        </div>

    <?php if ( $has_link ) : ?>
        </a>
    <?php endif; ?>

</div>