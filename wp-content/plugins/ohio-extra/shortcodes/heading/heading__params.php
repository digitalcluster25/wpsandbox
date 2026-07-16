<?php

/**
* WPBakery Page Builder Ohio Heading shortcode params
*/

vc_lean_map( 'ohio_heading', 'ohio_heading_sc_map' );

function ohio_heading_sc_map() {
	return array(
		'name' => __( 'Heading', 'ohio-extra' ),
		'description' => __( 'Range of H1-H6 headings', 'ohio-extra' ),
		'base' => 'ohio_heading',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/heading_icon.svg',
		'params' => array(
			
			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'module_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'on_left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'on_middle',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'on_right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title HTML Tag', 'ohio-extra' ),
				'param_name' => 'heading_type',
				'value' => array(
					__( 'h1', 'ohio-extra' ) => 'h1',
					__( 'h2', 'ohio-extra' ) => 'h2',
					__( 'h3', 'ohio-extra' ) => 'h3',
					__( 'h4', 'ohio-extra' ) => 'h4',
					__( 'h5', 'ohio-extra' ) => 'h5',
					__( 'h6', 'ohio-extra' ) => 'h6'
				),
				'std' => 'h3',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Add Highlighted Text?', 'ohio-extra' ),
				'param_name' => 'add_highlighted',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Text Before', 'ohio-extra' ),
				'param_name' => 'title_before',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Highlighted Text', 'ohio-extra' ),
				'param_name' => 'title_highlighted',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Text After', 'ohio-extra' ),
				'param_name' => 'title_after',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use Highlighted Text Animation?', 'ohio-extra' ),
				'param_name' => 'highlighted_animation',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Highlighter Height', 'ohio-extra' ),
				'param_name' => 'highlighter_height',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use % unit&nbsp;<i title="Use % unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '10',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),

			// Subtitle.

			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'Subtitle', 'ohio-extra' ),
				'heading' => __( 'Layout', 'ohio-extra' ),
				'param_name' => 'subtitle_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_039_1.svg',
						'key' => 'without_subtitle',
						'title' => __( 'Without', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_038.svg',
						'key' => 'top_subtitle',
						'title' => __( 'Top', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_039.svg',
						'key' => 'bottom_subtitle',
						'title' => __( 'Bottom', 'ohio-extra' ),
					)
				)
			),

			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'Subtitle', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle',
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Subtitle', 'ohio-extra' ),
				'heading' => __( 'Offset', 'ohio-extra' ),
				'param_name' => 'subtitle_offset',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0',
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Subtitle', 'ohio-extra' ),
				'heading' => __( 'Divider', 'ohio-extra' ),
				'param_name' => 'divider_alignment',
				'value' => array(
					__( 'Hidden', 'ohio-extra' ) => 'without',
					__( 'Before Title', 'ohio-extra' ) => 'before_title',
					__( 'After Title', 'ohio-extra' ) => 'after_title',
					__( 'Between Title & Subtitle', 'ohio-extra' ) => 'middle'
				)
			),

			// Styles.
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
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Before Typography', 'ohio-extra' ),
				'param_name' => 'title_before_typo',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Highlighted Text Typography', 'ohio-extra' ),
				'param_name' => 'title_highlighted_typo',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Highlighter Color', 'ohio-extra' ),
				'param_name' => 'highlighter_color',
				'dependency' => array(
					'element' => 'add_highlighted',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Divider Color', 'ohio-extra' ),
				'param_name' => 'divider_color',
				'dependency' => array(
					'element' => 'divider_alignment',
					'value' => array(
						'before_title',
						'after_title',
						'middle'
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
		),
	);
}