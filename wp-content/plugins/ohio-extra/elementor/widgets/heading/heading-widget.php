<?php
class Ohio_Elementor_Heading_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );
        wp_register_script( 'ohio-elementor-heading-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'aos', 'ohio-elementor-heading-widget' ];
    }

    public function get_name()
    {
        return 'ohio_heading';
    }

    public function get_title()
    {
        return __( 'Heading', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-heading';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Heading', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'module_type_layout',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'on_left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'on_middle' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'on_right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'on_middle',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' =>__( 'Hello World', 'ohio-extra' ),
                'placeholder' => __( 'Enter the title', 'ohio-extra' ),
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
                'default' => 'h3',
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
            'add_highlighted',
            [
                'label' => __( 'Add Highlighted Text?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'title_before',
            [
                'label' => __( 'Text Before', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => '',
                'placeholder' => '',
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title_highlighted',
            [
                'label' => __( 'Highlighted Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' =>__( 'highlighted', 'ohio-extra' ),
                'placeholder' => '',
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title_after',
            [
                'label' => __( 'Text After', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' => '',
                'placeholder' => '',
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'highlighted_animation',
            [
                'label' => __( 'Use Highlighted Text Animation?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'highlighter_height',
            [
                'label' => __( 'Highlighter Height', 'ohio-extra' ),
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
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .heading .highlighted-text:not(:hover)' => 'background-size: 0% {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .heading .highlighted-text:not([data-aos=animation]):not(:hover)' => 'background-size: 100% {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .heading .highlighted-text.aos-animate:not(:hover)' => 'background-size: 100% {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'add_highlighted' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_section',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle_type_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'without_subtitle' => [
                        'title' => __( 'Without Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_039_1.svg',
                    ],
                    'top_subtitle' => [
                        'title' => __( 'Top Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_038.svg',
                    ],
                    'bottom_subtitle' => [
                        'title' => __( 'Bottom Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_039.svg',
                    ],
                ],
                'default' => 'top_subtitle',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' =>__( 'I\'m subtitle', 'ohio-extra' ),
                'placeholder' => __( 'Enter block subtitle.', 'ohio-extra' ),
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => __( 'Offset', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .title + .subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .subtitle + .title' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
            ]
        );

        $this->add_control(
            'divider_position',
            [
                'label' => __( 'Divider', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without' => __( 'Hidden', 'ohio-extra' ),
                    'before_title' => __( 'Before Title', 'ohio-extra' ),
                    'after_title' => __( 'After Title', 'ohio-extra' ),
                    'middle' => __( 'Between Title & Subtitle', 'ohio-extra' ),
                ],
                'default' => 'without',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Heading', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
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
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
            ]
        );

        $this->add_control(
            'before_color',
            [
                'label' => __( 'Text Before Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'before_typography',
                'label' => __( 'Text Before Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .text-before',
                'condition' => [
                    'add_highlighted' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'highlighted_color',
            [
                'label' => __( 'Highlighted Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .highlighted-text-holder' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'highlighted_typography',
                'label' => __( 'Highlighted Text Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .highlighted-text-holder',
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'highlighter_color',
            [
                'label' => __( 'Highlighter Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .highlighted-text' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}});'
                ],
                'condition' => [
                    'add_highlighted' => 'yes',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => __( 'Divider Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .divider' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'divider_position!' => 'without',
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['module_type_layout'] ) {
            case 'on_left':
                $this->addWrapperClass( '-left' );
                break;
            case 'on_right':
                $this->addWrapperClass( '-right' );
                break;
            default:
                $this->addWrapperClass( '-center' );
        }

        $appear_attrs = '';
        if ( $settings['highlighted_animation'] ) {
            $appear_attrs .= 'data-aos=animation data-aos-duration=600';
        }

        $settings['heading_tag'] = OhioExtraFilter::headingTag( $settings['heading_tag'] );

        include( plugin_dir_path( __FILE__ ) . 'heading-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Heading_Widget() );
