<?php 
global $post, $wp_embed;

$project = OhioObjectParser::parse_to_project_object( $post );
$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'project_video_button_size', 'default' );
$video_cover = OhioOptions::get( 'project_video_cover', false );
$video_cover_fit = OhioOptions::get( 'project_video_cover_fit', true );
$video_type = OhioOptions::get( 'project_video_type' );

$video_params = '';
if ( $video_type == 'custom' ) {

    $video_params .= 'data-video-type=custom';
    $video_autoplay = OhioOptions::get( 'project_video_autoplay' );
    $video_muted = OhioOptions::get( 'project_video_muted' );
    $video_controls = OhioOptions::get( 'project_video_controls' );

    if ( $video_autoplay ) {
        $video_params .= ' autoplay=autoplay';
    }
    if ( $video_muted ) {
        $video_params .= ' muted=muted';
    }
    if ( $video_controls ) {
        $video_params .= ' controls=controls';
    }
}

if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

$is_featured_image = OhioOptions::get( 'project_add_featured_on_page', true );

if ( !$is_featured_image ) {
    if ( $project['featured_image'] ) {
        array_shift( $project['images'] );
    }
}

wp_reset_query();
?>

<?php if ( $video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>

    <div class="video-holder -visible<?php if ( $video_cover_fit ) { echo esc_attr( ' -cover' ); } if ( $video_type == 'custom' ) { echo esc_attr( ' -custom' ); } ?>">
        <?php if ( $video_type == 'custom' ) : ?>
            <video <?php echo esc_attr( $video_params ); ?>>
                <source src="<?php echo esc_url( $project['video']['link'] ); ?>">
            </video>
        <?php else : ?>
            <iframe src="<?php echo esc_url( $project['video']['link'] ); ?>" frameborder="0"/></iframe>
        <?php endif; ?>
        <div class="overlay"></div>
    </div>
 
<?php endif; ?>

<?php if ( is_array( $project['images'] ) ) : ?>

	<?php foreach ( $project['images'] as $key => $art ) : ?>

        <?php if ( $key == 0 ) : ?>

            <div class="first-image">
                <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">
                <?php if ( !$video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                    <div class="video-button -animation open-popup<?php if ( $video_button_style != 'default' ) { echo ' -' . $video_button_style . ''; } ?>" <?php echo esc_attr( $video_params ); ?> data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                        <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>" aria-label="<?php esc_html_e( 'Play', 'ohio' ); ?>">
                            <i class="icon">
                                <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                            </i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">

        <?php endif ?>

    <?php endforeach; ?>

<?php endif; ?>

<?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>

    <div class="share-bar -vertical">
        <div class="social-networks -small">
            <?php printf( '%s', $project['sharing_links_html'] ); ?>
        </div>  
    </div>
    
<?php endif; ?>