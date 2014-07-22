<?php  function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more($more) {
       global $post;
	return ' <a href="'. get_permalink($post->ID) . '">Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



// Unhook default Thematic functions
function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
//    remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
    remove_action('pubspring_setup_page', 'pubspring_navbar_nofixed', 3, 1);
remove_action( 'page_items', 'show_social_buttons', 10 );
}
add_action('init','unhook_pubspring_functions');