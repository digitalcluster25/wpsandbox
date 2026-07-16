<?php
/**
 * Ohio WordPress Theme
 *
 * Scroll to the top template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
global $post;

	if ( OhioHelper::is_optimized_flow( 'headline' ) ) return;
	if ( !OhioOptions::get( 'page_header_title_visibility', true ) ) return;

	$header_subtitle_type = OhioOptions::get( 'page_header_title_subtitle_type' );
	$show_header_subtitle = (bool) ( $header_subtitle_type != 'without' );

	$show_header_cap = OhioOptions::get( 'page_header_add_cap', true );
	$show_subheader = OhioOptions::get( 'page_subheader_visibility', true );
	$header_subtitle_custom_text = OhioSettings::header_subtitle_custom_text();

	$page_headline_fullheight = OhioOptions::get( 'page_header_title_fullscreen', false );

	if ( $page_headline_fullheight ) {
		$page_headline_vertical_alignment = OhioOptions::get( 'page_header_title_vertical_alignment', 'bottom' );
	}

	$page_headline_dynamic_colors = OhioOptions::get( 'page_header_title_dynamic_typo', false );
	$page_headline_parallax = OhioOptions::get( 'page_header_title_use_parallax', false );
	$page_headline_alignment = OhioOptions::get( 'page_header_title_align', 'left' );

	$extra_classes = '';

	if ( $page_headline_fullheight ) {
		$extra_classes .= ' -full-vh';

		switch ( $page_headline_vertical_alignment ) {
		    case 'top':
		        $extra_classes .= ' -top';
		        break;
		    case 'middle':
		        $extra_classes .= ' -middle';
		        break;
		    case 'bottom':
		        $extra_classes .= ' -bottom';
		        break;
		    default:
		        $extra_classes .= '';
		}
	}
	if ( !$show_header_cap ) {
		$extra_classes .= ' without-cap';
	}
	if ( $page_headline_parallax ) {
		$extra_classes .= ' headline-with-parallax';
	}
	if ( $page_headline_dynamic_colors ) {
		$extra_classes .= ' clb__dark_section';
	}
	if ( $show_subheader ) {
		$extra_classes .= ' subheader_included';
	} else {
	  	$extra_classes .= ' subheader_excluded';
	}

	switch ( $page_headline_alignment ) {
	    case 'left':
	        $extra_classes .= ' -left';
	        break;
	    case 'center':
	        $extra_classes .= ' -center';
	        break;
	    case 'right':
	        $extra_classes .= ' -right';
	        break;
	    default:
	        $extra_classes .= '';
	}

	$wrap_container = OhioOptions::get( 'page_add_wrapper', true );

	// Title and subtitle
	$title_text = get_the_title();
	$subtitle_text = $header_subtitle_custom_text; // legacy

	if ( OhioSettings::page_is( 'home' ) ) {
		$title_text = esc_html__( 'Blog', 'ohio' );
	} else if ( OhioSettings::page_is( 'category' ) ) {
		$title_text = single_cat_title( '', false );
		$subtitle_text = esc_html__( 'Category', 'ohio' );
		if ( category_description() ) {
			$subtitle_text = category_description();
		}
	} elseif ( is_tax( 'ohio_portfolio_category' ) ) {
		$title_text = single_term_title( '', false );
	} elseif ( is_tax( 'ohio_portfolio_tags' ) ) {
		$title_text = single_term_title( '', false );
	} elseif ( OhioSettings::page_is( 'tag' ) ) {
		$title_text = single_tag_title( '', false );
		$subtitle_text = esc_html__( 'Tag', 'ohio' );
	} elseif ( OhioSettings::page_is( 'search' ) ) {
		$title_text =  esc_html__( 'Results for: ', 'ohio' ) . '<span>' . get_search_query() . '</span>';
		$subtitle_text = false;
	} elseif ( is_day() ) {
		$title_text = get_the_time( 'F' ) . ' ' . get_the_time( 'd' ) . ', ' . get_the_time( 'Y' );
		$subtitle_text = 'Posts by date';
	} elseif ( is_month() ) {
		$title_text = get_the_time( 'F' ) . ' ' . get_the_time( 'Y' );
		$subtitle_text = false;
	} elseif ( is_year() ) {
		$title_text = get_the_time( 'Y' );
		$subtitle_text = false;
	} elseif ( OhioSettings::page_is( 'single' ) ) {
		if ( ! $title_text ) {
			$title_text = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
		}
		if ( is_null( $header_subtitle_type ) || $header_subtitle_type == 'generated' ) {
			ob_start();

			$time_string = ohio_posted_time();
			$posted_on = sprintf( '%s', $time_string );
			$show_comments = OhioOptions::get( 'post_comments_visibility', true );
			$header_subtitle_type = OhioOptions::get( 'page_header_title_subtitle_type' );
			$show_header_title_author = OhioOptions::get( 'page_header_title_author_visibility', true );
			$show_header_title_date = OhioOptions::get( 'page_header_title_date_visibility', true );
			$show_header_title_comments = OhioOptions::get( 'page_header_title_comments_visibility', true );
		?>

	        <ul class="meta-holder -unlist">
	        	<?php if ( $show_header_title_author ) : ?>
		            <li class="meta-item -flex">
		            	<div class="avatar -small">
		            		<?php echo get_avatar( get_the_author_meta('email'), '96', true, get_the_author() ); ?>
		            	</div>
		            	<div class="author-details">
		            		<span class="prefix"><?php esc_html_e( 'Author', 'ohio' ); ?></span>
		                	<span class="author"><?php echo esc_html( get_the_author() ); ?></span>
		            	</div>
		            </li>
	        	<?php endif; ?>

	            <?php if ( $show_header_title_date ) : ?>
	            	<li class="meta-item">
		                <span class="prefix"><?php esc_html_e( 'Published', 'ohio' ); ?></span>
		                <time class="date"><?php echo wp_kses( $posted_on, 'default' ); ?></time>
		            </li>
	        	<?php endif; ?>

				<?php if ( $show_header_title_comments && $show_comments && comments_open() ) : ?>
					<li class="meta-item">
						<span class="prefix">
							<?php printf( esc_html( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'ohio' ) ),
								esc_html( number_format_i18n( get_comments_number() ) ) ); ?>
						</span>
						<a class="-unlink" href="#comments">
							<span class="date"><?php esc_html_e( 'Join the Conversation', 'ohio' ); ?></span>
						</a>
					</li>
				<?php endif; ?>
	        </ul>

	        <?php
	        $subtitle_text = ob_get_clean();
		}
	} elseif ( OhioSettings::page_is( 'project' ) ) {
		if ( ! $title_text ) {
			$title_text = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
		}
	} elseif ( OhioSettings::page_is( 'author' ) ) {
		$author = get_the_author();
		$title_text = ( $author ) ? $author : esc_html__( 'Undefined', 'ohio' );
		//$subtitle_text = esc_html__( 'Author', 'ohio' );
	} elseif ( OhioSettings::page_is( 'shop' ) ) {
		$shop_page_id = wc_get_page_id( 'shop' );

		if ( $shop_page_id !== -1 ) {
			$title_text = get_the_title( $shop_page_id );
		} else {
			$title_text = get_the_title( isset( $post->ID ) ? $post->ID : false );
		}

		if ( empty( $title_text ) ) {
			$title_text = __( 'Shop', 'ohio' );
		}
	} elseif ( OhioSettings::page_is( 'product_category' ) ) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$title_text = $cat->name;
		//$subtitle_text = esc_html__( 'Product category', 'ohio' );
	} elseif ( OhioSettings::page_is( 'product_tag' ) ) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$title_text = $cat->name;
		//$subtitle_text = esc_html__( 'Product tag', 'ohio' );
	} elseif ( is_404() ) {
		$title_text = esc_html__( '404. Nothing here', 'ohio' );
	}

	$project = [];
	if ( OhioSettings::page_is( 'project' ) ) {
		$project = OhioObjectParser::parse_to_project_object( $post );
	}

	// Header previous button

	$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'b' => array(),
	);
?>

<div class="page-headline<?php echo esc_attr( $extra_classes ); ?>">

	<?php if ( $previous_btn ) : ?>

	    <?php get_template_part( 'parts/elements/back_link' ); ?>

	<?php endif; ?>

	<?php if ( $page_headline_parallax ) : ?>
		<div class="parallax" data-parallax-bg="vertical" data-parallax-speed=".5">
			<div class="parallax-bg bg-image"></div>
			<div class="parallax-content"></div>
		</div>
	<?php else : ?>
		<div class="bg-image"></div>
	<?php endif ?>

	<div class="holder">
		<div class="page-container<?php if ( !$wrap_container ) { echo esc_attr(' -full-w'); } ?>">
			<div class="animated-holder">
				<div class="headline-meta">
					<?php
						/* translators: used between list items, there is a space after the comma */
						if ( !is_home() && !is_category() ) {

							$divider_class = '';
							if ( !OhioOptions::page_is( 'single' ) ) {
								$divider_class = 'no-divider';
							}

							$categories_list = get_the_category_list( ' ' );
							if ( $categories_list && ohio_categorized_blog() ) {
								$categories_list = preg_replace( '/(<a)(.+?>)/i', '$1 class="category -unlink" $2 ', $categories_list );
								printf( '<div class="category-holder %1$s">%2$s</div>', $divider_class, $categories_list ); // WPCS: XSS OK.
							}
						}
					?>

					<?php if ( OhioOptions::page_is( 'single' ) ) : ?>
						<span class="post-meta-estimate"><?php echo OhioHelper::get_reading_estimate( $post->post_content ?? '' ) . ' ' . esc_html__( 'min read', 'ohio' ); ?>
						</span>
					<?php endif; ?>

					<?php if (OhioOptions::page_is( 'project' )) : ?>
						<?php if ( isset( $project['categories_plain'] ) && $project['categories_plain'] ) : ?>
							<div class="category-holder">
								<?php $categories = explode( ', ', $project['categories_plain'] ?? '' ); ?>
								<?php foreach ( $categories as $category ) : ?>
									<span class="category"><?php echo esc_html( $category ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<?php if ( isset( $project['date'] ) && $project['date'] ) : ?>
							<span class="date"><?php echo esc_html( $project['date'] ); ?></span>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<h1 class="title"><?php echo wp_kses( $title_text, 'default' ); ?></h1>

				<?php if ( $subtitle_text && $show_header_subtitle ) : ?>
					<div class="post-meta-holder">
						<?php echo wp_kses( $subtitle_text, 'post' ); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
