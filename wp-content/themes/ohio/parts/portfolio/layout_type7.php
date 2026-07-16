<?php
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object( $post );
$show_headline = OhioOptions::get( 'project_show_headline', true );

# Header previous button
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$wrap_container = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$show_header_title = OhioOptions::get( 'page_header_title_visibility', true );
$header_blank_spacer = OhioOptions::get( 'page_header_add_cap', true );

$page_container_class = '';
if ( !$wrap_container ) {
    $page_container_class .= ' -full-w';
}

$page_offset_class = '';
if ( !$show_breadcrumbs && $add_content_padding ) {
    $page_offset_class .= ' top-offset'; 
}
if ( $add_content_padding ) {
    $page_offset_class .= ' bottom-offset';
}

if ( $show_breadcrumbs ) {
    get_template_part( 'parts/elements/breadcrumbs' );
}

wp_reset_query();
?>

<?php if ( $project['custom_content_position'] == 'top' ) : ?>
    <div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
        <div class="project-custom">
            <?php
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<div class="project-page project -layout7">
    <div class="page-container<?php echo esc_attr( $page_container_class . $page_offset_class ); ?>">

        <?php if ( $show_headline || isset( $project['raw_categories'] ) || isset( $project['date'] ) || !empty( $project['description'] ) || isset( $project['task'] ) || isset( $project['strategy'] ) || isset( $project['design'] ) || isset( $project['client'] ) || isset( $project['custom_fields'] ) || !empty( $project['tags'] ) || isset( $project['link'] ) ) : ?>
        <div class="project-content">
            <div class="holder">
                <div class="vc_row">
                    <div class="vc_col-md-5">
                        <?php if ( !$show_header_title ) : ?>
                            <?php
                                OhioHelper::set_storage_item_data( $project );
                                get_template_part( 'parts/portfolio/components/headline' );
                            ?>
                        <?php endif; ?>
                        <div class="project-details">
                            <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>

                            <?php
                                if ( $project['custom_content_position'] == 'after_description' ) {
                                    the_content();
                                }
                            ?>
                        </div>
                    </div>
                    <div class="vc_col-md-push-1 vc_col-md-6">
                        <?php
                            OhioHelper::set_storage_item_data( $project );
                            get_template_part( 'parts/portfolio/components/task' );
                        ?>
                        <?php
                            OhioHelper::set_storage_item_data( $project );
                            get_template_part( 'parts/portfolio/components/options_group' );
                        ?>
                        <?php if ( !empty( $project['link'] ) ) : ?>
                            <a class="button -text -unlink" target="_blank" href="<?php echo esc_url( $project['link'] ); ?>">
                                <?php esc_html_e( 'Open Project', 'ohio' ); ?>
                                <i class="icon -right">
                                    <svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
                                </i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="project-gallery">
            <?php get_template_part( 'parts/portfolio/components/gallery' ); ?>
        </div>
    </div>
</div>

<?php if ( $project['custom_content_position'] == 'bottom' ) : ?>
    <div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
        <div class="project-custom">
            <?php
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( !$show_header_title ) : ?>
    <?php if ( $previous_btn ) : ?>
        <?php get_template_part( 'parts/elements/back_link' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php
	if ( $project['show_navigation'] ) {
    	get_template_part( 'parts/elements/nav_projects' );
	}
?>
