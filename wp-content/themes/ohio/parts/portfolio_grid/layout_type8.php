<?php
$project = OhioHelper::get_storage_item_data();

$featured_video = $project['video']['link'] ?? null;

if ( $featured_video ) {
    $featured_video_url = explode( '?', $featured_video )[0];
}
?>

<div class="portfolio-item -layout8" <?php if ( $project['in_popup'] ) echo 'data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; ?>>

    <?php if ( $featured_video && $project['show_featured_video'] ) : ?>

        <div class="portfolio-item-image portfolio-item-video -full-w -full-h" data-ohio-bg-image="true">
            <?php if ( strpos( $featured_video_url, 'youtube.com' ) || strpos( $featured_video_url, 'youtu.be' ) || strpos( $featured_video_url, 'vimeo.com' ) ) : ?>
                <div class="video-container">
                    <iframe src="<?php echo esc_url( $featured_video_url ) . '?&controls=0&autoplay=1&start=0&mute=1&muted=1&rel=0&autopause=0&loop=1'; ?>" frameborder="0"/></iframe>
                </div>
            <?php else : ?>
                <video preload="metadata" muted="muted" autoplay="autoplay" loop="loop">
                    <source src="<?php echo esc_url( $featured_video_url ); ?>">
                </video>
            <?php endif; ?>
        </div>

    <?php else : ?>

        <div class="portfolio-item-image -full-w -full-h" <?php echo ' data-ohio-bg-image="' . esc_url( $project['featured_image'] ) . '"'; ?>></div>

    <?php endif; ?>

    <a
		class="project-title -undash -unlink<?php if ( $project['in_popup']) echo ' btn-lightbox'; ?>"
		href="<?php echo esc_url( $project['url'] ); ?>"
		<?php if ( $project['external'] ) echo ' target="_blank"'; ?>
		<?php if ( $project['in_popup'] ) echo ' data-js="open-project-lightbox"'; ?>
	>
        <h2 class="headline <?php if ( isset( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
    </a>
    <?php if ( $project['category_visible'] ) : ?>
        <?php if ( $project['raw_categories'] ) : ?>
            <div class="category-holder -small-t">/
                <?php foreach ( $project['raw_categories'] as $category ) : ?>
                    <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a class="-unlink" href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
