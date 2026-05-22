<?php

/**
* WPBakery Page Builder Ohio Badge shortcode view
*/

?>
<div class="ohio-widget-holder<?php echo esc_attr( $align_classes ); ?>">

    <?php if ( $link ) : ?>
        <a class="-undash -unlink badge-holder" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
    <?php endif; ?>

        <div class="ohio-widget badge<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

            <?php if ( !empty( $text_before ) ) : ?>
                <span class="badge-inner"><?php echo esc_html( $text_before ); ?></span>
            <?php endif; ?>

            <?php echo $title; ?>
        </div>

    <?php if ( $link ) : ?>
        </a>
    <?php endif; ?>

</div>
