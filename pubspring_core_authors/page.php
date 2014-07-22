<?php 
//this is a page template
get_header(); ?>
<div class="container page_body index">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row-fluid">

<?php  //CONTENT    ?>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
<div id="content" class="span8" role="main">	

	<?php page_above_content(); ?>


		<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
		<div class="flow_leftTK"> <!--style="max-width: 300px;"-->
		<?php  do_action('captioned_images', 'category-medium');    ?>
	</div>
	<?php  }    ?>
	<?php the_content(); ?>
	
	<?php  if( is_page( 'about') ) {
	
	
	        $pages = get_pages(array('child_of' => $post->ID));
	 
		foreach($pages as $page)
		{
		 	setup_postdata($page);
			echo '<div class="clear page_child" style="clear:both;">';
			the_content(); 
			echo '</div>';
		}
		}    ?>
	
</div>

<div class="span3 offset1 hidden-tablet">
	<?php get_template_part('sidebar'); ?>
</div>




				<?php endwhile; ?>
	
				<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
	
					<?php get_template_part( 'no-results', 'index' ); ?>
	
				<?php endif; ?>
<?php  //END CONTENT    ?>	
	</div><!-- /row -->
 </div> <!-- /container -->

<?php get_footer(); ?>