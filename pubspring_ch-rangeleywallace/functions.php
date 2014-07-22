<?php 
function tempscript() { ?>
	<script type='text/javascript' src='/wp-content/themes/pubspring_core_authors/js/lesscss.js'></script>
	
	<?php }
add_action('wp_head', 'tempscript');



//remove_action( 'widgets_init', 'events_list_load_widgets', 90 ); //THIS LINE SHOULD BE COMMENTED OUT UNLESS YOU WANT TO NOT HAVE THE EVENTS WIDGET

// function pubspring_books_page_list() { get_template_part('/content_snippets/books','list'); }
 
 //add_action('pubspring_add_books', 'pubspring_books_page_list', 1);
 
 
  function unhook_pubspring_setup_page() {
 remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
 remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
 //Add back navbar, but with no arguments - this would be better as a variable, so change soon
 add_action('pubspring_setup_page', 'pubspring_navbar_nofixed', 3, 0);
  }
 add_action('init','unhook_pubspring_setup_page');
 
 
 function pubspring_global_quotes() {
	echo ' <div class="global_topbar_quotes span8 hidden-phone">';
	get_template_part('/content_snippets/quote','random_short');
	echo '</div>';
   }
 add_action('global_topbar_quotes', 'pubspring_global_quotes', 1);
 