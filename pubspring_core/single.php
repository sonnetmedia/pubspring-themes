<?php get_header(); ?>

<div class="container-fluid page_body single">
	<?php get_template_part('/inc/page_heading_category'); ?>
	<div class="row">
		<div id="content" role="main">
		
			<section class="post-box">
				<?php get_template_part('content', 'single'); ?>
			</section>

		</div><!-- End Content row -->
		

	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
