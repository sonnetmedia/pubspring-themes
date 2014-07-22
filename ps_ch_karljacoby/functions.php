<?php 
 function unhook_pubspring_setup_page() {
remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
add_action('pubspring_setup_page', 'pubspring_navbar_nofixed', 3, 1);
 }
add_action('init','unhook_pubspring_setup_page');


 
 
 function javascript_functions() { 
 //END PHP to show script?>
 <script type="text/javascript">
 jQuery(document).ready(function($){
 
     		jQuery.backstretch("/wp-content/themes/ps_ch_karljacoby/images/iStock_000008557617Large_2100x1375.jpg", {speed: 0});
 	
     });
 
 </script>
 
 <?php //BEGIN 
 }
// add_action('wp_footer', 'javascript_functions');
 
 function pubspring_child_enqueue_scripts() {
 	wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
 wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );
 
 }    
 //add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');