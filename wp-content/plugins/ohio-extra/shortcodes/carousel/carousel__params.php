<?php

/**
* WPBakery Page Builder Ohio Carousel shortcode params
*/

vc_lean_map( 'ohio_carousel', 'ohio_carousel_sc_map' );

function ohio_carousel_sc_map() {
	return array(
		'name' => __( 'Carousel', 'ohio-extra' ),
		'description' => __( 'Scrollable content module', 'ohio-extra' ),
		'base' => 'ohio_carousel',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/carousel_icon.svg',
		'is_container' => true,
		'show_settings_on_create' => true,
		'as_parent' => array(
			'only' => 'ohio_carousel_inner',
		),
		'js_view' => 'VcOhioBackendTtaSliderView',
		'custom_markup' => '
			<div class="vc_tta-container" data-vc-action="collapse">
				<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
					<div class="vc_tta-tabs-container">'
						. '<ul class="vc_tta-tabs-list">'
						. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
						. '</ul>
					</div>
					<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
					</div>
				</div>
			</div>
		',
		'default_content' => '
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 1 ) . '"][/ohio_carousel_inner]
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 2 ) . '"][/ohio_carousel_inner]
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 3 ) . '"][/ohio_carousel_inner]
		',
		'admin_enqueue_js' => array(
			vc_asset_url( 'lib/vc/vc_tabs/vc-tabs.min.js' ),
		),
		'params' => array(

			// General.
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use Preloader?', 'ohio-extra' ),
				'param_name' => 'preloader',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use Offset?', 'ohio-extra' ),
				'param_name' => 'offset_items',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Offset Size', 'ohio-extra' ),
				'param_name' => 'offset_size',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '',
				'dependency' => array(
					'element' => 'offset_items',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Add Gaps?', 'ohio-extra' ),
				'param_name' => 'gap_items',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gaps Size', 'ohio-extra' ),
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'param_name' => 'gap_size',
				'value' => '32',
				'dependency' => array(
					'element' => 'gap_items',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Auto Height', 'ohio-extra' ),
				'param_name' => 'autoheight',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => '',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay Mode', 'ohio-extra' ),
				'param_name' => 'autoplay',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay Interval Timeout', 'ohio-extra' ),
				'param_name' => 'autoplay_time',
				'description' => __( 'Autoplay interval timeout in seconds.', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'autoplay',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay Pausing on Hover', 'ohio-extra' ),
				'param_name' => 'stop_on_hover',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'autoplay',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop Mode', 'ohio-extra' ),
				'param_name' => 'loop',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse Drag Mode', 'ohio-extra' ),
				'param_name' => 'drag_scroll',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of Visible Items (Desktop)', 'ohio-extra' ),
				'param_name' => 'item_desktop',
				'value' => array(
					__( '1 item', 'ohio-extra' ) => '1',
					__( '2 items', 'ohio-extra' ) => '2',
					__( '3 items', 'ohio-extra' ) => '3',
					__( '4 items', 'ohio-extra' ) => '4',
					__( '5 items', 'ohio-extra' ) => '5',
					__( '6 items', 'ohio-extra' ) => '6',
					__( '7 items', 'ohio-extra' ) => '7',
					__( '8 items', 'ohio-extra' ) => '8',
					__( '9 items', 'ohio-extra' ) => '9'
				),
				'std' => '3',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of Visible Items (Tablet)', 'ohio-extra' ),
				'param_name' => 'item_tablet',
				'value' => array(
					__( '1 item', 'ohio-extra' ) => '1',
					__( '2 items', 'ohio-extra' ) => '2',
					__( '3 items', 'ohio-extra' ) => '3',
					__( '4 items', 'ohio-extra' ) => '4',
					__( '5 items', 'ohio-extra' ) => '5',
					__( '6 items', 'ohio-extra' ) => '6',
					__( '7 items', 'ohio-extra' ) => '7',
					__( '8 items', 'ohio-extra' ) => '8',
					__( '9 items', 'ohio-extra' ) => '9'
				),
				'std' => '2',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of Visible Items (Mobile)', 'ohio-extra' ),
				'param_name' => 'item_mobile',
				'value' => array(
					__( '1 item', 'ohio-extra' ) => '1',
					__( '2 items', 'ohio-extra' ) => '2',
					__( '3 items', 'ohio-extra' ) => '3',
					__( '4 items', 'ohio-extra' ) => '4',
					__( '5 items', 'ohio-extra' ) => '5',
					__( '6 items', 'ohio-extra' ) => '6',
					__( '7 items', 'ohio-extra' ) => '7',
					__( '8 items', 'ohio-extra' ) => '8',
					__( '9 items', 'ohio-extra' ) => '9'
				),
				'std' => '1',
			),

			// Pagination.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination', 'ohio-extra' ),
				'param_name' => 'pagination_show',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination Type', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'pagination',
					__( 'Bullets', 'ohio-extra' ) => 'dots',
					// __( 'Both', 'ohio-extra' ) => 'both',
				),
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Navigation', 'ohio-extra' ),
				'param_name' => 'navigation_buttons',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Navigation Position', 'ohio-extra' ),
				'param_name' => 'position_nav_buttons',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Offset', 'ohio-extra' ) => 'offset',
					__( 'Inset', 'ohio-extra' ) => 'inset',
				),
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => array(
						'1'
					)
				)
			),

			// Styles.

			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Navigation Color', 'ohio-extra' ),
				'param_name' => 'nav_color',
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Navigation Background Color', 'ohio-extra' ),
				'param_name' => 'nav_bg_color',
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Bullets Color', 'ohio-extra' ),
				'param_name' => 'dots_color',
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Numbers Color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => '1',
				)
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

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Ohio_Carousel extends WPBakeryShortCode {
		static $filter_added = false;
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
		protected $controls_list = array( 'edit', 'clone', 'delete' );

		public function __construct( $settings ) {
			parent::__construct( $settings );
			if ( ! self::$filter_added ) {
				$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
				self::$filter_added = true;
			}
		}

		public function getTabTemplate() {
			return '<div class="wpb_template">' . do_shortcode( '[vc_tab title="Tab" tab_id=""][/vc_tab]' ) . '</div>';
		}

		public function setCustomTabId( $content ) {
			return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', (string) $content );
		}
	}
}
