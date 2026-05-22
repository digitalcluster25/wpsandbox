<?php
/**
* WPBakery Page Builder Ohio WooCommerce categories shortcode view
*/
?>
<div class="ohio-widget woocommerce wc-category-sc vc_row<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

    <?php if ( !$woocommerce_active ): ?>
        <div class="clb-blank-note">
            <i class="icon -large">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"></path></svg>
            </i>
            <div class="clb-blank-note-inner">
                <?php echo esc_html( 'Please, install and activate the WooCommerce plugin to use Woo Categories element.' ); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ( $woo_categories as $category ) : ?>

        <div class="wc-category grid-item vc_col-md-<?php echo esc_attr( $layout_columns_class . $layout_classes ); ?>" <?php echo esc_attr($tilt_attrs); ?>>
            <div class="card<?php echo esc_attr( $card_classes ); ?>">
                <div class="image-holder">

                    <?php if ( !empty( $category->image ) ): ?>
                        <img src="<?php echo esc_url( $category->image ); ?>" alt="<?php echo esc_attr( $category->title ); ?>">
                    <?php endif; ?>

                </div>
                <div class="wc-category-content">
                    <div class="heading">
                        <?php if ( $subtitle_position == 'top' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <h3 class="title">
                            <?php echo $category->title; ?>
                        </h3>

                        <?php if ( $subtitle_position == 'bottom' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <?php if ( $add_link ) : ?>

                            <a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $category->url ); ?>"<?php if ( $button_link['blank'] ) echo ' target="_blank"'; ?>>
                                <?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
                                    <i class="icon -left <?php echo $icon_as_icon; ?>"></i>
                                <?php endif; ?>

                                <?php echo $button_link['caption']; ?>

                                <?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
                                    <i class="icon -right <?php echo $icon_as_icon; ?>"></i>
                                <?php endif; ?>
                            </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>