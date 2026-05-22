<?php

/**
* WPBakery Page Builder Ohio Button shortcode view
*/

?>
<div class="ohio-widget-holder<?php echo esc_attr( $align_classes ); ?>">
	<a href="<?php echo esc_url($link['url']); ?>"<?php if ( $link['blank'] ) echo ' target="_blank"'; ?> class="ohio-widget button<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	    
	    <?php if ( $icon_use && $icon_position == 'left' ): ?>

	    	<?php if ( !empty( $icon_as_icon ) ): ?>
	    		<i class="icon -left <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>

			<?php if ( !empty( $icon_as_image ) ): ?>
				<img class="icon -left -image" <?php echo $icon_image_atts; ?> />
			<?php endif; ?>

			<?php if ( empty( $icon_as_icon ) && empty( $icon_as_image ) ): ?>
				<i class="icon -left">
			    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
			    </i>
			<?php endif; ?>

		<?php endif; ?>

		<?php echo $link['caption']; ?>

		<?php if ( $icon_use && $icon_position == 'right' ): ?>

			<?php if ( !empty( $icon_as_icon ) ): ?>
	    		<i class="icon -right <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>

			<?php if ( !empty( $icon_as_image ) ): ?>
				<img class="icon -right -image" <?php echo $icon_image_atts; ?> />
			<?php endif; ?>

			<?php if ( empty( $icon_as_icon ) && empty( $icon_as_image ) ): ?>
				<i class="icon -right">
			    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
			    </i>
			<?php endif; ?>
			
		<?php endif; ?>
	</a>
</div>