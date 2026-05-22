<?php
    $ohio_settings = [
        'theme-general' => __( 'General', 'ohio-extra' ),
        'theme-appearance' => __( 'Appearance', 'ohio-extra' ),
        'theme-general-typography' => __( 'Typography', 'ohio-extra' ),
        'theme-general-menu' => __( 'Menu', 'ohio-extra' ),
        'theme-general-header' => __( 'Header', 'ohio-extra' ),
        'theme-general-pages' => __( 'Pages', 'ohio-extra' ),
        'theme-general-footer' => __( 'Footer', 'ohio-extra' ),
        'theme-general-blog' => __( 'Blog', 'ohio-extra' ),
        'theme-general-post' => __( 'Single Post', 'ohio-extra' ),
        'theme-general-portfolio' => __( 'Portfolio', 'ohio-extra' ),
        'theme-general-project' => __( 'Single Project', 'ohio-extra' ),
        'theme-general-woocommerce' => __( 'Shop', 'ohio-extra' ),
        'theme-general-product' => __( 'Single Product', 'ohio-extra' ),
        'theme-general-custom' => __( 'Custom CSS & JS', 'ohio-extra' ),
        'theme-general-maintenance' => __( 'Maintenance Mode', 'ohio-extra' ),
        'theme-general-performance' => __( 'Performance', 'ohio-extra' ),
        'theme-general-other' => __( 'Other', 'ohio-extra' ),
        'theme-general-backup' => __( 'Backup & Reset', 'ohio-extra' ) . '<span class="new-badge"></new>'
    ];

	function ohio_show_sync_langs_options_button() {
		if ( ! function_exists( 'icl_get_languages' ) ) return;
		if ( empty( $_GET['lang'] ) ) return;

		$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');
		$default_lang = get_option( 'icl_sitepress_settings' )['default_language'];

		if ( in_array( ICL_LANGUAGE_CODE, [$default_lang, 'all'] ) ) return;

		?>
        <div id="sync-languages-action" lang-code="<?php echo esc_attr(ICL_LANGUAGE_CODE); ?>" class="button-publish-holder" style="margin-right:1rem;">
            <button class="button button-publish button-primary" style="background:transparent;color:#3D84FC">
				<?php echo __( 'Copy main language settings to', 'ohio-extra' ) . ' ' . $langs[ICL_LANGUAGE_CODE]['translated_name']; ?>
            </button>
        </div>
		<?php
	}

    function ohio_show_setting_category_icon( $slug ) {
        switch ( $slug ) {
            case 'theme-general':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M696-144q-60.48 0-102.24-41.76T552-288q0-60.48 41.76-102.24T696-432q60.48 0 102.24 41.76T840-288q0 60.48-41.76 102.24T696-144Zm.12-72Q726-216 747-237.12q21-21.12 21-51T746.88-339q-21.12-21-51-21T645-338.88q-21 21.12-21 51T645.12-237q21.12 21 51 21ZM168-252v-72h312v72H168Zm96-276q-60.48 0-102.24-41.76T120-672q0-60.48 41.76-102.24T264-816q60.48 0 102.24 41.76T408-672q0 60.48-41.76 102.24T264-528Zm.12-72Q294-600 315-621.12q21-21.12 21-51T314.88-723q-21.12-21-51-21T213-722.88q-21 21.12-21 51T213.12-621q21.12 21 51 21ZM480-636v-72h312v72H480Zm216 348ZM264-672Z"/></svg>
                <?php
                break;
            case 'theme-appearance':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M456-96q-29.7 0-50.85-21.15Q384-138.3 384-168v-167H264q-29.7 0-50.85-21.15Q192-377.3 192-407v-265q0-61 42-102.5T336-816h432v409q0 29.7-21.5 50.85Q725-335 696-335H576v167q0 29.7-21.5 50.85Q533-96 504-96h-48ZM264-552h432v-192h-48v144h-72v-144h-48v73h-72v-73H336q-29.7 0-50.85 20.5Q264-703 264-672v120Zm0 145h432v-73H264v73Zm0 0v-73 73Z"/></svg>
                <?php
                break;
            case 'theme-general-typography':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M456-96v-240h72v84h288v72H528v84h-72Zm-312-84v-72h264v72H144Zm135-252h74.7l39.6-110H567l38.9 110H681L518-864h-76L279-432Zm137-173 66-179 63 179H416Z"/></svg>
                <?php
                break;
            case 'theme-general-menu':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M144-264v-72h480v72H144Zm621-24L573-480l192-192 51 51-141 141 141 141-51 51ZM144-444v-72h384v72H144Zm0-180v-72h480v72H144Z"/></svg>
                <?php
                break;
            case 'theme-general-header':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M211-144q-29 0-48-19t-19-48v-538q0-30 19-48.5t48-18.5h538q30 0 48.5 18.5T816-749v538q0 29-18.5 48T749-144H211Zm5-504h528v-96H216v96Zm528 72H216v360h528v-360Zm-528-72v72-72Zm0 0v-96 96Zm0 72v360-360Z"/></svg>
                <?php
                break;
            case 'theme-general-pages':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M144-456v-288.27Q144-774 165.5-795q21.5-21 50.5-21h228v360H144Zm228-72Zm144-288h228q29.7 0 50.85 21.15Q816-773.7 816-744v168H516v-240Zm0 672v-360h300v288q0 29-21.15 50.5T744-144H516ZM144-384h300v240H216q-29 0-50.5-21.5T144-216v-168Zm228 72Zm216-336Zm0 216Zm-372-96h156v-216H216v216Zm372-120h156v-96H588v96Zm0 216v216h156v-216H588ZM216-312v96h156v-96H216Z"/></svg>
                <?php
                break;
            case 'theme-general-footer':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-144q-29 0-50.5-21.5T144-216v-528q0-29.7 21.5-50.85Q187-816 216-816h528q29.7 0 50.85 21.15Q816-773.7 816-744v528q0 29-21.15 50.5T744-144H216Zm0-240h528v-360H216v360Zm0 72v96h528v-96H216Zm0 24v72-72Z"/></svg>
                <?php
                break;
            case 'theme-general-blog':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M288-168v-432q0-30.08 21-51.04T360-672h432q29.7 0 50.85 21.15Q864-629.7 864-600v312L672-96H360q-29.7 0-50.85-21.15Q288-138.3 288-168ZM98-703q-5-29 12.5-54t46.5-30l425-76q29-5 53.5 12.5T665-804l11 60h-73l-9-48-425 76 47 263v228q-16-7-27.5-21.08Q177-260.16 174-278L98-703Zm262 103v432h264v-168h168v-264H360Zm216 216Z"/></svg>
                <?php
                break;
            case 'theme-general-post':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h528q29.7 0 50.85 21.15Q816-773.7 816-744v258q-17.1-5.76-35.1-9.92T744-502v-242H216v528h241q1.88 19.52 5.94 37.26Q467-161 473-144H216Zm0-96v24-528 242-2 264Zm72-48h172q4-19 10.19-36.97Q476.38-342.93 484-360H288v72Zm0-156h264q26-20 56-34.5t64-20.5v-17H288v72Zm0-156h384v-72H288v72ZM719.77-48Q640-48 584-104.23q-56-56.22-56-136Q528-320 584.23-376q56.22-56 136-56Q800-432 856-375.77q56 56.22 56 136Q912-160 855.77-104q-56.22 56-136 56ZM696-144h48v-72h72v-48h-72v-72h-48v72h-72v48h72v72Z"/></svg>
                <?php
                break;
            case 'theme-general-portfolio':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M577-408q55.48 0 94.24-38T715-540q-56 0-96 38.5T577-408Zm-2 0q-4-56-43.98-94-39.97-38-96.02-38 4 56 44 94t96 38Zm1-125q14 0 24.5-10.12T611-568.2v-8.8l7.6 5.2q11.4 7.8 25.9 4.3Q659-571 667-585q7-11 3-25t-15.96-22.91L647-638l8-5q12-8 15.5-21.5t-3.56-26.05Q659-704 645-708t-26 3.8l-8 5.2v-10q0-14-10.5-24.5t-25-10.5q-14.5 0-24.5 10.5T541-709v10l-8.4-5.2Q520-712 506.5-708q-13.5 4-21.5 16-8 13-4.5 27t16.72 22.27L505-638l-8.15 4q-13.85 7-17.35 21-3.5 14 4.5 27 8 14 22 17.5t26-4.3l8-5.2v10q0 14.87 10.35 24.94Q560.7-533 576-533Zm-.5-70q-14.5 0-24.5-10.06-10-10.07-10-24.94 0-14 10.06-24.5Q561.13-673 576-673q14 0 24.5 10.5t10.5 25q0 14.5-10.5 24.5t-25 10Zm9.5 387h139q-3 24-18.97 41.5Q689.06-157 666-154L235-96q-29 4-53-14.5T154-158L96-587q-4-30.03 14.65-53.7Q129.3-664.36 159-668l57-7v73l-48 6 57 428 360-48Zm-226.33-72q-32.67 0-52.17-19.5T287-360v-432q0-33 19.5-52.5t52.17-19.5h435.66q32.67 0 52.17 19.5T866-792v432q0 33-19.5 52.5T794.33-288H358.67Zm1.33-72h432v-432H360v432ZM225-168Zm351-408Z"/></svg>
                <?php
                break;
            case 'theme-general-project':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h171q8-31 33.5-51.5T480-888q34 0 59.5 20.5T573-816h171q29.7 0 50.85 21.15Q816-773.7 816-744v258q-17.1-5.76-35.1-9.92T744-502v-242H216v528h241q1.88 19.52 5.94 37.26Q467-161 473-144H216Zm0-96v24-528 242-2 264Zm72-48h172q4-19 10.19-36.97Q476.38-342.93 484-360H288v72Zm0-156h264q26-20 56-34.5t64-20.5v-17H288v72Zm0-156h384v-72H288v72Zm192-168q10.4 0 17.2-6.8 6.8-6.8 6.8-17.2 0-10.4-6.8-17.2-6.8-6.8-17.2-6.8-10.4 0-17.2 6.8-6.8 6.8-6.8 17.2 0 10.4 6.8 17.2 6.8 6.8 17.2 6.8ZM719.77-48Q640-48 584-104.23q-56-56.22-56-136Q528-320 584.23-376q56.22-56 136-56Q800-432 856-375.77q56 56.22 56 136Q912-160 855.77-104q-56.22 56-136 56ZM696-144h48v-72h72v-48h-72v-72h-48v72h-72v48h72v72Z"/></svg>
                <?php
                break;
            case 'theme-general-woocommerce':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-96q-29.7 0-50.85-21.15Q144-138.3 144-168v-480q0-29.7 21.15-50.85Q186.3-720 216-720h72q0-79.68 56.23-135.84 56.22-56.16 136-56.16Q560-912 616-855.84q56 56.16 56 135.84h72q29.7 0 50.85 21.15Q816-677.7 816-648v480q0 29.7-21.15 50.85Q773.7-96 744-96H216Zm0-72h528v-480H216v480Zm264.23-216Q560-384 616-440.16q56-56.16 56-135.84h-72q0 50-35 85t-85 35q-50 0-85-35t-35-85h-72q0 80 56.23 136 56.22 56 136 56ZM360-720h240q0-50-35-85t-85-35q-50 0-85 35t-35 85ZM216-168v-480 480Z"/></svg>
                <?php
                break;
            case 'theme-general-product':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M449-96q-14 0-27-5t-24-16L117-399q-10.96-10.93-15.98-24.13Q96-436.34 96-450q0-14 5-26.5t16-23.5l343.27-343.3Q471-854 484.04-859q13.05-5 26.96-5h281q29.7 0 50.85 21.15Q864-821.7 864-792v281q0 14.22-5 27.11-5 12.89-15.7 23.59L500-117q-11 11-24 16t-27 5Zm0-72 343-343v-281H511L168-449l281 281Zm247-468q25 0 42.5-17.5T756-696q0-25-17.5-42.5T696-756q-25 0-42.5 17.5T636-696q0 25 17.5 42.5T696-636ZM480-480Z"/></svg>
                <?php
                break;
            case 'theme-general-custom':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M576-192v-72h84q15.3 0 25.65-10.35Q696-284.7 696-300v-72q0-41 27.5-70.5T792-477v-4q-41-8-68.5-37T696-588v-72q0-15.3-10.35-25.65Q675.3-696 660-696h-84v-72h84q45 0 76.5 31.5T768-660v72q0 15.3 10.35 25.65Q788.7-552 804-552h60v144h-60q-15.3 0-25.65 10.35Q768-387.3 768-372v72q0 45-31.5 76.5T660-192h-84Zm-276 0q-45 0-76.5-31.5T192-300v-72q0-15.3-10.35-25.65Q171.3-408 156-408H96v-144h60q15.3 0 25.65-10.35Q192-572.7 192-588v-72q0-45 31.5-76.5T300-768h84v72h-84q-15.3 0-25.65 10.35Q264-675.3 264-660v72q0 42-27.5 71.5T168-482v4.15Q209-474 236.5-444t27.5 72v72q0 15.3 10.35 25.65Q284.7-264 300-264h84v72h-84Z"/></svg>
                <?php
                break;
            case 'theme-general-maintenance':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M666-163 475-354q-20 8-43.5 12.5T384-337q-99 0-169.5-70T144-576q0-37.78 9.5-71.89T182-711l144 144 70-70-144-144q29-17 62.5-26t69.5-9q100 0 170 71t70 170.19q0 22.81-4.5 42.31Q615-513 607-493l195 194q14 14.35 14 34.67Q816-244 802-230l-68 67q-14.09 14-34.04 14Q680-149 666-163Zm34-68 35-34-215-213q20-24 26-52.5t6-44.5q0-66.85-47.5-116.42Q457-741 390-744l82 81q11 11.18 11 26.09t-11.29 26.12L351.29-491.21Q340-480 325.82-480T301-491l-85-85q0 69 49.5 118T384-409q17 0 47-7t56-28l213 213ZM476-488Z"/></svg>
                <?php
                break;

            case 'theme-general-performance':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M429-358q23 22 57 20.5t50-25.5l208-309-309.16 208.26Q410-447 408-413.5t21 55.5Zm52-410q60 0 108 15.5t87 38.5l-69 45q-28-13-58.5-20t-67.5-7q-130.09 0-221.55 93.5Q168-509 168-384q0 38 5.5 62.5T191-264h577q13-33 18.5-60.5T792-384q0-42-11.5-84T747-545l43-65q35 48 54.5 106T864-386q0 51-8.5 89T828-227q-10 17-25.5 26t-34.5 9H192q-19 0-34.5-9T132-227q-19-32-27.5-70T96-386q0-79.72 30.5-149.36Q157-605 209-656.5T331.44-738q70.44-30 149.56-30Zm-1 279Z"/></svg>
                <?php
                break;
            case 'theme-general-other':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M636-432 432-636l204-204 203 204-203 204Zm-492-96v-288h288v288H144Zm384 384v-288h288v288H528Zm-384 0v-288h288v288H144Zm72-456h144v-144H216v144Zm420 66 101-102-101-102-102 102 102 102Zm-36 318h144v-144H600v144Zm-384 0h144v-144H216v144Zm144-384Zm174-36ZM360-360Zm240 0Z"/></svg>
                <?php
                break;
            case 'theme-general-backup':
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M479.5-144q-140.5 0-238-41.85T144-288v-384q0-60 98-102t237.5-42q139.5 0 238 42T816-672v384q0 60.3-98 102.15Q620-144 479.5-144Zm.47-456Q566-600 646-621.5t98-50.5q-18-28-98.5-50t-165.53-22Q394-744 313.5-722T216-672q17 29 96.5 50.5T479.97-600Zm.03 192q42 0 80-4.5t71.5-12.5q33.5-8 62-20.5T744-474v-109q-24.25 13.22-53.62 23.61Q661-549 627.17-542.15q-33.83 6.85-71 10.5Q519-528 479.5-528t-77.11-3.65q-37.62-3.65-71-10.5Q298-549 268.5-559.5 239-570 216-583v109q22.41 15.94 50.21 28.47Q294-433 327.5-425q33.5 8 72 12.5T480-408Zm.32 192q43.32 0 88.05-6.4 44.73-6.39 82.4-16.9 37.67-10.5 63.09-23.75Q739.29-276.3 744-290v-101q-24.25 13.22-53.62 23.61Q661-357 627.17-350.15q-33.83 6.85-71 10.5Q519-336 479.5-336t-77.11-3.65q-37.62-3.65-71-10.5Q298-357 268.5-367.5 239-378 216-391v103q5 13 30.5 26t63 23q37.5 10 82.5 16.5t88.32 6.5Z"/></svg>
                <?php
                break;
        }
    }
?>

<div class="clb-hub clb-page">
    <div class="clb-hub-intro">
        <div class="clb-hub-container">
            <div class="details">
                <i class="details-icon"></i>
                <h1><?php _e( 'Theme Settings', 'ohio-extra' ); ?></h1>
            </div>
            <div class="mode-switcher-holder">
                <?php ohio_show_sync_langs_options_button(); ?>
                <div class="mode-switcher">
                    <a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
                    <a href="admin.php?page=ohio_hub_settings" class="btn btn-flat"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
                </div>
                <div id="fake-publishing-action" class="button-publish-holder">
                    <button class="btn button-publish">
                        <?php _e( 'Save Changes', 'ohio-extra' ); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php
    $options_slug = !empty( $_GET['options_page'] ) ? $_GET['options_page'] : 'theme-general';

    if ( !function_exists( 'acf_get_options_page' ) ) {
        include 'parts/settings/acf-disabled-alert.php';
        return;
    }

    $page = acf_get_options_page( $options_slug );
    $post_id = acf_get_valid_post_id( $page['post_id'] );
?>
    <div class="wrap">
        <div class="clb-nav">
            <ul class="clb-nav-inner">
                <?php foreach( $ohio_settings as $slug => $title ): ?>
                <li>
                    <a <?php if ( $options_slug == $slug ) { echo 'class="selected"'; } ?> 
                        href="admin.php?page=ohio_hub_settings&options_page=<?php echo $slug; ?>">
                        <i class="icon">
                            <?php ohio_show_setting_category_icon( $slug ); ?>
                        </i>
                        <?php echo $title; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="clb-hub-container clb-page-container">

                <!-- WP notices here -->
                <div class="wp-header-end"></div>
                
                <div class="inner-wrap">
                    <div class="acf-settings-wrap">
                        <form id="post" method="post" name="post">
                            <?php 
                                acf_form_data( [
                                    'screen' => 'options',
                                    'post_id' => $post_id,
                                ] );

                                wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
                                wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
                            ?>

                            <div id="poststuff" class="poststuff">
                                <div id="post-body" class="metabox-holder columns-1">
                                    <div id="postbox-container-1" class="postbox-container" style="display: none;">
                                        <div id="major-publishing-actions">
                                            <div id="publishing-action">
                                                <span class="spinner"></span>
                                                <input type="submit" accesskey="p" value="Update" class="button button-primary button-large" id="publish" name="publish">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div id="postbox-container-2" class="postbox-container">
                                        <style>
                                            .inside {
                                                visibility: hidden;
                                                opacity: 0;
                                            }
                                        </style>
                                        <?php do_meta_boxes( 'acf_options_page', 'normal', null ); ?>
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                        </form>
                    </div>

                    <?php if ( $options_slug === 'theme-general-backup' ) : ?>
                        <div class="row">

                            <!-- group -->
                            <div class="clb-group">
                                <div class="clb-group-headline">
                                    <h2><?php _e( 'Export Settings', 'ohio-extra' ); ?></h2>
                                </div>
                                <div class="clb-group-details">
                                    <?php _e( 'Export and save the JSON file with your current <b>Theme Settings</b>. In that case, you will be able to import and restore <b>Theme Settings</b> later if needed.', 'ohio-extra' ); ?>
                                </div>
                                <div class="clb-group-content">
                                    <div class="settings-backup">
                                        <a id="export_theme_settings" href="#" class="btn">
                                            <i class="bi bi-file-earmark-arrow-up"></i>
                                            <?php _e( 'Export Settings', 'ohio-extra' ); ?></a>
                                    </div>
                                </div>
                            </div>

                            <!-- group -->
                            <div class="clb-group">
                                <div class="clb-group-headline">
                                    <h2><?php _e( 'Import Settings', 'ohio-extra' ); ?></h2>
                                </div>
                                <div class="clb-group-content">
                                    <!-- row -->
                                    <div class="row -status">
                                        <span class="status-icon -warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Zm-.07-60q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                                        </span>
                                        <div class="holder">
                                            <div class="caption"><?php _e( 'Heads-up!', 'ohio-extra' ); ?></div>
                                            <?php _e( 'This action will override all your existing <b>Theme Settings</b>. Please proceed with caution.', 'ohio-extra' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clb-group-footer">
                                    <div class="settings-backup">
                                        <form id="import_theme_settings">
                                            <input id="settings_import_file" hidden accept=".json" name="settings" type="file" />
                                            <a id="settings_import_file_trigger" class="btn btn-flat">
                                                <i class="bi bi-file-earmark-arrow-down"></i>
                                                <?php _e( 'Import Settings', 'ohio-extra' ); ?>
                                            </a>
                                            <button id="settings_import_submit" type="submit"  style="display: none;" class="btn btn-flat">
                                                <i class="bi bi-file-earmark-arrow-down"></i>
                                                <?php _e( 'Import', 'ohio-extra' ); ?>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- group -->
                            <div class="clb-group -warning">
                                <div class="clb-group-headline">
                                    <h2><?php _e( 'Reset Settings', 'ohio-extra' ); ?></h2>
                                </div>
                                <div class="clb-group-content">
                                    <!-- row -->
                                    <div class="row -status">
                                        <span class="status-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
                                        </span>
                                        <div class="holder">
                                            <div class="caption"><?php _e( 'Warning!', 'ohio-extra' ); ?></div>
                                            <?php _e( 'This action will permanently delete all your progress and restore <b>Theme Settings</b> to default. Please proceed with caution.', 'ohio-extra' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clb-group-footer">
                                    <div class="settings-backup">
                                        <a id="reset_theme_settings" href="#" data-nonce="<?php echo wp_create_nonce( 'ohio_reset_theme_settings' ); ?>"  class="btn btn-flat">
                                            <i class="bi bi-x-circle"></i>
                                            <?php _e( 'Reset Settings to Defaults', 'ohio-extra' ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php include 'parts/footer.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>