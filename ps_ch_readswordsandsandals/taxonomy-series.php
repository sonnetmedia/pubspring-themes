<?php 
/**
 * Template Name: Archive - Books
 */
get_header(); ?>
<div class="container page_body">
	<?php echo '<p class="no-margin small dig-in" style="margin-bottom:-18px;">Series</p>'; get_template_part('/inc/page_heading_category'); ?>
<!--	<h2 class="section-title">Books</h2>-->
	<?php 	//get_template_part('/content_snippets/category-posts');  ?>	
	<h2 class="section-title">Books</h2>
	<?php get_template_part('content', 'books'); ?>
</div> <!-- /container -->
<?php get_footer(); ?>