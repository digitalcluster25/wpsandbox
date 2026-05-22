<div class="clb-hub clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Dashboard', 'ohio-extra' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-flat"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div id="tabs" class="clb-nav">
			<ul class="clb-nav-inner">
				<li>
					<a href="#tabs-1" class="selected">
						<?php if ( get_option( 'ohio_license_code', false ) ): ?>
							<i class="icon active">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M360-144q-90 0-153-63t-63-153v-240q0-90 63-153t153-63h240q90 0 153 63t63 153v240q0 90-63 153t-153 63H360Zm69-209 204-203-51-51-153 152-68-67-50 51 118 118Zm-69 137h240q60 0 102-42t42-102v-240q0-60-42-102t-102-42H360q-60 0-102 42t-42 102v240q0 60 42 102t102 42Zm120-264Z"/></svg>
							</i>
						<?php else: ?>
							<i class="icon inactive">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M479.79-288q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5ZM444-432h72v-240h-72v240Zm36.28 336Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>
							</i>
						<?php endif; ?>
						<?php _e( 'Registration', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-2">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-492Zm-.21 396Q450-96 429-117.15T408-168h144q0 30-21.21 51t-51 21ZM732-432v-111H624v-66h108v-111h72v111h108v66H804v111h-72ZM192-216v-72h48v-240q0-87 53.5-153T432-763v-53q0-20 14-34t34-14q20 0 34 14t14 34v53q23 5 44.5 13.5T614-728q-12.81 12.73-23.06 27.73-10.25 15-17.94 32.27-20-13-43.5-20.5T480-696q-70 0-119 49t-49 119v240h336v-108q17 11 34.5 18.5T720-365v77h48v72H192Z"/></svg>
						</i>
						<?php _e( 'What’s New', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-3">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M456-216h48v-54l144-144v-186H312v186l144 144v54Zm-72 72v-96L240-384v-216q0-29.7 21.15-50.85Q282.3-672 312-672h54l-30 44v-188h72v144h144v-144h72v188l-30-44h54q29.7 0 50.85 21.15Q720-629.7 720-600v216L576-240v96H384Zm96-261Z"/></svg>
						</i>
						<?php _e( 'Plugins', 'ohio-extra' ); ?>

						<?php if ( $plugins_need_update > 0 ) : ?>
							<span class="counter">
								<?php echo $plugins_need_update; ?>
							</span>
						<?php endif; ?>
					</a>
				</li>
				<li>
					<a href="#tabs-4">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m97-144 245-336h193l281-340v676H97Zm76-225-58-42 155-213h193l168-203 55 46-189 229H306L173-369Zm66 153h505v-404L569-408H378L239-216Zm505 0Z"/></svg>
						</i>
						<?php _e( 'System Status', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-5">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>
						</i>
						<?php _e( 'Help Center', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a class="docs" target="_blank" href="https://docs.clbthemes.com/ohio/">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-305q8-3 16.87-5 8.86-2 19.13-2h36v-480h-36q-15.3 0-25.65 11Q216-770 216-756v451Zm36 209q-45 0-76.5-31.5T144-204v-552q0-45 31.5-76.5T252-864h268v72H360v480h240v-128h72v200H252q-15.3 0-25.65 10.29Q216-219.42 216-204.21t10.35 25.71Q236.7-168 252-168h492v-312h72v384H252Zm-36-209v-487 487Zm480-175q0-90.33 62.84-153.16Q821.67-696 912-696q-90.33 0-153.16-62.84Q696-821.67 696-912q0 90.33-62.84 153.16Q570.33-696 480-696q90.33 0 153.16 62.84Q696-570.33 696-480Z"/></svg>
						</i>
						<?php _e( 'Documentation', 'ohio-extra' ); ?>
					</a>
				</li>

				<!-- Offer Banner -->
				<?php /*
				<li>
					<a class="offer-banner" href="https://1.envato.market/5Q25j" target="_blank">
						<!-- <div class="offer-banner-title">Get Ohio License for $35</div> -->
						<img src="https://colabrio.ams3.cdn.digitaloceanspaces.com/envato/40__Horizontal.png" alt="">
						<div class="offer-banner-expire">
							Expires 3rd Dec 2024, 12:59pm (UTC)
						</div>
					</a>
				</li>
				*/?>
				
			</ul>
			<div class="clb-hub-container clb-page-container">
				
				<!-- WP notices here -->
				<div class="wp-header-end"></div>

				<div class="inner-wrap">
					<div class="tab-item" id="tabs-1">
						<?php include 'parts/dashboard/theme-license-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-2" style="display: none;">
						<?php include 'parts/dashboard/whats-new-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-3" style="display: none;">
						<?php include 'parts/dashboard/plugins-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-4" style="display: none;">
						<?php include 'parts/dashboard/system-status-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-5" style="display: none;">
						<?php include 'parts/dashboard/help-section.php'; ?>
					</div>

					<?php include 'parts/footer.php'; ?>

				</div>
			</div>
		</div>
	</div>
</div>