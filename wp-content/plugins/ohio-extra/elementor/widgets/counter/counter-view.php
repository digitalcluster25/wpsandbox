
<div class="ohio-widget counter <?php echo $this->getWrapperClasses(); ?>"
	data-counter="<?php echo $settings['count_number'] ?>">
    <div class="counter-number title titles-typo <?php if ( !empty( $settings['plus_symbol'] ) ) { echo "-with-increaser"; } ?>">
		
		<?php if ( $settings['block_type_layout'] == 'with_icon'): ?>
            <div class="icon-group <?php echo $settings['icon_classes'] ?>">
				<?php $this->showIconInView( $icon_prefix . '-left-icon' ); ?>
            </div>
		<?php endif; ?>

        <div class="holder">
            <?php if ( !empty( $settings['count_text_before'] ) ): ?>
				<span class="text-before"><?php echo $settings['count_text_before']; ?></span>
			<?php endif; ?>

			<span class="number">0</span>

			<?php if ( !empty( $settings['count_text_after'] ) ): ?>
				<span class="text-after"><?php echo $settings['count_text_after']; ?></span>
			<?php endif; ?>
        </div>
    </div>
	<?php if ( !empty( $settings['title'] ) ): ?>
    	<h6 class="title"><?php echo $settings['title']; ?></h6>
	<?php endif; ?>
	<?php if ( !empty( $settings['description'] ) ): ?>
    	<p class="-unspace"><?php echo $settings['description']; ?></h6>
	<?php endif; ?>
</div>