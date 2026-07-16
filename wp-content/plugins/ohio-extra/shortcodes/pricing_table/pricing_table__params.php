<?php

/**
* WPBakery Page Builder Ohio Pricing Table shortcode params
*/

vc_lean_map( 'ohio_pricing_table', 'ohio_pricing_table_sc_map' );

function ohio_pricing_table_sc_map() {
	return array(
		'name' => __( 'Pricing Table', 'ohio-extra' ),
		'description' => __( 'Table with pricing', 'ohio-extra' ),
		'base' => 'ohio_pricing_table',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/pricing_table_icon.svg',
		'js_view' => 'VcOhioPricingTableView',
		'custom_markup' => '{{title}}<div class="vc_ohio_pricing_table-container">
				<div class="title">%%title%%</div>
				<div class="divider"></div>
				<div class="price">%%price%%</div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="read_more"></div>
			</div>',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'table_alignment',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle',
				'value' => '',
				'description' => ''
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Price', 'ohio-extra' ),
				'param_name' => 'price',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Original Price', 'ohio-extra' ),
				'param_name' => 'old_price',
				'value' => '',
				'description' => __( 'The price before the discount was applied.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Badge', 'ohio-extra' ),
				'param_name' => 'price_caption',
				'value' => '',
				'description' => __( 'Add an extra caption (e.g. Bill Monthly).', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Currency', 'ohio-extra' ),
				'param_name' => 'price_currency',
				'value' => '',
				'description' => __( '<b>&#36;</b>, <b>&euro;</b>, <b>&pound;</b>, <b>&yen;</b>, USD, EUR, anything.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gutters', 'ohio-extra' ),
				'param_name' => 'boxed_layout',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a> Go to Theme Settings to <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">set gutters value</a> for the entire site.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Table Border', 'ohio-extra' ),
				'param_name' => 'border_width',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0',
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Table Corners', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tilt Effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					'Yes' => '0'
				),
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop Shadow', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shadow Intensity', 'ohio-extra' ),
				'param_name' => 'drop_shadow_intensity',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use % units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '10',
				'dependency' => array(
					'element' => 'drop_shadow',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Button Position', 'ohio-extra' ),
				'param_name' => 'table_button_position',
				'value' => array(
					__( 'After Features', 'ohio-extra' ) => 'default',
					__( 'Before Features', 'ohio-extra' ) => 'top',
				),
				'std' => 'default',
			),

			// Features.
			array(
				'type' => 'param_group',
				'group' => __( 'Features', 'ohio-extra' ),
				'heading' => __( 'Features', 'ohio-extra' ),
				'param_name' => 'features_value',
				'value' => array(
					false
				),
				'params' => array(
					array(
						'type' => 'dropdown',
						'group' => __( 'Icon', 'ohio-extra' ),
						'heading' => __( 'Icon', 'ohio-extra' ),
						'param_name' => 'feature_icon',
						'value' => array(
							__( 'Without icon', 'ohio-extra' ) => 'without_icon',
							__( 'Enable icon', 'ohio-extra' ) => 'icon_plus',
							__( 'Disable icon', 'ohio-extra' ) => 'icon_minus'
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Headline', 'ohio-extra' ),
						'param_name' => 'feature_title',
					),
				),					
			),
			
			// Button.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add Button?', 'ohio-extra' ),
				'param_name' => 'add_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'button_link',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add Icon?', 'ohio-extra' ),
				'param_name' => 'icon_use',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Position', 'ohio-extra' ),
				'param_name' => 'icon_position',
				'std' => 'left',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom Image', 'ohio-extra' ) => 'user_image'
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Icon', 'ohio-extra' ),
				'param_name' => 'icon_as_icon',
				'settings' => array(),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				)
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Custom Image', 'ohio-extra' ),
				'param_name' => 'icon_as_image',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'user_image'
					)
				)
			),

			// Style.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title Typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Subtitle Typography', 'ohio-extra' ),
				'param_name' => 'subtitle_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Description Typography', 'ohio-extra' ),
				'param_name' => 'description_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Price Typography', 'ohio-extra' ),
				'param_name' => 'price_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Original Price Typography', 'ohio-extra' ),
				'param_name' => 'old_price_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Badge Typography', 'ohio-extra' ),
				'param_name' => 'price_caption_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Features Typography', 'ohio-extra' ),
				'param_name' => 'features_title_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Disabled Features Typography', 'ohio-extra' ),
				'param_name' => 'features_title_disabled_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Features Icon Color', 'ohio-extra' ),
				'param_name' => 'features_icons_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Disabled Features Icon Color', 'ohio-extra' ),
				'param_name' => 'features_disabled_icons_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Badge Background Color', 'ohio-extra' ),
				'param_name' => 'price_caption_bg_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Table Background Color', 'ohio-extra' ),
				'param_name' => 'price_table_bg_color',
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Table Border Color', 'ohio-extra' ),
				'param_name' => 'border_color',
				'dependency' => array(
					'element' => 'boxed_layout',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button', 'ohio-extra' ),
				'param_name' => 'readmore_button',
				'button_full_disabled' => 'true',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			
			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'CSS Class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear Effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade Up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade Down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade Left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade Right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip Up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip Down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom In', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom Out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}