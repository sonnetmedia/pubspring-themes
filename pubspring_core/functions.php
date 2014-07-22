<?php
//BOOTSTRAP MENU
add_action( 'after_setup_theme', 'bootstrap_setup' );
	if ( ! function_exists( 'bootstrap_setup' ) ):
		function bootstrap_setup() {
		 	get_template_part('/inc/walker', 'bootstrap'); 
		}
	endif;
//END BOOTSTRAP MENU
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





function pubspring_page_open_navbar( $visibility ) { ?>


	<!-- Navbar
	   ================================================== -->
	<div class="navbar navbar-static <?php echo $visibility; ?>">
	
		<?php get_template_part('nav', 'topbar'); ?>
	
	 </div>
	
<?php  }

add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);


function pubspring_page_open() { ?>

	<div class="wrapper" style="clear:both;">	

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open', 5);


function pubspring_page_open_banner() { ?>

	<?php get_template_part('nav', 'banner'); ?>

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);





function pubspring_enqueue_scripts() {

	wp_register_script('bootstrap-collapse', 
	get_template_directory_uri() . '/js/libs/bootstrap-collapse.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-collapse');

	wp_register_script('bootstrap-dropdown', 
	get_template_directory_uri() . '/js/libs/bootstrap-dropdown.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-dropdown');
	
}     
add_action('wp_enqueue_scripts', 'pubspring_enqueue_scripts');


function core_js_functions() { 
//END PHP to show script?>
<script type="text/javascript">
jQuery(document).ready(function($){
	
	
	 // jQuery SmoothScroll | Version 09-11-02
	    $('a[href*=#]').not('a[href=#tag_search_tool]')
	                   .not('a[href=#chapter_search_tool]')
	                   .click(function() {
	
	        // duration in ms
	        var duration = 1200;
	
	        // easing values: swing | linear
	        var easing = 'swing';
	
	        // get / set parameters
	        var newHash = this.hash;
	        var target = $(this.hash).offset().top;
	        var oldLocation = window.location.href.replace(window.location.hash, '');
	        var newLocation = this;
	
	        // make sure it's the same location
	        if (oldLocation + newHash == newLocation)
	        {
	            // animate to target and set the hash to the window.location after the animation
	            $('html:not(:animated),body:not(:animated)').animate({
	                scrollTop: target
	            },
	            duration, easing,
	            function() {
	
	                // add new hash to the browser location
	                window.location.href = newLocation;
	            });
	
	            // cancel default click action
	            return false;
	        }
	
	    });	

	
    });
    

</script>

<?php //BEGIN 
}
add_action('wp_footer', 'core_js_functions');


// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-global',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '',
		'after_title' => ''
	));
}
// create widget areas: sidebar, footer
$sidebars = array('Blog Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-blog',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}

// create widget areas: sidebar, footer
$sidebars = array('Front-page Widgets');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'frontpage-widget',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
}


?><?php 
// return entry meta information for posts, used by multiple loops.
function pubspring_book_sharing() {
	 ?><!-- AddThis Button BEGIN -->

<script type="text/javascript">
addthis.counter("#atcounter");
var addthis_config =
{
   ui_508_compliant: true
}

var addthis_share = 
{ 
// ...
    templates: {
                   twitter: 'Check out {{title}} {{url}}',
               }
}
</script>




<div class="addthis_toolbox addthis_default_style " addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>" >
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f6b87be4180e916&domready=1"></script>
<!-- AddThis Button END -->

<br />

					        <a href="http://www.goodreads.com/update_status?isbn=0<?php the_field('isbn'); ?>&url=<?php the_permalink(); ?>" target="_blank"><img alt="Share on Goodreads" style="height:30px;" border="0" src="<?php echo get_template_directory_uri(); ?>/images/booksellers/goodreads-badge-add-plus-2d25bb0f32eeac8660c13a521cf00c8e.png" /></a>
	        <script src="http://www.goodreads.com/javascripts/widgets/update_status.js" type="text/javascript"></script>
	    




<?php } ?><?php 
// return entry meta information for posts, used by multiple loops.
function pubspring_entry_meta() {
	 ?>
	 
	 <div class="meta" style="margin-bottom: 3em;">
			
				<div class="bar-frame">
							
							
									<div class="date">
				
											
										<p class="quote_small">
										Published: <br /> 
				<span class="day"><?php the_time('d') ?></span>-<span class="month"><?php the_time('M') ?></span>-<span class="year"><?php the_time('Y') ?></span>
										</p>
									</div> 
									
									<div class="categories">
									
												<p class="quote_small"><?php the_tags(); ?></p>
												
												
												<hr class="blend-in" />
				
										<p class="quote_small">Category: 
											<?php the_category(' '); ?>
											</p>
										 
									</div> 
												</div>

			</div>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>
<!-- AddThis Button END -->










			
			
			<?php }
/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}
// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);
//Hides iOS chrome on mobile safari for a more app-like experience on iPhones.
function add_ios_functions()
{

echo"
<script>if(navigator.userAgent.indexOf('iPhone') != -1){addEventListener('load',function(){setTimeout(hideURLbar, 0);}, false);}function hideURLbar(){window.scrollTo(0, 1);}</script>
";

}
add_action('wp_head', 'add_ios_functions');
// Load up our theme options page and related code.
//	require( get_template_directory() . '/inc/theme-options.php' );
	

// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

// tell the TinyMCE editor to use editor-style.css
  // if you have issues with getting the editor to show your changes then
  // use this instead: add_editor_style('editor-style.css?' . time());
  add_editor_style('editor-style.css');
  

function featured_image_with_caption( $image_size ) {
	echo '<div class="featured-image">';
	the_post_thumbnail( $image_size, array('class' => 'image-shadow'));
	echo '<br /><small class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</small>';
	echo '</div>';
}

add_action('captioned_images', 'featured_image_with_caption', 1);

//-------


// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_reviews_columns', 'sm_reviews_columns' ) ;

function sm_reviews_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title/Reference' ),
		'related_books' => __( 'Book' ),
				'review_attribution' => __( 'Attribution' ),
	);

	return $columns;
}


// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_writing_columns', 'sm_writing_columns' ) ;

function sm_writing_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title/Reference' ),
		'publications' => __( 'Publication' ),
				'date' => __( 'Date' ),
	);

	return $columns;
}


// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_books_columns', 'sm_books_columns' ) ;

function sm_books_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'cover_image' => __( 'Cover Image' ),
		'isbn' => __( 'ISBN' ),
		'isbn_digital' => __( 'ISBN Digital' ),
		'date' => __( 'Pub Date' ),
	);

	return $columns;
}


function custom_columns( $column, $post_id ) {
  switch ( $column ) {

	case "related_books":
	$related_book = get_field('related_book'); 
	echo '<a href="/wp-admin/post.php?post=' . get_post_meta( $post_id,'related_book', true)  . '&action=edit">' . get_the_title($related_book->ID) . ' </a>';	
	
	  break;
	  
	      case "review_attribution":
      echo get_post_meta( $post_id, 'attribution', true);
      break;

	      case "publications":
      echo get_post_meta( $post_id, 'publication', true);
      break;

	      case "isbn":
      echo get_post_meta( $post_id, 'isbn', true);
      break;

	      case "isbn_digital":
      echo get_post_meta( $post_id, 'isbn_digital', true);
      break;
	 	  
	 	  
	 	  case 'cover_image' :
	 	  
//	$cover_image = get_field('cover_image'); 
	echo '<img src="' . get_field('cover_image') . '" style="height:90px;"/>';	

  }
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

// Make these columns sortable
function sortable_columns() {
  return array(
    'related_books'      => 'related_books',
  );
}

add_filter( "manage_edit-sm_reviews_sortable_columns", "sortable_columns" );


// Make these columns sortable
function sortable_columns_writing() {
  return array(
    'publications'      => 'publications',
  );
}

add_filter( "manage_edit-sm_writing_sortable_columns", "sortable_columns_writing" );
function theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'print-styles', 
    get_template_directory_uri() . '/css/print.css', 
    array(), 
    '120820', 
    'print' );

  // enqueing:
  wp_enqueue_style( 'print-styles' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

//RELATED QUOTE
function related_quote() {
get_template_part('inc/related', 'review');
  }
 // Converts ISBN-13 to ISBN-10
// Leaves ISBN-10 numbers (or anything else not matching 13 consecutive numbers) alone
function ISBN13toISBN10($isbn) {
    if (preg_match('/^\d{3}(\d{9})\d$/', $isbn, $m)) {
        $sequence = $m[1];
        $sum = 0;
        $mul = 10;
        for ($i = 0; $i < 9; $i++) {
            $sum = $sum + ($mul * (int) $sequence{$i});
            $mul--;
        }
        $mod = 11 - ($sum%11);
        if ($mod == 10) {
            $mod = "X";
        }
        else if ($mod == 11) {
            $mod = 0;
        }
        $isbn = $sequence.$mod;
    }
    return $isbn;
}




 //THE FOLLOWING MANIPULATES THE QUERY SO WE CAN USE FUTURE POSTS (PUB DATE FOR BOOKS)
 add_action( 'pre_get_posts', 'show_future_books' );
 function show_future_books( $query ) {
         if ( ! is_admin() && is_post_type_archive() ) {
         	$query->query_vars['post_status'] = array( 'publish', 'future'  ); 
                return;
        } 
 }
 
 
 
 add_filter('the_posts', 'show_future_posts');
 
 function show_future_posts($posts)
 {
    global $wp_query, $wpdb;
 
    if(is_single() && $wp_query->post_count == 0)
    {
       $posts = $wpdb->get_results($wp_query->request);
    }
 
    return $posts;
 }
 
 
 
 
 
get_template_part('inc/widget_books');






add_action( 'init', 'create_book_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {

register_taxonomy( 'sm_books_cat', array (
  0 => 'sm_books',
),array( 'hierarchical' => true, 'label' => 'Category','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'featured'),'singular_label' => 'Category') );
}
//////// CREATE AN OPTIONS PAGE WHERE USERS CAN INPUT GLOBAL INFORMATION
if ( function_exists("register_options_page") ) {
    register_options_page('Social Media Accounts');
}
//////// PULL IN THE SOCIAL MEDIA ACCOUNTS FIELDS FOR THE OPTIONS PAGE
get_template_part('inc/acf','fields');
//////// CREATE THE BUTTONS ON THE FRONT-END (RIGHT NOW FOR FB AND TWITTER ONLY)
function show_social_buttons() { ?>
<ul id="social_buttons" class="hidden-phone hidden-tablet">	
	<?php  
	if(get_field('sm_social_accounts', 'options'))
	{
		while(the_repeater_field('sm_social_accounts', 'options'))
		{
		echo '<li id="'.  get_sub_field('sm_social_account_name') .'_icon">';
		echo '<a href="https://' .  get_sub_field('sm_social_account_name') .'.com/' .  get_sub_field('sm_social_user_name') . '">'.  get_sub_field('sm_social_account_name') .'</a>';
		echo '</li>';
		}
	}    
	?>
	</ul>
<?php  }
add_action( 'page_items', 'show_social_buttons', 10 );