<?php 
 function unhook_pubspring_setup_page() {
	remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
	remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
	//Add back navbar, but with no arguments - this would be better as a variable, so change soon
	add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
	//remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
	remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
 }
add_action('init','unhook_pubspring_setup_page');

function pubspring_page_open_navbar_nonfixed(  ) { ?>
	<!-- Navbar
	   ================================================== -->
	<div class="container">
	<div class="navbar navbar-top">
		<?php get_template_part('nav', 'topbar'); ?>	
	 </div>
<?php  }
add_action('pubspring_setup_page', 'pubspring_page_open_navbar_nonfixed', 3, 1);
//	remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET 
function pubspring_child_enqueue_scripts() {
//	wp_register_script( 'jquery.backstretch.1.2.5.min.js', get_template_directory_uri() . '/js/jquery.backstretch.1.2.5.min.js', array('jquery'), '1.0.0.', true);
//	wp_enqueue_script( 'jquery.backstretch.1.2.5.min.js' );

//	wp_register_script('bootstrap-tooltip', 
//	get_template_directory_uri() . '/js/libs/bootstrap-tooltip.js', array('jquery'), '1.0.0.', true);
//	wp_enqueue_script('bootstrap-tooltip');		
	wp_register_script('flexslider', 
	get_template_directory_uri() . '/js/jquery.flexslider2-min.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('flexslider');
}    
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');

function javascript_functions() { 
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){
    		//jQuery.backstretch("/wp-content/themes/ps_ch_readswordsandsandals/images/bkgrnd-readswordsandsandals-v3.jpg", {speed: 100});	
//	$('.wp-post-image').tooltip();

	  // Can also be used with $(document).ready()
	    $('.flexslider').flexslider({
	      animation: "slide"
	    });
	
	
	$('li.show_list_categories').click(function(){
			$(".list_categories").show(100);
			$(this).addClass('active');
			$("li.show_list_authors, li.show_list_years").removeClass('active');
			$(".list_authors, .list_years").hide(100);	
		});
	
	
	$('li.show_list_authors').click(function(){
			$(".list_authors").show(100);
			$(this).addClass('active');
			$("li.show_list_categories, li.show_list_years").removeClass('active');
			$(".list_categories, .list_years").hide(100);
		});
	
	
	$('li.show_list_years').click(function(){
			$(".list_years").show(100);
			$(this).addClass('active');
			$("li.show_list_categories, li.show_list_authors").removeClass('active');
			$(".list_categories, .list_authors").hide(100);
		});
	$('a.show_hid').click(function(){
		$(".hid").slideToggle(600);
		$(".show_text").slideToggle(0);	
		});		
	$('.show-categories').click(function(){
		$(".category-list").slideToggle(600); //welcome message
		});	
    });
</script>
</div>
<?php //BEGIN 
}
add_action('wp_footer', 'javascript_functions');

function pubspring_books_page_list( $limit_books ) {
	if ( ! is_single() && ! is_tax()) {
		 get_template_part('/content_snippets/books','list'); 
	 }
 }
add_action('books_page_opening_tags', 'pubspring_books_page_list', 2, 1);

function ps_book_taxonomy() {

	if ( ! is_tax() ) {		
	global $post;
 echo get_the_term_list( $post->ID, 'series', '<span class="dig-in">Series</span> <h4>', '<br />', '</h4>' ); 
}
}
add_action('books_page_cat_tags', 'ps_book_taxonomy', 2, 1);

function pubspring_books_bottom_page_list() {
	if ( is_single() ) {
	
	echo '<h3> Other Swords & Sandals Books </h3>';
		 get_template_part('/content_snippets/books','list'); 
	 }
 }
add_action('books_page_closing_tags', 'pubspring_books_bottom_page_list', 2, 1);

function get_related_author() {
		$post_objects = get_field('sm_related_author');		
if ( $post_objects ) :
echo '<span class="no-margin">by <a href="/author/'.$post_objects->post_name.'">'.$post_objects->post_title.'</a></span>'; 
endif;		
 } 
//add_action('books_page_below_title', 'get_related_author', 10);
function sm_get_the_author() { ?>
		<p class="">by <?php  the_author_posts_link();    ?></span></p>
<?php  } 
add_action('books_page_below_title', 'sm_get_the_author', 10);

function sm_download_an_excerpt() { ?>
<?php $download_excerpt_pdf = get_field('sm_book_excerpt_pdf'); 
	  $download_excerpt_ebook = get_field('sm_book_excerpt_ebook'); 
?>
<?php if ( $download_excerpt_pdf ) { ?>
<a href="<?php echo $download_excerpt_pdf; ?>" class="btn">Download Sample (PDF)</a>

<?php }
if ( $download_excerpt_ebook ) { ?>

<a href="<?php echo $download_excerpt_ebook; ?>" class="btn">Download Sample (Ebook)</a>
								
<?php } } 

add_action('book_below_synopsis', 'sm_download_an_excerpt', 10);
function addUploadMimes($mimes) {
    $mimes = array_merge($mimes, array(
        'epub|mobi' => 'application/octet-stream'
    ));
    return $mimes;
}
add_filter('upload_mimes', 'addUploadMimes');
function sm_list_the_authors() { 
	get_template_part('/content_snippets/authors');
}
add_action('add_to_top_of_sidebar', 'sm_list_the_authors', 9);



function sm_list_series() {

$taxonomy     = 'series';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);
?>
<h6>Series</h6>
<ul class="upcoming">
<?php   wp_list_categories( $args );     ?>
</ul>
<?php 
}
add_action('add_to_top_of_sidebar', 'sm_list_series', 10);
add_action('add_to_homepage', 'sm_list_series', 10);

function sm_books_list() {

	$pubspring_books_list_output = 	get_template_part('/content_snippets/books','list');
	
	return $pubspring_books_list_output;
}
function sm_register_shortcodes(){
   add_shortcode('books-list', 'sm_books_list');
}
add_action( 'init', 'sm_register_shortcodes');


function sm_show_books_only($query) {

  if ( $query->is_tax() ) {
    $query->set('post_type', 'sm_books');    	
  }
  return $query;
  
}
// This filter will jump into the loop and arrange our results before they're returned
add_action('pre_get_posts','sm_show_books_only');


function sm_show_related_books() { ?>
<div class="related" style="margin-top: 2em;">
	<div class="entry-meta">
		<?php get_template_part('content_snippets/related', 'books'); ?>
	</div>
</div>
<?php }

add_action('single_below_post','sm_show_related_books');

function sm_show_related_posts() { ?>
<div class="related" style="margin-top: 2em;">
	<div class="entry-meta">
		<?php get_template_part('content_snippets/related', 'posts'); ?>
	</div>
</div>
<?php }

add_action('book_below_sharing','sm_show_related_posts');








function add_follow_buttons() { ?>

<!-- AddThis Follow BEGIN -->
<p>Follow Overlook</p>
<div class="addthis_toolbox addthis_32x32_style addthis_default_style">
<a class="addthis_button_facebook_follow" addthis:userid="overlookpress"></a>
<a class="addthis_button_twitter_follow" addthis:userid="overlookpress"></a>
<a class="addthis_button_tumblr_follow" addthis:userid="overlookpress"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
<!-- AddThis Follow END -->
<?php }
add_action('page_above_content','add_follow_buttons');




