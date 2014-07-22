<?php
  add_editor_style('editor-mod.css');
//CUSTOM TAXONOMIES
register_taxonomy(
	'endnote_chapters',
	array ( 0 => 'sm_endnotes',),
	array( 
	 'hierarchical' => true, 
	 'label' => 'Chapters',
	 'show_ui' => true,
	 'show_in_nav_menus' => true,
	 'query_var' => true,
	 'rewrite' => array('slug' => 'dearienotes-chapters',	 'with_front' => false, 'hierarchical' => true),
	 'singular_label' => 'chapters') 
 );

//CUSTOM POST TYPE

register_post_type('sm_endnotes', array(	'label' => 'End Notes','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'dearienotes'),'query_var' => true,'has_archive' => true,'supports' => array('title','editor','excerpt','custom-fields','author','page-attributes',),'taxonomies' => array('post_tag',),'labels' => array (
  'name' => 'Dearie End Notes',
  'singular_name' => 'End Note',
  'menu_name' => 'End Notes',
  'add_new' => 'Add End Note',
  'add_new_item' => 'Add New End Note',
  'edit' => 'Edit',
  'edit_item' => 'Edit End Note',
  'new_item' => 'New End Note',
  'view' => 'View End Note',
  'view_item' => 'View End Note',
  'search_items' => 'Search End Notes',
  'not_found' => 'No End Notes Found',
  'not_found_in_trash' => 'No End Notes Found in Trash',
  'parent' => 'Parent End Note',
),) );


// source: http://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page?replies=40
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_tag()) {
  
  
  
    $post_type = get_query_var('post_type');
    
    
	if($post_type)
	    $post_type = $post_type;
	
	
	else
	    $post_type = array('post','sm_endnotes', 'nav_menu_item'); // replace cpt to your custom post type
//	    $post_type = array('post','sm_endnotes', 'nav_menu_item'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
	return $query;
    }




}



//function sm_display_custom_taxonomies() {}



add_action('init', 'add_taxonomy_objects');

function add_taxonomy_objects() {
register_taxonomy_for_object_type('post_tag', 'sm_endnotes');



}









//CUSTOM FIELDS
if(function_exists("register_field_group"))
{
register_field_group(array (
  'id' => '4ff2548e758bc',
  'title' => 'Note Data',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_4ff1bef89d9fe',
      'label' => 'Key Number',
      'name' => 'endnote-key_number',
      'type' => 'text',
      'instructions' => '',
      'required' => '0',
      'default_value' => '',
      'formatting' => 'none',
      'order_no' => '0',
    ),
    1 => 
    array (
      'key' => 'field_4ff1bef89e18c',
      'label' => 'Chapter Number',
      'name' => 'endnote-chapter',
      'type' => 'text',
      'instructions' => '',
      'required' => '0',
      'default_value' => '',
      'formatting' => 'none',
      'order_no' => '1',
    ),
    2 => 
    array (
      'key' => 'field_4ff1bef89e744',
      'label' => 'Chapter Name',
      'name' => 'endnote-chapter_name',
      'type' => 'text',
      'instructions' => '',
      'required' => '0',
      'default_value' => '',
      'formatting' => 'none',
      'order_no' => '2',
    ),
    3 => 
    array (
      'key' => 'field_4ff1bef89edb9',
      'label' => 'Chapter Subtitle',
      'name' => 'endnote-chapter_subtitle',
      'type' => 'text',
      'instructions' => '',
      'required' => '0',
      'default_value' => '',
      'formatting' => 'none',
      'order_no' => '3',
    ),
    4 => 
    array (
      'key' => 'field_4ff1bef89f28a',
      'label' => 'Page Number',
      'name' => 'endnote-page_number',
      'type' => 'text',
      'instructions' => '',
      'required' => '0',
      'default_value' => '',
      'formatting' => 'none',
      'order_no' => '4',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'sm_endnotes',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'side',
    'layout' => 'default',
    'hide_on_screen' => 
    array (
    ),
  ),
  'menu_order' => 1,
));
}


// ADD  COLUMNs
add_filter( 'manage_edit-sm_endnotes_columns', 'sm_endnotes_columns' ) ;

function sm_endnotes_columns( $endnote_columns ) {

	$endnote_columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'endnote-page_number' => __( 'Page' ),		
		'endnote-chapter_name' => __( 'Chapter' ),		
		'endnote-chapter_subtitle' => __( 'Chapter Name' ),		
		'tags' => __( 'Tags' ),
		'date' => __( 'Date' )
	);

	return $endnote_columns;
}
function endnote_custom_columns( $endnote_columns, $post_id ) {
  switch ( $endnote_columns ) {

    case "endnote-page_number":
      $page_number = get_post_meta( $post_id, 'endnote-page_number', true);
      echo $page_number;
      break;
      
    case "endnote-chapter_name":
      $chapter_name = get_post_meta( $post_id, 'endnote-chapter_name', true);
      echo $chapter_name;
      break;

case "endnote-chapter_subtitle":
  $chapter_subtitle = get_post_meta( $post_id, 'endnote-chapter_subtitle', true);
  echo $chapter_subtitle;
  break;


  }
}

add_action( "manage_posts_custom_column", "endnote_custom_columns", 10, 2 );

//end cp columns


// MODS

//function pubspring_child_enqueue_scripts() {
//
//	wp_register_script('bootstrap-dropdown', 
//	get_template_directory_uri() . '/js/libs/bootstrap-dropdown.js', array('jquery'), '1.0.0.', true);
//	wp_enqueue_script('bootstrap-dropdown');
//	
//}     
//add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');



// hook the translation filters to change admin menu
//add_filter(  'gettext',  'change_post_to_article'  );
//add_filter(  'ngettext',  'change_post_to_article'  );

//function change_post_to_article( $translated ) {
//     $translated = str_ireplace(  'Posts',  'News/Media',  $translated );  // ireplace is PHP5 only
//     return $translated;
//}
//add script support at the child level so we don't call them in the parent if we don't need them
function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){

$('a.show_menutk').click(function(){
	$(".navbanner").slideDown(600);
	
	});
	
$('a.show_menu').click(function(){
	$("#banner_extended, .navbanner .container").slideDown(600);
	$(".menu_button").hide(100);	
	
	});	
	
	
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
<?php 
}
add_action('wp_footer', 'wp_cycle_args');

 function hr_scripts() { ?> 
<script type="text/javascript" src="http://use.typekit.com/ltq3isx.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
add_action('wp_head', 'hr_scripts');
// create widget areas: 
$sidebars = array('Banner');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-navbanner',
		'before_widget' => '<aside id="%1$s" class="row widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
//register_nav_menu( 'slide-menu', 'Full Menu' ); 


//function ps_ajax()
//{
//     wp_localize_script( 'ajax_options', 'endnotes_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
//     wp_enqueue_script( 'ajax_options', get_stylesheet_directory_uri().'/scripts/theme_scripts.js', 'jquery', true);
//}
//add_action('template_redirect', 'ps_ajax');
//$dirName = dirname(__FILE__);
//$baseName = basename(realpath($dirName));
//require_once ("$dirName/ajax_functions.php");
//
//add_action("wp_ajax_nopriv_get_my_option", "ajax_options");
//add_action("wp_ajax_get_my_option", "ajax_options");
//



//
// Setup and define function which handles all endnote selection AJAX requests
//
require_once(dirname(__FILE__) . '/endnote_html.php');

function get_dynamic_endpoint_fields($post)
{
  return array('post_id' => strval($post->ID),
               'endnote_chapter_stub' => Endnote_HTML::make_endnote_chapter_stub($post),
               'note-page-number' => Endnote_HTML::make_endnote_page_number($post),
               'endnote_tags' => Endnote_HTML::make_endnote_tags($post),
               'endnote_link' => Endnote_HTML::make_endnote_link($post),
               'content' => Endnote_HTML::make_endnote_content($post) );
}


// Setup endpoint filtering by page selection

add_action('wp_ajax_nopriv_endnote_by_page', 'service_endnote_by_page');
add_action('wp_ajax_endnote_by_page', 'service_endnote_by_page');

function service_endnote_by_page()
{
  $begin_page = $_POST['begin_page'];
  $end_page = $_POST['end_page'];
  $response_post_data = array();

  $posts = get_posts(array('numberposts' => '-1',
                           'post_type' => 'sm_endnotes',
                           'orderby' => 'post_date',
                           'order' => 'asc',
                           'meta_query' => array(
                                            array('key' => 'endnote-page_number',
                                                  'value' => array($begin_page, $end_page),
                                                  'type' => 'numeric',
                                                  'compare' => 'BETWEEN')) ));

  if ($posts)
  {
    foreach ($posts as $post)
    {
      setup_postdata($post); // TODO: Do you need this?
      $response_post_data[] = get_dynamic_endpoint_fields($post);
    }
  }
  
  $selection_title = 'Endnotes from pages ' . $begin_page . ' to ' . $end_page;

  $response_msg = array('results_title' => $selection_title,
                        'posts' => $response_post_data);
  $response = json_encode($response_msg);
  header("Content-Type: application/json");
  echo $response;
  exit;
}


// Setup endpoint filtering by tag selection

add_action('wp_ajax_nopriv_endnote_by_tag', 'service_endnote_by_tag');
add_action('wp_ajax_endnote_by_tag', 'service_endnote_by_tag');

function service_endnote_by_tag()
{
  $tag_id = $_POST['tag_id'];
  $tag_name = $_POST['tag_name'];
  $response_post_data = array();

  $posts = get_posts(array('numberposts' => '-1',
                           'post_type' => 'sm_endnotes',
                           'orderby' => 'post_date',
                           'order' => 'asc',
                           'tax_query' => array(
                                            array('taxonomy' => 'post_tag',
                                                  'field' => 'id',
                                                  'terms' =>  $tag_id ))));

  if ($posts)
  {
    foreach ($posts as $post)
    {
      setup_postdata($post); // TODO: Do you need this?
      $response_post_data[] = get_dynamic_endpoint_fields($post);
    }
  }
  
  $selection_title = 'Endnotes tagged with: ' . $tag_name;

  $response_msg = array('results_title' => $selection_title,
                        'posts' => $response_post_data);
  $response = json_encode($response_msg);
  header("Content-Type: application/json");
  echo $response;
  exit;
}


// Setup endpoint filtering by chapter selection

add_action('wp_ajax_nopriv_endnote_by_chapter', 'service_endnote_by_chapter');
add_action('wp_ajax_endnote_by_chapter', 'service_endnote_by_chapter');

function service_endnote_by_chapter()
{
  $category_id = $_POST['chapter_id'];
  $chapter_name = $_POST['chapter_name'];
  $response_post_data = array();

  $posts = get_posts(array('numberposts' => '-1',
                           'post_type' => 'sm_endnotes',
                           'orderby' => 'post_date',
                           'order' => 'asc',
                           'tax_query' => array(
                                            array('taxonomy' => 'endnote_chapters',
                                                  'field' => 'id',
                                                  'terms' =>  $category_id ))));


  if ($posts)
  {
    foreach ($posts as $post)
    {
      setup_postdata($post); // TODO: Do you need this?
      $response_post_data[] = get_dynamic_endpoint_fields($post);
    }
  }

  $response_msg = array('results_title' => $chapter_name,
                        'posts' => $response_post_data);
  $response = json_encode($response_msg);
  header("Content-Type: application/json");
  echo $response;
  exit;
}


// Setup endpoint filtering by text search

add_action('wp_ajax_nopriv_endnote_selection', 'service_endnote_selection');
add_action('wp_ajax_endnote_selection', 'service_endnote_selection');


//
// All apostrophes in the endnotes are represented by right-single-quote 
// characters instead. In unicode thats U+0027 is replaced by U+2019 which
// has a 3-byte UTF-8 encoding. So whenever a user enters a search-by-text
// filter containing an apostrophe, we have to convert it into U+2019.
//
// Since future endnotes might use either character, always search for
// both.
// 
// mysql pattern searching with like, rlike, etc do not handle
// multi-byte expressions as explained in http://bugs.mysql.com/bug.php?id=30241
// So hack around it by converting both needle and haystack into hex
//
function make_mysql_pattern_search($filter_text)
{
  global $wpdb;
  $clean_search_text = $wpdb->escape( like_escape($filter_text) );
  $search_rule = "post_content like '%" . $clean_search_text . "%'";

  $fragments = explode("'", $filter_text);

  // Add search rule for right-single-quote char
  if ( 1 < count($fragments) )
  {
    $search_rule .= "or hex(post_content) rlike concat('(..)*', ";
    $text_components = array();
    foreach ($fragments as $text)
    {
      $text_components[] = "hex('" . $text . "'), ";
    }
    $search_rule .= implode("'E28099', ", $text_components);
    $search_rule .= "'(..)*')";
  }

  return $search_rule;
}


// Setup endpoint filtering by text search

add_action('wp_ajax_nopriv_endnote_selection', 'service_endnote_selection');
add_action('wp_ajax_endnote_selection', 'service_endnote_selection');

function service_endnote_selection()
{
  $filter_text = stripslashes($_POST['filter_text']);

  global $wpdb;
  $search_rule = make_mysql_pattern_search($filter_text);

  $sqlquery_text = "select ID from $wpdb->posts
                                 where post_status = 'publish'
                                 and post_type = 'sm_endnotes'
                                 and $search_rule
                                 order by post_date
                                 limit 8";
  $matches = $wpdb->get_results($sqlquery_text);

  $matching_ids = array();
  if ($matches)
  {
    foreach ($matches as $match)
    {
      $matching_ids[] = $match->ID;
    }
  }

  $response_post_data = array();
  if (count($matching_ids) > 0)
  {
    $posts = get_posts(array('numberposts' => '-1',
                             'post_type' => 'sm_endnotes',
                             'orderby' => 'post_date',
                             'order' => 'asc',
                             'include' => $matching_ids));

    if ($posts)
    {
      foreach ($posts as $post)
      {
        setup_postdata($post);
        $updated_fields = get_dynamic_endpoint_fields($post);

        $matched_endnote = true;
        if (0 < strlen($filter_text))
        {
          // Identify the matching text so it can be styled to stand out
          $matched_endnote = Endnote_HTML::make_text_matched_endnote_content($post, $filter_text);
          $updated_fields['content'] = $matched_endnote;
        }
        // return value of Endnote_HTML::make_text_matched_endnote_content() is false if the text which
        // matched is not from a DOM TEXT node (e.g. tag name or attribute info)
        if ($matched_endnote)
        {
          $response_post_data[] = $updated_fields;
        }
      }
    }
  }

  
  $selection_title  = 'Endnotes containing the text: "' . $filter_text . '"';

  $response_msg = array('results_title' => $selection_title,
                        'posts' => $response_post_data);
  $response = json_encode($response_msg);
  header("Content-Type: application/json");
  echo $response;
  exit;
}

