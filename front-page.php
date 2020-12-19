<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>
			
	<div class="content">
 		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-12 cell" role="main">

		    <?php 
            $today = date('Ymd');
            $allEvents = wp_get_recent_posts(array(
              'numberpost' => -1,
			  'post_type' => 'event',
			  'post_status' => 'publish',
			));

			if(count($allEvents)):
			//display only future dates from today.
				$futureEvents = [];

				foreach($allEvents as $key=>$event):
					$eventDate = get_field("event_date", $event['ID']);
					$dateArray = explode("/", $eventDate);
					//format all dates to strtotime,
					$strDate = strtotime($dateArray[2] . '-' . $dateArray[1] . '-' . $dateArray[0]);
					if($strDate > strtotime($today)):
						$event['event_date_strtime'] = $strDate;
						$event['event_date'] = $eventDate ;
						//get post thumbnail
						$event['thumbnail'] = get_the_post_thumbnail_url($event['ID']);
						array_push($futureEvents, $event); 
					endif;
				endforeach;	

			//order them in ascending date order.
			function order_by_asc($event1, $event2){
				return $event1['event_date_strtime'] - $event2['event_date_strtime'];
			}

			  usort($futureEvents, 'order_by_asc');
			//$futureEvents = getFutureEvents();
			
			echo "<pre>";
				var_dump($futureEvents);
			echo "</pre>";
			//	get_template_part('parts/content', 'event');
				 
			else :   
			  get_template_part( 'parts/content', 'missing' );  
						
			endif; ?>															
		    </main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->
<?php get_footer(); ?>