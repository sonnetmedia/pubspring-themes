<?php
// hook the translation filters to change admin menu
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Posts',  'News/Blog',  $translated );  // ireplace is PHP5 only
     return $translated;
}
function pubspring_child_enqueue_scripts() {

	wp_register_script('bootstrap-dropdown', 
	get_template_directory_uri() . '/js/libs/bootstrap-dropdown.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-dropdown');
	
}     
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');

