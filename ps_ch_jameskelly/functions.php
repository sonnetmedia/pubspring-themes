<?php 
// Unhook default Thematic functions
//function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
//remove_action( 'page_items', 'show_social_buttons', 10 );
//}
//add_action('init','unhook_pubspring_functions');





 function unhook_pubspring_setup_page() {
//remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
 }
add_action('init','unhook_pubspring_setup_page');


	//remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET

function pubspring_global_quotes() {

get_template_part('/content_snippets/quote','random'); }
 
//add_action('global_banner', 'pubspring_global_quotes', 1);
 
 

