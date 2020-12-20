<?php
/**
 * The front page template file
 *
 * It is used to display a content which is set to front page and uses a custom query to get future events.
 */

get_header(); 
include get_theme_file_path('/parts/get-future-events.php');
?>		
	<div class="content">
			<?php
			if($futureEvents):?>
				<div class="banner" style="background-image: url('<?= $futureEvents[0]['banner_image'] ?>');">
					<div class="banner-content">
						<div class="grid-container">
							<div class="grid-x">
								<div class="small-12"> 
									<h1><?= $futureEvents[0]['post_title'] ?></h1>
									<p>
										<i class="fal fa-calendar-alt"></i>
										<?= $futureEvents[0]['event_date'] ?>
									</p>
								</div>
							</div>
						</div>
						<div class="grid-container">
							<div class="grid-x">
								<div class="small-12"> 
									<?php if(!empty($futureEvents[0]['cta_text']) &&  !empty($futureEvents[0]['cta_link'])): ?>
										<a href="<?= $futureEvents[0]['cta_link'] ?>" target="_blank" class="cta">
											<?= $futureEvents[0]['cta_text'] ?>
										</a>
									<?php endif; ?>
									<h2>Don't miss a turn!</h2>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<?php
				echo "<pre>";
					var_dump($futureEvents);
				echo "</pre>";
			else :   ?>
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
				<main class="main small-12 cell" role="main">
				<?php get_template_part( 'parts/content', 'missing' ); ?>
				</main>  
			</div> <!-- end #inner-content -->

			<?php endif; ?>															
	</div> <!-- end #content -->
<?php get_footer(); ?>