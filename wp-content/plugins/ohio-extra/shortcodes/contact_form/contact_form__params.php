<?php

/**
* WPBakery Page Builder Ohio Contact Form shortcode params
*/

vc_lean_map( 'ohio_contact_form', 'ohio_contact_form_sc_map' );

function ohio_contact_form_sc_map() {
	$ohio_extra_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$ohio_extra_contact_forms = array();
	if ( $ohio_extra_cf7 ) {
		foreach ( $ohio_extra_cf7 as $cform ) {
			$ohio_extra_contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$ohio_extra_contact_forms[ __( 'No contact forms found', 'ohio-extra' ) ] = 0;
	}

	return array(
		'name' => __( 'Contact Form 7', 'ohio-extra' ),
		'description' => __( 'Contact or subscribe form', 'ohio-extra' ),
		'base' => 'ohio_contact_form',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/contact_form_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'text',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( '', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'Ensure that you have installed and activated the <a target="_blank" href="/wp-admin/plugins.php">Contact Form 7</a> from the recommended plugins.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'form_style',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_031.svg',
						'key' => 'flat',
						'title' => __( 'Filled', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_030.svg',
						'key' => 'outline',
						'title' => __( 'Outlined', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'form_position',
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
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Choose Form', 'ohio-extra' ),
				'param_name' => 'form_id',
				'value' => $ohio_extra_contact_forms,
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gutters', 'ohio-extra' ),
				'param_name' => 'fields_offset',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a> Go to Theme Settings to <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">set gutters value</a> for the entire site.', 'ohio-extra' ),
				'value' => '16'
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Placeholder Typography', 'ohio-extra' ),
				'param_name' => 'input_placeholder_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Typography', 'ohio-extra' ),
				'param_name' => 'input_text_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Fields Background', 'ohio-extra' ),
				'param_name' => 'fields_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'flat',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Fields Background (Active)', 'ohio-extra' ),
				'param_name' => 'fields_active_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'flat',
					)
				)
			),

			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Fields Border Color', 'ohio-extra' ),
				'param_name' => 'fields_border_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'outline'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text Fields Border Color (Active)', 'ohio-extra' ),
				'param_name' => 'fields_focus_border_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'outline'
					)
				)
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button', 'ohio-extra' ),
				'param_name' => 'button',
				'button_full_disabled' => 'true'
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