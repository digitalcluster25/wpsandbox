<?php
class Ohio_Elementor_Simple_Products_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );
    }

    public function get_name()
    {
        return 'ohio_simple_products';
    }

    public function get_title()
    {
        return __( 'Products', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-simple-products';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 12,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'query_section',
            [
                'label' => __( 'Query', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        global $wpdb;
        $param_options = [];
        $products = $wpdb->get_results( "SELECT post_title, ID FROM $wpdb->posts WHERE post_type = 'product' AND post_status = 'publish'" );
        foreach ( $products as $product ) {
            $param_options[$product->ID] = $product->post_title;
        }

        $this->add_control(
            'products',
            [
                'label' => __( 'Select Products', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'description' => __( 'Leave empty to choose all.', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__( 'Order By', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Unset', 'ohio-extra' ),
                    'title' => esc_html__( 'Title', 'ohio-extra' ),
                    'date' => esc_html__( 'Date', 'ohio-extra' ),
                    'id'  => esc_html__( 'ID', 'ohio-extra' ),
                    'menu_order' => esc_html__( 'Menu order', 'ohio-extra' ),
                    'popularity' => esc_html__( 'Popularity', 'ohio-extra' ),
                    'rand' => esc_html__( 'Random', 'ohio-extra' ),
                    'rating' => esc_html__( 'Rating', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'asc',
                'options' => [
                    'asc' => esc_html__( 'Ascending', 'ohio-extra' ),
                    'desc' => esc_html__( 'Descending', 'ohio-extra' ),
                ],
                'condition' => [
                    'order_by!' => '',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $woocommerce_active = class_exists( 'woocommerce' );
        if ( ! $woocommerce_active ) {
            ?>
                <div class="clb-blank-note">
                    <i class="icon -large">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"></path></svg>
                    </i>
                    <div class="clb-blank-note-inner">
                        <?php echo esc_html( 'Please, install and activate the WooCommerce plugin to use Products element.' ); ?>
                    </div>
                </div>
            <?php
            return;
        }

        $settings = $this->get_settings_for_display();
        $shortcode_args = [];
        if ( $settings['columns'] ) {
            $shortcode_args[] = 'columns="' . $settings['columns'] . '"';
        }

        if ( $settings['order_by'] ) {
            $shortcode_args[] = 'orderby="' . $settings['order_by'] . '"';

            $shortcode_args[] = 'order="' . $settings['order'] . '"';
        }

        if ( count( $settings['products'] ) ) {
            $shortcode_args[] = 'ids="' . implode( ',', $settings['products'] ) . '"';
        }

        echo do_shortcode('[products ' . implode( ' ', $shortcode_args ) . ']');
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Simple_Products_Widget() );
