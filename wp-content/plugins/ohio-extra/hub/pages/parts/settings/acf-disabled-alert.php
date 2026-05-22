<div class="wrap">
    <div class="clb-page-container" style="padding-left: 0;">

        <!-- WP notices here -->
        <div class="wp-header-end"></div>
        <div class="notice o-notice activation danger is-dismissible">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
            </i>
            <div class="holder">
                <div class="content">
                    <p class="title"><?php _e( 'ACF PRO is required!', 'ohio-extra' ); ?></p>
                    <?php _e( 'Install and activate ACF PRO plugin to enable Theme Settings panel.', 'ohio-extra' ); ?>
                </div>
                <div class="_button-group">
                    <a target="_blank" href="<?php echo admin_url('themes.php?page=install-required-plugins'); ?>" class="btn"><?php _e( 'Install ACF PRO', 'ohio-extra' ); ?></a>
                    <a target="_blank" href="<?php echo admin_url('plugins.php'); ?>" class="btn btn-flat"><?php _e( 'Manage Plugins', 'ohio-extra' ); ?></a>
                </div>
                <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
            </div>
        </div>

        <?php include __DIR__ . '/../footer.php'; ?>
    </div>
</div>
