<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>


<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>






		<div class="span6 pull-right" style="margin-bottom: 2em;">
		
		
		<?php if ( has_post_thumbnail() ) {
	do_action('captioned_images', 'category-large pull-right');    
		}	
		?>
		</div>
		
	
	<?php the_content(); ?>
	
	
	
	
	
	
	
	<hr />
	
	
	
	
	<?php 
	$pages = get_pages(array('child_of' => $post->ID));	 
	foreach($pages as $page)
	{
	 	setup_postdata($page);
		echo '<div class="page_child">';
		the_content(); 
		echo '</div>';
	}
   wp_reset_query();
	?>
	
	
	
	
	
	
	
	
	
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
	
	
	
	
<?php endwhile; // End the loop ?>