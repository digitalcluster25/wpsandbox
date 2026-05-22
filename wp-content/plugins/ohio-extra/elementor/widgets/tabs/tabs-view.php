<div class="ohio-widget tabs <?php echo $this->getWrapperClasses(); ?>" data-ohio-tabs="true" data-options="[]">
    
    <ul class="tabs-nav -unlist" role="tablist">
        <li class="tabs-nav-line" role="tab"></li>
    </ul>

    <div class="tabs-content">
        <?php foreach ( $settings['tabs'] as $item ) : ?>
            <div class="tabs-content-item <?php echo esc_attr( $item['custom_class'] ); ?>" 
                data-title="<?php echo esc_attr( $item['list_title'] ); ?>" 
                data-subtitle="<?php echo esc_attr( $item['list_subtitle'] ); ?>" 
                <?php 
                if ( ! empty( $item['use_icon'] ) && ! empty( $item['icon_icon'] ) ) { 
                    echo ' data-icon="' . esc_attr( implode( ' ', (array) $item['icon_icon'] ) ) . '"'; 
                } 
                ?> 
                id="<?php echo esc_attr( $item['_id'] ); ?>">

                <?php
                if ( $item['list_content_type'] == 'editor' ) {

                    echo do_shortcode( $item['list_content_editor'] );

                } else {

                    if ( ! empty( $item['list_content_template'] ) && $item['list_content_template'] != 0 ) {
                        
                        // Render Elementor Template
                        echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( 
                            $this->getLocalizedTemplate( $item['list_content_template'] ) 
                        );

                    } else {

                        // No template message setup
                        $link = add_query_arg(
                            array(
                                'post_type'     => 'elementor_library',
                                'action'        => 'elementor_new_post',
                                '_wpnonce'      => wp_create_nonce( 'elementor_action_new_post' ),
                                'template_type' => 'section',
                            ),
                            esc_url( admin_url( '/edit.php' ) )
                        );
                        ?>

                        <div style="text-align:center;">
                            <?php esc_html_e( 'Template is not defined. Select an existing template or create a', 'ohio-extra' ); ?>
                            <a class="new-template-link elementor-clickable brand-color" target="_blank" href="<?php echo esc_url( $link ); ?>">
                                <?php esc_html_e( 'new one', 'ohio-extra' ); ?>
                            </a>.
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>