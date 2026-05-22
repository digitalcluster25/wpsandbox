<?php
class Ohio_Elementor_Icon_Box_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_icon_box';
    }

    public function get_title()
    {
        return __( 'Icon Box', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-icon-box';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Icon Box', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'icon_box_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'top_icon' => [
                        'title' => __( 'Top Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'left_icon' => [
                        'title' => __( 'Left Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ]
                ],
                'default' => 'top_icon',
            ]
        );

        $this->add_control(
            'icon_box_full_layout',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'none' => [
                        'title' => __( 'Inline Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ],
                    'full' => [
                        'title' => __( 'Floating Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_016.svg',
                    ]
                ],
                'default' => 'none'
            ]
        );

        $this->add_control(
            'icon_box_alignment',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_013.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_014.svg',
                    ]
                ],
                'default' => 'center',
                'condition' => [
                    'icon_box_layout' => 'top_icon',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Hello there!',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Title HTML Tag', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h5',
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
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
            'icon_layout',
            [
                'label' => __( 'Variation', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_017.svg',
                    ],
                    'border' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_018.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_019.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => 'Icon',
                    'image' => 'Custom Image',
                    'html' => 'Custom HTML',
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
                    'icon_type' => 'image',
                ],
                'dynamic' => [
                    'active' => true,
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

        $this->add_control(
            'icon_border_width',
            [
                'label' => __( 'Icon Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ],
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
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border: {{SIZE}}{{UNIT}} solid;'
                ],
            ]
        );

        $this->add_control(
            'icon_corners',
            [
                'label' => __( 'Icon Corners', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'condition' => [
                    'icon_type' => [ 'icon', 'html' ],
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-group .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group > span' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group svg' => 'height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'link_section',
            [
                'label' => __( 'Link', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Link Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Read more', 'ohio-extra' ),
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
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
                'label' => __( 'Icon Box', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-heading' => 'color: {{VALUE}};'
                ] 
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .icon-box-heading',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-content p' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .icon-box-content p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styles_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-group' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'icon_back_color',
            [
                'label' => __( 'Icon Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-contained' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => 'fill',
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => __( 'Icon Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ]
            ]
        );

        $this->end_controls_section();
  
        $this->addButtonStyleSection();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['icon_box_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left -flex-just-start' );
                break;
            case 'center':
                $this->addWrapperClass( '-center -flex-just-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right -flex-just-end' );
                break;
        }

        switch ( $settings['icon_box_full_layout'] ) {
            case 'full':
                $this->addWrapperClass( '-floating-icon' );
                break;
        }

        if ( $settings['icon_box_full_layout'] != 'full' ) { 

            switch ( $settings['icon_box_layout'] ) {
                case 'left_icon':
                    $this->addWrapperClass( '-left-icon' );
                    break;
            }
        }

        $settings['icon_classes'] = '';
        switch ( $settings['icon_layout'] ) {
            case 'border':
                $settings['icon_classes'] = '-outlined';
                break;
            case 'fill':
                $settings['icon_classes'] = '-contained';
                break;
        }

        $settings['heading_tag'] = OhioExtraFilter::headingTag( $settings['heading_tag'], 'h5' );

        include( plugin_dir_path( __FILE__ ) . 'icon-box-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Icon_Box_Widget() );
