<?php 
/**
 * Template Name: Archive - Reviews
 */
get_header(); ?>
<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row-fluid">
		<div class="span8">
			<?php get_template_part('/content/reviews', 'all'); ?>
		</div>
		<div class="span3 offset1">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div><!-- /container -->
<?php get_footer(); ?>