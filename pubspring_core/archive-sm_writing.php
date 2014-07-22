<?php 
/**
 * Template Name: Archive - Writings (bibliographic)
 */
get_header(); ?>

<div class="container-fluid page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>
	
	
	<div class="row">
	<div class="span9">

	<?php get_template_part('loop', 'writing'); ?>
	</div>


	<div class="span3">

		<?php get_sidebar(); ?>

	</div>
		</div>
</div><!-- /container -->

<?php get_footer(); ?>