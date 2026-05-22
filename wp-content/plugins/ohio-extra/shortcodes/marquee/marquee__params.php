<?php
/**
* WPBakery Page Builder Ohio Marquee shortcode params
*/
vc_lean_map( 'ohio_marquee', 'ohio_marquee_sc_map' );

function ohio_marquee_sc_map() {
	return array(
        'name'        => __( 'Marquee', 'ohio-extra' ),
        'base'        => 'ohio_marquee',
        'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/marquee_icon.svg',
        'category'    => __( 'Content', 'ohio-extra' ),
        'description' => __( 'Scrolling marquee of text or images', 'ohio-extra' ),

        'params'      => array(
            array(
                'type'        => 'dropdown',
                'heading'     => __( 'Content Type', 'ohio-extra' ),
                'param_name'  => 'content_type',
                'value'       => array(
                    __( 'Gallery', 'ohio-extra' ) => 'gallery',
                    __( 'Text',    'ohio-extra' ) => 'text',
                ),
                'std'         => 'gallery',
            ),

            array(
                'type'        => 'attach_images',
                'heading'     => __( 'Images', 'ohio-extra' ),
                'param_name'  => 'images',
                'description' => __( 'Select images for the marquee.', 'ohio-extra' ),
                'dependency'  => array(
                    'element' => 'content_type',
                    'value'   => array( 'gallery' ),
                ),
            ),

            array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
                'heading'     => __( 'Text', 'ohio-extra' ),
                'param_name'  => 'marquee_text',
                'std'         => __( 'Your marquee text', 'ohio-extra' ),
                'dependency'  => array(
                    'element' => 'content_type',
                    'value'   => array( 'text' ),
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => __( 'Direction', 'ohio-extra' ),
                'param_name'  => 'direction',
                'value'       => array(
                    __( 'Left to Right', 'ohio-extra' ) => 'ltr',
                    __( 'Right to Left', 'ohio-extra' ) => 'rtl',
                ),
                'std'         => 'ltr',
                'description' => __( 'Scrolling direction.', 'ohio-extra' ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => __( 'Speed', 'ohio-extra' ),
                'param_name'  => 'speed',
                'value'       => array(
                    __( 'Very Slow', 'ohio-extra' ) => '0.1',
                    __( 'Slow',      'ohio-extra' ) => '0.2',
                    __( 'Normal',    'ohio-extra' ) => '0.4',
                    __( 'Fast',      'ohio-extra' ) => '0.6',
                    __( 'Very Fast', 'ohio-extra' ) => '0.8',
                ),
                'std'         => '0.4',
            ),

            array(
                'type'        => 'checkbox',
                'heading'     => __( 'Slow on Scroll', 'ohio-extra' ),
                'param_name'  => 'slow_on_scroll',
                'value'       => array( __( 'Yes', 'ohio-extra' ) => 'yes' ),
                'description' => __( 'Make the animation slow down progressively as you scroll coming to a full stop.', 'ohio-extra' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => __( 'Gap (Right Padding)', 'ohio-extra' ),
                'param_name'  => 'gap_right',
                'std'         => '16px',
                'description' => __( 'CSS size with unit (e.g. 16px, 1rem, 2em, 5%). Applies to .marquee-line-el padding-right.', 'ohio-extra' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => __( 'Height', 'ohio-extra' ),
                'param_name'  => 'height',
                'std'         => '100px',
                'description' => __( 'CSS size with unit (e.g. 200px, 40vh, 20rem, 50%). Applies to .marquee-line-stage height.', 'ohio-extra' ),
                'dependency'  => array(
                    'element' => 'content_type',
                    'value'   => array('gallery'),
                ),
            ),
            
            array(
                'type'        => 'ohio_typography',
                'heading'     => __( 'Typography', 'ohio-extra' ),
                'param_name'  => 'text_typo',
                'dependency'  => array(
                    'element' => 'content_type',
                    'value'   => array( 'text' ),
                ),
                'group'       => __( 'Styles', 'ohio-extra' ),
            ),

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
