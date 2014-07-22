<?php
require_once('functions/walker-bootstrap.php');
function pubspring_setup() {
	// Add language supports. Please note that PubSpring Framework does not include language files.
	load_theme_textdomain('pubspring', get_template_directory() . '/lang');
	
		// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
//	add_theme_support('post-thumbnails');
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	// set_post_thumbnail_size(150, 150, false);
	
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)	
	// additional image sizes
	add_image_size( 'category-small', 140, 9999 ); //300 pixels wide (and unlimited height)	
	add_image_size( 'category-thumb', 220, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'category-large', 300, 9999 ); //300 pixels wide (and unlimited height)
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'pubspring'),
		'utility_navigation' => __('Utility Navigation', 'pubspring'),
		'sub_navigation_writings' => __('Writings Page', 'pubspring')
	));	
}
add_action('after_setup_theme', 'pubspring_setup');

function pubspring_enqueue_scripts() {

	wp_register_script('bootstrap-collapse', 
	get_template_directory_uri() . '/js/libs/bootstrap-collapse.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-collapse');

	wp_register_script('bootstrap-modal', 
	get_template_directory_uri() . '/js/libs/bootstrap-modal.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-modal');
	
}     
add_action('wp_enqueue_scripts', 'pubspring_enqueue_scripts');



// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-global',
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}
// create widget areas: sidebar, footer
$sidebars = array('Blog Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-blog',
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}


$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-footer',
		'before_widget' => '<article id="%1$s" class="hide-on-phones four columns widget %2$s"><div class="footer-section">',
		'after_widget' => '</div></article>',
		'before_title' => '',
		'after_title' => ''
	));
}

?>
<?php 
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
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>
<!-- AddThis Button END -->

<br />

					        <a href="http://www.goodreads.com/update_status?isbn=0<?php the_field('isbn'); ?>&url=<?php the_permalink(); ?>" target="_blank"><img alt="Share on Goodreads" style="height:30px;" border="0" src="<?php echo get_template_directory_uri(); ?>/images/booksellers/goodreads-badge-add-plus-2d25bb0f32eeac8660c13a521cf00c8e.png" /></a>
	        <script src="http://www.goodreads.com/javascripts/widgets/update_status.js" type="text/javascript"></script>
	    




<?php } ?><?php 
// return entry meta information for posts, used by multiple loops.
function pubspring_entry_meta() {
	 ?><div class="" style="margin-top: 3px;">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>

</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>
<!-- AddThis Button END -->
					</div>					
	 <div class="meta" style="margin-bottom: 3em;">
			
				<div class="bar-frame">
			
			
					<div class="date">
						<strong class="day"><?php the_time('d') ?></strong>
							
						<div class="holder">
							<span class="month"><?php the_time('M') ?></span>
							<span class="year"><?php the_time('Y') ?></span>
						</div>
					</div> 
					<div class="categories">
						<strong class="title">POSTED IN</strong> 
						
							<?php the_category(' '); ?>
						 
					</div> 
								</div>

			</div>
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
function add_header_functions() { ?>

<script>if(navigator.userAgent.indexOf('iPhone') != -1){addEventListener('load',function(){setTimeout(hideURLbar, 0);}, false);}function hideURLbar(){window.scrollTo(0, 1);}</script>
<script>
  document.createElement('header');
  document.createElement('nav');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('footer');
</script>

<?php }
add_action('wp_head', 'add_header_functions');
// Load up our theme options page and related code.
//	require( get_template_directory() . '/inc/theme-options.php' );
	


//add support for custom post types in the loop - commenting out for now
//add_filter( 'pre_get_posts', 'my_get_posts' );function my_get_posts( $query ) {if ( is_home() && $query->is_main_query() ) $query->set( 'post_type', array( 'post', 'page', 'books', 'reviews', 'writing' ) ); return $query;}



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
//Add support for captioned images
function featured_image_with_caption_small() {
	echo '<div class="featured-image flow_left category-small">';
	the_post_thumbnail('category-small', array('class' => 'shadow'));
	echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}
function featured_image_with_caption_medium() {
	echo '<div class="featured-image flow_left category-medium">';
	the_post_thumbnail('category-medium', array('class' => 'shadow'));
	echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}
function featured_image_with_caption_large() {
	echo '<div class="featured-image flow_left category-large">';
	the_post_thumbnail('category-large', array('class' => 'shadow'));
	echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}




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
get_template_part('inc/widget', 'sidebar_books');
require_once('functions/isbn13-to-isbn10.php');