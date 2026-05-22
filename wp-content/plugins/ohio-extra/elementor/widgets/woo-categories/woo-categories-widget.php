<?php
class Ohio_Elementor_Woo_Categories_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_woo_categories';
    }

    public function get_title()
    {
        return __( 'Woo Categories', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-woo-categories';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Woo Categories', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'category_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'boxed' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_088.svg',
                    ],
                    'default' => [
                        'title' => __( 'Offset', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_086.svg',
                    ]
                ],
                'default' => 'boxed',
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
            ]
        );

        $param_options = [];
        $woo_categories = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] );

        foreach ($woo_categories as $key => $category) {
            if ( isset( $category->slug ) && isset( $category->name ) ) {
                $param_options[$category->slug] = $category->name;
            }
        }

        $this->add_control(
            'woo_categories',
            [
                'label' => __( 'Categories', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'description' => 'Leave empty for "All categories"',
                'label_block' => true
            ]
        );

        $this->add_control(
            'subtitle_position',
            [
                'label' => __( 'Description Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => __( 'Before Title', 'ohio-extra' ),
                    'bottom' => __( 'After Title', 'ohio-extra' ),
                ],
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
                    '{{WRAPPER}} .wc-category:not(.-offset) .card' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
                'condition' => [
                    'category_layout' => 'boxed'
                ]
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
                    '{{WRAPPER}} .wc-category:not(.-offset) .card' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wc-category.-offset .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'equal_height',
            [
                'label' => __( 'Equal Height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Convert a rectangular image into a cropped square.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
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
                'default' => ''
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
                    '{{WRAPPER}} .wc-category:not(.-offset) .card.-with-shadow' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .wc-category.-offset .card.-with-shadow .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'card_effect',
            [
                'label' => __( 'Hover Effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __( 'None', 'ohio-extra' ),
                    'scale' => __( 'Image Scaling', 'ohio-extra' ),
                    'overlay' => __( 'Image Overlay', 'ohio-extra' ),
                    'greyscale' => __( 'Image Greyscale', 'ohio-extra' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_columns',
            [
                'label' => __( 'Number of Columns ', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '12' => '1 Column',
                    '6' => '2 Columns',
                    '4' => '3 Columns',
                    '3' => '4 Columns',
                ],
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
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Link Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Start Shopping',
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
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

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'without',
                'options' => [
                    'without' => 'Without icon',
                    'left' => 'Left side',
                    'right' => 'Right side',
                ],
                'condition' => [
                    'use_link' => 'yes',
                ],
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
                ],
                'condition' => [
                    'icon_position!' => 'without'
                ]
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                    'icon_position!' => 'without'
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
                    'icon_position!' => 'without'
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Woo Categories', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Shape Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-category:not(.-offset) .wc-category-content' => 'background-color: {{VALUE}}'
                ],
                'condition' => [
                    'category_layout' => 'boxed'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Shape Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-category:not(.-offset) .card' => 'border-color:{{VALUE}}',
                ],
                'condition' => [
                    'category_layout' => 'boxed'
                ]
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $woocommerce_active = class_exists( 'woocommerce' );

        // Wrapper classes
        switch ( $settings['alignment'] ) {
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        if ( $settings['equal_height'] ) {
            $this->addWrapperClass( '-metro' );
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        $layout_classes = '';
        switch ( $settings['category_layout'] ) {
            case 'default':
                $layout_classes .= ' -offset';
                break;
        }
        
        $drop_shadow_classes = '';
        if ( $settings['drop_shadow'] ) {
            $drop_shadow_classes .= ' -contained';
            $drop_shadow_classes .= ' -with-shadow';
        }

        $card_classes = '';
        if ( $settings['drop_shadow'] ) {
            $card_classes .= ' -contained';
            $card_classes .= ' -with-shadow';
        }

        switch ( $settings['card_effect'] ) {
            case 'scale':
                $card_classes .= ' -img-scale';
                break;
            case 'overlay':
                $card_classes .= ' -img-overlay';
                break;
            case 'greyscale':
                $card_classes .= ' -img-greyscale';
                break;
        }

        // Data
        $categories_data = [];
        if ( $woocommerce_active ) {
            $categories_data = $this->getCategoriesData( $settings['woo_categories'] );
        }

        include( plugin_dir_path( __FILE__ ) . 'woo-categories-view.php' );
    }

    protected function getCategoriesData($categories)
    {
        $results = [];

        $terms = [];
        if ( !empty( $categories ) ) {
            foreach ( $categories as $category_slug ) {
                $terms[] = get_term_by( 'slug', $category_slug, 'product_cat' );
            }
        } else {
            $terms = get_terms( [
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
            ] );
        }

        foreach ( $terms as $term ) {
            $cat = (object)[
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => ''
            ];

            if ( $term ) {
                $cat->title = isset( $term->name ) ? $term->name : '';
                $cat->description = isset( $term->description ) ? $term->description : '';
                $cat->url = get_term_link( $term->term_id, 'product_cat' );

                $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                if ( $thumbnail_id ) {
                    $cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
                    if ( is_array( $cat->image ) ) {
                        $cat->image = $cat->image[0];
                    }
                } else {
                    $cat->image = wc_placeholder_img_src();
                }

                if ( $cat->image ) {
                    $cat->image = str_replace( ' ', '%20', $cat->image );
                }
            }

            $results[] = $cat;
        }

        return $results;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Woo_Categories_Widget() );
