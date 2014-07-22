<?php 
//Template Name: GOBZRK Home page v2
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="content" class="span12" role="main">		
					<div class="quote"><?php the_content(); ?></div>
	
										
				</div>
			<?php endwhile; ?>
		<?php endif; wp_reset_query();?>
		
		
		
	</div><!-- /row -->
	
		<div class="row-fluid">
	
		<?php //get_template_part('content', 'books'); ?>
	</div>
	
</div> <!-- /container -->
<?php get_footer(); ?>