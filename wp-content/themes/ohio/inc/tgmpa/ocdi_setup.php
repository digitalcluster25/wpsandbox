<?php

function ohio_ocdi_import_files() {
	return array(
		array(
			'import_file_name' => '<b>Landing Page</b> All Pages',
			'categories' => array( esc_html__( 'Inner Pages', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/100/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/100/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/100/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/100/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Pages_Inner.webp'
		),
		array(
			'import_file_name' => '<b>Demo 1</b> Creative Agency',
			'preview_url'  => 'https://ohio.clbthemes.com/demo1/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/01/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/01/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/01/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/01/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/01/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo1_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 2</b> Design Bureau',
			'preview_url'  => 'https://ohio.clbthemes.com/demo2/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/02/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/02/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/02/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/02/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/02/options.json',
			'import_sliders_file_url' => ' https://demo.clbthemes.com/v1/demo/02/slider.zip',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo2_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 3</b> Showcase Interactive',
			'preview_url'  => 'https://ohio.clbthemes.com/demo3/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/03/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/03/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/03/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/03/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/03/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo3_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 4</b> Creative Agency',
			'preview_url'  => 'https://ohio.clbthemes.com/demo4/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/04/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/04/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/04/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/04/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/04/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo4_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 5</b> Cloud Service',
			'preview_url'  => 'https://ohio.clbthemes.com/demo5/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/05/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/05/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/05/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/05/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/05/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo5_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 6</b> Showcase Interactive',
			'preview_url'  => 'https://ohio.clbthemes.com/demo6/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/06/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/06/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/06/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/06/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/06/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo6_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 7</b> Minimal Showcase',
			'preview_url'  => 'https://ohio.clbthemes.com/demo7/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/07/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/07/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/07/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/07/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/07/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo7_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 8</b> Creative Agency',
			'preview_url'  => 'https://ohio.clbthemes.com/demo8/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/08/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/08/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/08/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/08/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/08/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo8_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 9</b> Mobile App',
			'preview_url'  => 'https://ohio.clbthemes.com/demo9/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/09/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/09/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/09/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/09/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/09/options.json',
			'import_sliders_file_url' => ' https://demo.clbthemes.com/v1/demo/09/slider.zip',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo9_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 10</b> Digital Agency',
			'preview_url'  => 'https://ohio.clbthemes.com/demo10/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/10/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/10/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/10/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/10/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/10/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo10_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 11</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo11/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/11/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/11/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/11/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/11/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/11/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo11_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 12</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo12/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/12/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/12/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/12/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/12/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/12/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo12_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 13</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo13/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/13/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/13/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/13/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/13/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/13/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo13_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 14</b> Showcase Carousel',
			'preview_url'  => 'https://ohio.clbthemes.com/demo14/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/14/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/14/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/14/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/14/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/14/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo14_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 15</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo15/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/15/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/15/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/15/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/15/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/15/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo15_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 16</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo16/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/16/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/16/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/16/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/16/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/16/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo16_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 17</b> Showcase Slider',
			'preview_url'  => 'https://ohio.clbthemes.com/demo17/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/17/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/17/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/17/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/17/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/17/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo17_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 18</b> Essentials Shop',
			'preview_url'  => 'https://ohio.clbthemes.com/demo18/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/18/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/18/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/18/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/18/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo18_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 19</b> Classic Shop',
			'preview_url'  => 'https://ohio.clbthemes.com/demo19/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/19/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/19/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/19/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/19/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/19/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo19_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 20</b> Minimal Shop',
			'preview_url'  => 'https://ohio.clbthemes.com/demo20/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/20/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/20/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/20/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/20/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo20_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 21</b> Digital Studio',
			'preview_url'  => 'https://ohio.clbthemes.com/demo21/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/21/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/21/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/21/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/21/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/21/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo21_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 22</b> Photo Gallery',
			'preview_url'  => 'https://ohio.clbthemes.com/demo22/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/22/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/22/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/22/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/22/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/22/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo22_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 23</b> Corporate',
			'preview_url'  => 'https://ohio.clbthemes.com/demo23/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/23/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/23/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/23/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/23/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/23/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo23_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 24</b> Travel Blog',
			'preview_url'  => 'https://ohio.clbthemes.com/demo24/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/24/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/24/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/24/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/24/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/24/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo24_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 25</b> Personal Blog',
			'preview_url'  => 'https://ohio.clbthemes.com/demo25/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/25/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/25/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/25/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/25/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/25/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo25_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 26</b> Simple App',
			'preview_url'  => 'https://ohio.clbthemes.com/demo26/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/26/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/26/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/26/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/26/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/26/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo26_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 27</b> Corporate',
			'preview_url'  => 'https://ohio.clbthemes.com/demo27/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/27/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/27/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/27/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/27/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/27/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo27_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 28</b> Conference',
			'preview_url'  => 'https://ohio.clbthemes.com/demo28/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/28/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/28/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/28/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/28/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo28_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 29</b> Minimal Blog',
			'preview_url'  => 'https://ohio.clbthemes.com/demo29/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/29/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/29/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/29/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/29/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/29/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo29_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 30</b> Coming Soon',
			'preview_url'  => 'https://ohio.clbthemes.com/demo30/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/30/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/30/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/30/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/30/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/30/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo30_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 31</b> Digital Agency',
			'preview_url'  => 'https://ohio.clbthemes.com/demo31/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/31/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/31/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/31/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/31/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/31/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo31_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 32</b> Design Studio',
			'preview_url'  => 'https://ohio.clbthemes.com/demo32/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/32/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/32/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/32/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/32/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/32/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo32_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 33</b> Apparel Shop',
			'preview_url'  => 'https://ohio.clbthemes.com/demo32/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/33/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/33/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/33/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/33/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo33_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 34</b> Architectural Studio',
			'preview_url'  => 'https://ohio.clbthemes.com/demo34/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/34/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/34/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/34/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/34/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo34_Home.webp'
		),
		array(
			'import_file_name' => '<b>Demo 35</b> Blog Magazine',
			'preview_url'  => 'https://ohio.clbthemes.com/demo35/',
			'categories' => array( esc_html__( 'Home', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/35/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/35/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/35/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/35/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Demo35_Home.webp'
		),
		array(
			'import_file_name' => '<b>Ver 1</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver1/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/40/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/40/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/40/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/40/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/40/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type1.webp'
		),
		array(
			'import_file_name' => '<b>Ver 2</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver2/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/41/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/41/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/41/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/41/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/41/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type2.webp'
		),
		array(
			'import_file_name' => '<b>Ver 3</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver3/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/42/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/42/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/42/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/42/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/42/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type3.webp'
		),
		array(
			'import_file_name' => '<b>Ver 4</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver4/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/43/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/43/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/43/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/43/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/43/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type4.webp'
		),
		array(
			'import_file_name' => '<b>Ver 5</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver5/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/44/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/44/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/44/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/44/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/44/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type5.webp'
		),
		array(
			'import_file_name' => '<b>Ver 6</b> About Page',
			'preview_url'  => 'https://ohio.clbthemes.com/about-ver6/',
			'categories' => array( esc_html__( 'About', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/45/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/45/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/45/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/45/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/45/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/About_Type6.webp'
		),
		array(
			'import_file_name' => '<b>Ver 1</b> Service Page',
			'preview_url'  => 'https://ohio.clbthemes.com/service-ver1/',
			'categories' => array( esc_html__( 'Service', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/110/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/110/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/110/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/110/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Services_Type1.webp'
		),
		array(
			'import_file_name' => '<b>Ver 2</b> Service Page',
			'preview_url'  => 'https://ohio.clbthemes.com/service-ver2/',
			'categories' => array( esc_html__( 'Service', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/111/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/111/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/111/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/111/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Services_Type2.webp'
		),
		array(
			'import_file_name' => '<b>Ver 1</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver1/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/50/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/50/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/50/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/50/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/50/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type1.webp'
		),
		array(
			'import_file_name' => '<b>Ver 2</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver2/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/51/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/51/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/51/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/51/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/51/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type2.webp'
		),
		array(
			'import_file_name' => '<b>Ver 3</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver3/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/52/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/52/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/52/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/52/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/52/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type3.webp'
		),
		array(
			'import_file_name' => '<b>Ver 4</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver4/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/53/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/53/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/53/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/53/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/53/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type4.webp'
		),
		array(
			'import_file_name' => '<b>Ver 5</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver5/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/54/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/54/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/54/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/54/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/54/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type5.webp'
		),
		array(
			'import_file_name' => '<b>Ver 6</b> Contact Page',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-us-ver6/',
			'categories' => array( esc_html__( 'Contact', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/55/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/55/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/55/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/55/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/55/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Contact_Type6.webp'
		),
		array(
			'import_file_name' => '<b>Ver 1</b> Pricing Page',
			'preview_url'  => 'https://ohio.clbthemes.com/pricing-ver1/',
			'categories' => array( esc_html__( 'Pricing', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/120/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/120/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/120/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/120/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Pricing_Type1.webp'
		),
		array(
			'import_file_name' => '<b>Ver 2</b> Pricing Page',
			'preview_url'  => 'https://ohio.clbthemes.com/pricing-ver2/',
			'categories' => array( esc_html__( 'Pricing', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/121/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/121/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/121/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/121/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Pricing_Type2.webp'
		),
		array(
			'import_file_name' => '<b>Blog Page</b> Posts',
			'preview_url'  => 'https://ohio.clbthemes.com/blog/minimal-elementor/',
			'categories' => array( esc_html__( 'Blog', 'ohio' ) ),
			'import_file_url' => 'https://demo.clbthemes.com/v1/demo/80/content.xml',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/80/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/BlogArchive__Type2__Desktop.webp'
		),
		array(
			'import_file_name' => '<b>Portfolio Page</b> Projects',
			'preview_url'  => 'https://ohio.clbthemes.com/portfolio/minimal/',
			'categories' => array( esc_html__( 'Portfolio', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/81/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/81/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/81/container.xml',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/81/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/PortfolioArchive__Type2__Desktop.webp'
		),
		array(
			'import_file_name' => '<b>Single Projects</b> Projects',
			'categories' => array( esc_html__( 'Portfolio', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/101/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/101/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/101/container.xml',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/101/options.json',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/AllProjects_Desktop.jpeg'
		),
		array(
			'import_file_name' => '<b>Shop Page</b> Products',
			'preview_url'  => 'https://ohio.clbthemes.com/shop/',
			'categories' => array( esc_html__( 'WooCommerce', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/97/content.xml',
			// 'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/97/elementor.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/97/container.xml',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/ProductArchive__Type1__Desktop.webp'
		),
		array(
			'import_file_name' => '<b>Landing 2023</b> Home Page',
			'preview_url'  => 'https://ohio.clbthemes.com/',
			'categories' => array( esc_html__( 'Landing', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/98/content.xml',
			'import_elementor_file_url:sections' => ' https://demo.clbthemes.com/v1/demo/98/elementor.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/98/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/98/options.json',
			'import_sliders_file_url' => ' https://demo.clbthemes.com/v1/demo/98/slider.zip',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Landing_2023.webp'
		),
		array(
			'import_file_name' => '<b>Landing 2025</b> Home Page',
			'preview_url'  => 'https://ohio.clbthemes.com/',
			'categories' => array( esc_html__( 'Landing', 'ohio' ) ),
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/99/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/99/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/99/options.json',
			'import_sliders_file_url' => ' https://demo.clbthemes.com/v1/demo/99/slider.zip',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Landing_2024.webp'
		),
		array(
			'import_file_name' => '<b>Landing 2026</b> Home Page',
			'preview_url'  => 'https://ohio.clbthemes.com/',
			'categories' => array( esc_html__( 'Landing', 'ohio' ) ),
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/96/container.xml',
			'import_widget_file_url' => ' https://demo.clbthemes.com/v1/demo/96/widgets.json',
			'import_options_file_url' => ' https://demo.clbthemes.com/v1/demo/96/options.json',
			'import_sliders_file_url' => ' https://demo.clbthemes.com/v1/demo/96/slider.zip',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Landing_2026.webp'
		),
		array(
			'import_file_name' => '<b>UI Elements</b> Shortcodes and Widgets',
			'categories' => array( esc_html__( 'Elements', 'ohio' ) ),
			'import_wpbakery_file_url' => 'https://demo.clbthemes.com/v1/demo/70/content.xml',
			'import_elementor_file_url:containers' => ' https://demo.clbthemes.com/v1/demo/70/container.xml',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/Shortcodes.jpeg'
		),
		array(
			'import_file_name' => '<b>Forms</b> Contact Form 7',
			'preview_url'  => 'https://ohio.clbthemes.com/contact-form-shortcode/',
			'categories' => array( esc_html__( 'Forms', 'ohio' ) ),
			'import_file_url' => 'https://demo.clbthemes.com/v1/demo/60/content.xml',
			'import_preview_image_url' => get_template_directory_uri() . '/demo/assets/img/ContactForms.jpeg'
		)
	);
}

add_filter( 'pt-ocdi/import_files', 'ohio_ocdi_import_files' );

function ohio_ocdi_after_import_setup( $selected_import ) {
	global $wpdb;

	$front_page_id = get_page_by_title( str_replace( esc_html( '&' ), 'n', $selected_import['import_file_name'] ) );

	if ( $selected_import['import_file_name'] === 'Classic Blog' ) { // i don't know why
		$front_page_id = get_page_by_title( 'Blog Classic' );
	}

	if ( isset( $front_page_id ) and is_object( $front_page_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
	}

	// Set menu
	$main_menu = wp_get_nav_menus();
	if ( is_array( $main_menu ) && count( $main_menu ) > 0 ) {
		$main_menu = $main_menu[0];
	}
	if ( is_object( $main_menu ) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['primary'] = $main_menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	// VC background images fix
	$site_url = get_site_url();
	$wpdb->query( $wpdb->prepare( 'UPDATE ' . $wpdb->postmeta . ' SET meta_value = REPLACE( meta_value, \'{{this_domain}}\', %s )', $site_url ) );
	$wpdb->query( $wpdb->prepare( 'UPDATE ' . $wpdb->posts . ' SET post_content = REPLACE( post_content, \'{{this_domain}}\', %s )', $site_url ) );

	// Update ohio portfolio categories count
	$wpdb->query( $wpdb->prepare( 'UPDATE ' . $wpdb->term_taxonomy . ' SET count = (
		SELECT COUNT(*) FROM ' . $wpdb->term_relationships . ' rel
		LEFT JOIN ' . $wpdb->posts . ' po ON (po.ID = rel.object_id)
		WHERE rel.term_taxonomy_id = ' . $wpdb->term_taxonomy . '.term_taxonomy_id
		AND ' . $wpdb->term_taxonomy . '.taxonomy NOT IN (%s)
		AND po.post_status IN (%s, %s))', 'link_category', 'publish', 'future' ) );
}

add_action( 'pt-ocdi/after_import', 'ohio_ocdi_after_import_setup' );
