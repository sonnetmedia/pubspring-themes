<?php 
 function unhook_pubspring_setup_page() {
remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
add_action('pubspring_setup_page', 'pubspring_navbar_nofixed', 3, 1);
//remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
 }
add_action('init','unhook_pubspring_setup_page');


//	remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET

// function pubspring_books_page_list() { get_template_part('/content_snippets/books','list'); }
 
 //add_action('pubspring_add_books', 'pubspring_books_page_list', 1);
 
 