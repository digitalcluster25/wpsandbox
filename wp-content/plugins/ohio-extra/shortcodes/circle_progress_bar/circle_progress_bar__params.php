<?php

/**
* Visual Composer Ohio Circle Progress Bar shortcode params
*/

vc_map( array(
	'name' => __( 'Circular Progress', 'ohio-extra' ),
	'description' => __( 'Progress indicator', 'ohio-extra' ),
	'base' => 'ohio_pie_chart',
	'category' => __( 'Ohio', 'ohio-extra' ),
	'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/circle_progress_bar_icon.svg',
	'params' => array(

		// General.
		array(
			'type' => 'ohio_choose_box',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Layout', 'ohio-extra' ),
			'param_name' => 'layout',
			'value' => array(
				array(
					'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_046.svg',
					'key' => 'default',
					'title' => __( 'Default', 'ohio-extra' ),
				),
				array(
					'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_047.svg',
					'key' => 'floating',
					'title' => __( 'Floating', 'ohio-extra' ),
				)
			)
		),
		array(
			'type' => 'ohio_choose_box',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Alignment', 'ohio-extra' ),
			'param_name' => 'alignment',
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
			'heading' => __( 'Label', 'ohio-extra' ),
			'param_name' => 'title',
			'value' => '',
			'description' => ''
		),
		array(
			'type' => 'ohio_range',
			'holder' => 'em',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Max Value', 'ohio-extra' ),
			'param_name' => 'percent',
			'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use % units&nbsp;" class="far fa-question-circle"></i></a>', 'ohio-extra' ),
			'value' => '85'
		),
		array(
			'type' => 'dropdown',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Thickness', 'ohio-extra' ),
			'param_name' => 'thickness',
			'value' => array(
				__( 'Thin', 'ohio-extra' ) => 'thin',
				__( 'Default', 'ohio-extra' ) => 'default',
				__( 'Thick', 'ohio-extra' ) => 'thick'
			),
			'std' => 'default',
		),

		// Icon.
		array(
			'type' => 'ohio_check',
			'group' => __( 'Icon', 'ohio-extra' ),
			'heading' => __( 'Add Icon?', 'ohio-extra' ),
			'param_name' => 'with_icon',
			'value' => array(
				'Yes' => '0'
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
			'dependency' => array(
				'element' => 'with_icon',
				'value' => array(
					'1'
				)
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

		// Style.
		array(
			'type' => 'ohio_typography',
			'group' => __( 'Style', 'ohio-extra' ),
			'heading' => __( 'Label Typography', 'ohio-extra' ),
			'param_name' => 'title_typo',
		),
		array(
			'type' => 'ohio_typography',
			'group' => __( 'Style', 'ohio-extra' ),
			'heading' => __( 'Max Value Typography', 'ohio-extra' ),
			'param_name' => 'percent_typo',
		),
		array(
			'type' => 'ohio_colorpicker',
			'group' => __( 'Style', 'ohio-extra' ),
			'heading' => __( 'Indicator Color', 'ohio-extra' ),
			'param_name' => 'chart_color',
		),
		array(
			'type' => 'ohio_colorpicker',
			'group' => __( 'Style', 'ohio-extra' ),
			'heading' => __( 'Icon Color', 'ohio-extra' ),
			'param_name' => 'icon_color',
			'dependency' => array(
				'element' => 'with_icon',
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
				__( 'Slide up', 'ohio-extra' ) => 'slide-up',
				__( 'Flip Up', 'ohio-extra' ) => 'flip-up',
				__( 'Zoom In', 'ohio-extra' ) => 'zoom-in'
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
));