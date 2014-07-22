<?php get_header(); ?>

<div class="container page_body single">
	<?php get_template_part('/inc/page_heading_single'); ?>
	<div class="row">
		<div id="content" class="twelve columns phone-four" role="main">
		
			<section class="post-box">
				<?php get_template_part('loop', 'single'); ?>
			</section>

		</div><!-- End Content row -->

	</div><!-- /row -->
</div> <!-- /container -->


		
<?php get_footer(); ?>
