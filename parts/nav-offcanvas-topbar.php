<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>
 
<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left">
		<ul class="menu">
			<li>
				<a class="logo" href="<?php echo home_url(); ?>">
 				<img src="<?= get_theme_file_uri('/assets/scss/images/logos/arcanacon.png'); ?>" alt="Arcanacon logo."/>
					<span class="show-for-large">rcanacon</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-right show-for-small-only">
		<button type="button" data-toggle="off-canvas">
			<i class="fal fa-bars fa-2x"></i>
		</button>
	</div>
</div>