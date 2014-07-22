<?php get_header(); ?>
<div class="container-fluid page_body archive">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row">
		<div id="content" class="span8 " role="main">
			<section class="post-box">
					<?php get_template_part( 'content', get_post_format() ); ?>
			</section>
		</div>	
		<div class="span3 offset1">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>
