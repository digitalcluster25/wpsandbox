<?php

/**
* WPBakery Page Builder Ohio Team Member shortcode params
*/

vc_lean_map( 'ohio_team_member', 'ohio_team_member_sc_map' );

function ohio_team_member_sc_map() {
	return array(
			'name' => __( 'Team Member', 'ohio-extra' ),
			'description' => __( 'Team member module', 'ohio-extra' ),
			'base' => 'ohio_team_member',
			'category' => __( 'Ohio', 'ohio-extra' ),
			'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/team_member_icon.svg',
			'js_view' => 'VcOhioTeamMemberView',
			'custom_markup' => '{{title}}<div class="vc_ohio_team_member-container">
					<div class="_contain">
						<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/sc_gap_user.svg\');"></div>
						<div class="name">%%name%%</div>
						<div class="position"></div>
					</div>
					<div class="lines"><div class="line"></div><div class="line"></div></div>
				</div>',
			'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Layout', 'ohio-extra' ),
				'param_name' => 'block_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_062.svg',
						'key' => 'full',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_063.svg',
						'key' => 'inner',
						'title' => __( 'Inner', 'ohio-extra' ),
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
				),
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image', 'ohio-extra' ),
				'param_name' => 'photo',
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Name', 'ohio-extra' ),
				'param_name' => 'name',
				'default' => 'John Doe'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Position', 'ohio-extra' ),
				'param_name' => 'position',
				'default' => 'Product Manager'
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'About', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Brief description of team member\'s skills and achievements.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape Border', 'ohio-extra' ),
				'param_name' => 'border_width',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0',
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape Corners', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal Height', 'ohio-extra' ),
				'description' => __( 'Convert a rectangular image into a cropped square.', 'ohio-extra' ),
				'param_name' => 'equal_height',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tilt Effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop Shadow', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
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
				'heading' => __( 'Hover Effect', 'ohio-extra' ),
				'param_name' => 'card_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Image Scaling', 'ohio-extra' ) => 'scale',
					__( 'Image Overlay', 'ohio-extra' ) => 'overlay',
					__( 'Image Greyscale', 'ohio-extra' ) => 'greyscale',
				),
				'std' => 'none',
			),

			// Link.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Add Link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link URL', 'ohio-extra' ),
				'param_name' => 'member_link',
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
					)
				),
			),

			// Social networks.
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-artstation"></i> ' . __( 'ArtStation', 'ohio-extra' ),
				'param_name' => 'artstation_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-behance"></i> ' . __( 'Behance', 'ohio-extra' ),
				'param_name' => 'behance_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-deviantart"></i> ' . __( 'DeviantArt', 'ohio-extra' ),
				'param_name' => 'deviantart_link'
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-digg"></i> ' . __( 'Digg', 'ohio-extra' ),
				'param_name' => 'digg_link'
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-discord"></i> ' . __( 'Discord', 'ohio-extra' ),
				'param_name' => 'discord_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-dribbble"></i> ' . __( 'Dribbble', 'ohio-extra' ),
				'param_name' => 'dribbble_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-facebook-f"></i> ' . __( 'Facebook', 'ohio-extra' ),
				'param_name' => 'facebook_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-flickr"></i> ' . __( 'Flickr', 'ohio-extra' ),
				'param_name' => 'flickr_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-github"></i> ' . __( 'GitHub', 'ohio-extra' ),
				'param_name' => 'github_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-houzz"></i> ' . __( 'Houzz', 'ohio-extra' ),
				'param_name' => 'houzz_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-instagram"></i> ' . __( 'Instagram', 'ohio-extra' ),
				'param_name' => 'instagram_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-kaggle"></i> ' . __( 'Kaggle', 'ohio-extra' ),
				'param_name' => 'kaggle_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-linkedin"></i> ' . __( 'LinkedIn', 'ohio-extra' ),
				'param_name' => 'linkedin_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-medium-m"></i> ' . __( 'Medium', 'ohio-extra' ),
				'param_name' => 'medium_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-mixer"></i> ' . __( 'Mixer', 'ohio-extra' ),
				'param_name' => 'mixer_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-pinterest"></i> ' . __( 'Pinterest', 'ohio-extra' ),
				'param_name' => 'pinterest_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-product-hunt"></i> ' . __( 'Product Hunt', 'ohio-extra' ),
				'param_name' => 'producthunt_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-quora"></i> ' . __( 'Quora', 'ohio-extra' ),
				'param_name' => 'quora_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-reddit"></i> ' . __( 'Reddit', 'ohio-extra' ),
				'param_name' => 'reddit_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-snapchat"></i> ' . __( 'Snapchat', 'ohio-extra' ),
				'param_name' => 'snapchat_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-soundcloud"></i> ' . __( 'SoundCloud', 'ohio-extra' ),
				'param_name' => 'soundcloud_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-spotify"></i> ' . __( 'Spotify', 'ohio-extra' ),
				'param_name' => 'spotify_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-teamspeak"></i> ' . __( 'TeamSpeak', 'ohio-extra' ),
				'param_name' => 'teamspeak_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-telegram"></i> ' . __( 'Telegram', 'ohio-extra' ),
				'param_name' => 'telegram_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-threads"></i> ' . __( 'Threads', 'ohio-extra' ),
				'param_name' => 'threads_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-tiktok"></i> ' . __( 'TikTok', 'ohio-extra' ),
				'param_name' => 'tiktok_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-tumblr"></i> ' . __( 'Tumblr', 'ohio-extra' ),
				'param_name' => 'tumblr_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-twitch"></i> ' . __( 'Twitch', 'ohio-extra' ),
				'param_name' => 'twitch_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-x-twitter"></i> ' . __( 'X', 'ohio-extra' ),
				'param_name' => 'twitter_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-vimeo"></i> ' . __( 'Vimeo', 'ohio-extra' ),
				'param_name' => 'vimeo_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-vine"></i> ' . __( 'Vine', 'ohio-extra' ),
				'param_name' => 'vine_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-whatsapp"></i> ' . __( 'Whatsapp', 'ohio-extra' ),
				'param_name' => 'whatsapp_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-xing"></i> ' . __( 'Xing', 'ohio-extra' ),
				'param_name' => 'xing_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-youtube"></i> ' . __( 'YouTube', 'ohio-extra' ),
				'param_name' => 'youtube_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fa-brands fa-500px"></i> ' . __( '500px', 'ohio-extra' ),
				'param_name' => 'fivehundred_link'
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Name Typography', 'ohio-extra' ),
				'param_name' => 'name_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Position Typography', 'ohio-extra' ),
				'param_name' => 'position_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'About Typography', 'ohio-extra' ),
				'param_name' => 'desription_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay Color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Shape Border Color', 'ohio-extra' ),
				'param_name' => 'border_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Social Links Color', 'ohio-extra' ),
				'param_name' => 'social_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Social Links Color (Hover)', 'ohio-extra' ),
				'param_name' => 'social_hover_color',
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