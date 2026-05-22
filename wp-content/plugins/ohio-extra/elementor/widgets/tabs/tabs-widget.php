<?php
class Ohio_Elementor_Tabs_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-tabs-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_tabs';
    }

    public function get_title()
    {
        return __( 'Tabs', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-tabs';
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-tabs-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'tabs_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_058.svg',
                    ],
                    'filled' => [
                        'title' => __( 'Contained', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_059.svg',
                    ],
                    'button' => [
                        'title' => __( 'Button', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_059.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'tabs_direction',
            [
                'label' => __( 'Direction', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'horizontal' => [
                        'title' => __( 'Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_058.svg',
                    ],
                    'vertical' => [
                        'title' => __( 'Vertical', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_061.svg',
                    ]
                ],
                'default' => 'horizontal',
            ]
        );

        $this->add_control(
            'block_alignment',
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
                'condition' => [
                    'tabs_direction' => 'horizontal'
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
                    '{{WRAPPER}} .-with-button .tabs-nav' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .-with-button .tabs-nav-line' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'tabs_layout' => [ 'button'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_section',
            [
                'label' => __( 'Items', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'label' => __( 'Tabs', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_text_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-nav-link .title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tabs-nav-link .icon' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tabs-nav-link .title',
            ]
        );

        $this->add_control(
            'active_tabs_color',
            [
                'label' => __( 'Title Color (Active)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-nav-link.active .title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tabs-nav-link.active .icon' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tabs-nav-link .subtitle' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_subtitle_typography',
                'label' => __( 'Subtitle Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tabs-nav-link .subtitle'
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tabs-content' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_content_typography',
                'label' => __( 'Content Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tabs-content'
            ]
        );

        $this->add_control(
            'tabs_line_color',
            [
                'label' => __( 'Tab Underline Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tabs-nav .tabs-nav-line' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .-with-button .tabs-nav-line' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'tab_color',
            [
                'label' => __( 'Tab Background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-with-button .tabs-nav' => 'background-color: {{VALUE}}; outline-color: {{VALUE}};',
                    '{{WRAPPER}} .-contained .tabs-nav' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'tabs_layout' => [ 'filled', 'button'],
                ]
            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => __( 'Tab Background (Active)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-contained .tabs-nav-link.active' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'tabs_layout' => [ 'filled', 'button'],
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'list_subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Subtitle text', 'ohio-extra' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'list_content_type',
            [
                'label' => __( 'Content Type', 'ohio-extra' ),
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
                'label' => __( 'Text Editor', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Content', 'ohio-extra' ),
                'condition' => [
                    'list_content_type' => 'editor',
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
        
        $repeater->add_control(
            'custom_class',
            [
                'label' => __( 'CSS Class', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'separator' => 'before',
                'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS.'
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
        switch ( $settings['tabs_layout'] ) {
            case 'filled':
                $this->addWrapperClass( '-contained' );
                break;
            case 'button':
                $this->addWrapperClass( '-with-button' );
                break;
        }

        if ( $settings['tabs_direction'] == 'vertical' ) {
            $this->addWrapperClass('-vertical');
        }

        foreach ( $settings['tabs'] as $item ) {

            if ( !empty( $item['list_subtitle'] ) ) {
                $this->addWrapperClass('-tabs-with-subtitle');
            }
        }

        switch ( $settings['block_alignment'] ) {
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

        include( plugin_dir_path( __FILE__ ) . 'tabs-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Tabs_Widget() );
