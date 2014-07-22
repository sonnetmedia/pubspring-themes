<?php
/**
 * The main template file.
 * @package PubSpring Custom Core
 * @since PubSpring Custom Core 1.0
 * Template Name: Blog Page
 */

get_header(); ?>

<div class="container page_body index">
				<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row-fluid">
		<div id="content" class="span8 offset2" role="main">

			<section class="post-box">

					<?php get_template_part( 'content', 'page' ); ?>

							<hr />
			</section>
		</div>	
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>