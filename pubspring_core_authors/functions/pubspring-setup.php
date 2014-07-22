<?php  
function pubspring_setup() {
	// Add language supports. Please note that PubSpring Framework does not include language files.
	load_theme_textdomain('pubspring', get_template_directory() . '/lang');
	
		// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
//	add_theme_support('post-thumbnails');
	add_theme_support( 'post-thumbnails', array( 'post', 'page' , 'sm_books') );

	// set_post_thumbnail_size(150, 150, false);
	
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)	
	// additional image sizes

	add_image_size( 'category-thumb', 120, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'category-small', 220, 9999 ); //300 pixels wide (and unlimited height)	
	add_image_size( 'category-medium', 540, 9999 ); //300 pixels wide (and unlimited height)	
	add_image_size( 'category-large', 900, 9999 ); //300 pixels wide (and unlimited height)
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('aside'));
		add_theme_support('post-formats', array('video', 'status'));
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'pubspring'),
		'utility_navigation' => __('Utility Navigation', 'pubspring')
	));	
}
add_action('after_setup_theme', 'pubspring_setup');

if ( ! isset( $content_width ) ) $content_width = 600;
