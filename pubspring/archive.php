<?php get_header(); ?>

<div class="container page_body archive">


<?php /* Start page heading with archive name */ ?>
	
	<?php get_template_part('/inc/page_heading_archive'); ?>
	



	<div class="row">
		<div id="content" class="nine columns" role="main">

			<section class="post-box">
				<?php get_template_part('loop', 'index'); ?>
			</section>

		</div><!-- End Content row -->
		
		<div class="three columns phone-four">
		<?php get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
