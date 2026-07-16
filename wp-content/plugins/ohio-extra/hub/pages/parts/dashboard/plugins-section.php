<div class="clb-headline">
	<div class="col clb-headline-icon">
		<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M456-216h48v-54l144-144v-186H312v186l144 144v54Zm-72 72v-96L240-384v-216q0-29.7 21.15-50.85Q282.3-672 312-672h54l-30 44v-188h72v144h144v-144h72v188l-30-44h54q29.7 0 50.85 21.15Q720-629.7 720-600v216L576-240v96H384Zm96-261Z"/></svg>
	</div>
	<div class="col">
		<h1><?php _e( 'Plugins', 'ohio-extra' ); ?></h1>
		<p>
			<?php _e( 'Experiencing issues updating bundled (ACF PRO, Slider Revolution, WPBakery Page Builder) plugins? <a href="https://docs.clbthemes.com/ohio/#bundled_plugins" target="_blank">Check this guide.</a>', 'ohio-extra' ); ?>
		</p>
	</div>
</div>
<div class="row">
	<?php foreach( $ordered_plugins as $slug => $meta ): ?>
		<?php
			if ( empty( $meta['current_version'] ) ) {
				$current_version_label = __( 'Not Installed', 'ohio-extra' );
			} else {
				$current_version_label = sprintf( '%s %s', __( 'Ver', 'ohio-extra' ), $meta['current_version'] );
			}
			$link = '#';
			$btn_label = __( 'Active', 'ohio-extra' );
			$btn_class = 'disabled';
			if ( $meta['needs_update'] ) {
				$link = '../wp-admin/themes.php?page=install-required-plugins&plugin_status=update';
				$btn_label = __( 'Update', 'ohio-extra' );
				$btn_class = '';
			}
			if ( ! $meta['is_active'] ) {
				$link= '../wp-admin/plugins.php?plugin_status=inactive';
				$btn_label = __( 'Activate', 'ohio-extra' );
				$btn_class = '';
			}
			if ( ! $meta['is_installed'] ) {
				$link = '../wp-admin/themes.php?page=install-required-plugins';
				$btn_label = __( 'Install', 'ohio-extra' );
				$btn_class = 'btn-flat';
			}
		?>
		<div class="-col-4">
			<div class="clb-group <?php echo $meta['needs_update'] ? '-warning' : ''; ?>">
				<div class="clb-group-headline">
					<div class="col">
						<?php if ( $meta['is_premium'] ): ?>
							<label class="premium" title="<?php _e( 'Premium Plugin', 'ohio-extra' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px">
									<path d="m352-293 128-76 129 76-34-144 111-95-147-13-59-137-59 137-147 13 112 95-34 144ZM243-144l63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Zm237-333Z"/>
								</svg>
							</label>
						<?php endif; ?>
						<label>
							<?php echo $current_version_label; ?>
						</label>
					</div>
					<a class="btn <?php echo $btn_class; ?>" href="<?php echo $link; ?>">
						<?php if ( ! $meta['is_installed'] ): ?>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px">
								<path d="M480-336 288-528l51-51 105 105v-342h72v342l105-105 51 51-192 192ZM263.72-192Q234-192 213-213.15T192-264v-72h72v72h432v-72h72v72q0 29.7-21.16 50.85Q725.68-192 695.96-192H263.72Z"/>
							</svg>
						<?php endif; ?>
						<?php echo $btn_label; ?>
					</a>
				</div>
				<div class="clb-group-content">
					<div class="row -status">
						<img class="status-icon" src="<?php echo( esc_attr( OHIO_EXTRA_DIR_URL . 'assets/images/'. $slug .'.webp' ) ); ?>" alt="">
						<div class="holder">
							<div class="caption"><?php echo $meta['name']; ?></div>
							<?php echo $meta['description']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
