<?php  

function ajax_options()
{
     $var = get_option('my_var');
 
 $post_permalink = get_permalink(); 
 $args = array( 
 	'post_type' => 'sm_endnotes', 
 	'posts_per_page' => -1, 
 	'orderby' => 'date' , 
 	'order' => 'asc', 
 		
 	
 	
  );
 $endnote_query = new WP_Query( $args );
 
 
 
 
 
 
     echo json_encode($endnote_query);
     die();
     

}
    ?>