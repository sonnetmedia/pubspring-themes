

<?php 

/*
Template Name: Endnotes Search Template
*/


// Figure out the last page number of the book with an endnote
// for the slider page number readout 
global $wpdb;
$sqlquery_text = "select ID from $wpdb->posts
                                 where post_status = 'publish'
                                 and post_type = 'sm_endnotes'
                                 and post_content like '<p%'
                                 order by post_date desc
                                 limit 1";
$matches = $wpdb->get_results($sqlquery_text);
$last_page_number = ($matches) ? get_field('endnote-page_number', $matches[0]->ID) : 0;


//
// Embed the jscript function and its inputs for handling endnote selection by chapter or text search
//
$jquery_dependencies = array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-tabs', 'jquery-ui-mouse', 'jquery-ui-slider');
wp_enqueue_script('endnote_selection', get_stylesheet_directory_uri() . '/js/endnote_selection.js', $jquery_dependencies);

// text_search_keystroke_threshold: wait this long to determine that user is done typing in text search box

$script_parameters = array('service_url' => admin_url('admin-ajax.php'),
                           'select_by_chapter_action' => 'endnote_by_chapter',
                           'select_by_tag_action' => 'endnote_by_tag',
                           'select_by_page_action' => 'endnote_by_page',
                           'select_by_text_action' => 'endnote_selection',
                           'text_search_keystroke_threshold' => 500,  
                           'last_endnote_page' => $last_page_number);
wp_localize_script('endnote_selection', 'endnote_selection_parameters', $script_parameters);

// TODO: IS there a cleaner way to include jquery-ui stylesheet to make sure it is in sync with jquery version
//       installed with wordpress?
wp_register_style( 'jquery-ui-style', get_stylesheet_directory_uri() . '/jquery-ui.css');
wp_enqueue_style( 'jquery-ui-style' );

get_header(); 

?>


<div class="container page_body">

<div class="row">
  <div class="page_heading well"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>
	 <div class="seven phone-four columns">
	    <h2>
	      <?php  if ( is_tax() ) {  echo 'keyword: '; }    ?>
	      <?php wp_title("",true); ?>
	    </h2>
      </div>		
    
      <div class="five phone-four columns">
    <!-- BEGIN search by text widget HTML -->
	    <div id="text_search_tool">
	      <input class="show_filtered_results big_form" name="keywords" type="search" id="filter" placeholder="Search endnote text&raquo;" autocomplete="off" style="float: right;" size="60" />
	    </div>
    <!-- END search-by-text tab HTML -->
	</div><!-- /five columns-->
  
  </div><!-- /page_heading -->
</div><!-- /row -->

	
	
	
<div class="row">
  <div class="four phone-four columns">
	<div id="search_tool_tabs">
      <ul>
        <li><a href="#chapter_search_tool" class="btn">Chapters</a></li>
        <li><a href="#tag_search_tool" class="btn">Tags</a></li>
      </ul>
      <!-- BEGIN search-by-chapter tab HTML -->
      <div id="chapter_search_tool">
        <h1 class="red">Chapter</h1>
        <p><small>click on chapter to see notes for that chapter on the right</small></p>
        <ul class="unstyled chapter_list">
<?php  // Build the list of chapter headings


  $chapter_headings = get_categories( array( 'taxonomy'     => 'endnote_chapters',
                                             'orderby'      => 'slug',
                                             'hierarchical' => 1 ));
  if ($chapter_headings)
  {
    foreach ($chapter_headings as $heading)
    {
      $chapter_line  = '<li>';
      $chapter_line .= '  <a href="javascript:;" class="chapter_endnote_control" title="Select endnote for this chapter"';
      $chapter_line .= ' chapter_id="' . $heading->cat_ID . '">';
      $chapter_line .= $heading->cat_name;
      $chapter_line .= '  </a>';
      $chapter_line .= '</li>';
      echo $chapter_line;
    }
  }
?>

        </ul>
      </div>
      <!-- END search-by-chapter tab HTML -->


      <!-- BEGIN search-by-tag tab HTML -->
      <div id="tag_search_tool">

        <h1 class="red">Tags</h1>
        <p><small>click on a tag to see the notes filed under that category</small></p>
        <ul class="unstyled chapter_list">


<?php  // Build the list of tags

  $endnote_tags = get_terms('post_tag', array('orderby' => 'count',
                                              'order' => 'DESC',
                                              'hide_empty' => 1));

  if ($endnote_tags)
  {
    foreach ($endnote_tags as $tag)
    {
      $tag_line  = '<li>';
      $tag_line .= '  <a href="javascript:;" class="tag_endnote_control" title="Select endnote for this tag"';
      $tag_line .= ' tag_id="' . $tag->term_id . '">';
      $tag_line .= $tag->name;
      $tag_line .= '  </a>';
      $tag_line .= '<span class="tag_endnote_count"> (' . $tag->count . ')</span>';
      $tag_line .= '</li>';
      echo $tag_line;
    }
  }

?>

        </ul>

      </div>
      <!-- END search-by-tag tab HTML -->

    </div>

  </div><!-- /four columns -->


  <div class="eight phone-four columns endnotes_block">
      <!-- BEGIN search by page number widget HTML -->
      <div id="page_search_tool" style="margin-top: -1em;">
        <p class="page_range_readout">Pages</p>
        <div id="page_range_slider"></div>
        <p><small>slide to browse the endnotes by page number</small></p>
      </div>
      <!-- END search-by-page tab HTML -->
<?php
//
// Get the name and category ID of the first chapter which has endnotes
//

// Find the first endnote in the book
global $wpdb;
$matches = $wpdb->get_results("select ID from $wpdb->posts
                               where post_status = 'publish'
                               and post_type = 'sm_endnotes'
                               limit 1");

// Find out its chapter (since first chapter may have none)
$chapter_ID = 0;
$chapter_name = '';
if ($matches)
{
  $first_post_ID = $matches[0]->ID;

  $terms = get_the_terms( $first_post_ID, 'endnote_chapters' );
  if ( $terms && ! is_wp_error( $terms ) )
  {
    // NOTE: There is only ever one chapter term but get_the_terms() returns 
    //       a slice of array with unknown index so $terms[0] is wrong 
    $term = current($terms);
    $chapter_name = $term->name;
    $chapter_ID = $term->term_id;
  }
}


?>
    <br/><br/>
    <h1 class="selected_endnote_filter_heading red"><?php  echo $chapter_name;  ?></h1>
    <br/>

<div class="row">
    <div class="twelve columns" style="margin-bottom:29px;">

      <div class="one column">
        <h1>Page</h1>
      </div>

      <div class="one column">
        <h1>Note</h1>
      </div>

    </div>
</div>

    <!-- Plant a page-load-in-progress indicator to be set visible while waiting for new endnote filter results -->
    <div id="loading_progress_indicator" class="hide" style="line-height: 60px; text-align: center; ">
      <img alt="activity indicator" src="<?php  echo get_stylesheet_directory_uri() . '/images/loading-indicator.gif';  ?>">
    </div>


<?php 

//
// Show the endnotes for the first chapter that has any
//

// Get all the posts for this chapter
if ($chapter_ID > 0)
{
  $posts = get_posts(array('numberposts' => '-1',
                           'post_type' => 'sm_endnotes',
                           'orderby' => 'post_date',
                           'order' => 'asc',
                           'tax_query' => array(
                                            array('taxonomy' => 'endnote_chapters',
                                                  'field' => 'id',
                                                  'terms' =>  strval($chapter_ID) ))));
}

// Give the frontend scripts a model for endnote html so that the format
// is not defined in more than one place. Dummy is always hidden
$model_endnote = new Endnote_HTML('model');
$model_endnote->print_html();

if ($posts)
{
  foreach ($posts as $post)
  {
    $next_endnote = new Endnote_HTML($post);
    $next_endnote->print_html();
  }
}

?>

  </div>
  
  

</div><!-- /container -->
<a href="#top" class="small center" style="position: fixed;bottom: 20px;left: 30%;">- top of page -</a>
<?php get_footer(); ?>
