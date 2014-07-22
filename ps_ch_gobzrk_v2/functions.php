<?php 
function pubspring_child_enqueue_scripts() {
	wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.2.0.3.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );

}    
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');


function javascript_functions() { 
//50900
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){

    		jQuery.backstretch("/files/2013/04/iStock_000005479773Large.jpg", {fade: 100});    		
	
	
//	$('#video, .delayed-exit-long').addClass('animated fadeOut');
//	$('.navbanner h1, .delayed-entry, .delayed-entry-long').addClass('animated fadeIn');	
	
    });

</script>

<?php //BEGIN 
}
add_action('wp_footer', 'javascript_functions');



// Unhook default Thematic functions
function unhook_pubspring_functions() {
    // Don't forget the position number if the original function has one
    remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
//remove_action( 'page_items', 'show_social_buttons', 10 );
}
add_action('init','unhook_pubspring_functions');