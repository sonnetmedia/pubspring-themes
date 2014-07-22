<?php 
//THE FOLLOWING MANIPULATES THE QUERY SO WE CAN USE FUTURE POSTS (PUB DATE FOR BOOKS)
add_action( 'pre_get_posts', 'show_future_books' );
function show_future_books( $query ) {
        if ( ! is_admin() && is_post_type_archive() ) {
        	$query->query_vars['post_status'] = array( 'publish', 'future'  ); 
               return;
       } 
}



add_filter('the_posts', 'show_future_posts');

function show_future_posts($posts)
{
   global $wp_query, $wpdb;

   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }

   return $posts;
}

// if ( is_plugin_active('the-events-calendar/the-events-calendar.php') ) {
	

// function is_events_page() {
//         return (tribe_is_event() or tribe_is_venue());
// }

// }
