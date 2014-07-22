<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="span7">
		<article class="hentry box"	id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
			<header>
				<h1 class="entry-title" style="margin-bottom: .25em;"><?php the_title(); ?></h1>
<!--					 <h3 class="inline">by <?php  the_author();    ?></h3>-->
					 <!--
					 &#124; -->
					 
					 
			</header><br />
			<div class="entry-content">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>
				<?php the_post_thumbnail('category-large', array('class' => 'image-shadow flow_left')); ?> 
				<hr class="space" />
				<?php  	
				} 
				?>
										<?php get_template_part('format', 'video');    ?>			
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
			</footer>
				<?php comments_template(); ?>
		</article>
	</div>
	<div class="span3 offset1">
		<div class="sidebar">
			<div class="entry-meta">

				<?php pubspring_entry_meta(); ?>
				<?php // ADD LATER get_template_part('content/related', 'book'); ?>								
			</div>
		</div>
	</div>
<?php endwhile; // End the loop ?>