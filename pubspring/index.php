<?php get_header(); ?>
<div class="container page_body index">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row">
		<div id="content" class="eight columns phone-four" role="main">
			<section class="post-box">
				<?php get_template_part('loop', 'index'); ?>
							<hr />
			</section>
		</div>	
		<div class="three columns phone-four offset-by-one">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>