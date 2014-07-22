<?php
// hook the translation filters to change admin menu
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Posts',  'Blog Posts',  $translated );  // ireplace is PHP5 only
     return $translated;
}
//scripts strictly for top bar 'hello-bar' if not using, take this out to save overhead
	function hellobar_scripts() {
	    wp_register_script( 'hellobar_solo_js', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.js');
	    wp_enqueue_script( 'hellobar_solo_js' );
	}
	add_action('wp_enqueue_scripts', 'hellobar_scripts');
	
	function hellobar_styles() {
	    wp_register_style('hellobar_css', get_stylesheet_directory_uri() . '/custom/hellobar-solo/hellobar.css');
	    wp_enqueue_style( 'hellobar_css');
	}
	add_action('wp_enqueue_scripts', 'hellobar_styles');




//add script support at the child level so we don't call them in the parent if we don't need them


function pubspring_child_enqueue_scripts() {

wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );


wp_register_script( 'jquery.cycle.lite.min.js', get_template_directory_uri() . '/js/jquery.cycle.lite.min.js', array('jquery'), '1.0.0.', true);
wp_enqueue_script( 'jquery.cycle.lite.min.js' );



}    
 
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');



?><?php function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){

    $('.slideshow_quote').cycle({
		fx: 'fade', timeout:  9000, speed:  800 
	});

jQuery.backstretch("http://thewarattheshore.com/files/2012/05/atlantic_city_2980x1400_66_60.jpg", {speed: 150});
});
</script>
<?php }
add_action('wp_footer', 'wp_cycle_args');
	 ?>