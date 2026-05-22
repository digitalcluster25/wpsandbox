<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Ohio_Elementor_Marquee_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script(
            'ohio-elementor-marquee-widget',
            plugin_dir_url( __FILE__ ) . 'handler.js',
            [ 'jquery', 'elementor-frontend' ],
            '1.0.0',
            true
        );
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-marquee-widget' ];
    }

    public function get_name() {
        return 'ohio_marquee';
    }

    public function get_title() {
        return __( 'Marquee', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-marquee';
    }

    public function get_categories() {
        return [ 100 ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'ohio-extra' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'content_type',
            [
                'label'   => __( 'Content Type', 'ohio-extra' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'gallery',
                'options' => [
                    'gallery' => __( 'Gallery', 'ohio-extra' ),
                    'text'    => __( 'Text', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'images',
            [
                'label'     => __( 'Images', 'ohio-extra' ),
                'type'      => Controls_Manager::GALLERY,
                'dynamic'   => [ 'active' => false ],
                'condition' => [
                    'content_type' => 'gallery',
                ],
            ]
        );

        $this->add_control(
            'marquee_text',
            [
                'label'       => __( 'Text', 'ohio-extra' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter marquee text…', 'ohio-extra' ),
                'default'     => __( 'Your marquee text', 'ohio-extra' ),
                'condition'   => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'direction',
            [
                'label'   => __( 'Direction', 'ohio-extra' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ltr',
                'options' => [
                    'ltr' => __( 'Left to Right', 'ohio-extra' ),
                    'rtl' => __( 'Right to Left', 'ohio-extra' ),
                ],
                'selectors_dictionary' => [
                    'ltr' => 'normal',
                    'rtl' => 'reverse',
                ],
            ]
        );

        $this->add_control(
            'speed',
            [
                'label'   => __( 'Speed', 'ohio-extra' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0.4',
                'options' => [
                    '0.1' => __( 'Very Slow', 'ohio-extra' ),
                    '0.2' => __( 'Slow', 'ohio-extra' ),
                    '0.4' => __( 'Normal', 'ohio-extra' ),
                    '0.6' => __( 'Fast', 'ohio-extra' ),
                    '0.8' => __( 'Very Fast', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'slow_on_scroll',
            [
                'label'        => __( 'Slow on Scroll', 'ohio-extra' ),
                'description'  => __( 'Make the animation slow down progressively as you scroll coming to a full stop', 'ohio-extra' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'ohio-extra' ),
                'label_off'    => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default'      => '',
            ]
        );

        $this->add_responsive_control(
            'gap_right',
            [
                'label'      => __( 'Gap (Right Padding)', 'ohio-extra' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', '%' ],
                'range'      => [
                    'px' => [ 'min' => 0,  'max' => 200 ],
                    'em' => [ 'min' => 0,  'max' => 10, 'step' => 0.1 ],
                    'rem'=> [ 'min' => 0,  'max' => 10, 'step' => 0.1 ],
                    '%'  => [ 'min' => 0,  'max' => 20, 'step' => 0.5 ],
                ],
                'default'   => [ 'size' => 16, 'unit' => 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .marquee-line-el' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label'      => __( 'Height', 'ohio-extra' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vh', '%' ],
                'range'      => [
                    'px' => [ 'min' => 0,   'max' => 1500 ],
                    'em' => [ 'min' => 0,   'max' => 80, 'step' => 0.1 ],
                    'rem'=> [ 'min' => 0,   'max' => 80, 'step' => 0.1 ],
                    'vh' => [ 'min' => 0,   'max' => 100 ],
                    '%'  => [ 'min' => 0,   'max' => 100 ],
                ],
                'default'   => [ 'size' => 100, 'unit' => 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .marquee-line-stage' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'content_type' => 'gallery',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_text',
            [
                'label' => __( 'Text', 'ohio-extra' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'marquee_text_typography',
                'label'    => __( 'Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .marquee-line-el',
            ]
        );

        $this->add_control(
            'marquee_text_color',
            [
                'label'     => __( 'Text Color', 'ohio-extra' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marquee-line-el' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings      = $this->get_settings_for_display();
        $content_type  = isset( $settings['content_type'] ) ? $settings['content_type'] : 'gallery';
        $images        = ( $content_type === 'gallery' && ! empty( $settings['images'] ) ) ? $settings['images'] : [];
        $text  = ( $content_type === 'text' ) ? ( $settings['marquee_text'] ?? '' ) : '';

        include( plugin_dir_path( __FILE__ ) . 'marquee-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Marquee_Widget() );
