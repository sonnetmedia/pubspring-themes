<?php
/**
 * The main template file.
 * @package PubSpring Custom Core
 * @since PubSpring Custom Core 1.0
 * Template Name: Blog Page
 */

get_header(); ?>

<div class="container page_body index">
	<div class="row-fluid">
		<div id="content" class="span9 offset1" role="main">
			<section class="post-box">
					<?php get_template_part( '/content_loops/single' ); ?>
							<hr />
			</section>
		</div>	
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>