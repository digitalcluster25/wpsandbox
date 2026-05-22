<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode params
*/

vc_lean_map( 'ohio_icon_box', 'ohio_icon_box_sc_map' );

function ohio_icon_box_sc_map() {
	return array(
		'name' => __( 'Icon Box', 'ohio-extra' ),
		'description' => __( 'Simple feature with icon', 'ohio-extra' ),
		'base' => 'ohio_icon_box',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/icon_box_icon.svg',
		'js_view' => 'VcOhioIconBoxView',
		'custom_markup' => '{{title}}<div class="vc_ohio_icon_box-container">
				<div class="icon">%%icon%%</div>
				<div class="title">%%title%%</div>
				<div class="subtitle"></div>
				<div class="divider"></div>
				<div class="lines"><div class="line"></div><div class="line"></div><div class="line"></div></div>
				<div class="read_more"></div>
			</div>',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Layout', 'ohio-extra' ),
				'param_name' => 'box_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_012.svg',
						'key' => 'top_icon',
						'title' => __( 'Top Icon', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_015.svg',
						'key' => 'left_icon',
						'title' => __( 'Left Icon', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'content_full',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_015.svg',
						'key' => 'none',
						'title' => __( 'Inline Icon', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_016.svg',
						'key' => 'full',
						'title' => __( 'Floating Icon', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'box_alignment',
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
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title HTML Tag', 'ohio-extra' ),
				'param_name' => 'heading_tag',
				'value' => array(
					__( 'h1', 'ohio-extra' ) => 'h1',
					__( 'h2', 'ohio-extra' ) => 'h2',
					__( 'h3', 'ohio-extra' ) => 'h3',
					__( 'h4', 'ohio-extra' ) => 'h4',
					__( 'h5', 'ohio-extra' ) => 'h5',
					__( 'h6', 'ohio-extra' ) => 'h6',
				),
				'std' => 'h5',
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
			),

			// Icon.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Variation', 'ohio-extra' ),
				'param_name' => 'icon_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_017.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_018.svg',
						'key' => 'border',
						'title' => __( 'Outlined', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_019.svg',
						'key' => 'only_fill',
						'title' => __( 'Filled', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom Image', 'ohio-extra' ) => 'user_image'
				),
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Icon', 'ohio-extra' ),
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
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Custom Image', 'ohio-extra' ),
				'param_name' => 'icon_as_image',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'user_image'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Shape Border', 'ohio-extra' ),
				'param_name' => 'icon_border_width',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => array(
						'border', 
						'only_fill'
					)
				),
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0'
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Shape Corners', 'ohio-extra' ),
				'param_name' => 'icon_corners',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => array(
						'border', 
						'only_fill'
					)
				),
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0'
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon Size', 'ohio-extra' ),
				'param_name' => 'icon_size',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				),
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0'
			),

			// Link.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Add Link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link URL', 'ohio-extra' ),
				'param_name' => 'link_url',
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
					)
				),
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
				'heading' => __( 'Description Typography', 'ohio-extra' ),
				'param_name' => 'description_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon Color', 'ohio-extra' ),
				'param_name' => 'icon_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon Background Color', 'ohio-extra' ),
				'param_name' => 'fill_color',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => 'only_fill'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon Border Color', 'ohio-extra' ),
				'param_name' => 'border_color',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => array(
						'border',
						'only_fill'
					)
				)
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'param_name' => 'readmore_button',
				'heading' => __( 'Button', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'use_link',
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