<?php // REPLACE THIS WITH AN ACTION get_template_part('loop', 'books_list'); ?>		
		<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>






<div class="row" style="padding-bottom: 3em;"> <?php //repeat the row for each book ?>
	<div class="span4">
	
		<?php 
		
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('full', array('class' => 'featured-image image-shadow')); 
				echo '<hr class="space" />';
				} //close if has_post_thumnail 
				  else {   //We will transition out of  ?>
	
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
<?php  }    ?>


<?php  get_template_part('/inc/button', 'buy_retailers'); ?>		
				
									
		<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
			if($excerpt) : ?>
		<a href="<?php the_permalink(); ?>#excerpt">
			<aside style="padding:.5em 0;clear: both;margin: 1em 0;">
				<p>Click to read an excerpt &raquo;</p>
			</aside>
		</a>
			<?php endif; ?>
		
				
		<?php $publisher = get_post_meta($post->ID, 'publisher', true);	
			if($publisher) : ?>		
		<aside class="publisher" style="clear: both;">
			<p>
			Publisher: <?php the_field('publisher'); ?>				
			</p>
		</aside>	
			<?php endif; ?>
		<aside class="pubdate" style="clear: both;">
			<p>	<?php if($post->post_status == 'future') : ?>Available <?php else : ?>Published <?php endif; ?>  <?php the_time('M d, Y') ?></p>
		</aside>	
		
		
		<?php $isbn = get_post_meta($post->ID, 'isbn', true);	
			if($isbn) : ?>
		<aside style="clear: both;margin: 1em 0;">
			<p>
			ISBN: <?php the_field('isbn'); ?>			
			</p>
		</aside>
			<?php endif; ?>

		
		

		<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
				<aside style="margin: .5em 0 2em 0;">
		        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
		        		</aside>
		<?php endif; ?>
		<?php //book sharing icons from functions.php
		pubspring_book_sharing(); ?>
	</div><!-- /four columns -->

	<div class="span8" id="<?php  $slug = basename(get_permalink( $child_id )); echo $slug;    ?>" >
	
<?php //related_quote(); 
get_template_part('inc/related', 'review');
?>	
	
	
	
	
		
	

	<br />	
<!--	END reviews -->
		<article class="book_synopsis">
			<h1 class="book-title entry-title <?php  $slug = basename(get_permalink( $child_id )); echo $slug;    ?>">
				<?php echo get_the_title($child_id); ?> 
			</h1>
		
			<h2 class="subtitle"><?php the_field('subtitle', $child_id); ?></h2>
				<?php the_field('synopsis', $child_id); ?>
				
				
			<?php  if (is_single()) {   ?>	
				
				<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
					if($excerpt) : ?>
						<hr />
						<div id="excerpt">
							<h2>
								Excerpt from <?php the_title(); ?>
							</h2>
					<?php the_field('excerpt'); ?>
					</div>
					<?php endif; }?>
				
				
				
				
				
				
		</article>

	</div>	
</div><!-- /row -->
<hr style="width:60%;margin:0 auto 5em auto;" />
<?php endwhile; endif; ?>