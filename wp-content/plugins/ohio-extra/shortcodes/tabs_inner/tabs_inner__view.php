<?php
/**
 * WPBakery Page Builder Ohio Tabs Inner shortcode view
 */

// Prepare dynamic attributes
$icon_attribute = '';
if ( $with_icon && $icon_as_icon ) {
    $icon_attribute = ' data-icon="' . esc_attr( $icon_as_icon ) . '"';
}
?>

<div class="tabs-content-item<?php echo esc_attr( $wrapper_classes ); ?>" 
	data-title="<?php echo esc_attr( $title ); ?>"
	data-subtitle="<?php echo esc_attr( $subtitle ); ?>"
	<?php echo $icon_attribute; ?> 
	id="<?php echo esc_attr( $wrapper_id ); ?>">
     
    <?php echo do_shortcode( $content_html ); ?>

</div>