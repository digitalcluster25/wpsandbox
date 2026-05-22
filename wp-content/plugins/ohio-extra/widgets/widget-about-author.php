<?php

if ( !class_exists( 'ohio_widget_about_author' ) ) {

	class ohio_widget_about_author extends SB_WP_Widget {

		protected $options;

		public function __construct() {		
			$this->options = array(
				array(
					'title', 'text', '', 
					'label' => esc_html__( 'Title', 'ohio-extra' ), 
					'input' => 'text', 
					'filters' => 'widget_title',
					'on_update' => 'esc_attr'
				),
			);
			
			parent::__construct(
				'ohio_widget_about_author',
				'Ohio: ' . esc_html__( 'About Author', 'ohio-extra' ),
				array( 'description' => esc_html__( 'About Author', 'ohio-extra' ) )
			);
		}

		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = '';
			}
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}

		public function widget( $args, $instance ) {
			extract( $args );
			$this->setInstances( $instance, 'filter' );

			$allowed_tags = array(
				'div' => array(
					'id' => array(),
					'class' => array()
				),
				'li' => array(
					'id' => array(),
					'class' => array()
				),
				'section' => array(
					'id' => array(),
					'class' => array()
				),
				'h3' => array(
					'class' => array()
				)
			);

			$admin = false;
			$author = get_the_author_meta( 'ID' );
			if ( !$author ) {
				$admin = get_users( array( 'role' => 'administrator' ) );
				$admin = $admin[0];
				$author = get_the_author_meta( 'ID', $admin->ID );// set admin
			}
			$authors_setting = get_field( 'global_author_social_links', 'option' );

			echo wp_kses( $before_widget, $allowed_tags );
			$title = $this->getInstance( 'title' );
			if ( !empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}

			echo '<div class="holder">';
			echo '<div class="avatar -large">';
			echo get_avatar( get_the_author_meta('email'), '72', true, get_the_author() );
			echo '</div>';

		?>

				<div class="content">
					<div class="details">
						<?php
							if ( !$admin ) {
								printf( '<h6>%s</h6>', esc_html( get_the_author() ) );
								printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $author ) );
							} else {
								printf( '<h4>%s</h4>', esc_html( $admin->display_name ) );
								printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $admin->ID ) );
							}
						?>
					</div>
					<div class="description">
						<?php
							if ( !$admin ) {
								echo get_the_author_meta( 'description', $author );
							} else {
								echo get_the_author_meta( 'description', $admin->ID );
							}
						?>
					</div>
				</div>
				<div class="social-networks -contained -small">

					<?php
					if ( $authors_setting && is_array( $authors_setting ) ) {

						foreach ( $authors_setting as $author_setting ) {

							if ( isset( $author_setting['author'] ) && $author == $author_setting['author']['ID'] ) {

								foreach ( $author_setting['links'] as $author_link ) {

									echo '<a href="' . esc_url( $author_link['url'] ) . '" class="network -unlink" aria-label="' . esc_attr( $author_link['social_networks'] ) . '">';
									switch ( $author_link['social_networks'] ) {
										case 'artstation' : echo '<i class="fa-brands fa-artstation"></i>'; break;
								        case 'behance' : echo '<i class="fa-brands fa-behance"></i>'; break;
								        case 'deviantart' : echo '<i class="fa-brands fa-deviantart"></i>'; break;
								        case 'digg' : echo '<i class="fa-brands fa-digg"></i>'; break;
								        case 'discord' : echo '<i class="fa-brands fa-discord"></i>'; break;
								        case 'dribbble' : echo '<i class="fa-brands fa-dribbble"></i>'; break;
								        case 'facebook' : echo '<i class="fa-brands fa-facebook-f"></i>'; break;
								        case 'flickr' : echo '<i class="fa-brands fa-flickr"></i>'; break;
								        case 'github' : echo '<i class="fa-brands fa-github-a"></i>'; break;
								        case 'houzz' : echo '<i class="fa-brands fa-houzz"></i>'; break;
								        case 'instagram' : echo '<i class="fa-brands fa-instagram"></i>'; break;
								        case 'kaggle' : echo '<i class="fa-brands fa-kaggle"></i>'; break;
								        case 'linkedin' : echo '<i class="fa-brands fa-linkedin"></i>'; break;
								        case 'medium' : echo '<i class="fa-brands fa-medium-m"></i>'; break;
								        case 'mixer' : echo '<i class="fa-brands fa-mixer"></i>'; break;
								        case 'pinterest' : echo '<i class="fa-brands fa-pinterest"></i>'; break;
								        case 'producthunt' : echo '<i class="fa-brands fa-product-hunt"></i>'; break;
								        case 'quora' : echo '<i class="fa-brands fa-quora"></i>'; break;
								        case 'reddit' : echo '<i class="fa-brands fa-reddit-a"></i>'; break;
								        case 'snapchat' : echo '<i class="fa-brands fa-snapchat"></i>'; break;
								        case 'soundcloud' : echo '<i class="fa-brands fa-soundcloud"></i>'; break;
								        case 'spotify' : echo '<i class="fa-brands fa-spotify"></i>'; break;
								        case 'teamspeak' : echo '<i class="fa-brands fa-teamspeak"></i>'; break;
								        case 'telegram' : echo '<i class="fa-brands fa-telegram"></i>'; break;
								        case 'threads' : echo '<i class="fa-brands fa-threads"></i>'; break;
								        case 'tiktok' : echo '<i class="fa-brands fa-tiktok"></i>'; break;
								        case 'tumblr' : echo '<i class="fa-brands fa-tumblr"></i>'; break;
								        case 'twitch' : echo '<i class="fa-brands fa-twitch"></i>'; break;
								        case 'twitter' : echo '<i class="fa-brands fa-x-twitter"></i>'; break;
								        case 'vimeo' : echo '<i class="fa-brands fa-vimeo"></i>'; break;
								        case 'vine' : echo '<i class="fa-brands fa-vine"></i>'; break;
								        case 'whatsapp' : echo '<i class="fa-brands fa-whatsapp"></i>'; break;
								        case 'xing' : echo '<i class="fa-brands fa-xing"></i>'; break;
								        case 'youtube' : echo '<i class="fa-brands fa-youtube"></i>'; break;
								        case '500px' : echo '<i class="fa-brands fa-500px"></i>'; break;
							        }
									echo '</a>';
								}
								break;
							}
						}
					}
					?>
				</div>
			</div>

			<?php
			echo wp_kses( $after_widget, $allowed_tags );
		}
	}
}

register_widget( 'ohio_widget_about_author' );