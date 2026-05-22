<?php
/**
 * Ohio WordPress Theme
 *
 * Offer Banner template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$offer_banner_items = OhioOptions::get( 'page_offer_banner_text_items', false );
$offer_banner_button = OhioOptions::get( 'page_offer_banner_button', false );

if ( $offer_banner_button ) {
	$offer_banner_button_link = OhioOptions::get( 'page_offer_banner_button_link' );
}

$offer_banner_as_link = OhioOptions::get( 'page_offer_banner_as_link', false );
$offer_banner_effect = OhioOptions::get( 'page_offer_banner_effect', 'none' );
$offer_banner_scrolling_effect_speed = OhioOptions::get( 'page_offer_banner_scrolling_effect_speed' );
$offer_banner_position = OhioOptions::get( 'page_offer_banner_position', 'default' );
$flipping_interval = OhioOptions::get( 'page_offer_banner_flipping_effect_interval', 3500 );

$extra_classes = '';

switch ( $offer_banner_effect ) {
    case 'scrolling':
        $extra_classes .= ' marquee-line';
        break;
    case 'flipping':
        $extra_classes .= ' flipping';
        break;
    default:
        $extra_classes .= '';
}

switch ( $offer_banner_position ) {
    case 'absolute':
        $extra_classes .= ' -absolute';
        break;
    case 'fixed':
        $extra_classes .= ' -fixed';
        break;
    default:
        $extra_classes .= '';
}

?>

<?php if ( $offer_banner_as_link ): ?>
	<a target="<?php echo esc_html( $offer_banner_button_link['target'] ); ?>" href="<?php echo esc_url( $offer_banner_button_link['url'] ); ?>">
<?php endif; ?>

	<div class="offer-banner<?php echo esc_attr( $extra_classes ); ?>" data-flipping-interval="<?php echo esc_attr( $flipping_interval ); ?>" data-slow-on-scroll data-dir="ltr" data-speed="<?php echo esc_attr( $offer_banner_scrolling_effect_speed ); ?>">
		
		<div class="container">

			<?php if ( $offer_banner_effect == 'scrolling' ): ?>
				<div class="marquee-line-stage">
			<?php endif; ?>

				<ul class="holder -unlist -dm-ignore marquee-line-el" data-marquee-el-original>
					<?php if ( $offer_banner_items ): ?>

						<?php while ( have_rows( 'global_page_offer_banner_text_items', 'option' ) ): the_row(); ?>
							<li class="offer-banner-item no-transition visible">
								<?php echo wp_kses( get_sub_field( 'items' ), 'post' ); ?>
							</li>
						<?php endwhile; ?>

					<?php else : ?>
						<li class="offer-banner-item">
							<?php esc_html_e( '⚡ For a limited time, take 20% off any new website plan.', 'ohio' ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $offer_banner_button && $offer_banner_button_link && !$offer_banner_as_link ) : ?>
						<li class="offer-banner-item -with-button">
							<a target="<?php echo esc_html( $offer_banner_button_link['target'] ); ?>" href="<?php echo esc_url( $offer_banner_button_link['url'] ); ?>" class="button -dm-ignore -small">
								<?php echo esc_html( $offer_banner_button_link['title'] ) ?>
							</a>
						</li>
					<?php endif; ?>
				</ul>

			<?php if ( $offer_banner_effect == 'scrolling' ): ?>
				</div>
			<?php endif; ?>

		</div>
	</div>

<?php if ( $offer_banner_as_link ): ?>
	</a>
<?php endif; ?>