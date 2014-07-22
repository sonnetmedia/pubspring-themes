<?php get_header(); ?>

		
<div class="container page_body page">
	<?php get_template_part('/inc/page_heading_title'); ?>

	<div class="row">
		<div id="content" class="nine columns" role="main">
		
<section class="post-box">
	<?php get_template_part('loop', 'page'); ?>
</section>
		</div>

		<div class="three columns phone-four">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->





<?php get_footer(); ?>