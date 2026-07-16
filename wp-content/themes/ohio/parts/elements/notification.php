<?php
	if ( !OhioOptions::get_global( 'notification_bar', false ) ) return; // exif if not visible
	$notification_link = OhioOptions::get_global( 'notification_link' );
	$notification_icon = OhioOptions::get_global( 'notification_icon' );
	$notification_blur = OhioOptions::get_global( 'notification_blur_effect', true );
	$notification_button = OhioOptions::get_global( 'notification_button' );
	
	if ( $notification_button ) {
		$notification_button_link = OhioOptions::get_global( 'notification_button_link' );
	}
?>

<?php if ( !isset( $_COOKIE['notification'] ) && !OhioSettings::is_coming_soon_page() ) : ?>

	<div class="notification">
		<div class="alert -small -fixed<?php if ( $notification_blur ) { echo esc_attr( ' -blur' ); } ?>">
		    <p class="alert-message -unspace">
		    	
		    	<?php if ( $notification_icon ) : ?>
		    		<i class="icon">
			    		<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-75 29-147t81-128.5q52-56.5 125-91T475-881q21 0 43 2t45 7q-9 45 6 85t45 66.5q30 26.5 71.5 36.5t85.5-5q-26 59 7.5 113t99.5 56q1 11 1.5 20.5t.5 20.5q0 82-31.5 154.5t-85.5 127q-54 54.5-127 86T480-80Zm-60-480q25 0 42.5-17.5T480-620q0-25-17.5-42.5T420-680q-25 0-42.5 17.5T360-620q0 25 17.5 42.5T420-560Zm-80 200q25 0 42.5-17.5T400-420q0-25-17.5-42.5T340-480q-25 0-42.5 17.5T280-420q0 25 17.5 42.5T340-360Zm260 40q17 0 28.5-11.5T640-360q0-17-11.5-28.5T600-400q-17 0-28.5 11.5T560-360q0 17 11.5 28.5T600-320ZM480-160q122 0 216.5-84T800-458q-50-22-78.5-60T683-603q-77-11-132-66t-68-132q-80-2-140.5 29t-101 79.5Q201-644 180.5-587T160-480q0 133 93.5 226.5T480-160Zm0-324Z"/></svg>
			    	</i>
				<?php endif; ?>

		    	<?php echo wp_kses( OhioOptions::get_global( 'notification_text' ), 'post' ); ?>

		    	<?php if ( $notification_link ) : ?>
					<a target="<?php echo esc_html( $notification_link['target'] ); ?>" href="<?php echo esc_url( $notification_link['url'] ); ?>">
						<?php echo esc_html( $notification_link['title'] ); ?>
					</a>
				<?php endif; ?>
	    	</p>
			<?php if ( $notification_button && $notification_button_link ) : ?>
				<a target="<?php echo esc_html( $notification_button_link['target'] ); ?>" href="<?php echo esc_url( $notification_button_link['url'] ); ?>" class="button -small">
					<?php echo esc_html( $notification_button_link['title'] ) ?>
				</a>
			<?php endif; ?>
	        <button class="icon-button -extra-small" data-js="close-alert" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
	    		<?php get_template_part( 'parts/elements/icon_close' ); ?>
			</button>
		</div>
    </div>

<?php endif; ?>