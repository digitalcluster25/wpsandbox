<?php
class Ohio_Elementor_Compare_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-compare-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );

        wp_enqueue_script( 'jquery-event-move', get_template_directory_uri() . '/assets/js/libs/jquery.event.move.min.js', [ 'jquery' ], '1.0.0', true);
        wp_enqueue_script( 'jquery-twentytwenty', get_template_directory_uri() . '/assets/js/libs/jquery.compare.min.js',[ 'jquery', 'jquery-event-move' ], '1.0.0', true);
    }

    public function get_name()
    {
        return 'ohio_compare';
    }

    public function get_title()
    {
        return __( 'Compare', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-compare';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-compare-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Compare', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General

        $this->add_control(
            'first_image',
            [
                'label' => __( 'Image Before', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'second_image',
            [
                'label' => __( 'Image After', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'orientation',
            [
                'label' => __( 'Orientation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'default' => 'horizontal',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'use_label',
            [
                'label' => __( 'Show Labels?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label' => __( 'Before Label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Before', 'ohio-extra' ),
                'condition' => [
                    'use_label' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label' => __( 'After Label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'After', 'ohio-extra' ),
                'condition' => [
                    'use_label' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'divider_position',
            [
                'label' => __( 'Divider Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'label_block' => true,
                'description' => __( 'Initial position of the divider in %', 'ohio-extra' ),
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
                    '{{WRAPPER}} .compare' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;'
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
                    '{{WRAPPER}} .compare' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
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
                    '{{WRAPPER}} .-with-shadow .compare' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Compare', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'handler_color',
            [
                'label' => __( 'Handle Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-handle:after, {{WRAPPER}} .compare-handle::before' => 'background-color: {{VALUE}}; box-shadow:0 2px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare' => 'border-color:{{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $position = isset( $settings['divider_position'] ) ? round( intval( $settings['divider_position']['size'] ) / 100, 2 ) : '0.5';

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        include( plugin_dir_path( __FILE__ ) . 'compare-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Compare_Widget() );
