<?php
// Functions file for pubspring core author parent theme.

//Theme
require_once('functions/walker-bootstrap.php');
require_once('functions/pubspring-setup.php');
require_once('functions/pubspring-settings.php');
require_once('functions/pubspring-page-open.php');
require_once('functions/enqueue-scripts.php');
require_once('functions/widget-areas.php');
require_once('functions/image-handling.php');
require_once('functions/header-functions.php');
require_once('functions/theme-styles.php');
require_once('functions/hooks.php');
require_once('functions/filters.php');
require_once('functions/typekit.php');
//Core Custom Post Types, Fields, and Taxonomies
//require_once('functions/custom-post-types.php');
//require_once('functions/custom-field-types.php');
require_once('functions/custom-taxonomies.php');


//Book Stuff
require_once('widgets/books-featured.php');
require_once('functions/sharing-books.php');
require_once('functions/isbn13-to-isbn10.php');

// Social
require_once('functions/sharing-global.php');




///DEPRECATED - TAKE OUT AS SOON AS WE MAKE SURE THAT NO ONE HAS DATA IN THERE
if ( function_exists("register_options_page") ) {
    register_options_page('Social Media Accounts');
}
//////// PULL IN THE SOCIAL MEDIA ACCOUNTS FIELDS FOR THE OPTIONS PAGE
get_template_part('inc/acf','fields');
// END DEPRECTATED


//////////////////////////////////////////////LET'S FIGURE OUT THE BEST WAY TO ORGANIZE THESE ////////////////////////////////////////////




	
	




//RELATED QUOTE
function related_quote() {
get_template_part('inc/related', 'review');
  }
  
 add_action('book_above_synopsis','related_quote'); 
  

 

function pubspring_entry_meta() { ?>
	 
<div class="meta" style="margin-bottom: 3em;">
	<div class="bar-frame">
		<div class="date">
			<p class="quote_small">
				Published: <br /> 
				<span class="day"><?php the_time('d') ?></span>-<span class="month"><?php the_time('M') ?></span>-<span class="year"><?php the_time('Y') ?></span>
			</p>
		</div> 
		<div class="categories">
			<p class="quote_small">
				<?php the_tags(); ?>
			</p>
<hr class="blend-in" />
			<p class="quote_small">
			
			<?php
			$category = get_the_category();
			?>
			
			
			
			<?php if ( $category ): ?>
			Category: 
				<?php the_category(' '); ?>
				<?php  endif;    ?>
				
			</p>
		</div> 
	</div>
</div>
			<?php }

/////////////////////////////////////////////////////// END //////////////////////////////////////////////////////////////////





