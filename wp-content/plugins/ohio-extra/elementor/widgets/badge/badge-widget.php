<?php
class Ohio_Elementor_Badge_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_badge';
    }

    public function get_title()
    {
        return __( 'Badge', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-badge';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Badge', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'fill' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_023.svg',
                    ],
                    'outlined' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_024.svg',
                    ],
                ],
                'default' => 'fill',
            ]
        );

        $this->add_control(
            'alignment',
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
                'default' => 'left',
                'toggle' => false,
            ]
        );

        // General
        $this->add_control(
            'title',
            [
                'label' => __( 'Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Badge',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'text_before',
            [
                'label' => __( 'Label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
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
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
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
                    // 'size' => 0.35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .badge-inner' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Add Link?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'use_link' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
         $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Badge', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'color:{{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Label Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->add_control(
            'text_before_color',
            [
                'label' => __( 'Label Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge .badge-inner' => 'color:{{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_before_typography',
                'label' => __( 'Text Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .badge .badge-inner',
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __( 'Badge Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge:not(.-outlined)' => 'background-color:{{VALUE}}',
                    '{{WRAPPER}} .badge.-outlined' => 'border-color:{{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'text_before_fill_color',
            [
                'label' => __( 'Label Fill Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge .badge-inner' => 'background-color:{{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'border-color:{{VALUE}}'
                ],
                'condition' => [
                    'layout' => 'fill'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['layout'] ) {
            case 'outlined':
                $this->addWrapperClass( '-outlined' );
                break;
        }

        $align_classes = '';
        switch ( $settings['alignment'] ) {
            case 'center':
                $align_classes .= '-center';
                break;
            case 'right':
                $align_classes .= '-right';
                break;
        }

        $has_link = !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] );

        include( plugin_dir_path( __FILE__ ) . 'badge-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Badge_Widget() );
