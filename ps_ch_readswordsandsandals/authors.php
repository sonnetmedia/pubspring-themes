<?php
/**
 * The main template file.
* Template Name: Authors
 * @since PubSpring Custom Core 1.0
 */

get_header(); ?>

<div class="container page_body index">
	<?php //get_template_part('/inc/page_heading_title'); ?>
	<div class="row">
		<div id="content" class="span8" role="main">
			<section class="post-box">
				<?php get_template_part('/content_snippets/archive', 'authors'); ?>

							<hr />
			</section>
		</div>	
		<div class="span3 offset1">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>
