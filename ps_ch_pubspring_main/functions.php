<?php 
 function unhook_pubspring_setup_page() {
remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
	add_theme_support( 'post-thumbnails', array( 'sm_projects' ) );          // adding additional post type
 }
add_action('init','unhook_pubspring_setup_page');

//remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET 
		
function alt_header() {?>
	
	 <!-- NAVBAR
	    ================================================== -->
	    <div class="navbar-wrapper">
	      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
	      <div class="container">
	        <?php get_template_part('nav','overlay'); ?>	
	      </div> <!-- /.container -->
	    </div><!-- /.navbar-wrapper -->
	    
	        <?php 
	        if ( is_page('home') ){
	        get_template_part('carousel'); 
	        }
	        else {
	add_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
	        }
	        
	        
	        ?>
<?php }
	add_action('wp_head','alt_header');
	

function add_to_header() { 

if (! is_front_page()){
?>

<link rel="prefetch" href="http://pubspring.us" />


<?php } }
add_action('wp_head', 'add_to_header');


function pubspring_setup_ch() {
	register_nav_menus(array(
		'primary_navigation_home' => __('Primary Navigation', 'pubspring'),
	));	
}
add_action('after_setup_theme', 'pubspring_setup_ch');

	
function ps_child_scripts() { ?>
<script type="text/javascript">
jQuery(document).ready(function($){

$('a').smoothScroll();

$('#myCarouselTK').carousel({
  interval: 7000
});
});
</script>
<?php }

	add_action('wp_footer','ps_child_scripts', 20);
	
	// create widget areas: 
	$sidebars = array('Front Page EMAIL');
	foreach ($sidebars as $sidebar) {
		register_sidebar(array('name'=> $sidebar,
		  'id' => 'sidebar-email',
			'before_widget' => '<div class="frontpage">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}
	
	// create widget areas: sidebar, footer
	$sidebars = array('Sidebar Support');
	foreach ($sidebars as $sidebar) {
		register_sidebar(array('name'=> $sidebar,
		  'id' => 'sidebar-support',
			'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section  dig-in">',
			'after_widget' => '</div></article>',
			'before_title' => '<h6>',
			'after_title' => '</h6>'
		));
	}
	
// create widget areas: 
$sidebars = array('Page First Column');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-column',
		'before_widget' => '<div class="sidebar-section dig-in">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
	
	
	///// WIDOW CONTROL
	function widont($str = '')
	{
		$str = rtrim($str);
		$space = strrpos($str, ' ');
		if ($space !== false)
		{
			$str = substr($str, 0, $space).'&nbsp;'.substr($str, $space + 1);
		}
		return $str;
	}
	
	add_filter('the_title', 'widont');
	