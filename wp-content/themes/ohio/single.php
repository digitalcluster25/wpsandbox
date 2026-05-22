<?php
/**
 * Ohio WordPress Theme
 *
 * Single post template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme header
 */
get_header();

// Get theme options
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$show_headline = OhioOptions::get( 'page_header_title_visibility', true );
$show_author_widget = OhioOptions::get_global( 'post_author_widget_visibility', true );
$show_comments = OhioOptions::get( 'post_comments_visibility', true );
$post_layout = OhioOptions::get( 'page_post_layout_type' );

$wrap_container = OhioOptions::get( 'page_add_wrapper', true );
$wrap_container_class = '';
if ( ! $wrap_container ) {
	$wrap_container_class .= ' -full-w';
}

while ( have_posts() ) : the_post();

switch ( $post_layout ) {
	case 'type_1':
		get_template_part( '/parts/blog/layout_type1' );
		break;
	case 'type_2':
		get_template_part( '/parts/blog/layout_type2' );
		break;
	default:
		get_template_part( '/parts/blog/layout_type1' );
}

?>

<div class="author-container">
	<div class="page-container<?php echo esc_attr( $wrap_container_class ); ?>">
		<div class="vc_row">
			<div class="vc_col-md-12">

				<?php
				    $author = get_the_author_meta( 'ID' );
				    if ( $show_author_widget && $author ) {
				        the_widget( 'ohio_widget_about_author', array( 'words' => '' ) );
				    }
				?>
				
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'parts/elements/nav_posts' ); ?>

<?php get_template_part( 'parts/elements/related_posts' ); ?>

<?php if ( $show_comments && ( comments_open() || get_comments_number() ) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>

<?php
	endwhile;

	/**
	 * Theme footer
	 */
	get_footer();
