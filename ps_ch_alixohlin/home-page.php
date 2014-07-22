<?php 
//Template Name: Home page v1
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="content" class="span12" role="main">		
					<div class="quote"><?php the_content(); ?></div>
					
										
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>