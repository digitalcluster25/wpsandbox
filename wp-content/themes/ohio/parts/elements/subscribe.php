<?php
    $expires = OhioOptions::get_global( 'subscribe_popup_expires' );
    setcookie( 'subscribeCookie', 'enabled', ( time() + 60 * 60 * 24 * $expires ), '/' );

    $heading = OhioOptions::get_global( 'text_subcribe_popup' );
    $description = OhioOptions::get_global( 'details_text_subcribe_popup' );
    $form_id = OhioOptions::get_global( 'subscribe_choice_of_forms' );
    $popup_close_visibility = OhioOptions::get_global( 'subscribe_popup_close_visibility', false );
    $popup_featured_image = OhioOptions::get_global( 'subscribe_popup' );
    $popup_featured_image_position = OhioOptions::get_global( 'subscribe_popup_image_position' );

    $popup_extra_classes = '';
    switch ( $popup_featured_image_position ) {
        case 'left':
            $popup_extra_classes .= ' -left-image';
            break;
        case 'top':
            $popup_extra_classes .= ' -top-image';
            break;
        case 'right':
            $popup_extra_classes .= ' -right-image';
            break;
        case 'bottom':
            $popup_extra_classes .= ' -bottom-image';
            break;
        default:
            $popup_extra_classes .= ' -left-image';
            break;
    }
?>

<div class="popup-subscribe<?php echo esc_attr( $popup_extra_classes ); ?>">
    <?php if ( $popup_featured_image['background_type'] === 'image' ) : ?>
        <div class="thumbnail"></div>
    <?php endif ?>
    <div class="holder">
        <h4 class="title">
            <?php echo esc_html( $heading ); ?> 
        </h4>
        <p>
            <?php echo esc_html( $description ); ?>
        </p>
        <div class="contact-form">
            <?php if ( $form_id ) : ?>
                <?php echo do_shortcode('[contact-form-7 id="' . esc_attr( $form_id ) . '"]' ); ?>
                <div class="hidden" data-button-contact="true">
                    <button class="button" data-button-loading="true"></button>
                </div>
            <?php endif; ?>
        </div>
        <?php if ( $popup_close_visibility ): ?>
            <a href="#" class="close-link titles-typo" data-js="close-popup">
                <?php esc_html_e( 'Please, don’t ask me again', 'ohio' ); ?>
            </a>
        <?php endif ?>
    </div>
</div>