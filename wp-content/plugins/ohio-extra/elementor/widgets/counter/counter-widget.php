<?php
class Ohio_Elementor_Counter_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-counter-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_counter';
    }

    public function get_title()
    {
        return __( 'Counter', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-counter';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-counter-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Counter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/counter/images/wpb_params_034.svg',
                    ],
                    'with_icon' => [
                        'title' => __( 'With Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/counter/images/wpb_params_033.svg',
                    ],
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'counter_position',
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
            'count_number',
            [
                'label' => __( 'Number', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '96',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'count_text_before',
            [
                'label' => __( 'Text Before', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'count_text_after',
            [
                'label' => __( 'Text After', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Some Items', 'ohio-extra' ),
                'placeholder' => __( 'Enter element title.', 'ohio-extra' ),
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
                'placeholder' => __( 'Enter element description.', 'ohio-extra' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'plus_symbol',
            [
                'label' => __( 'Use "+" Symbol?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
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
                'condition' => [
                    'block_type_layout' => 'with_icon',
                ],
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
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_020.svg',
                    ]
                ],
                'default' => 'default',
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
                    'top' => __( 'Top', 'ohio-extra' ),
                ],
                'default' => 'left',
                'condition' => [
                    'block_type_layout' => 'with_icon',
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
                    'block_type_layout' => 'with_icon',
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
                    'unit' => 'em',
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
                    'unit' => 'rem',
                    'size' => 2,
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
            'counter_section',
            [
                'label' => __( 'Counter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __( 'Number Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-number .holder' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __( 'Number Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .counter-number .number'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h6' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h6',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'plus_color',
            [
                'label' => __( '"+" Symbol Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-number.-with-increaser .holder::after' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'plus_symbol' => 'yes',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'plus_typography',
                'label' => __( '"+" Symbol Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .counter-number.-with-increaser .holder::after',
                'condition' => [
                    'plus_symbol' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'text_before_color',
            [
                'label' => __( 'Text Before Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-number .text-before' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_before_typography',
                'label' => __( 'Text Before Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .counter-number .text-before',
            ]
        );

        $this->add_control(
            'text_after_color',
            [
                'label' => __( 'Text After Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-number .text-after' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_after_typography',
                'label' => __( 'Text After Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .counter-number .text-after',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styles_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'icon_type' => 'icon',
                    'block_type_layout' => 'with_icon',
                ]
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
            'icon_bg_color',
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
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['counter_position'] ) {
            case 'left':
                $this->addWrapperClass( '-left' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
            default:
                $this->addWrapperClass( '-center' );
        }

        switch ( $settings['icon_position'] ) {
            case 'left':
                $this->addWrapperClass( '-left-icon' );
                break;
            case 'right':
                $this->addWrapperClass( '-right-icon' );
                break;
            case 'top':
                $this->addWrapperClass( '-top-icon' );
                break;
        }

        if ( $settings['block_type_layout'] === 'with_icon' ) {

            $settings['icon_classes'] = '';
            switch ( $settings['icon_layout'] ) {
                case 'border':
                    $settings['icon_classes'] = '-outlined';
                    break;
                case 'fill':
                    $settings['icon_classes'] = '-contained';
                    break;
            }
        }

        $icon_prefix = ($settings['icon_type'] == 'icon') ? 'icon ' : '';

        include( plugin_dir_path( __FILE__ ) . 'counter-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Counter_Widget() );
