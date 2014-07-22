<?php 
// Template Name: Events
get_header(); ?>
<div class="container-fluid page_body index">
	<div class="row-fluid row-page-header">
		<div class="span12">
			<h1 class="large large page-header inline"><?php wp_title("",true); ?></h1>
		</div>
	</div>
	<div class="row">
		<div id="content" class="span9" role="main">		
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
					<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
						<?php get_template_part( 'no-results', 'index' ); ?>
			<?php endif; ?>
		</div>
		<div class="span2 offset1">
				<?php //get_sidebar(); ?>
				<?php the_widget('Sm_books_widget_v2'); ?> 
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>