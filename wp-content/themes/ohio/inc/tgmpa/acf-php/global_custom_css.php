<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_5946360af373c5",
        "title" => __( 'Custom CSS & JS', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_542245d4313bf",
                "label" => __( 'Custom CSS', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b4567mod951",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message"><i class="bi bi-question-circle"></i>' . __( 'Use custom CSS to customize specific elements. Note, you won\'t lose the following CSS after updating the theme.', 'ohio' ) . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_591ac509d4a44",
                "label" => __( 'Custom CSS', 'ohio' ),
                "name" => "global_page_custom_css",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom CSS code for all devices.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => __( 'Your CSS code goes here', 'ohio' ),
                "language" => "css"
            ],
            [
                "key" => "field_593743a43b383415",
                "label" => "Custom CSS for Desktop <mark></mark>",
                "name" => "global_page_custom_large_css",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom CSS code for devices with a viewport from 1181px.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "css"
            ],
            [
                "key" => "field_593743a43b373415",
                "label" => "Custom CSS for Tablet <mark></mark>",
                "name" => "global_page_custom_medium_css",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom CSS code for devices with a viewport up to 1180px.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "css"
            ],
            [
                "key" => "field_593743a43b363415",
                "label" => "Custom CSS for Mobile <mark></mark>",
                "name" => "global_page_custom_small_css",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom CSS code for devices with a viewport up to 768px.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "css"
            ],
            [
                "key" => "field_542244d4343bf",
                "label" => __( 'Custom JS', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a32b48cexmod151",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message"><i class="bi bi-question-circle"></i>' . __( 'Use custom JS to enhance specific parts of your site. Note, you won\'t lose the following JS after updating the theme.', 'ohio' ) . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5937e3a43b383415",
                "label" => __( 'Header Custom JS', 'ohio' ),
                "name" => "global_header_javascript",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom JS code to enhance specific parts of your site (e.g. Google Analytics, Facebook Pixel).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "javascript"
            ],
            [
                "key" => "field_5937e4a43b383415",
                "label" => __( 'Footer Custom JS', 'ohio' ),
                "name" => "global_footer_javascript",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom JS code to enhance specific parts of your site (e.g. Google Analytics, Facebook Pixel).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "javascript"
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-custom"
                ]
            ]
        ],
        "menu_order" => 0,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ] );

endif;
