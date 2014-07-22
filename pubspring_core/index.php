<?php
/**
 * The main template file.
 * @package PubSpring Custom Core
 * @since PubSpring Custom Core 1.0
 */

get_header(); ?>

<div class="container page_body index">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row">
		<div id="content" class="span7" role="main">
			<section class="post-box">
			
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

							<hr />
			</section>
		</div>	
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>