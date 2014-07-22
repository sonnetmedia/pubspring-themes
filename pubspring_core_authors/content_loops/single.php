<?php while (have_posts()) : the_post(); ?>
	<article class="hentry box"	id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
		<header>
			<h1 class="entry-title no-margin"><?php the_title(); ?></h1>
<p class="byline"><span class="byline_author">by <?php  the_author();    ?> &#124;</span> 
<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'pubspring'), get_the_time('F jS, Y'), get_the_time()) .'</time>';
 ?></p>

		</header>
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
				<?php the_post_thumbnail('category-large', array('class' => 'image-shadow flow_left')); ?> 
			<?php  } ?>
				<?php get_template_part('format', 'video');    ?>			
				<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
		</footer>
	<hr />
		<?php comments_template(); ?>
	</article>
<?php endwhile; // End the loop ?>