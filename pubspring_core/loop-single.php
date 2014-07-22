<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title" style="margin-bottom: .25em;"><?php the_title(); ?></h1>

		</header>
		<div class="entry-content">
		<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>
				<?php the_post_thumbnail('full', array('class' => 'image-shadow')); ?> 
				<hr class="space" />
		<?php  	
				} 
				?>
		
		
			<?php the_content(); ?>


			<div class="entry-meta">
				<?php pubspring_entry_meta(); ?>
			</div>
			
			
			
			
			
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>
	</article>
<?php endwhile; // End the loop ?>