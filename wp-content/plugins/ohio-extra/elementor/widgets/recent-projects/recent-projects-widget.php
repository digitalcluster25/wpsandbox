<?php
class Ohio_Elementor_Recent_Projects_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libs/isotope.pkgd.min.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );

        wp_register_script( 'ohio-elementor-recent-projects-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'masonry', 'isotope', 'aos', 'ohio-elementor-recent-projects-widget' ];
    }

    public function get_name()
    {
        return 'ohio_recent_projects';
    }

    public function get_title()
    {
        return __( 'Portfolio Projects', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-recent-projects';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Portfolio Projects', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'card_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'grid_1' => [
                        'title' => __( 'Classic', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_01.svg',
                    ],
                    'grid_2' => [
                        'title' => __( 'Minimal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_02.svg',
                    ],
                    'grid_13' => [
                        'title' => __( 'Sticky', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_46.svg',
                    ],
                    'grid_11' => [
                        'title' => __( 'Caption Cursor', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_43.svg',
                    ],
                    'grid_3' => [
                        'title' => __( 'Slider: Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_03.svg',
                    ],
                    'grid_4' => [
                        'title' => __( 'Slider: Vertical', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_04.svg',
                    ],
                    'grid_6' => [
                        'title' => __( 'Carousel: Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_06.svg',
                    ],
                    'grid_5' => [
                        'title' => __( 'Smooth Scroll: Split Screen', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_05.svg',
                    ],
                    'grid_7' => [
                        'title' => __( 'Smooth Scroll: Fullscreen', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_07.svg',
                    ],
                    'grid_8' => [
                        'title' => __( 'Interactive: Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_42.svg',
                    ],
                    'grid_9' => [
                        'title' => __( 'Smooth Scroll: Scattered', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_37.svg',
                    ],
                    'grid_10' => [
                        'title' => __( 'Smooth Scroll: Centered', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_38.svg',
                    ],
                    'grid_12' => [
                        'title' => __( 'Vertical interactive Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_45.svg',
                    ]
                ],
                'additional_class' => '-wide-label',
                'default' => 'grid_1',
            ]
        );

        $project_options = [];
        global $wpdb;
        $projects = $wpdb->get_results( "SELECT post_title, ID FROM $wpdb->posts WHERE post_type = 'ohio_portfolio' AND post_status = 'publish'" );
        foreach ( $projects as $project ) {
            $project_options[$project->ID] = $project->post_title;
        }

        $this->add_control(
            'projects',
            [
                'label' => __( 'Select Projects', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $project_options,
                'default' => [],
                'description' => __( 'Leave empty to choose all.', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $param_options = [];
        $portfolio_categories = get_terms( array(
            'taxonomy' => 'ohio_portfolio_category',
            'hide_empty' => false,
        ) );
        foreach ($portfolio_categories as $key => $category) {
            if ( !empty( $category->slug ) && isset( $category->name ) ) {
                $param_options[$category->slug] = $category->name;
            }
        }

        $this->add_control(
            'portfolio_category',
            [
                'label' => __( 'Categories', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'placeholder' => __( 'All categories', 'ohio-extra' ),
                'description' => __( 'Leave empty to choose all categories.', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'       => __( 'Order By', 'ohio-extra' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => [
                    'date'          => __( 'Published Date', 'ohio-extra' ),
                    'ID'            => __( 'ID', 'ohio-extra' ),
                    'author'        => __( 'Author', 'ohio-extra' ),
                    'title'         => __( 'Title', 'ohio-extra' ),
                    'name'          => __( 'Post Slug', 'ohio-extra' ),
                    'type'          => __( 'Post Type', 'ohio-extra' ),
                    'modified'      => __( 'Modified Date', 'ohio-extra' ),
                    'parent'        => __( 'Parent ID', 'ohio-extra' ),
                    'rand'          => __( 'Random', 'ohio-extra' ),
                    'comment_count' => __( 'Comment Count', 'ohio-extra' ),
                    'menu_order'    => __( 'Menu Order', 'ohio-extra' ),
                ],
                'default'     => 'date',
                'description' => __( 'For masonry layouts the resulting layout might not match the sorting order.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => __( 'Order', 'ohio-extra' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ASC'  => __( 'Ascending', 'ohio-extra' ),
                    'DESC' => __( 'Descending', 'ohio-extra' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'portfolio_images_size',
            [
                'label' => __( 'Thumbnail Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit' => __( 'Inherit from Theme Settings', 'ohio-extra' ),
                    'thumbnail' => __( 'Thumbnail', 'ohio-extra' ),
                    'medium' => __( 'Small', 'ohio-extra' ),
                    'medium_large' => __( 'Medium', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                    'ohio_full' => __( 'Original', 'ohio-extra' ),
                ],
                'label_block' => true
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Cards Corners', 'ohio-extra' ),
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
                    '{{WRAPPER}} .portfolio-item:not(.-contained) .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained:not(.-layout13)' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained.-layout13 .card-image .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained.-layout13 .card-details' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
            ]
        );

        $this->add_control(
            'card_boxed_layout',
            [
                'label' => __( 'Contained Layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Add side gaps for portfolio cards.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_13' ],
                ],
            ]
        );

        $this->add_control(
            'card_reversed_layout',
            [
                'label' => __( 'Reversed Layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => 'grid_13',
                ],
            ]
        );
        
        $this->add_control(
            'use_metro_style',
            [
                'label' => __( 'Equal Height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Convert a rectangular image into a cropped square.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
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
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
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
                    '{{WRAPPER}} .-with-shadow:not(.-contained) .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained:not(.-layout13)' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained.-layout13 .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained.-layout13 .card-details' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
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
                    'transition' => __( 'Image Transition', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
            ]
        );

        $this->add_control(
            'slider_direction',
            [
                'label' => __( 'Slider Direction', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4' ]
                ],
            ]
        );

        $this->add_control(
            'slider_direction_mobile',
            [
                'label' => __( 'Slider Direction (Mobile)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4' ]
                ],
            ]
        );

        $this->add_control(
            'fullscreen_mode',
            [
                'label' => __( 'Fullscreen Mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'loop_mode',
            [
                'label' => __( 'Loop Mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'mousewheel_scroll',
            [
                'label' => __( 'Mouse-Wheel Scrolling', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_mode',
            [
                'label' => __( 'Autoplay Mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_timeout',
            [
                'label' => __( 'Autoplay Interval Timeout (ms)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '3000',
                'condition' => [
                    'autoplay_mode' => 'yes',
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'bullets_visibility',
            [
                'label' => __( 'Show Pagination?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'slider_pagination_type',
            [
                'label' => __( 'Pagination Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'boxed' => __( 'Boxed', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'bullets_visibility' => 'yes',
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'navigation_visibility',
            [
                'label' => __( 'Show Navigation?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label' => __( 'Show Excerpt?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_2', 'grid_8', 'grid_11', 'grid_12' ],
                ],
            ]
        );

        $this->add_control(
            'show_featured_video',
            [
                'label' => __( 'Show Featured Video?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_video_button',
            [
                'label' => __( 'Show Video Button?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_featured_video!' => 'yes',
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->add_control(
            'video_button_style',
            [
                'label' => __( 'Video Button Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'outlined' => __( 'Outlined', 'ohio-extra' ),
                    'blurred' => __( 'Blurred', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'show_video_button' => 'yes',
                    'show_featured_video!' => 'yes',
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->add_control(
            'video_button_size',
            [
                'label' => __( 'Video Button Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'small' => __( 'Small', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'show_video_button' => 'yes',
                    'show_featured_video!' => 'yes',
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->end_controls_section();

        // Grid
        $this->start_controls_section(
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'projects_in_block',
            [
                'label' => __( 'Output Limit', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( 'Set the maximum number of projects per widget.', 'ohio-extra' ),
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 12,
                ],
            ]
        );

        $this->add_control(
            'grid_items_gap',
            [
                'label' => __( 'Gutters', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __( '<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">Set gutters value</a> for the entire site.', 'ohio-extra' ),
                'default' => '16px',
                'label_block' => true,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid-item:not(.-nospace)' => 'padding: {{SIZE}};',
                    '{{WRAPPER}} .portfolio-grid:not(.-nospace)' => 'margin-left: -{{SIZE}}; margin-right: -{{SIZE}};',
                    '{{WRAPPER}} .double-width:not(.vc_col-lg-12) .card.-metro .image-holder' => 'padding-bottom: calc(50% - {{SIZE}});'
                ]
            ]
        );

        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Items Per Row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );
        
        $this->add_control(
            'items_per_row_desktop',
            [
                'label' => __( 'Desktop', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_tablet',
            [
                'label' => __( 'Tablet', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_mobile',
            [
                'label' => __( 'Mobile', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'animation_type',
            [
                'label' => __( 'Use Animation?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [
                    'disable'  => __( 'Without Animation', 'ohio-extra' ),
                    'sync'  => __( 'Synchronous', 'ohio-extra' ),
                    'async'  => __( 'Asynchronous', 'ohio-extra' ),
                ],
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'animation_effect',
            [
                'label' => __( 'Animation Effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade-up',
                'options' => [
                    'fade-up'  => __( 'Fade Up', 'ohio-extra' ),
                    'fade-down'  => __( 'Fade Down', 'ohio-extra' ),
                    'fade-left'  => __( 'Fade Left', 'ohio-extra' ),
                    'fade-right'  => __( 'Fade Right', 'ohio-extra' ),
                    'flip-up'  => __( 'Flip Up', 'ohio-extra' ),
                    'flip-down'  => __( 'Flip Down', 'ohio-extra' ),
                    'zoom-in'  => __( 'Zoom In', 'ohio-extra' ),
                    'zoom-out'  => __( 'Zoom Out', 'ohio-extra' ),
                ],
                'condition' => [
                    'animation_type' => [ 'sync', 'async' ],
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ]
            ]
        );

        $this->end_controls_section();

        // Filter
        $this->start_controls_section(
            'filter_section',
            [
                'label' => __( 'Filter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'show_projects_filter',
            [
                'label' => __( 'Show Filter?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'filter_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'ohio-extra' ),
                    'button'  => __( 'Button', 'ohio-extra' ),
                ],
                'condition' => [
                    'show_projects_filter' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __( 'Position', 'ohio-extra' ),
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
                'condition' => [
                    'show_projects_filter' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_empty_categories',
            [
                'label' => __( 'Show Empty Categories?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_projects_filter' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Pagination
        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'use_pagination',
            [
                'label' => __( 'Use Pagination?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );


        $this->add_control(
            'items_per_page',
            [
                'label' => __( 'Items Per Page', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( 'Set a number of grid items output per page.', 'ohio-extra' ),
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 25,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 6,
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'standard',
                'options' => [
                    'standard'  => __( 'Standard', 'ohio-extra' ),
                    'lazy_load'  => __( 'Lazy Load', 'ohio-extra' ),
                    'load_more'  => __( 'Load More', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_style',
            [
                'label' => __( 'Style', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'ohio-extra' ),
                    'outlined'  => __( 'Outlined', 'ohio-extra' ),
                    'flat'  => __( 'Text', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_size',
            [
                'label' => __( 'Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'ohio-extra' ),
                    'small'  => __( 'Small', 'ohio-extra' ),
                    'large'  => __( 'Large', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_position',
            [
                'label' => __( 'Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => __( 'Left', 'ohio-extra' ),
                    'center'  => __( 'Center', 'ohio-extra' ),
                    'right'  => __( 'Right', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Lightbox
        $this->start_controls_section(
            'lightbox_section',
            [
                'label' => __( 'Lightbox', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'lightbox_visibility',
            [
                'label' => __( 'Show Lightbox?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => 'To find more lightbox settings navigate to global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">Theme Settings</a>',
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Portfolio Projects', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .headline' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .headline, {{WRAPPER}} .grid-item .title',
            ]
        );

        $this->add_control(
            'short_description_color',
            [
                'label' => __( 'Excerpt Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-details' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'short_description_typography',
                'label' => __( 'Excerpt Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-details',
                'condition' => [
                    'card_layout!' => [ 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __( 'Categories Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-content .category-holder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .category-holder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __( 'Categories Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-content .category-holder, {{WRAPPER}} .grid-item .category-holder',
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => __( 'Project Link Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-content .button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .show-project-link' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_11' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => __( 'Project Link Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-content .btn-lightbox, {{WRAPPER}} .grid-item .show-project-link',
                'condition' => [
                    'card_layout!' => [ 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Published Date Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .headline-meta .date' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item .project-content .date' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __( 'Published Date Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .headline-meta .date, {{WRAPPER}} .portfolio-item .project-content .date',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-onepage-slider' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout10 .overlay-image::before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-contained .card-details' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_7', 'grid_9', 'grid_10', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item.-layout3 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout4 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout5 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout6 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-img-overlay .image-holder::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-img-overlay .overlay' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .grid_7 .portfolio-item-image::before' => 'background: linear-gradient(90deg, rgba(0, 0, 0, 0) 0%, {{VALUE}});',
                    '{{WRAPPER}} .grid_8 .portfolio-item-image::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .grid_10 .portfolio-item-image::before' => 'background: linear-gradient(270deg, rgba(0, 0, 0, 0) 0%, {{VALUE}});',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_9', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'video_button_color',
            [
                'label' => __( 'Video Button Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button:not(.-outlined) .icon-button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .video-button.-outlined .icon-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'button_nav_color',
            [
                'label' => __( 'Navigation Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4', 'grid_5', 'grid_6', 'grid_7', 'grid_9', 'grid_10' ]
                ],
            ]
        );

        $this->add_control(
            'pagination_btn_color',
            [
                'label' => __( 'Pagination Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-pagination' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4', 'grid_5', 'grid_6', 'grid_7', 'grid_9', 'grid_10' ]
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'filter_styles_section',
            [
                'label' => __( 'Filter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_projects_filter' => 'yes',
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ]
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => __( 'Filter Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-filter a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'label' => __( 'Filter Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-filter, {{WRAPPER}} .portfolio-filter a',
            ]
        );

        $this->add_control(
            'filter_active_color',
            [
                'label' => __( 'Filter Color (Active)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-filter a.active' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_section();








        // Pagination
        $this->start_controls_section(
            'pagination_styles',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
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
            'pagination_color',
            [
                'label' => __( 'Pagination Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination' => '--clb-color-paginator-button: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load' => '--clb-color-paginator-button: {{VALUE}};'
                ]
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
            'pagination_active_color',
            [
                'label' => __( 'Pagination Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination' => '--clb-color-paginator-button-hover: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load' => '--clb-color-paginator-button-hover: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'lightbox_styles_section',
            [
                'label' => __( 'Lightbox', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'lightbox_visibility' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'lightbox_button_color',
            [
                'label' => __( 'Lightbox Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-lightbox .icon' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['card_layout'] == 'grid_8' || $settings['card_layout'] == 'grid_12' ) {
            $this->addWrapperClass( 'portfolio-links ' . esc_attr( $settings['card_layout'] ) );
        }
        else {
            $this->addWrapperClass( esc_attr( $settings['card_layout'] ) );
        }

        if ( $settings['fullscreen_mode'] ) {
            $this->addWrapperClass( '-full-vh' );
        }
        if ( $settings['show_projects_filter'] ) {
            $this->addWrapperClass( '-with-sorting' );
        }
        if ( $settings['use_pagination'] ) {
            $this->addWrapperClass( '-with-pagination' );
        }
        if ( $settings['card_reversed_layout'] ) {
            $this->addWrapperClass( '-reversed' );
        }

        // Slider Pagination Type
        $pagination_type_class = '';
        if ( $settings['slider_pagination_type'] == 'boxed' ) {
            $pagination_type_class .= ' -with-boxed-pagination';
        }

        $is_slider = false;
        switch ( $settings['card_layout'] ) {
            case 'grid_3':
            case 'grid_4':
            case 'grid_5':
            case 'grid_6':
            case 'grid_7':
            case 'grid_9':
            case 'grid_10':
                $is_slider = true;
                break;
        }

        // Row string value compatibility
        $columns_in_row = $settings['items_per_row_desktop'] . '-' . $settings['items_per_row_tablet'] . '-' . $settings['items_per_row_mobile'];
        $column_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row );
        $column_double_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row, true );

        // Pagination
        $additional_classes = [];
        if ( in_array( $settings['pagination_style'], [ 'outlined', 'flat' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_style'];
        }
        if ( in_array( $settings['pagination_size'], [ 'large', 'small' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_size'];
        }
        if ( in_array( $settings['pagination_position'], [ 'center', 'right' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_position'] . '-flex';
        }

        $style_class = [];
        if ( in_array( $settings['pagination_style'], [ 'default', 'outlined', 'flat' ], true ) ) {
            $style_class[] = '-' . $settings['pagination_style'];
        }

        // Project data
        $projects_limit = ( !empty( $settings['projects_in_block'] ) ) ? intval( $settings['projects_in_block']['size'] ) : 12;
        $projects_data = $this->getProjectsData( $settings['projects'], $settings['portfolio_category'], $projects_limit, $settings['order'], $settings['orderby'] );
        $pagination_page = OhioHelper::get_current_pagenum();

        $per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
        $pages_count = ceil( count( $projects_data ) / $per_page );
        $filter_is_paged = ( $pages_count > 1 ) && in_array( $settings['pagination_type'], [ 'simple', 'standard' ] );
        $category_id_allowlist = [];
    
        if (!$settings['show_empty_categories']) {
            $_post_start = $pagination_page * $per_page - $per_page;
            $current_page_projects_ids = wp_list_pluck( array_slice( $projects_data, $_post_start, $per_page), 'ID' );
            $category_id_allowlist = wp_list_pluck( wp_get_object_terms( $current_page_projects_ids, 'ohio_portfolio_category' ), 'term_id');
        }
    

        include( plugin_dir_path( __FILE__ ) . 'recent-projects-view.php' );
    }

    protected function getProjectsData( $projects = [], $categories = [], $projects_count = 12, $order = 'DESC', $orderby = 'date' )
    {
        $_tax_query = [];

        if ( count( $categories ) > 0 ) {
            $_tax_query = [[
                'taxonomy' => 'ohio_portfolio_category',
                'field' => 'slug',
                'terms' => $categories
            ]];
        }

        return get_posts( apply_filters( 'ohio_projects_args_filter', [
            'posts_per_page' => $projects_count,
            'offset' => 0,
            'post_type' => 'ohio_portfolio',
            'post__in' => $projects,
            'tax_query' => $_tax_query,
            'post_status' => 'publish',
            'suppress_filters' => false,
            'order' => $order,
            'orderby' => $orderby,
        ] ) );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Recent_Projects_Widget() );
