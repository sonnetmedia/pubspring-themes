<?php get_header(); ?>
<div class="container page_body index">
	<div class="row">
		<div id="content" class="eight phone-four columns" role="main">
			<section class="post-box">
				<?php get_template_part('loop', 'index'); ?>
							<hr />
			</section>
		</div>	
		<div class="three columns offset-by-one">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>