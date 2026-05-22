<?php
class Ohio_Elementor_Contact_Form_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-contact-form-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_contact_form';
    }

    public function get_title()
    {
        return __( 'Contact Form 7', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-contact-form';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-contact-form-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Contact Form', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'important_note',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<div class="note">' . __( 'Ensure that you have installed and activated the <a target="_blank" href="/wp-admin/plugins.php">Contact Form 7</a> from the recommended plugins.', 'ohio-extra' ) . '</div>',
                'content_classes' => 'your-class',
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'flat' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_031.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_030.svg',
                    ],
                ],
                'default' => 'flat',
            ]
        );

        $this->add_control(
            'form_position',
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


        $this->add_contact_form_7_controll();

        $this->add_control(
            'fields_offset',
            [
                'label' => __( 'Gutters', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( '<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">Set gutters value</a> for the entire site.', 'ohio-extra' ),
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} [class*=vc_col]' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .subscribe-form' => 'margin: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-form' => 'margin: -{{SIZE}}{{UNIT}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form_style_section',
            [
                'label' => __( 'Contact Form', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'input_placeholder_color',
            [
                'label' => __( 'Placeholder Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} textarea::-webkit-input-placeholder' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'color: {{VALUE}}',
                    '{{WRAPPER}} label' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'input_text_typography',
                'label' => __( 'Text Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} input:not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
            ]
        );

        $this->add_control(
            'input_background_color',
            [
                'label' => __( 'Text Fields Background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_focus_background_color',
            [
                'label' => __( 'Text Fields Background (Active)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"]):focus' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} textarea:focus' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} select:focus' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_border_color',
            [
                'label' => __( 'Text Fields Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'border-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_focus_border_color',
            [
                'label' => __( 'Text Fields Border Color (Active)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .focus.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} textarea:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} select:focus' => 'border-color: {{VALUE}}'
                ],
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function add_contact_form_7_controll()
    {
        $forms_select = [];
        $forms_items = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
        if ( !empty( $forms_items ) ) {
            foreach ( $forms_items as $form ) {
                $forms_select[ $form->ID ] = $form->post_title;
            }
        }

        $this->add_control(
            'form',
            [
                'label' => 'Choose Form',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [ '0' => '- ' . __( 'No contact form selected', 'ohio-extra' ) . ' -' ] + $forms_select,
                'label_block' => true
            ]
        );
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_type_layout'] == 'outline' ) {
            $this->addWrapperClass( '-outlined' );
        }

        switch ( $settings['form_position'] ) {
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

        include( plugin_dir_path( __FILE__ ) . 'contact-form-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Contact_Form_Widget() );
