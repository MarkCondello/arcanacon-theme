<?php
get_header();
include get_theme_file_path('/parts/get-future-events.php'); ?>
<div class="content">
<?php
if ($futureEvents): ?>
	<div class="banner-container">
		<div class="banner" style="background-image: url('<?= $futureEvents[0]['banner_image'] ?>');">
			<div class="banner-content">
				<div class="grid-container h-100">
					<div class="grid-y grid-padding-y align-justify h-100">
						<div class="small-6 medium-9 cell"> 
							<h1 class="l-height-1">
								<a href="<?= $futureEvents[0]['guid']; ?>"><?= $futureEvents[0]['post_title'] ?></a>
							</h1>
							<p class="ff-super-reg">
								<i class="fal fa-calendar-alt"></i>
								<?= $futureEvents[0]['event_date'] ?>
							</p>
						</div>
						<div class="small-6 medium-3 cell"> 
<?php 			if(!empty($futureEvents[0]['cta_text']) &&  !empty($futureEvents[0]['cta_link'])): ?>
							<a href="<?= $futureEvents[0]['cta_link'] ?>" target="_blank" class="cta"><?= $futureEvents[0]['cta_text'] ?></a>
<?php 			endif; ?>
							<h2 class="h3 m-t-1">Don't miss a turn!</h2>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="banner-abstract">
			<div class="grid-container h-100">
				<div class="grid-x h-100">
					<div class="small-12 medium-8"> 
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
	if (have_posts()):
		while (have_posts()):
			the_post();
			the_content();
		endwhile;
	endif;
	if (count($futureEvents) > 1): ?>
		<div class="bg-colour-beige future-events">
			<div class="grid-container">
<?php
		foreach($futureEvents as $key => $event):
			if ($key < 3):
				include(locate_template('./parts/event-row.php', false, false));
			endif;
		endforeach; ?>
				<a href="/events" class="text-right bold block p-b-8">View more events</a>
			</div>
		</div>
<?php
	endif;
else : // else no $futureEvents ?>
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<main class="main small-12 cell" role="main">
<?php get_template_part( 'parts/content', 'missing' ); ?>
		</main>
	</div>
<?php
endif; ?>
</div> <!-- end .content -->
<?php get_footer(); ?>