<?php 
get_header(); ?>

<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>

	<?php get_template_part('loop', 'single_sm_books'); ?>

</div> <!-- /container -->

<?php get_footer(); ?>