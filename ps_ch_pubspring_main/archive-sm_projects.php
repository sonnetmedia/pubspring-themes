<?php 
get_header(); ?>
<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>
	
	
	<div class="row-fluid">
	<div class="span9">


	<?php get_template_part('/content/sm_projects'); ?>
	
	
	</div>


	<div class="span3">

		<?php get_sidebar(); ?>

	</div>
		</div>
</div><!-- /container -->

<?php get_footer(); ?>