<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>
			
	<div class="content">
	
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
						$event['event_date'] = 'No event date is set.';
					endif;
					array_push($allEvents, $event); 
 				 endwhile; 
				 
				 function order_by_asc($event1, $event2){
					return $event1['event_date_strtime'] - $event2['event_date_strtime'];
				}
				usort($allEvents, 'order_by_asc');
				// echo "<pre>";
				// print_r($allEvents);
				 
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