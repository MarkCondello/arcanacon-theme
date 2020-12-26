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
	<div class="banner-container"> 
		<div class="banner" style="background-image: url('<?= $futureEvents[0]['banner_image'] ?>');">
			<div class="banner-content">
				<div class="grid-container h-100">
					<div class="grid-y grid-padding-y align-justify h-100">
						<div class="small-9 cell"> 
							<h1 class="l-height-1"><?= $futureEvents[0]['post_title'] ?></h1>
							<p class="ff-super-reg">
								<i class="fal fa-calendar-alt"></i>
								<?= $futureEvents[0]['event_date'] ?>
							</p>
						</div>
						<div class="small-3 cell"> 
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
		<div class="banner-abstract p-y-2">
			<div class="grid-container h-100">
				<div class="grid-x h-100">
					<div class="small-12"> 
						<div class="content"> 
							<p class="m-0">
								<span class="bold">Synopsis: </span><?= mb_strimwidth($futureEvents[0]['post_excerpt'] , 0, 3000, '...') ?>
									<a class="bold" href="<?= $futureEvents[0]['guid']; ?>">read more</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
	if (have_posts()) : 
		while (have_posts()) : 
			the_post(); 
			the_content();
		endwhile;
	endif;
	?>
	 
<?php if(count($futureEvents) > 1): ?>
		<div class="bg-colour-beige future-events">
			<div class="grid-container">	
<?php
	foreach($futureEvents as $key=>$event):
		if($key > 0 && $key < 4): ?>
<?php 		include(locate_template('./parts/event-row.php', false, false) ); ?>
		<?php endif;
	endforeach; ?>	

		<a href="/events" class="text-right bold block p-b-8">View more events</a>
		</div>
	</div>
<?php endif; 
	// echo "<pre>";
	// 	var_dump($futureEvents);
	// echo "</pre>";
	else :   ?>
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<main class="main small-12 cell" role="main">
		<?php get_template_part( 'parts/content', 'missing' ); ?>
		</main>  
	</div> <!-- end #inner-content -->
<?php endif; ?>															
	</div> <!-- end #content -->
<?php get_footer(); ?>