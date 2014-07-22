<?php
// hook the translation filters to change admin menu
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Posts',  'Blog/News',  $translated );  // ireplace is PHP5 only
     return $translated;
}
//add script support at the child level so we don't call them in the parent if we don't need them

function pubspring_child_enqueue_scripts() {
	wp_register_script( 'jquery.cycle.lite.min.js', 
	get_template_directory_uri() . '/js/jquery.cycle.lite.min.js');
	wp_enqueue_script( 'jquery.cycle.lite.min.js' );
	
}     
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');
?><?php 
function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){

    $('.slideshow_quote').cycle({
		fx: 'fade', timeout:  6000, speed:  800 
	});
});
</script>
<style>

.quote, .quote p, .quote_large, .sidebar-box h6  {
  color: #897c65;
  
}

.quote_attribution a {
	color: #555;
}

</style>


<?php 
}
add_action('wp_head', 'wp_cycle_args');

//scripts strictly for top bar 'hello-bar' if not using, take this out to save overhead
	// function hellobar_scripts() {
	//     wp_register_script( 'hellobar_solo_js', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.js');
	//     wp_enqueue_script( 'hellobar_solo_js' );
	// }
	// add_action('wp_enqueue_scripts', 'hellobar_scripts');
	
	// function hellobar_styles() {
	//     wp_register_style('hellobar_css', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.css');
	//     wp_enqueue_style( 'hellobar_css');
	// }
	// add_action('wp_enqueue_scripts', 'hellobar_styles');
	
	
	add_filter( 'gettext', 'krogs_event_change_venue_name', 20, 3 );
/**
 * Change comment form default field names.
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function krogs_event_change_venue_name( $translated_text, $text, $domain ) {
        if ( $translated_text == 'No upcoming events' && $domain == 'tribe-events-calendar' ) {
                $translated_text = __( '<br /><h3>Upcoming events planned. Details to be announced shortly</h3>', 'tribe-events-calendar' );
        } 
    return $translated_text;
}
