<?php 
function pubspring_child_enqueue_scripts() {
wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );
}    
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');
 function unhook_pubspring_setup_page() {
remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
//remove_action( 'page_items', 'show_social_buttons', 10 );
 }
add_action('init','unhook_pubspring_setup_page');
//remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET
function pubspring_global_quotes() {
if ( is_front_page() ) {
get_template_part('/content_snippets/quote','random_featured'); }
 }
add_action('global_banner', 'pubspring_global_quotes', 1);
function javascript_functions() { 
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){
    		jQuery.backstretch("/wp-content/themes/ps_ch_timhorvath/images/horvath_cave_sepia_v2.jpg", {speed: 0});
    });
</script>
<?php //BEGIN 
}
add_action('wp_footer', 'javascript_functions');