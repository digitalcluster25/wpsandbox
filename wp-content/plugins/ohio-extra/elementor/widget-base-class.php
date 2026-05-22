<?php
class Ohio_Elementor_Widget_Base extends \Elementor\Widget_Base {

    protected $inlineStyles = [];
    protected $wrapperClasses = [];


    public function get_name()
    {
        return 'Ohio Widget base';
    }

    public function get_categories()
    {
        return [ 'ohio-theme' ];
    }

    /**
     * Parse Elementor link control data to <a> attributes string
     * 
     * @param array $params Elementor Link control params
     * 
     * @return string Attributes
     */
    protected function getLinkAttributesString($params) {
        $attrString = 'href="' . $params['url'] . '" ';

        if ( $params['is_external'] ) {
            $attrString .= 'target="_blank" ';
        }

        if ( $params['nofollow'] ) {
            $attrString .= 'rel="nofollow" ';
        }

        if ( !empty( $params['custom_attributes'] ) ) {
            $attributes = explode( ',', $params['custom_attributes'] );
            foreach ( $attributes as $attr ) {
                $attr = explode( '|', $attr );
                if ( count( $attr ) == 2 ) {
                    $attrString .= $attr[0] . '="' . $attr[1] . '" ';
                } elseif ( count( $attr ) == 1 ) {
                    $attrString .= $attr[0] . '="" ';
                }
            }
        }

        return $attrString;
    }

    protected function addInlineStyle($slug, $settings_name, $style)
    {
        $settings = $this->get_settings_for_display();

        if ( !isset( $this->inlineStyles[$slug] ) ) {
            $this->inlineStyles[$slug] = [];
        }

        if ( $settings_name && !empty( $settings[$settings_name] ) ) {
            $style = str_replace( '{{VALUE}}', $settings[$settings_name], $style );
        }

        $this->inlineStyles[$slug][] = rtrim( trim( $style ), ';' );
    }

    /**
     * Returns collected inline styles as string
     * 
     * @param string $slug Unique slug
     * 
     * @return string CSS styles
     */
    protected function getInlineStyle($slug)
    {
        if ( !empty( $this->inlineStyles[$slug] ) ) {
            return implode( ';', $this->inlineStyles[$slug] );
        }

        return '';
    }

    protected function getInlineStyleAttr($slug)
    {
        $style = $this->getInlineStyle($slug);

        if ( !empty( $style ) ) {
            return 'style="' . esc_attr( $style ) . '"';
        }

        return '';
    }

    /**
     * Adds CSS class string to collection
     * 
     * @param string|array $class CSS class
     */
    protected function addWrapperClass($class)
    {
        if ( is_string( $class ) ) {
            $this->wrapperClasses[] = $class;
        }

        if ( is_array( $class ) ) {
            $this->wrapperClasses = array_merge( $this->wrapperClasses, $class );
        }
    }

    /**
     * Returns wrapper classes collection as string for "class" HTML attribute
     * 
     * @return string CSS classes
     */
    protected function getWrapperClasses()
    {
        return implode( ' ', array_unique( $this->wrapperClasses ) );
    }

    /**
     * Adds button style controlls to widget Style tab
     * 
     * @param bool $withCondition Additional visibility condition for "use_link" control
     */
    protected function addButtonStyleSection( $withCondition = 'use_link' )
    {
        $this->start_controls_section(
            'button_styles_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => ($withCondition) ? [ $withCondition => 'yes' ] : [],
            ]
        );

        $this->add_control(
            'button_style_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Filled', 'ohio-extra' ),
                    'outline' => __( 'Outlined', 'ohio-extra' ),
                    'flat' => __( 'Flat', 'ohio-extra' ),
                    'link' => __( 'Text', 'ohio-extra' ),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __( 'Size', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'small' => __( 'Small', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'button_with_is_full',
            [
                'label' => __( 'Set Block?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );


        $this->start_controls_tabs( 'tab_colors_style', ['separator' => 'before'] );

        $this->start_controls_tab(
            'tab_button_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:not(:hover)' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Fill Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button.-default:not(:hover)' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_style_type' => [ 'default' ],
                ],
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_style_type' => [ 'default', 'outline' ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_colors_hover',
            [
                'label' => __( 'Hover', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __( 'Text Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'button_color_hover',
            [
                'label' => __( 'Fill Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button.-default:hover' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_style_type' => [ 'default' ],
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __( 'Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_style_type' => [ 'default', 'outline' ],
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
			'button_typography_separator',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_text_typography',
                'label' => __( 'Button Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .button'
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Collect all button classes from settings
     * 
     * Recommend use with $this->addButtonStyleSection()
     * 
     * @return string Concatenated CSS classes string
     */
    protected function getButtonClasses(): string
    {
        $settings = $this->get_settings_for_display();

        $button_classes = [];
        switch ( $settings['button_style_type'] ) {
            case 'default':
                $button_classes[] = '-default';
                break;
            case 'outline':
                $button_classes[] = '-outlined';
                break;
            case 'flat':
                $button_classes[] = '-flat';
                break;
            case 'link':
                $button_classes[] = '-text';
                break;
        }

        switch ( $settings['button_size'] ) {
            case 'small':
                $button_classes[] = '-small';
                break;
            case 'large':
                $button_classes[] = '-large';
                break;
        }

        if ( $settings['button_with_is_full'] ) {
            $button_classes[] = '-block';
        }

        if ( !empty( $settings['button_color'] ) ) {
            $button_classes[] = 'btn-elementor-colored';
        }

        return implode( ' ', $button_classes );
    }

    /**
     * Options list for social networks selects
     * 
     * @return array Social networks list in slug=>title format
     */
    protected function getSocialNetworksOptionsList(): array
    {
        return [
            'artstation'  => __( 'ArtStation', 'ohio-extra' ),
            'behance'     => __( 'Behance', 'ohio-extra' ),
            'deviantart'  => __( 'DeviantArt', 'ohio-extra' ),
            'digg'        => __( 'Digg', 'ohio-extra' ),
            'discord'     => __( 'Discord', 'ohio-extra' ),
            'dribbble'    => __( 'Dribbble', 'ohio-extra' ),
            'facebook'    => __( 'Facebook', 'ohio-extra' ),
            'flickr'      => __( 'Flickr', 'ohio-extra' ),
            'github'      => __( 'GitHub', 'ohio-extra' ),
            'houzz'       => __( 'Houzz', 'ohio-extra' ),
            'instagram'   => __( 'Instagram', 'ohio-extra' ),
            'kaggle'      => __( 'Kaggle', 'ohio-extra' ),
            'linkedin'    => __( 'LinkedIn', 'ohio-extra' ),
            'medium'      => __( 'Medium', 'ohio-extra' ),
            'mixer'       => __( 'Mixer', 'ohio-extra' ),
            'pinterest'   => __( 'Pinterest', 'ohio-extra' ),
            'producthunt' => __( 'Product Hunt', 'ohio-extra' ),
            'quora'       => __( 'Quora', 'ohio-extra' ),
            'reddit'      => __( 'Reddit', 'ohio-extra' ),
            'snapchat'    => __( 'Snapchat', 'ohio-extra' ),
            'soundcloud'  => __( 'SoundCloud', 'ohio-extra' ),
            'spotify'     => __( 'Spotify', 'ohio-extra' ),
            'teamspeak'   => __( 'TeamSpeak', 'ohio-extra' ),
            'telegram'    => __( 'Telegram', 'ohio-extra' ),
            'threads'     => __( 'Threads', 'ohio-extra' ),
            'tiktok'      => __( 'TikTok', 'ohio-extra' ),
            'tumblr'      => __( 'Tumblr', 'ohio-extra' ),
            'twitch'      => __( 'Twitch', 'ohio-extra' ),
            'twitter'     => __( 'X', 'ohio-extra' ),
            'vimeo'       => __( 'Vimeo', 'ohio-extra' ),
            'vine'        => __( 'Vine', 'ohio-extra' ),
            'whatsapp'    => __( 'WhatsApp', 'ohio-extra' ),
            'xing'        => __( 'Xing', 'ohio-extra' ),
            'youtube'     => __( 'YouTube', 'ohio-extra' ),
            '500px'       => __( '500px', 'ohio-extra' ),

            'other'       => __( 'Other', 'ohio-extra' ),
        ];
    }

    /**
     * Renders social network i-tag FontAwesome icon
     * 
     * @param string $slug Social network name slug
     */
    protected function renderSocialNetworkIcon( $slug )
    {
        $icons = [
            'artstation' => 'fa-brands fa-artstation',
            'behance' => 'fa-brands fa-behance',
            'deviantart' => 'fa-brands fa-deviantart',
            'digg' => 'fa-brands fa-digg',
            'discord' => 'fa-brands fa-discord',
            'dribbble' => 'fa-brands fa-dribbble',
            'facebook' => 'fa-brands fa-facebook-f',
            'flickr' => 'fa-brands fa-flickr',
            'github' => 'fa-brands fa-github',
            'houzz' => 'fa-brands fa-houzz',
            'instagram' => 'fa-brands fa-instagram',
            'kaggle' => 'fa-brands fa-kaggle',
            'linkedin' => 'fa-brands fa-linkedin',
            'medium' => 'fa-brands fa-medium',
            'mixer' => 'fa-brands fa-mixer',
            'pinterest' => 'fa-brands fa-pinterest',
            'producthunt' => 'fa-brands fa-product-hunt',
            'quora' => 'fa-brands fa-quora',
            'reddit' => 'fa-brands fa-reddit',
            'snapchat' => 'fa-brands fa-snapchat',
            'soundcloud' => 'fa-brands fa-soundcloud',
            'spotify' => 'fa-brands fa-spotify',
            'teamspeak' => 'fa-brands fa-teamspeak',
            'telegram' => 'fa-brands fa-telegram',
            'threads' => 'fa-brands fa-threads',
            'tiktok' => 'fa-brands fa-tiktok',
            'tumblr' => 'fa-brands fa-tumblr',
            'twitch' => 'fa-brands fa-twitch',
            'twitter' => 'fa-brands fa-x-twitter',
            'vimeo' => 'fa-brands fa-vimeo',
            'vine' => 'fa-brands fa-vine',
            'whatsapp'  => 'fa-brands fa-whatsapp',
            'xing'  => 'fa-brands fa-xing',
            'youtube' => 'fa-brands fa-youtube',
            '500px' => 'fa-brands fa-500px',
            'other' => 'fas fa-external-link-alt'
        ];

        if ( !isset( $icons[$slug] ) ) {
            $slug = 'other';
        }

        echo '<i class="icon ' . esc_attr( $icons[$slug] ) . '"></i>';
    }

    /**
     * Show html layout for icon with native render_icon function or custom img tag
     *
     * @param string $class CSS class
     * @return void
     */
    protected function showIconInView( $class = '' )
    {
        $settings = $this->get_settings_for_display();

        if ( $settings['icon_type'] == 'icon' ) {
            \Elementor\Icons_Manager::render_icon( $settings['icon_icon'], [
                'class' => $class,
                'style' => $this->getInlineStyle( 'icon' )
            ] );
        } elseif ( $settings['icon_type'] == 'image' && !empty( $settings['icon_image']['url'] ) ) {
            echo '<img class="' . $class . '" ';
            echo 'src="' . esc_url( $settings['icon_image']['url'] ) . '" ';
            echo 'srcset="' . wp_get_attachment_image_srcset( $settings['icon_image']['id'], 'large' ) . '" ';
            echo 'sizes="' . wp_get_attachment_image_sizes( $settings['icon_image']['id'], 'large' ) . '" ';
            echo 'alt="' . __( 'Icon', 'ohio-extra' ) . '">';
        } elseif ( $settings['icon_type'] == 'html' ) {
            echo $settings['icon_html'];
        }
    }

    /**
     * Get localized Elementor template id (WPML compatibility)
     *
     * @param string $template_id Elementor template ID
     * @return void
     */
    protected function getLocalizedTemplate( $template_id ) {
        $have_wpml = function_exists( 'icl_get_languages' );
        $localized_id = $template_id;
        
        if( $have_wpml ) {
            $localized_id = apply_filters( 'wpml_object_id', $template_id, 'post', true );
        }

        return $localized_id;
    }
}
