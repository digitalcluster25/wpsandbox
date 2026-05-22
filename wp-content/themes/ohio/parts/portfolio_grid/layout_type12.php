<?php
$project = OhioHelper::get_storage_item_data();

$featured_video = $project['video']['link'] ?? null;

if ( $featured_video ) {
    $featured_video_url = explode( '?', $featured_video )[0];
}
?>

<div class="portfolio-item -layout12" <?php if ( $project['in_popup'] ) echo 'data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; ?>>
    <div class="portfolio-item-details">
        <div class="portfolio-item-details-headline">
            <a
				class="-unlink<?php if ( $project['in_popup'] ) echo ' btn-lightbox'; ?>"
				href="<?php echo esc_url( $project['url'] ); ?>"
				<?php if ( $project['external'] ) echo ' target="_blank"'; ?>
				<?php if ( $project['in_popup'] ) echo ' data-js="open-project-lightbox"'; ?>
			>
                <h2 class="title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
            </a>
        </div>
        <?php if ( $project['category_visible'] ) : ?>
            <?php if ( $project['raw_categories']) : ?>
                <div class="category-holder">/
                    <?php foreach ( $project['raw_categories'] as $category ) : ?>
                        <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a class="-unlink" href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php if ( $featured_video && $project['show_featured_video'] ) : ?>

        <div class="portfolio-item-image portfolio-item-video">
            <div class="card<?php if ( $project['equal_height']) { echo ' -metro'; } ?>">
                <div class="image-holder">

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
            </div>
        </div>

    <?php else : ?>

        <div class="portfolio-item-image">
            <div class="card<?php if ( $project['equal_height']) { echo ' -metro'; } ?>">
                <div class="image-holder">
                    <img class="" src="<?php echo esc_url( $project['featured_image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>