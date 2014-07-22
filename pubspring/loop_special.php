<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="meta">
			
				<div class="bar-frame">
			
			
					<div class="date">
						<strong class="day"><?php the_time('d') ?></strong>
							
						<div class="holder">
							<span class="month"><?php the_time('M') ?></span>
							<span class="year"><?php the_time('Y') ?></span>
						</div>
					</div> 
			<!--
					<div class="author">
						<strong class="title">POSTED BY</strong> <a href="http://spibey.com/blog/author/admin/" title="Posts by James" rel="author">{{ author_name }}</a> 
					</div> -->
					<div class="categories">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>						 
					</div> 
			
					<div class="comments">
						<strong class="title">DISCUSSION</strong>
						<?php comments_number( 'no comments', 'one comment', '% comments' ); ?>
					</div> 
			
						
						
									
					
					</div>

			</div>

		<div class="entry-content">
		
		
		
		<?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail('full', array('class' => 'featured-image flow-left image-shadow')); 
		} 
		?>
		
<?php if ( !empty( $post->post_excerpt ) ) : ?>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Continue reading...</a>
	<?php else : ?>
		<?php the_content('Continue reading...'); ?>
	<?php endif; ?>
	
	

	
	
	
	
	
	
	
	
	
	
	
		</div>
		<div class="divider"></div>
	</article>	
<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'pubspring' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'pubspring' ) ); ?></div>
	</nav>
<?php endif; ?>