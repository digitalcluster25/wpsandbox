<ul class="ohio-widget team-group -unlist <?php echo $this->getWrapperClasses(); ?>" data-team-group="true">
    <?php foreach ( $settings['members'] as $member ): ?>

        <?php
            $has_social = false;
            if ( !empty( $member['social_artstation'] ) ) $has_social = true;
            if ( !empty( $member['social_behance'] ) ) $has_social = true;
            if ( !empty( $member['social_deviantart'] ) ) $has_social = true;
            if ( !empty( $member['social_digg'] ) ) $has_social = true;
            if ( !empty( $member['social_discord'] ) ) $has_social = true;
            if ( !empty( $member['social_dribbble'] ) ) $has_social = true;
            if ( !empty( $member['social_facebook'] ) ) $has_social = true;
            if ( !empty( $member['social_flickr'] ) ) $has_social = true;
            if ( !empty( $member['social_github'] ) ) $has_social = true;
            if ( !empty( $member['social_houzz'] ) ) $has_social = true;
            if ( !empty( $member['social_instagram'] ) ) $has_social = true;
            if ( !empty( $member['social_kaggle'] ) ) $has_social = true;
            if ( !empty( $member['social_linkedin'] ) ) $has_social = true;
            if ( !empty( $member['social_medium'] ) ) $has_social = true;
            if ( !empty( $member['social_mixer'] ) ) $has_social = true;
            if ( !empty( $member['social_pinterest'] ) ) $has_social = true;
            if ( !empty( $member['social_producthunt'] ) ) $has_social = true;
            if ( !empty( $member['social_quora'] ) ) $has_social = true;
            if ( !empty( $member['social_reddit'] ) ) $has_social = true;
            if ( !empty( $member['social_snapchat'] ) ) $has_social = true;
            if ( !empty( $member['social_soundcloud'] ) ) $has_social = true;
            if ( !empty( $member['social_spotify'] ) ) $has_social = true;
            if ( !empty( $member['social_teamspeak'] ) ) $has_social = true;
            if ( !empty( $member['social_telegram'] ) ) $has_social = true;
            if ( !empty( $member['social_threads'] ) ) $has_social = true;
            if ( !empty( $member['social_tiktok'] ) ) $has_social = true;
            if ( !empty( $member['social_tumblr'] ) ) $has_social = true;
            if ( !empty( $member['social_twitch'] ) ) $has_social = true;
            if ( !empty( $member['social_twitter'] ) ) $has_social = true;
            if ( !empty( $member['social_vimeo'] ) ) $has_social = true;
            if ( !empty( $member['social_vine'] ) ) $has_social = true;
            if ( !empty( $member['social_whatsapp'] ) ) $has_social = true;
            if ( !empty( $member['social_xing'] ) ) $has_social = true;
            if ( !empty( $member['social_youtube'] ) ) $has_social = true;
            if ( !empty( $member['social_fivehundred'] ) ) $has_social = true;
        ?>
        <li class="team-group-item" data-item="true">
            <div class="item-holder">
                <div class="-fade-up">
                    <div class="author">
                        <?php if ( !empty( $member['member_name'] ) ) : ?>
                            <h5 class="title">
                                <?php echo $member['member_name']; ?>
                            </h5>
                        <?php endif; ?>

                        <?php if ( !empty( $member['member_position'] ) ) : ?>
                            <p class="author-details -unspace">
                                <?php echo $member['member_position']; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <?php if ( !empty( $member['member_description'] ) ): ?>
                        <p><?php echo $member['member_description']; ?></p>
                    <?php endif; ?>

                    <?php if ( $has_social ) : ?>

                        <div class="social-networks -outlined -small">
                            
                            <?php if ( !empty( $member['social_artstation'] ) ): ?>
                                <a href="<?php echo $member['social_artstation']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'artstation', 'ohio-extra' ); ?>" class="network -unlink artstation">
                                    <i class="fa-brands fa-artstation"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_behance'] ) ): ?>
                                <a href="<?php echo $member['social_behance']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'behance', 'ohio-extra' ); ?>" class="network -unlink behance">
                                    <i class="fa-brands fa-behance"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_deviantart'] ) ): ?>
                                <a href="<?php echo $member['social_deviantart']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'deviantart', 'ohio-extra' ); ?>" class="network -unlink deviantart">
                                    <i class="fa-brands fa-deviantart"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_digg'] ) ): ?>
                                <a href="<?php echo $member['social_digg']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'digg', 'ohio-extra' ); ?>" class="network -unlink digg">
                                    <i class="fa-brands fa-digg"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_discord'] ) ): ?>
                                <a href="<?php echo $member['social_discord']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'discord', 'ohio-extra' ); ?>" class="network -unlink discord">
                                    <i class="fa-brands fa-discord"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_dribbble'] ) ): ?>
                                <a href="<?php echo $member['social_dribbble']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'dribbble', 'ohio-extra' ); ?>" class="network -unlink dribbble">
                                    <i class="fa-brands fa-dribbble"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_facebook'] ) ): ?>
                                <a href="<?php echo $member['social_facebook']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'facebook', 'ohio-extra' ); ?>" class="network -unlink facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_flickr'] ) ): ?>
                                <a href="<?php echo $member['social_flickr']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'flickr', 'ohio-extra' ); ?>" class="network -unlink flickr">
                                    <i class="fa-brands fa-flickr"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_github'] ) ): ?>
                                <a href="<?php echo $member['social_github']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'github', 'ohio-extra' ); ?>" class="network -unlink github">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_instagram'] ) ): ?>
                                <a href="<?php echo $member['social_instagram']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'instagram', 'ohio-extra' ); ?>" class="network -unlink instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_houzz'] ) ): ?>
                                <a href="<?php echo $member['social_houzz']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'houzz', 'ohio-extra' ); ?>" class="network -unlink houzz">
                                    <i class="fa-brands fa-houzz"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_kaggle'] ) ): ?>
                                <a href="<?php echo $member['social_kaggle']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'kaggle', 'ohio-extra' ); ?>" class="network -unlink kaggle">
                                    <i class="fa-brands fa-kaggle"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_linkedin'] ) ): ?>
                                <a href="<?php echo $member['social_linkedin']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'linkedin', 'ohio-extra' ); ?>" class="network -unlink linkedin">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_medium'] ) ): ?>
                                <a href="<?php echo $member['social_medium']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'medium', 'ohio-extra' ); ?>" class="network -unlink medium">
                                    <i class="fa-brands fa-medium-m"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_mixer'] ) ): ?>
                                <a href="<?php echo $member['social_mixer']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'mixer', 'ohio-extra' ); ?>" class="network -unlink mixer">
                                    <i class="fa-brands fa-mixer"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_pinterest'] ) ): ?>
                                <a href="<?php echo $member['social_pinterest']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'pinterest', 'ohio-extra' ); ?>" class="network -unlink pinterest">
                                    <i class="fa-brands fa-pinterest"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_producthunt'] ) ): ?>
                                <a href="<?php echo $member['social_producthunt']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'producthunt', 'ohio-extra' ); ?>" class="network -unlink producthunt">
                                    <i class="fa-brands fa-product-hunt"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_quora'] ) ): ?>
                                <a href="<?php echo $member['social_quora']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'quora', 'ohio-extra' ); ?>" class="network -unlink quora">
                                    <i class="fa-brands fa-quora"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_reddit'] ) ): ?>
                                <a href="<?php echo $member['social_reddit']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'reddit', 'ohio-extra' ); ?>" class="network -unlink reddit">
                                    <i class="fa-brands fa-reddit"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_snapchat'] ) ): ?>
                                <a href="<?php echo $member['social_snapchat']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'snapchat', 'ohio-extra' ); ?>" class="network -unlink snapchat">
                                    <i class="fa-brands fa-snapchat"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_soundcloud'] ) ): ?>
                                <a href="<?php echo $member['social_soundcloud']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'soundcloud', 'ohio-extra' ); ?>" class="network -unlink soundcloud">
                                    <i class="fa-brands fa-soundcloud"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_spotify'] ) ): ?>
                                <a href="<?php echo $member['social_spotify']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'spotify', 'ohio-extra' ); ?>" class="network -unlink spotify">
                                    <i class="fa-brands fa-spotify"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_teamspeak'] ) ): ?>
                                <a href="<?php echo $member['social_teamspeak']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'teamspeak', 'ohio-extra' ); ?>" class="network -unlink teamspeak">
                                    <i class="fa-brands fa-teamspeak"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_telegram'] ) ): ?>
                                <a href="<?php echo $member['social_telegram']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'telegram', 'ohio-extra' ); ?>" class="network -unlink telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_threads'] ) ): ?>
                                <a href="<?php echo $member['social_threads']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'threads', 'ohio-extra' ); ?>" class="network -unlink threads">
                                    <i class="fa-brands fa-threads"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_tiktok'] ) ): ?>
                                <a href="<?php echo $member['social_tiktok']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'tiktok', 'ohio-extra' ); ?>" class="network -unlink tiktok">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_tumblr'] ) ): ?>
                                <a href="<?php echo $member['social_tumblr']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'tumblr', 'ohio-extra' ); ?>" class="network -unlink tumblr">
                                    <i class="fa-brands fa-tumblr"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_twitch'] ) ): ?>
                                <a href="<?php echo $member['social_twitch']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'twitch', 'ohio-extra' ); ?>" class="network -unlink twitch">
                                    <i class="fa-brands fa-twitch"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_twitter'] ) ): ?>
                                <a href="<?php echo $member['social_twitter']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'twitter', 'ohio-extra' ); ?>" class="network -unlink twitter">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_vimeo'] ) ): ?>
                                <a href="<?php echo $member['social_vimeo']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'vimeo', 'ohio-extra' ); ?>" class="network -unlink vimeo">
                                    <i class="fa-brands fa-vimeo"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_vine'] ) ): ?>
                                <a href="<?php echo $member['social_vine']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'vine', 'ohio-extra' ); ?>" class="network -unlink vine">
                                    <i class="fa-brands fa-vine"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_whatsapp'] ) ): ?>
                                <a href="<?php echo $member['social_whatsapp']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'whatsapp', 'ohio-extra' ); ?>" class="network -unlink whatsapp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_xing'] ) ): ?>
                                <a href="<?php echo $member['social_xing']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'xing', 'ohio-extra' ); ?>" class="network -unlink xing">
                                    <i class="fa-brands fa-xing"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_youtube'] ) ): ?>
                                <a href="<?php echo $member['social_youtube']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( 'youtube', 'ohio-extra' ); ?>" class="network -unlink youtube">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_fivehundred'] ) ): ?>
                                <a href="<?php echo $member['social_fivehundred']; ?>" target="_blank" rel="nofollow" aria-label="<?php esc_html_e( '500px', 'ohio-extra' ); ?>" class="network -unlink 500px">
                                    <i class="fa-brands fa-500px"></i>
                                </a>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </li>
        <li class="team-group-item" data-trigger="true">
            <?php if ( !empty( $member['team_member_image']['url'] ) ) : ?>
                <img
                    src="<?php echo esc_url( $member['team_member_image']['url'] ); ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $member['team_member_image']['id'], 'large' ) ?>"
                    sizes="<?php echo wp_get_attachment_image_sizes( $member['team_member_image']['id'], 'large' ) ?>"
                    alt="<?php echo esc_attr( get_post_meta( $member['team_member_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>