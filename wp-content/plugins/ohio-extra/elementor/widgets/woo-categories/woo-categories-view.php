<div class="ohio-widget woocommerce wc-category-sc vc_row <?php echo $this->getWrapperClasses(); ?>">

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

    <?php foreach ( $categories_data as $category ) : ?>

        <div class="wc-category grid-item vc_col-md-<?php echo esc_attr( $settings['layout_columns'] . $layout_classes ); ?>" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
            <div class="card<?php echo esc_attr( $card_classes ); ?>">
                <div class="image-holder">

                    <?php if ( !empty( $category->image ) ) : ?>
                        <img src="<?php echo esc_url( $category->image ); ?>" alt="<?php echo esc_attr( $category->title ); ?>">
                    <?php endif; ?>

                </div>
                <div class="wc-category-content">
                    <div class="heading">

                        <?php if ( $settings['subtitle_position'] == 'top' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <h3 class="title">
                            <?php echo $category->title; ?>
                        </h3>

                        <?php if ( $settings['subtitle_position'] == 'bottom' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>

                            <a href="<?php echo esc_url( $category->url ); ?>" class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>">
                                <?php if ( $settings['icon_position'] == 'left' ): ?>
                                    <?php $this->showIconInView( 'icon -left' ); ?>
                                <?php endif; ?>
                                
                                <?php if ( !empty( $settings['button_title'] ) ): ?>
                                    <span class="text"><?php echo $settings['button_title']; ?></span>
                                <?php endif; ?>

                                <?php if ( $settings['icon_position'] == 'right' ): ?>
                                    <?php $this->showIconInView( 'icon -right' ); ?>
                                <?php endif; ?>
                            </a>

                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>