<div class="ohio-widget-holder <?php echo esc_attr( $align_classes ); ?>">
    <div class="ohio-widget alert <?php echo $this->getWrapperClasses(); ?>">

        <?php $this->showIconInView( 'icon' ); ?>

        <p class="alert-message -unspace">

            <?php echo $settings['text']; ?>

            <?php if ( !empty( $settings['use_link'] ) ): ?>
                <a <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
                    <?php echo $settings['button_title']; ?>
                </a>
            <?php endif;?>
        </p>
        <?php if ( $settings['without_close_button'] ) : ?>
            <button class="icon-button -extra-small" data-js="close-alert" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
                <i class="icon"><svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg></i>
            </button>
        <?php endif; ?>
    </div>
</div>