<?php

/**
* WPBakery Page Builder Ohio Social Networks shortcode view
*/

?>
<div class="ohio-widget social-networks<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $artstation_link_custom ) : ?>
		<a href="<?php echo $artstation_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'ArtStation', 'ohio-extra' ); ?>" class="network -unlink title artstation">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-artstation"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'ArtStation', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $behance_link_custom ) : ?>
		<a href="<?php echo $behance_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Behance', 'ohio-extra' ); ?>" class="network -unlink title behance">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-behance"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Behance', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $deviantart_link_custom ) : ?>
		<a href="<?php echo $deviantart_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'DeviantArt', 'ohio-extra' ); ?>" class="network -unlink title deviantart">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-deviantart"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'DeviantArt', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $digg_link_custom ) : ?>
		<a href="<?php echo $digg_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Digg', 'ohio-extra' ); ?>" class="network -unlink title digg">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-digg"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Digg', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $discord_link_custom ) : ?>
		<a href="<?php echo $discord_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Discord', 'ohio-extra' ); ?>" class="network -unlink title discord">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-discord"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Discord', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $dribbble_link_custom ) : ?>
		<a href="<?php echo $dribbble_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Dribbble', 'ohio-extra' ); ?>" class="network -unlink title dribbble">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-dribbble"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Dribbble', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $facebook_link_custom ) : ?>
		<a href="<?php echo $facebook_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Facebook', 'ohio-extra' ); ?>" class="network -unlink title facebook">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-facebook-f"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Facebook', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $flickr_link_custom ) : ?>
		<a href="<?php echo $flickr_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Flickr', 'ohio-extra' ); ?>" class="network -unlink title flickr">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-flickr"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Flickr', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $github_link_custom ) : ?>
		<a href="<?php echo $github_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'GitHub', 'ohio-extra' ); ?>" class="network -unlink title github">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-github"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'GitHub', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $houzz_link_custom ) : ?>
		<a href="<?php echo $houzz_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Houzz', 'ohio-extra' ); ?>" class="network -unlink title houzz">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-houzz"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Houzz', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $instagram_link_custom ) : ?>
		<a href="<?php echo $instagram_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Instagram', 'ohio-extra' ); ?>" class="network -unlink title instagram">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-instagram"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Instagram', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $kaggle_link_custom ) : ?>
		<a href="<?php echo $kaggle_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Kaggle', 'ohio-extra' ); ?>" class="network -unlink title kaggle">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-kaggle"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Kaggle', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $linkedin_link_custom ) : ?>
		<a href="<?php echo $linkedin_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'LinkedIn', 'ohio-extra' ); ?>" class="network -unlink title linkedin">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-linkedin"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'LinkedIn', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $medium_link_custom ) : ?>
		<a href="<?php echo $medium_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Medium', 'ohio-extra' ); ?>" class="network -unlink title linkedin">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-medium-m"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Medium', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $mixer_link_custom ) : ?>
		<a href="<?php echo $mixer_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Mixer', 'ohio-extra' ); ?>" class="network -unlink title mixer">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-mixer"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Mixer', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $pinterest_link_custom ) : ?>
		<a href="<?php echo $pinterest_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Pinterest', 'ohio-extra' ); ?>" class="network -unlink title pinterest">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-pinterest"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Pinterest', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $producthunt_link_custom ) : ?>
		<a href="<?php echo $producthunt_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Product Hunt', 'ohio-extra' ); ?>" class="network -unlink title producthunt">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-product-hunt"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Product Hunt', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $quora_link_custom ) : ?>
		<a href="<?php echo $quora_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Quora', 'ohio-extra' ); ?>" class="network -unlink title quora">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-quora"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Quora', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $reddit_link_custom ) : ?>
		<a href="<?php echo $reddit_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Reddit', 'ohio-extra' ); ?>" class="network -unlink title reddit">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-reddit"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Reddit', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $snapchat_link_custom ) : ?>
		<a href="<?php echo $snapchat_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Snapchat', 'ohio-extra' ); ?>" class="network -unlink title snapchat">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-snapchat"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Snapchat', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $soundcloud_link_custom ) : ?>
		<a href="<?php echo $soundcloud_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'SoundCloud', 'ohio-extra' ); ?>" class="network -unlink title soundcloud">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-soundcloud"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'SoundCloud', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $spotify_link_custom ) : ?>
		<a href="<?php echo $spotify_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Spotify', 'ohio-extra' ); ?>" class="network -unlink title spotify">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-spotify"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Spotify', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $teamspeak_link_custom ) : ?>
		<a href="<?php echo $teamspeak_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Spotify', 'ohio-extra' ); ?>" class="network -unlink title teamspeak">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-teamspeak"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Spotify', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $telegram_link_custom ) : ?>
		<a href="<?php echo $telegram_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Telegram', 'ohio-extra' ); ?>" class="network -unlink title telegram">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-telegram"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Telegram', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $threads_link_custom ) : ?>
		<a href="<?php echo $threads_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Threads', 'ohio-extra' ); ?>" class="network -unlink title threads">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-threads"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Threads', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $tiktok_link_custom ) : ?>
		<a href="<?php echo $tiktok_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'TikTok', 'ohio-extra' ); ?>" class="network -unlink title tiktok">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-tiktok"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'TikTok', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $tumblr_link_custom ) : ?>
		<a href="<?php echo $tumblr_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Tumblr', 'ohio-extra' ); ?>" class="network -unlink title tumblr">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-tumblr"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Tumblr', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $twitch_link_custom ) : ?>
		<a href="<?php echo $twitch_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Twitch', 'ohio-extra' ); ?>" class="network -unlink title twitch">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-twitch"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Twitch', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $twitter_link_custom ) : ?>
		<a href="<?php echo $twitter_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'X', 'ohio-extra' ); ?>" class="network -unlink title twitter">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-x-twitter"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'X', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $vimeo_link_custom ) : ?>
		<a href="<?php echo $vimeo_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Vimeo', 'ohio-extra' ); ?>" class="network -unlink title vimeo">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-vimeo"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Vimeo', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $vine_link_custom ) : ?>
		<a href="<?php echo $vine_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Vine', 'ohio-extra' ); ?>" class="network -unlink title vine">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-vine"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Vine', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $whatsapp_link_custom ) : ?>
		<a href="<?php echo $whatsapp_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'WhatsApp', 'ohio-extra' ); ?>" class="network -unlink title whatsapp">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-whatsapp"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'WhatsApp', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $xing_link_custom ) : ?>
		<a href="<?php echo $xing_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'Xing', 'ohio-extra' ); ?>" class="network -unlink title xing">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-xing"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'Xing', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $youtube_link_custom ) : ?>
		<a href="<?php echo $youtube_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'YouTube', 'ohio-extra' ); ?>" class="network -unlink title youtube">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-youtube"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( 'YouTube', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $fivehundred_link_custom ) : ?>
		<a href="<?php echo $fivehundred_link_custom; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( '500px', 'ohio-extra' ); ?>" class="network -unlink title 500px">
			<?php if ( $show_icon ) : ?>
				<i class="icon fa-brands fa-500px"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
				<span><?php esc_html_e( '500px', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

</div>