<?php
class Ohio_Elementor_Button_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_button';
    }

    public function get_title()
    {
        return __( 'Button', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-button';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'fill' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_023.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_024.svg',
                    ],
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_025.svg',
                    ],
                    'link' => [
                        'title' => __( 'Text', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_026.svg',
                    ],
                ],
                'default' => 'fill',
            ]
        );

        $this->add_control(
            'button_position',
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
            'title',
            [
                'label' => __( 'Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Learn More', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => false,
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __( 'Size', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __( 'Small', 'ohio-extra' ),
                    'default' => __( 'Default', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .button' => 'border-width: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill', 'outline' ],
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Corners', 'ohio-extra' ),
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
                    '{{WRAPPER}} .button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill', 'outline', 'flat' ],
                ],
            ]
        );

        $this->add_control(
            'button_use_brand_color',
            [
                'label' => __( 'Use Primary Color?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'drop_shadow',
            [
                'label' => __( 'Drop Shadow', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'block_type_layout' => [ 'fill', 'outline', 'flat' ],
                ],
            ]
        );

        $this->add_control(
            'drop_shadow_intensity',
            [
                'label' => __( 'Shadow Intensity', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    // 'size' => '10',
                ],
                'condition' => [
                    'drop_shadow' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .button.-with-shadow:not(.-flat)' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .button.-with-shadow.-flat:hover' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'inline_button',
            [
                'label' => __( 'Set Inline?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => __( 'Allows you to have several buttons per line.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'full_width',
            [
                'label' => __( 'Set Block?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => __( 'Span the entire width of its parent element.', 'ohio-extra' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_icon',
            [
                'label' => __( 'Add Icon?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Position', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __( 'Left', 'ohio-extra' ),
                    'right' => __( 'Right', 'ohio-extra' ),
                ],
                'default' => 'left',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => __( 'Icon', 'ohio-extra' ),
                    'image' => __( 'Custom Image', 'ohio-extra' ),
                    'html' => __( 'Custom HTML', 'ohio-extra' ),
                ],
                'default' => 'icon',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'use_icon' => 'yes',
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Custom Image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'use_icon' => 'yes',
                    'icon_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'icon_html',
            [
                'label' => __( 'Custom HTML', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '<i class="fa-regular fa-star"></i>',
                'condition' => [
                    'icon_type' => 'html',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style' );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:not(:hover)' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Fill Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button.-default:not(:hover)' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill' ],
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill', 'outline' ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_colors_hover',
            [
                'label' => __( 'Hover', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Fill Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button.-default:hover' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill' ],
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'block_type_layout' => [ 'fill', 'outline' ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'button_typography_separator',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Button Typography', 'ohio-extra' ),
                'selectors' => [
                    '{{WRAPPER}} .button',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_type_layout'] ) {
            case 'fill':
                $this->addWrapperClass( '-default' );
                break;
            case 'outline':
                $this->addWrapperClass( '-outlined' );
                break;
            case 'flat':
                $this->addWrapperClass( '-flat' );
                break;
            case 'link':
                $this->addWrapperClass( '-text' );
                break;
        }

        switch ( $settings['button_size'] ) {
            case 'small':
                $this->addWrapperClass( '-small' );
                break;
            case 'large':
                $this->addWrapperClass( '-large' );
                break;
        }

        $align_classes = '';
        switch ( $settings['button_position'] ) {
            case 'left':
                $align_classes .= ' -left';
                break;
            case 'center':
                $align_classes .= ' -center';
                break;
            case 'right':
                $align_classes .= ' -right';
                break;
        }

        if ( $settings['inline_button'] ) {
            $align_classes .= ' -inline-flex';
        }

        if ( $settings['full_width'] ) {
            $this->addWrapperClass( '-block' );
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        if ( $settings['button_use_brand_color'] ) {
            $this->addWrapperClass( '-primary' );
        }

        if ( !$settings['title'] ) {
            $this->addWrapperClass( '-without-text' );
        }

        if ( !empty( $settings['button_color'] ) ) {
            $button_classes[] = 'btn-elementor-colored';
        }

        include( plugin_dir_path( __FILE__ ) . 'button-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Button_Widget() );
