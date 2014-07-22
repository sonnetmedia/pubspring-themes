<?php 
//this is a full page template, which is the core template for this theme
get_header(); ?>
<div class="container-fluid page_body index">
	<?php get_template_part('sidebar', 'horizontal'); ?>  		
	<?php get_template_part('/inc/page_heading_title'); ?>



<div class="row">
<div class="pull-right span1">
<?php 		//note that this template is INSIDE of the row so that it goes away as the screen gets smaller
		get_template_part('sidebar', 'verticle'); ?>  
</div>



		<div id="content" class="span11" role="main">		

			<?php if ( have_posts() ) : ?>

				<?php // what is this?  ->    test_content_nav( 'nav-above' ); ?>
<div id="container">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'standard' );
					?>

				<?php endwhile; ?>
					</div>
				<?php //test_content_nav( 'nav-below' ); ?>
				
				
				<?php  get_template_part( '/inc/pagination' );    ?>
				
				

			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>
	</div><!-- /END #container -->
	</div><!-- /row -->
 </div> <!-- /container -->


<?php get_footer(); ?>