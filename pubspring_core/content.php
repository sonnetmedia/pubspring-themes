<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article class="hentry box"	id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
		<header>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h1>
			<p class="byline">by <?php  the_author();    ?> &#124; 
			<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'pubspring'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
			 ?></p>
		</header>
		<div class="entry-content">
		
		
		
		<?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail('full', array('class' => 'featured-image image-shadow')); 
			echo '<hr class="space" />';
			} //close if has_post_thumnail ?>

	<?php 
	global $more;    // Declare global $more (before the loop).
	$more = 0;       // Set (inside the loop) to display content above the more tag.
	
	?>
		<?php the_content('Continue reading...'); ?>

	
		<hr style="width: 100%;"/>
		</div>
		<footer>
		
<!--		<?php if ( comments_open() ) : ?>
								<div class="comments">
						<a href="<?php the_permalink(); ?>" class="btn-primary btn btn-mini">
						<?php comments_number( 'Click Here to Leave a Comment', 'one comment', '% comments' ); ?>
						</a>
					</div> 
					
			<?php  endif;    ?>		-->

<!--			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>-->
		</footer>
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