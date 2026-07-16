<?php
class Ohio_Elementor_Pricing_Table_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_pricing_table';
    }

    public function get_title()
    {
        return __( 'Pricing Table', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-pricing-table';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'Pricing Table', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'table_align',
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

        $this->add_control(
            'headline',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Basic Plan', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Good for start', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '10',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'old_price',
            [
                'label' => __( 'Original Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'description' => __( 'The price before the discount was applied.', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => __( 'Badge', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'Add an extra caption (e.g. Bill Monthly).', 'ohio-extra' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __( 'Currency', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$',
                'description' => __( '$, €, £, ¥, USD, EUR, anything.', 'ohio-extra' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'boxed_layout',
            [
                'label' => __( 'Gutters', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( '<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">Set gutters value</a> for the entire site.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Table Border', 'ohio-extra' ),
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
                    '{{WRAPPER}} .pricing-table' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
                'condition' => [
                    'boxed_layout' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Table Corners', 'ohio-extra' ),
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
                    '{{WRAPPER}} .pricing-table' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'boxed_layout' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'tilt_effect',
            [
                'label' => __( 'Tilt Effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'boxed_layout' => 'yes',
                ]
            ],
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
                    'boxed_layout' => 'yes',
                ]
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
                    '{{WRAPPER}} .pricing-table.-with-shadow' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'table_button_position',
            [
                'label' => __( 'Button Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'After Features', 'ohio-extra' ),
                    'top' => __( 'Before Features', 'ohio-extra' ),
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getFeaturesControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Add Button?', 'ohio-extra' ),
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
                'default' => 'Read more',
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

        // Styles
        $this->start_controls_section(
            'basic_styles_section',
            [
                'label' => __( 'Pricing Table', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'headline_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h5.title:not(.price-number)' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h5.title:not(.price-number)',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );

        
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table-details' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-table-details',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-number' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __( 'Price Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .price-number',
            ]
        );

        $this->add_control(
            'old_price_color',
            [
                'label' => __( 'Original Price Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .old-price' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'old_price_typography',
                'label' => __( 'Original Price Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .old-price',
            ]
        );

        $this->add_control(
            'price_cap_color',
            [
                'label' => __( 'Badge Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tag' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_cap_typography',
                'label' => __( 'Badge Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tag',
            ]
        );

        $this->add_control(
            'price_bg_cap_color',
            [
                'label' => __( 'Badge Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tag' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'price_table_bg_color',
            [
                'label' => __( 'Table Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'boxed_layout' => 'yes',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Table Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table' => 'border-color:{{VALUE}}'
                ],
                'condition' => [
                    'boxed_layout' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_styles_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'feature_color',
            [
                'label' => __( 'Features Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table-features .exist' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_typography',
                'label' => __( 'Features Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-table-features .exist',
            ]
        );


        $this->add_control(
            'feature_dis_color',
            [
                'label' => __( 'Disabled Features Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table-features .missing' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_dis_typography',
                'label' => __( 'Disabled Features Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-table-features .missing',
            ]
        );

        $this->add_control(
            'feature_enabled_icon_color',
            [
                'label' => __( 'Features Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table-features .exist .icon' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'feature_disabled_icon_color',
            [
                'label' => __( 'Disabled Features Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table-features .missing .icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['table_align'] ) {
            case 'left':
                $this->addWrapperClass( '-left' );
                break;
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        if ( $settings['boxed_layout'] ) {
            $this->addWrapperClass( '-contained card' );
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        include( plugin_dir_path( __FILE__ ) . 'pricing-table-view.php' );
    }

    protected function getFeaturesControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_type',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without'  => __( 'Without icon', 'ohio-extra' ),
                    'enabled'  => __( '"Enabled" icon', 'ohio-extra' ),
                    'disabled' => __( '"Disabled" icon', 'ohio-extra' ),
                ],
                'default' => 'without',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Some cool feature', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        
        return $repeater->get_controls();
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Pricing_Table_Widget() );
