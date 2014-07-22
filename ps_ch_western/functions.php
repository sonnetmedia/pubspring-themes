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
<?php 
}
add_action('wp_head', 'wp_cycle_args');



function new_excerpt_more($more) {
       global $post;
	return '...<br /><a href="'. get_permalink($post->ID) . '" class="small">&raquo; read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );




// create widget areas: 
$sidebars = array('Front Page');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-frontpage',
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="frontpage twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

