<?php
class Ohio_Elementor_Recent_Posts_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );
        wp_register_script( 'ohio-elementor-recent-posts-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'aos', 'ohio-elementor-recent-posts-widget' ];
    }

    public function get_name()
    {
        return 'ohio_recent_posts';
    }

    public function get_title()
    {
        return __( 'Blog Posts', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-recent-posts';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'Blog Posts', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'blog_grid_1' => [
                        'title' => __( 'Clasic', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_01.svg',
                    ],
                    'blog_grid_2' => [
                        'title' => __( 'Minimal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_02.svg',
                    ],
                    'blog_grid_3' => [
                        'title' => __( 'Split', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_39.svg',
                    ],
                    'blog_grid_4' => [
                        'title' => __( 'Inner', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_40.svg',
                    ],
                    'blog_grid_5' => [
                        'title' => __( 'Compact', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_41.svg',
                    ],
                    'blog_grid_6' => [
                        'title' => __( 'Simple', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_44.svg',
                    ],
                    'blog_grid_7' => [
                        'title' => __( 'Wide', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_53.svg',
                    ],
                ],
                'additional_class' => '-wide-label',
                'default' => 'blog_grid_1',
            ]
        );
        
        $post_options = [];
        global $wpdb;
        $posts = $wpdb->get_results( "SELECT post_title, ID FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish'" );
        foreach ( $posts as $project ) {
            $post_options[$project->ID] = $project->post_title;
        }

        $this->add_control(
            'posts',
            [
                'label' => __( 'Select Posts', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $post_options,
                'default' => [],
                'description' => __( 'Leave empty to choose all.', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        // Blog categories
        $param_options = [];
        $blog_categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );
        foreach ($blog_categories as $key => $category) {
            $param_options[$category->slug] = $category->name;
        }

        $this->add_control(
            'post_category',
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
            'blog_images_size',
            [
                'label' => __( 'Thumbnail Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit'  => __( 'Inherit from Theme Settings', 'ohio-extra' ),
                    'thumbnail' => __( 'Thumbnail', 'ohio-extra' ),
                    'medium' => __( 'Small', 'ohio-extra' ),
                    'medium_large' => __( 'Medium', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                    'ohio_full' => __( 'Original', 'ohio-extra' ),
                ],
                'label_block' => true,
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
                    '{{WRAPPER}} .-with-shadow:not(.-contained) .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
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
                    '{{WRAPPER}} .blog-item:not(.-contained) .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .blog-item.-contained' => 'border-radius: {{SIZE}}{{UNIT}};'
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
            ]
        );

        $this->add_control(
            'use_boxed_layout',
            [
                'label' => __( 'Contained Layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Add side gaps for blog cards.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_3', 'blog_grid_5', 'blog_grid_6', 'blog_grid_7' ]
                ]
            ]
        );

        $this->add_control(
            'show_short_description',
            [
                'label' => __( 'Show Excerpt?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label' => __( 'Show "Read More"?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_author',
            [
                'label' => __( 'Show Author?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_categories',
            [
                'label' => __( 'Show Categories?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_reading_time',
            [
                'label' => __( 'Show Reading Time?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
       );

        $this->add_control(
            'show_date',
            [
                'label' => __( 'Show Date?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'masonry_grid',
            [
                'label' => __( 'Use Masonry?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'items_in_block',
            [
                'label' => __( 'Output Limit', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( 'Set the maximum number of posts per widget.', 'ohio-extra' ),
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
            'grid_spacing_css',
            [
                'label' => __( 'Gutters', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __( '<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">Set gutters value</a> for the entire site.', 'ohio-extra' ),
                'default' => '',
                'placeholder' => __( 'Use CSS unit value.', 'ohio-extra' ),
                'label_block' => true,
                'selectors' => [
                    '{{WRAPPER}} .grid-item:not(.-nospace)' => 'padding: {{SIZE}};',
                    '@media screen and (min-width: 769px){ {{WRAPPER}} .vc_row:not(.-nospace).blog-posts' => 'margin-top: -{{SIZE}} };'  
                ],
                'condition' => [
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5', 'blog_grid_7' ]
                ]
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
                ]
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
                    'animation_type' => [ 'sync', 'async' ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'default' => ''
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
                    'default' => 'Default',
                    'outlined' => 'Outlined',
                    'flat' => 'Text',
                ],
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
                    'default' => 'Default',
                    'small' => 'Small',
                    'large' => 'Large',
                ],
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
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Blog Posts', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-item .title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Excerpt Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .card-details > p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog-item .card-details .card-details-item > p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Excerpt Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .card-details > p',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __( 'Category Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .category-holder' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __( 'Category Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .category-holder',
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label' => __( '"Read More" Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .button' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'read_more_typography',
                'label' => __( '"Read More" Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .button',
            ]
        );

        $this->add_control(
            'category_badge_color',
            [
                'label' => __( 'Category Badge Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-item .category-holder .tag' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __( 'Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-item.-contained .card-details' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .blog-item.-layout4 .image-holder' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-item.-img-overlay .image-holder::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .blog-item.-img-overlay .overlay' => 'background: {{VALUE}}'
                ],
                'condition' => [
                    'card_effect' => [ 'overlay' ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'additional_style_section',
            [
                'label' => __( 'Meta', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Published Date Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .date' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __( 'Published Date Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .date',
            ]
        );

        $this->add_control(
            'reading_time_color',
            [
                'label' => __( 'Reading Time Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .post-meta-estimate' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'reading_time_typography',
                'label' => __( 'Reading Time Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .post-meta-estimate',
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label' => __( 'Author Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .meta-holder' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'label' => __( 'Author Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .meta-holder',
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
    }

    protected function render() {
        global $post;

        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( !empty( $settings['masonry_grid'] ) ) {
            $this->addWrapperClass( 'ohio-masonry' );
        }

        if ( isset( $settings['grid_spacing_css'] ) && !preg_replace( "/[^0-9.]/", '', (string) $settings['grid_spacing_css'] ) ) {
            $this->addWrapperClass( '-nospace' );
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

        // Data
        $posts_data = $this->getPostsData( $settings['posts'], $settings['post_category'], intval( $settings['items_in_block']['size'] ), $settings['order'], $settings['orderby'] );
        $pagination_page = OhioHelper::get_current_pagenum();

        include( plugin_dir_path( __FILE__ ) . 'recent-posts-view.php' );
    }

    protected function getPostsData( $posts = [], $categories = [], $posts_count = 12, $order = 'DESC', $orderby = 'date' )
    {
        $_tax_query = [];

        if ( count( $categories ) > 0 ) {
            $_tax_query = [[
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $categories
            ]];
        }

        return get_posts( [
            'posts_per_page' => $posts_count,
            'offset' => 0,
            'post_type' => 'post',
            'post__in' => $posts,
            'tax_query' => $_tax_query,
            'post_status' => 'publish',
            'suppress_filters' => false,
            'order' => $order,
            'orderby' => $orderby,
        ] );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Recent_Posts_Widget() );
