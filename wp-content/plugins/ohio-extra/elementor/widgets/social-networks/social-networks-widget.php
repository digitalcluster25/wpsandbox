<?php
class Ohio_Elementor_Social_Networks_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_social_networks';
    }

    public function get_title()
    {
        return __( 'Social Networks', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-social-networks';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Social Networks', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'block_layout',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'flat' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_054.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_052.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_053.svg',
                    ],
                    'text' => [
                        'title' => __( 'Text', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_056.svg',
                    ],
                    'inline' => [
                        'title' => __( 'Text with Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_055.svg',
                    ],
                    'boxed' => [
                        'title' => __( 'Contained', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_057.svg',
                    ]
                ],
                'additional_class' => '-wide-label -wide-equal',
                'default' => 'outline',
            ]
        );

        $this->add_control(
            'block_alignment',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icons_size',
            [
                'label' => __( 'Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'small' => __( 'Small', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' )
                ],
                'default' => 'default',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Shape Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-networks:not(.-outlined):not(.-contained):not(.-boxed) .network:hover' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                    '{{WRAPPER}} .social-networks.-outlined .network' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                    '{{WRAPPER}} .social-networks.-contained .network' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                    '{{WRAPPER}} .social-networks.-boxed' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
                'condition' => [
                    'block_layout' => [ 'flat', 'outline', 'fill', 'boxed' ],
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Shape Corners', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-networks:not(.-boxed):not(.-text) .network' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .social-networks.-boxed' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'block_layout' => [ 'flat', 'outline', 'fill', 'boxed' ],
                ],
            ]
        );

        $this->add_control(
            'socials_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'separator' => 'before',
                'default' => 'custom',
                'options' => [
                    'custom' => 'Subscribe links',
                    'share' => 'Share links',
                ],
            ]
        );

        $this->add_control(
            'facebook_share',
            [
                'label' => __( 'Facebook Sharing', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );
        
        $this->add_control(
            'twitter_share',
            [
                'label' => __( 'X Sharing', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'linkedin_share',
            [
                'label' => __( 'LinkedIn Sharing', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'pinterest_share',
            [
                'label' => __( 'Pinterest Sharing', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'social_networks',
            [
                'label' => __( 'Social networks', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getSocialNetworksControls(),
                'default' => [],
                'title_field' => '{{ list_network.charAt(0).toUpperCase() + list_network.slice(1) }}',
                'prevent_empty' => false,
                'condition' => [
                    'socials_type' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Social Networks', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'default_colors',
            [
                'label' => __( 'Use Brand Colors?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'hover_default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'hover_default_colors',
            [
                'label' => __( 'Use Brand Colors (Hover)?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .network' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-boxed .network i + span' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
                'condition' => [
                    'block_layout' => [ 'flat','outline', 'fill', 'inline', 'boxed' ],
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Icon Color (Hover)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .network:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-boxed .network:hover i' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
                'condition' => [
                    'block_layout' => [ 'flat','outline', 'fill', 'inline', 'boxed' ],
                    'default_colors' => '',
                    'hover_default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'shape_color',
            [
                'label' => __( 'Shape Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks.-text:not(.-boxed) .network' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-outlined .network' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-contained:not(.-default-colors) .network' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-boxed .network' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'block_layout' => [ 'outline', 'fill', 'text', 'inline', 'boxed' ],
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'outline_hover_color',
            [
                'label' => __( 'Shape Color (Hover)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks.-flat .network:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-text:not(.-boxed) .network:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-outlined .network:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-contained:not(.-default-colors) .network:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .social-networks.-boxed .network:hover' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'default_colors' => '',
                    'hover_default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Shape Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks.-contained .network' => 'border-color:{{VALUE}};',
                    '{{WRAPPER}} .social-networks.-boxed' => 'border-color:{{VALUE}};'
                ],
                'separator' => 'before',
                'condition' => [
                    'block_layout' =>  [ 'fill', 'boxed' ],
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label' => __( 'Shape Border Color (Hover)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks.-flat .network:hover' => 'border-color:{{VALUE}};',
                    '{{WRAPPER}} .social-networks.-contained .network:hover' => 'border-color:{{VALUE}};'
                ],
                'condition' => [
                    'block_layout' => [ 'flat', 'fill' ],
                    'default_colors' => '',
                    'hover_default_colors' => '',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getSocialNetworksControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_link', [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'https://example.com',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'list_network',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook',
                'options' => $this->getSocialNetworksOptionsList(),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $show_text = in_array( $settings['block_layout'], [ 'boxed', 'inline', 'text' ] );
        $show_icon = $settings['block_layout'] != 'text';

        if ( $settings['socials_type'] == 'share' ) {
            $settings['social_networks'] = [];

            if ( $settings['facebook_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'facebook',
                    'list_link' => 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink()
                ];
            }
            if ( $settings['twitter_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'twitter',
                    'list_link' => 'https://x.com/intent/tweet?text=' . get_permalink()
                ];
            }
            if ( $settings['pinterest_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'pinterest',
                    'list_link' => 'http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&description=' . urlencode( 'title' )
                ];
            }
            if ( $settings['linkedin_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'linkedin',
                    'list_link' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . urlencode( 'title' ) . '&source=' . urlencode( get_bloginfo( 'name' ) )
                ];
            }
        }

        // Wrapper classes
        $this->addWrapperClass( 'social-column-' . count( $settings['social_networks'] ) );

        switch ( $settings['block_layout'] ) {
            case 'flat':
                $this->addWrapperClass( '-flat' );
                break;
            case 'outline':
                $this->addWrapperClass( '-outlined' );
                break;
            case 'fill':
                $this->addWrapperClass( '-contained' );
                break;
            case 'inline':
            case 'text':
                $this->addWrapperClass( '-text' );
                break;
            case 'boxed':
                $this->addWrapperClass( '-text -boxed' );
                break;
        }

        switch ( $settings['block_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-flex-just-start' );
                break;
            case 'center':
                $this->addWrapperClass( '-flex-just-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-flex-just-end' );
                break;
        }

        switch ( $settings['icons_size'] ) {
            case 'small':
                $this->addWrapperClass( '-small' );
                break;
            case 'large':
                $this->addWrapperClass( '-large' );
                break;
        }

        if ( !empty( $settings['default_colors'] ) ) {
            $this->addWrapperClass( '-default-colors' );
        }

        if ( !empty( $settings['hover_default_colors'] ) ) {
            $this->addWrapperClass( '-hover-default-colors' );
        }

        if ( $settings['socials_type'] == 'custom' ) {
            $this->addWrapperClass( 'new-tab-links' );
        }

        include( plugin_dir_path( __FILE__ ) . 'social-networks-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Social_Networks_Widget() );
