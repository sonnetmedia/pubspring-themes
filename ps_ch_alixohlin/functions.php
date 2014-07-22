<?php 
 function unhook_pubspring_setup_page() {
remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
 }
add_action('init','unhook_pubspring_setup_page');


 
 
 
 
 
 
 
 