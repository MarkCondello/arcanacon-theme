<?php 
$today = date('Ymd');
$allEvents = wp_get_recent_posts(array(
    'numberpost' => -1,
    'post_type' => 'event',
    'post_status' => 'publish',
));
$futureEvents = [];

if(count($allEvents)):
    //display only future dates from today.
    foreach($allEvents as $key=>$event):
        $eventDate = get_field('event_date', $event['ID']);

       // die($eventDate);
        if(!empty($eventDate)):
            $dateArray = explode('/', $eventDate);
            //format all dates to strtotime,
            $strDate = strtotime($dateArray[2] . '-' . $dateArray[1] . '-' . $dateArray[0]);
            if($strDate > strtotime($today)):
                $event['event_date_strtime'] = $strDate;
                $event['event_date'] = date("jS F, Y", strtotime($eventDate));
                $event['event_thumbnail'] = get_field('event_thumbnail', $event['ID']); 
                array_push($futureEvents, $event); 
            endif;
        endif;
    endforeach;	
    //order events in ascending date order.
    if(count($futureEvents)):
        function order_by_asc($event1, $event2){
            return $event1['event_date_strtime'] - $event2['event_date_strtime'];
        }
        usort($futureEvents, 'order_by_asc');
        //get the banner image and CTA details for next event 
        $futureEvents[0]['banner_image'] = get_the_post_thumbnail_url($futureEvents[0]['ID'] );
        $futureEvents[0]['cta_text'] = get_field('cta_text', $futureEvents[0]['ID']);
        $futureEvents[0]['cta_link'] = get_field('cta_link', $futureEvents[0]['ID']);
    endif;
endif;
?>