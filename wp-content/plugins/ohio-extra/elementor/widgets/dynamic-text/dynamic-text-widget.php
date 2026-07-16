<?php
class Ohio_Elementor_Dynamic_Text_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'typed', get_template_directory_uri() . '/assets/js/libs/typed.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'ohio-elementor-dynamic-text-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend', 'typed' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_dynamic_text';
    }

    public function get_title()
    {
        return __( 'Dynamic Text', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-dynamic-text';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-dynamic-text-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Dynamic Text', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'text_alignment',
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

        $this->add_control(
            'before_text',
            [
                'label' => __( 'Text Before', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'dynamic_text',
            [
                'label' => __( 'Dynamic Text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getDynamicTextList(),
                'default' => [],
                'title_field' => '{{list_text}}',
                'prevent_empty' => false,
            ]
        );

        $this->add_control(
            'after_text',
            [
                'label' => __( 'Text After', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'type_speed',
            [
                'label' => __( 'Typing Speed', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'slow' => 'Slow',
                    'normal' => 'Normal',
                    'fast' => 'Fast',
                ]
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop Mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Dynamic Text', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'static_text_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dynamic-text' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'static_text_typography',
                'label' => __( 'Text Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .dynamic-text',
            ]
        );

        $this->add_control(
            'dynamic_text_color',
            [
                'label' => __( 'Dynamic Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dynamic' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dynamic_text_typography',
                'label' => __( 'Dynamic Text Typography', 'ohio-extra' ),
                'selectors' => [
                    '{{WRAPPER}} .dynamic',
                    '{{WRAPPER}} .typed-cursor'
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getDynamicTextList()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_text', [
                'label' => __( 'Text variant', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        switch ( $settings['text_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left' ); break;
            case 'center':
                $this->addWrapperClass( '-center' ); break;
            case 'right':
                $this->addWrapperClass( '-right' ); break;
        }

        switch ( $settings['type_speed'] ) {
            case 'slow':
                $type_speed = [ 'type' => 140, 'delay' => 5000, 'back' => 35 ]; break;
            case 'normal':
                $type_speed = [ 'type' => 70, 'delay' => 2500, 'back' => 25 ]; break;
            case 'fast':
                $type_speed = [ 'type' => 40, 'delay' => 2400, 'back' => 20 ]; break;
            case 'very_fast':
            default:
                $type_speed = [ 'type' => 20, 'delay' => 1600, 'back' => 15 ]; break;
        }

        $dynamic_title = [];
        foreach ($settings['dynamic_text'] as $value) {
            $dynamic_title[] = str_replace( "'", "&#39;", $value['list_text'] );
        }

        $options = (object) array();
        $options->strings =   $dynamic_title;
        $options->loop =      $settings['loop'];
        $options->typeSpeed = $type_speed['type'];
        $options->backDelay = $type_speed['delay'];
        $options->backSpeed = $type_speed['back'];
        $options_json = json_encode( $options, JSON_HEX_TAG );
        $unique_id = uniqid('sc-dynamic-text-');

        include( plugin_dir_path( __FILE__ ) . 'dynamic-text-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Dynamic_Text_Widget() );
