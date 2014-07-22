<?php
// hook the translation filters to change admin menu
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Posts',  'Blog Posts',  $translated );  // ireplace is PHP5 only
     return $translated;
}
//scripts strictly for top bar 'hello-bar' if not using, take this out to save overhead
//	function hellobar_scripts() {
//	    wp_register_script( 'hellobar_solo_js', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.js');
//	    wp_enqueue_script( 'hellobar_solo_js' );
//	}
//	add_action('wp_enqueue_scripts', 'hellobar_scripts');
//	
//	function hellobar_styles() {
//	    wp_register_style('hellobar_css', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.css');
//	    wp_enqueue_style( 'hellobar_css');
//	}
//	add_action('wp_enqueue_scripts', 'hellobar_styles');
//


//add script support at the child level so we don't call them in the parent if we don't need them


function pubspring_child_enqueue_scripts() {



wp_register_style('fontdeck', 'http://f.fontdeck.com/s/css/uH5+KWQnibDTJRYggGJ9XZLTAgw/jonfriedman.net/19658.css','1');
wp_enqueue_style( 'fontdeck');






}    
 
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');



?>