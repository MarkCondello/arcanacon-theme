<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); 
$title = get_the_title();
$bgImage = get_the_post_thumbnail_url(get_the_ID(), 'downpage-banner');
$eventDate = get_field('event_date', get_the_ID());
$ctaText = get_field('cta_text', get_the_ID());
$ctaLink = get_field('cta_link', get_the_ID());
?>
			
<div class="content">
	<div class="inner-content grid-x">
		<main class="main small-12" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 		    	<!-- <?php //get_template_part( 'parts/loop', 'single' ); ?> -->
				 <?php downPageBanner($title, $bgImage, $eventDate, $ctaText, $ctaLink); ?>  
				<?= the_content(); ?>
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

 
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>