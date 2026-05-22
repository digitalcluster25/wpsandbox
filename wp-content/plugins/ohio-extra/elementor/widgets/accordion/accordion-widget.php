<?php
class Ohio_Elementor_Accordion_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-accordion-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_accordion';
    }

    public function get_title()
    {
        return __( 'Accordion', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-accordion';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-accordion-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Accordion', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'block_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_021.svg',
                    ],
                    'contained' => [
                        'title' => __( 'Contained', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_0221.svg',
                    ],
                    'outlined' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_022.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Text', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_021_1.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Tabs Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'condition' => [
                    'block_layout' => [ 'default' ],
                ],
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
                    '{{WRAPPER}} .accordion .accordion-item .accordion-button' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Tabs Corners', 'ohio-extra' ),
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
                    '{{WRAPPER}} .accordion:not(.-outlined):not(.-text) .accordion-item .accordion-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_layout' => 'default',
                ],
            ]
        );

        $this->add_control( 
            'tabs',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getTabsControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'tabs_section',
            [
                'label' => __( 'Accordion', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_text_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordion-header',
            ]
        );

        $this->add_control(
            'editor_content_color',
            [
                'label' => __( 'Content Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .accordion-body' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'editor_content_typography',
                'label' => __( 'Content Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordion-body',
            ]
        );

        $this->add_control(
            'ui_icon_color',
            [
                'label' => __( 'Tabs Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-button .icon' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'tabs_background_color',
            [
                'label' => __( 'Tabs Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => [ 'default', 'contained'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion:not(.-outlined):not(.-text):not(.-contained) .accordion-item .accordion-button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion.-contained .accordion-item.active' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tabs_border_color',
            [
                'label' => __( 'Tabs Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => [ 'default', 'outlined'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion.-outlined .accordion-item:first-child .accordion-button' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion.-outlined .accordion-item.active + .accordion-item .accordion-button' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion.-outlined .accordion-item .accordion-button' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion:not(.-outlined):not(.-text) .accordion-item .accordion-button' => 'border-color: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'is_active',
            [
                'label' => __( 'Is Active?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'The active tab will be opened by default.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->start_controls_tabs( 'tab_colors_style' );

        $repeater->start_controls_tab(
            'tab_tabs_content',
            [
                'label' => __( 'Description', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'list_content_type',
            [
                'label' => __( 'Description Type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'editor' => __( 'Text Editor', 'ohio-extra' ),
                    'template' => __( 'Template', 'ohio-extra' ),
                ],
                'label_block' => 'true',
                'default' => 'editor',
            ]
        );

        $repeater->add_control(
            'list_content_editor',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Content', 'ohio-extra' ),
                'condition' => [
                    'list_content_type' => 'editor',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Available templates
        $templates = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
        $options = [ '0' => '— ' . esc_html__( 'Select', 'ohio-extra' ) . ' —' ];
        $types = [];

        foreach ( $templates as $template ) {
            $options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            $types[ $template['template_id'] ] = $template['type'];
        }
        
        $repeater->add_control(
            'list_content_template',
            array(
                'label'       => esc_html__( 'Choose Template', 'ohio-extra' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '0',
                'options'     => $options,
                'types'       => $types,
                'label_block' => 'true',
                'condition'   => [
                    'list_content_type' => 'template',
                ]
            )
        );
        
        $repeater->add_control(
            'use_icon',
            [
                'label' => __( 'Add Icon?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'use_icon' => 'yes'
                ],
            ]
        );
        
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_tabs_styles',
            [
                'label' => __( 'Styles', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'text_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-header' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-header'
            ]
        );

        $repeater->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-body' => 'color: {{VALUE}};'
                ],
                'separator' => 'before',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Content Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-body'
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon-button .icon' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'custom_class',
            [
                'label' => __( 'CSS Class', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'separator' => 'before'
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_layout'] ) {
            case 'outlined':
                $this->addWrapperClass( '-outlined' );
                break;
            case 'outline':
                $this->addWrapperClass( '-text' );
                break;
            case 'contained':
                $this->addWrapperClass( '-contained' );
                break;
        }

        include( plugin_dir_path( __FILE__ ) . 'accordion-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Accordion_Widget() );
