<?php 
//pulls from the books post type for the books post type archive-books
?>
<?php 

// this is code in an attempt to show future dated entries to non-signed in users
//$wpdb->get_results("SELECT * FROM $wpdb->sm_books WHERE post_status = 'future' AND post_date_gmt > '$fb_date_today' ORDER BY post_date ASC"))



$post_permalink = get_permalink(); 
while (have_posts()) : the_post(); ?>
	<div class="row" style="padding-bottom: 5em;"> <?php //repeat the row for each book ?>
		<div class="four phone-four columns">
			<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
				<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
			</a>	
<?php
if($post->post_status == 'future') : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Preorder Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Preorder Now</a>		

<?php else : ?>
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >Buy Now</a>	
<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >Buy Now</a>		

<?php endif; ?> 




<?php //get_custom_field_value('excerpt', true) ?>
							

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

		
		<aside style="clear: both;margin: .5em 0 0 0;">
			<p>
			Publisher: <?php the_field('publisher'); ?>			
				
	
			</p>
		</aside>
	

	<?php endif; ?>



		<aside style="clear: both;margin: .5em 0 0 0;">
		<p>	<?php if($post->post_status == 'future') : ?>Available <?php else : ?>Published <?php endif; ?>  <?php the_time('M d, Y') ?></p>
		</aside>



<?php $isbn = get_post_meta($post->ID, 'isbn', true);
	
	if($isbn) : ?>

		
		<aside style="clear: both;margin: .5em 0;">
			<p>
			ISBN: <?php the_field('isbn'); ?>			
				
	
			</p>
		</aside>
	

	<?php endif; ?>




	
	<?php //$title = the_title_rss($post->ID); ?>
		<aside style="margin: .5em 0 1.5em 0;" class="btn">
			<a href="/reviews/#<?php the_ID(); ?>">
				Read reviews &raquo;
			</a>		
		</aside>
		
		<aside>
		<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
		        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
		<?php endif; ?>
		</aside>
		
		
						<?php pubspring_book_sharing(); ?>
						
						
						
			<?php	if($isbn) : ?>

						
						
		<aside style="clear: both;margin: 1em 0;">						
						
	
						        <a href="http://www.goodreads.com/update_status?isbn=0<?php the_field('isbn'); ?>&url=http%3A%2F%2Fwww.goodreads.com%2Fbook%2Fshow%2F19501" target="_blank"><img alt="Share on Goodreads" style="height:30px;" border="0" src="<?php echo get_template_directory_uri(); ?>/images/booksellers/goodreads-badge-add-plus-2d25bb0f32eeac8660c13a521cf00c8e.png" /></a>
        <script src="http://www.goodreads.com/javascripts/widgets/update_status.js" type="text/javascript"></script>
      

			
				
	
		</aside>
	

	<?php endif; ?>
			
		
						
						
						
						
						
						
						
						
	

			</div><!-- /four columns -->
			<div class="eight phone-four columns">
				<?php $child_id = get_the_ID(); ?>		
		<?php endwhile; wp_reset_query(); ?>
	
		<?php
			$review_loop = new WP_Query(array( 
			'post_type' => 'sm_reviews',	
			'post_status' => 'publish', 
			'posts_per_page' => 1, 
			'orderby' => 'rand',
			'meta_key'        => 'related_book',
			'meta_value'      => $child_id,
			  )
			);
			
			if ($review_loop->have_posts()) :
				while($review_loop->have_posts()) : $review_loop->the_post();
			 ?>
					<div class="quote">
						<?php the_field('short_quote'); ?>
						</div>
						<div class="quote_attribution text-right">&mdash;
							<?php the_field('attribution'); ?>
						</div>			<br />
					<?php 
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
		<?php while (have_posts()) : the_post(); ?>
			<h1 class="book-title entry-title">
				<?php the_title(); ?>
			</h1>
			<h2 class="subtitle">
				<?php the_field('subtitle'); ?>
			</h2>
			<?php the_field('synopsis'); ?>
			<?php $excerpt = get_post_meta($post->ID, 'excerpt', true);
				if($excerpt) : ?>
					<hr />
					<div id="excerpt">
						<h2>
							Excerpt from <?php the_title(); ?>
						</h2>
				<?php the_field('excerpt'); ?>
				</div>
				<?php endif; ?>
			</div>
			</div> <!-- /row -->
	<?php endwhile;  ?>