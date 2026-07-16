<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_5946362bf373c5",
        "title" => __( 'Other Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_542244d4313bf",
                "label" => __( 'Plugins', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937a0a521481ebmod23",
                "label" => '<h4>' . __( 'Google Maps', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fe13500023",
                "label" => __( 'Google Maps API Key', 'ohio' ),
                "name" => "global_google_maps_api_key",
                "type" => "text",
                "instructions" => 'Add the Google Maps API key to your site. <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">How to get your API key</a>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => __( 'Paste your key', 'ohio' ),
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_5941bd413bf234",
                "label" => '<h4>' . __( 'WPML', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fe13500c38",
                "label" => __( 'WPML Switcher', 'ohio' ),
                "name" => "global_wpml_show_in_header",
                "type" => "true_false",
                "instructions" => __( 'Display a WPML language switcher on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_591b002d481fcff56",
                "label" => __( 'Social Media', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe1350456235",
                "label" => __( 'Social Media', 'ohio' ),
                "name" => "global_page_social_links_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show social media accounts on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5222e3443f7k9l56",
                "label" => __( 'Social Media (Tablets)', 'ohio' ),
                "name" => "global_header_menu_social_links_visibility_tablet",
                "type" => "true_false",
                "instructions" => __( 'Show social accounts on tablets.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_snlid", // old field_59229bda366f4mod
                "label" => __( 'Social Accounts', 'ohio' ),
                "name" => "global_header_menu_social_links",
                "type" => "repeater",
                "instructions" => __( 'Choose social accounts to be displayed on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 10,
                "layout" => "table",
                "button_label" => __( '+ Add Account', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "insnsn", // old field_59229bda7b686moddd
                        "label" => __( 'Account', 'ohio' ),
                        "name" => "social_network",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "choices" => [
                            "artstation" => __( 'Artstation', 'ohio' ),
                            "behance" => __( 'Behance', 'ohio' ),
                            "deviantart" => __( 'DeviantArt', 'ohio' ),
                            "digg" => __( 'Digg', 'ohio' ),
                            "discord" => __( 'Discord', 'ohio' ),
                            "dribbble" => __( 'Dribbble', 'ohio' ),
                            "facebook" => __( 'Facebook', 'ohio' ),
                            "flickr" => __( 'Flickr', 'ohio' ),
                            "github" => __( 'GitHub', 'ohio' ),
                            "houzz" => __( 'Houzz', 'ohio' ),
                            "instagram" => __( 'Instagram', 'ohio' ),
                            "kaggle" => __( 'Kaggle', 'ohio' ),
                            "linkedin" => __( 'LinkedIn', 'ohio' ),
                            "medium" => __( 'Medium', 'ohio' ),
                            "mixer" => __( 'Mixer', 'ohio' ),
                            "pinterest" => __( 'Pinterest', 'ohio' ),
                            "producthunt" => __( 'Product Hunt', 'ohio' ),
                            "quora" => __( 'Quora', 'ohio' ),
                            "reddit" => __( 'Reddit', 'ohio' ),
                            "snapchat" => __( 'Snapchat', 'ohio' ),
                            "soundcloud" => __( 'SoundCloud', 'ohio' ),
                            "spotify" => __( 'Spotify', 'ohio' ),
                            "teamspeak" => __( 'Teamspeak', 'ohio' ),
                            "telegram" => __( 'Telegram', 'ohio' ),
                            "threads" => __( 'Threads', 'ohio' ),
                            "tiktok" => __( 'TikTok', 'ohio' ),
                            "tumblr" => __( 'Tumblr', 'ohio' ),
                            "twitch" => __( 'Twitch', 'ohio' ),
                            "twitter" => __( 'X', 'ohio' ),
                            "vimeo" => __( 'Vimeo', 'ohio' ),
                            "vine" => __( 'Vine', 'ohio' ),
                            "whatsapp" => __( 'WhatsApp', 'ohio' ),
                            "xing" => __( 'Xing', 'ohio' ),
                            "youtube" => __( 'YouTube', 'ohio' ),
                            "500px" => __( '500px', 'ohio' )
                        ],
                        "default_value" => [],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "ajax" => 0,
                        "return_format" => "value",
                        "placeholder" => ""
                    ],
                    [
                        "key" => "insnurl", // old field_59229bda7ba5ajhghjhg
                        "label" => __( 'URL', 'ohio' ),
                        "name" => "url",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "default_value" => "",
                        "placeholder" => ""
                    ]
                ]
            ],
            [
                "key" => "field_592fe13500linksinnewtab",
                "label" => __( 'Open in New Tab', 'ohio' ),
                "name" => "global_social_network_target_blank",
                "type" => "true_false",
                "instructions" => __( 'Open social media accounts in a new browser tab.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe1350013rfw4g23",
                "label" => __( 'Layout Type', 'ohio' ),
                "name" => "global_social_network_type",
                "type" => "radio",
                "instructions" => __( 'Choose the layout type of social accounts.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "letters" => __( 'Name', 'ohio' ),
                    "icons" => __( 'Icon', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "letters",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e1905d075d297",
                "label" => __( 'Social Media Position', 'ohio' ),
                "name" => "global_social_network_position",
                "type" => "radio",
                "instructions" => __( 'Choose the social accounts position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __( 'Left Side', 'ohio' ),
                    "right" => __( 'Right Side', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "right",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_598s31s15af5g9s",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_l05mnk93kid43naf2",
                "label" => __( 'Social Media Typography', 'ohio' ),
                "name" => "global_page_social_networks_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the social accounts for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591b056456481fcffmod",
                "label" => __( 'Subscribe Popup', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5222e34430vve4od8",
                "label" => __( 'Popup', 'ohio' ),
                "name" => "global_subscribe_popup_switch",
                "type" => "true_false",
                "instructions" => __( 'Enable the subscribe popup for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5222e34430vve4c5",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "global_subscribe_popup_position",
                "type" => "select",
                "instructions" => __( 'Choose a layout for the subscribe popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "default" => __( 'Default', 'ohio' ),
                    "slidein_left" => __( 'Slide-In Left', 'ohio' ),
                    "slidein_right" => __( 'Slide-In Right', 'ohio' )
                ],
                "default_value" => [
                    "default"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_5937895484415",
                "label" => __( 'Subscribe Form', 'ohio' ),
                "name" => "global_subscribe_choice_of_forms",
                "type" => "post_object",
                "post_type" => [
                    "wpcf7_contact_form"
                ],
                "instructions" => __( 'Choose a subscribe form pre-made in', 'ohio' ) . '&nbsp;<a target="_blank" href="./admin.php?page=wpcf7">' . __( 'Contact Form 7', 'ohio' ) . '&nbsp;</a>' . __( 'menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "id",
                "placeholder" => ""
            ],
            [
                "key" => "field_592gh23s3500c30",
                "label" => __( 'Heading', 'ohio' ),
                "name" => "global_text_subcribe_popup",
                "type" => "text",
                "instructions" => __( 'Add a heading to the subscribe popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __( 'Keep up with our daily and weekly newsletters', 'ohio' ),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592g223s3500c30",
                "label" => __( 'Description', 'ohio' ),
                "name" => "global_details_text_subcribe_popup",
                "type" => "textarea",
                "instructions" => __( 'Add a description to the subscribe popup', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __( 'Be the first to know about further promotions and upcoming products.', 'ohio' ),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fd8901f6jiofnbbbqo",
                "label" => __( 'Featured Image', 'ohio' ),
                "name" => "global_subscribe_popup",
                "type" => "clone",
                "instructions" => __( 'Customize the featured image of the subscribe popup.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_5222e344302354325",
                "label" => __( 'Featured Image Position', 'ohio' ),
                "name" => "global_subscribe_popup_image_position",
                "type" => "select",
                "instructions" => __( 'Choose how do you want to align the featured image.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __( 'Left', 'ohio' ),
                    "top" => __( 'Top', 'ohio' ),
                    "right" => __( 'Right', 'ohio' ),
                    "bottom" => __( 'Bottom', 'ohio' )
                ],
                "default_value" => [
                    "left"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59229bda31f95_sbscr",
                "label" => __( 'Display Trigger', 'ohio' ),
                "name" => "global_subscribe_popup_display_trigger",
                "type" => "radio",
                "instructions" => __( 'Choose the trigger type for when the popup is displayed.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "time" => __( 'Time Delay', 'ohio' ),
                    "scroll" => __( 'Page Scrolling %', 'ohio' ),
                    "exit" => __( 'Exit Intent', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "no",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_3337773s3500c30",
                "label" => __( 'Time Delay', 'ohio' ),
                "name" => "global_delay_subcribe_popup",
                "type" => "text",
                "instructions" => __( 'Set the delay value for when the popup is displayed.', 'ohio' ),
                "required" => 0,
                "append" => __( 'seconds', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda31f95_sbscr",
                            "operator" => "==",
                            "value" => "time"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_58351fsa421j1265",
                "label" => __( 'Page Scrolling %', 'ohio' ),
                "name" => "global_subscribe_popup_scroll_percent",
                "type" => "text",
                "instructions" => __( 'Set the page scrolling position for when the popup is displayed.', 'ohio' ),
                "required" => 0,
                "append" => __( '%', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda31f95_sbscr",
                            "operator" => "==",
                            "value" => "scroll"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "maxlength" => "2",
                "placeholder" => ""
            ],
            [
                "key" => "field_58383c7ed01ae_sbscr",
                "label" => __( 'Cookie Expires', 'ohio' ),
                "name" => "global_subscribe_popup_expires",
                "type" => "text",
                "instructions" => __( 'After expiry period, the popup is displayed again. Clear site cookies to see the popup instantly.', 'ohio' ),
                "required" => 1,
                "append" => __( 'days', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "maxlength" => "2",
                "placeholder" => ""
            ],
            [
                "key" => "field_5222e34430124124",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_5222e34430vve4c3",
                "label" => __( 'Popup Height', 'ohio' ),
                "name" => "global_subscribe_popup_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set a height for the popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5222e34430vve4c4",
                "label" => __( 'Popup Width', 'ohio' ),
                "name" => "global_subscribe_popup_width",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set a width for the popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5222e344302329385",
                "label" => __( 'Background Color', 'ohio' ),
                "name" => "global_subscribe_popup_window_background_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the popup window background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
            ],
            [
                "key" => "field_5222e3443023r5afd8",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "global_subscribe_popup_overlay_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the popup window overlay background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4c5",
                            "operator" => "==",
                            "value" => "default"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5222e344302854",
                "label" => __( 'Close Button Color', 'ohio' ),
                "name" => "global_subscribe_popup_close_button_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the popup close button color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_583235723543125",
                "label" => __( 'Close Text', 'ohio' ),
                "name" => "global_subscribe_popup_close_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the "Please, don’t ask me again" text to hide the popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' ),
                "message" => "",
                "default_value" => 0
            ],
            [
                "key" => "field_592fg8883827b4",
                "label" => __( 'Close Text Typography', 'ohio' ),
                "name" => "global_subscribe_popup_close_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the "Please, don’t ask me again" text to hide the popup.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_583235723543125",
                            "operator" => "!=",
                            "ui_on_text" => __( 'Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fgj993827b",
                "label" => __( 'Heading Typography', 'ohio' ),
                "name" => "global_subscribe_popup_title_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the popup heading.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fg8883827b",
                "label" => __( 'Description Typography', 'ohio' ),
                "name" => "global_subscribe_popup_details_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the popup description.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fg8883827b3",
                "label" => __( 'Form Typography', 'ohio' ),
                "name" => "global_subscribe_popup_form_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the popup subscribe form.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_542244d4343hg",
                "label" => __( 'Notices', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500qwedqwxs",
                "label" => __( 'Notice', 'ohio' ),
                "name" => "global_notification_bar",
                "type" => "true_false",
                "instructions" => __( 'Enable a notice banner on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe13500hjbh",
                "label" => __( 'Notice Text', 'ohio' ),
                "name" => "global_notification_text",
                "type" => "text",
                "instructions" => __( 'Add a text for the notice banner.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fe135002542tgs",
                "label" => __( 'Notice Link', 'ohio' ),
                "name" => "global_notification_link",
                "type" => "true_false",
                "instructions" => __( 'Display a link on the notice banner.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592feа125350234df2",
                "label" => __( 'Link Attributes', 'ohio' ),
                "name" => "global_notification_link",
                "type" => "link",
                "instructions" => __( 'Set a link attributes.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe135002542tgs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe135002513483",
                "label" => __( 'Cookie Icon', 'ohio' ),
                "name" => "global_notification_icon",
                "type" => "true_false",
                "instructions" => __( 'Display a cookie icon on the notice banner.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe13500asdas",
                "label" => __( 'Notice Button', 'ohio' ),
                "name" => "global_notification_button",
                "type" => "true_false",
                "instructions" => __( 'Display a button on the notice banner.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592feа125350kasdgh",
                "label" => __( 'Button Attributes', 'ohio' ),
                "name" => "global_notification_button_link",
                "type" => "link",
                "instructions" => __( 'Set a button attributes.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500asdas",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_583592feа12asdf435e",
                "label" => __( 'Cookie Expires', 'ohio' ),
                "name" => "global_notification_expires",
                "type" => "text",
                "instructions" => __( 'After expiry period, the notice is displayed again. Clear site cookies to see the notice instantly.', 'ohio' ),
                "required" => 0,
                "append" => __( 'days', 'ohio' ),
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "default_value" => "360",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "maxlength" => "3",
                "placeholder" => ""
            ],
            [
                "key" => "field_598s31s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ]
            ],
            [
                "key" => "field_583592feа12asdf4asfasf",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_notification_background_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the notice background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "ui" => 0,
                "ajax" => 0,
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd8901f6jiofnbbbqo",
                "label" => __( 'Featured Image', 'ohio' ),
                "name" => "global_subscribe_popup",
                "type" => "clone",
                "instructions" => __( 'Customize the featured image of the subscribe popup.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_592fe135003242348",
                "label" => __( 'Background Blur Effect', 'ohio' ),
                "name" => "global_notification_blur_effect",
                "type" => "true_false",
                "instructions" => __( 'Enable the notice banner background blur effect.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_583592feа12asdf4asf",
                "label" => __( 'Button Color', 'ohio' ),
                "name" => "global_notification_button_background_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the notice banner button background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500asdas",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "ui" => 0,
                "ajax" => 0,
                "placeholder" => ""
            ],
            [
                "key" => "field_583592feа12as98holrv",
                "label" => __( 'Notice Typography', 'ohio' ),
                "name" => "global_notification_details_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the notice text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ]
            ],
            [
                "key" => "field_583592feа12as90",
                "label" => __( 'Notice Link Typography', 'ohio' ),
                "name" => "global_notification_link_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the notice links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe135002542tgs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ]
            ],
            [
                "key" => "field_542244283756",
                "label" => __( 'Offer Banner', 'ohio' ) . '<span class="new-badge"></new>',
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_542244283757",
                "label" => __( 'Banner', 'ohio' ),
                "name" => "global_page_offer_banner",
                "type" => "true_false",
                "instructions" => __( 'Enable an offer banner on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_542244283758",
                "label" => __( 'Banner Text', 'ohio' ),
                "name" => "global_page_offer_banner_text_items",
                "type" => "repeater",
                "instructions" => __( 'Add details to the offer banner area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_542244283757",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 50,
                "layout" => "table",
                "button_label" => __( '+ Add item', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c954md3",
                        "label" => __( 'Items list', 'ohio' ),
                        "name" => "items",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => __( 'HTML allowed', 'ohio' ),
                        "append" => "",
                        "maxlength" => 2000
                    ]
                ]
            ],
            [
                "key" => "field_542244293586723",
                "label" => __( 'Banner Position', 'ohio' ),
                "name" => "global_page_offer_banner_position",
                "type" => "select",
                "instructions" => __( 'Choose the offer banner position.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283757",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "choices" => [
                    "default" => __( 'Default', 'ohio' ),
                    "absolute" => __( 'Absolute', 'ohio' ),
                    "fixed" => __( 'Fixed', 'ohio' ),
                ],
                "default_value" => "none",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_542244283759",
                "label" => __( 'Banner Effect', 'ohio' ),
                "name" => "global_page_offer_banner_effect",
                "type" => "select",
                "instructions" => __( 'Choose an effect for the offer banner text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283757",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "choices" => [
                    "none" => __( 'None', 'ohio' ),
                    "scrolling" => __( 'Infinite Scrolling', 'ohio' ),
                    "flipping" => __( 'Flipping', 'ohio' ),
                ],
                "default_value" => "none",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_542244283759s",
                "label" => __( 'Scrolling Speed', 'ohio' ),
                "name" => "global_page_offer_banner_scrolling_effect_speed",
                "type" => "select",
                "instructions" => __( 'Set a scrolling speed value for infinite scrolling effect.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283759",
                        "operator" => "==",
                        "value" => "scrolling"
                    ]
                ],
                "choices" => [
                    "0.2" => __( 'Very Slow', 'ohio' ),
                    "0.4" => __( 'Slow', 'ohio' ),
                    "0.6" => __( 'Normal', 'ohio' ),
                    "0.8" => __( 'Fast', 'ohio' ),
                    "1" => __( 'Very Fast', 'ohio' ),
                ],
                "default_value" => "Normal",
                "placeholder" => "",
                "append" => __( 'Sec', 'ohio' ),
                "min" => 0,
                "maxlength" => ""
            ],
            [
                "key" => "field_542244283759f",
                "label" => __( 'Flipping Interval Timeout', 'ohio' ),
                "name" => "global_page_offer_banner_flipping_effect_interval",
                "type" => "number",
                "instructions" => __( 'Set an interval timeout value for flipping effect.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283759",
                        "operator" => "==",
                        "value" => "flipping"
                    ]
                ],
                "default_value" => 3500,
                "placeholder" => "",
                "append" => __( 'Ms', 'ohio' ),
                "maxlength" => ""
            ],
            [
                "key" => "field_542244283760",
                "label" => __( 'Banner Button', 'ohio' ),
                "name" => "global_page_offer_banner_button",
                "type" => "true_false",
                "instructions" => __( 'Display a button on the offer banner.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_542244283757",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_542244283761",
                "label" => __( 'Button Attributes', 'ohio' ),
                "name" => "global_page_offer_banner_button_link",
                "type" => "link",
                "instructions" => __( 'Set a button attributes.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_542244283760",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],


            [
                "key" => "field_542244283762",
                "label" => __( 'Banner as Link', 'ohio' ),
                "name" => "global_page_offer_banner_as_link",
                "type" => "true_false",
                "instructions" => __( 'Make the entire offer banner area as a link.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283760",
                        "operator" => "==",
                        "value" => 1
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],

            [
                "key" => "field_542244283763",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        "field" => "field_542244283757",
                        "operator" => "==",
                        "value" => 1
                    ]
                ]
            ],
            [
                "key" => "field_542244283764",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_banner",
                "type" => "clone",
                "instructions" => __( 'Customize the background for the offer banner.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283757",
                        "operator" => "==",
                        "value" => 1
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],

            [
                "key" => "field_542244283765",
                "label" => __( 'Button Color', 'ohio' ),
                "name" => "global_page_offer_banner_button_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the offer banner button background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283760",
                        "operator" => "==",
                        "value" => 1
                    ],
                    [
                        "field" => "field_542244283762",
                        "operator" => "!=",
                        "value" => 1
                    ]
                ],
                "ui" => 0,
                "ajax" => 0,
                "placeholder" => ""
            ],
            [
                "key" => "field_542244283766",
                "label" => __( 'Banner Typography', 'ohio' ),
                "name" => "global_page_offer_banner_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the offer banner text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_542244283757",
                        "operator" => "==",
                        "value" => 1
                    ]
                ]
            ],
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-other"
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
