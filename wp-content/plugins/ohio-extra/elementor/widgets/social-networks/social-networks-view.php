<div class="ohio-widget social-networks <?php echo $this->getWrapperClasses(); ?>">
	<?php if ( is_array( $settings['social_networks']) ): ?>
	<?php foreach ( $settings['social_networks'] as $item ) : ?>
		<a class="network -unlink title <?php echo esc_attr( $item['list_network'] ); ?>" href="<?php echo $item['list_link']; ?>" target="_blank" rel="nofollow" aria-label="<?php echo esc_attr( $item['list_network'] ); ?>">

			<?php if ( $show_icon ) : ?>
				<?php $this->renderSocialNetworkIcon( $item['list_network'] ); ?>
			<?php endif; ?>

			<?php if ( $show_text ) : ?>
				<span><?php
					echo $this->getSocialNetworksOptionsList()[$item['list_network']] ;
				?></span>
			<?php endif; ?>
		</a>
	<?php endforeach; ?>
	<?php endif; ?>
</div>