<?php
/**
 * Ohio WordPress Theme
 *
 * Filter panel template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="slide-in-panel filters-panel slide-in-overlay" data-js="filter-slidein">
    <div class="overlay"></div>
    <div class="close-bar">
        <h5 class="title"><?php esc_html_e( 'Filters', 'ohio' ); ?></h5>
        <button class="icon-button -small" data-js="close-filter-slidein" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
            <?php get_template_part( 'parts/elements/icon_close' ); ?>
        </button>
    </div>
    <div class="filters-container holder">
        <div class="scroll-container">
            <ul class="sidebar-widgets">

                <?php dynamic_sidebar( 'wc_shop' ); ?>

            </ul>
        </div>
    </div>
</div>