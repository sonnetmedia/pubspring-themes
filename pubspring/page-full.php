<?php
/*
Template Name: Full Width
*/
get_header(); ?>
		
<div class="container page_body">
	<?php get_template_part('/inc/page_heading_title'); ?>

	<div class="row">
		<div id="content" class="twelve columns" role="main">
		
<section class="post-box">
	<?php get_template_part('loop', 'page'); ?>
</section>



<hr />
<!--<br /><br /> --> <!-- need these ? --> 
		</div>



	</div><!-- /row -->
	

</div> <!-- /container -->





<?php get_footer(); ?>