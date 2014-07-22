<?php 
/**
 * Template Name: Archive - Reviews
 */
get_header(); ?>

<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>
	
	
	<div class="row">
	<div class="nine phone-four columns">

	<?php get_template_part('loop', 'reviews'); ?>
	</div>


	<div class="three columns phone-four">

		<?php get_sidebar(); ?>

	</div>
		</div>
</div><!-- /container -->

<?php get_footer(); ?>