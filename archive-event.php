<?php
/**
 * Displays event archive posts. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); 

$title = post_type_archive_title('', false);
$archive_page_ID = get_archive_page_id('events');	
$bgImage = (has_post_thumbnail($archive_page_ID) ? wp_get_attachment_image_src( get_post_thumbnail_id($archive_page_ID), 'large' ) : '' );	
?>
			
	<div class="content">
	<?php downPageBanner($title, $bgImage[0], date("jS F, Y"),  "Do this now!", '#'); ?>
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 cell bg-colour-beige p-t-3" role="main"> 
				<?php if (have_posts()) : 

					$allEvents = [];
					$today = date('Ymd');

					while (have_posts()) : 
					the_post(); 

					$eventDate = get_field('event_date', get_the_ID());
					$event = [];

					$event['post_title'] = get_the_title();
					$event['post_excerpt'] = get_the_excerpt();
					$event['guid'] = get_the_permalink();

					$event['event_thumbnail'] = get_field('event_thumbnail', get_the_ID()); 
					if(!empty($eventDate)):
						 $dateArray = explode('/', $eventDate);
						 //format all dates to strtotime,
						 $strDate = strtotime($dateArray[2] . '-' . $dateArray[1] . '-' . $dateArray[0]);
						 if($strDate > strtotime($today)):
							 $event['event_date_strtime'] = $strDate;
							 $event['event_date'] = date("jS F, Y", $strDate);
						 endif;
					else:
						//no event date set
						$date = new DateTime();
						$date->modify("+1 year");
						$event['event_date_strtime'] = strtotime($date->format('Ymd'));
						$event['event_date'] = 'No date is scheduled for this event yet.';
					endif;
					array_push($allEvents, $event); 
 				endwhile; 
				 
				function order_by_asc($event1, $event2){
					return $event1['event_date_strtime'] - $event2['event_date_strtime'];
				}
				usort($allEvents, 'order_by_asc');
				 
				foreach($allEvents as $key=>$event): ?>
	<?php 		include(locate_template('./parts/event-row.php', false, false) ); ?>

				<?php endforeach; ?>	
				<?php else : ?>		
					<?php get_template_part( 'parts/content', 'missing' ); ?>
				<?php endif; ?>
			</main> <!-- end #main -->
	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->
<?php get_footer(); ?>