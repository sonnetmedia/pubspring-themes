							<?php get_template_part('loop', 'books_list'); ?>		

<?php 
//pulls from the books post type for the books post type archive-books
$post_permalink = get_permalink(); 
	$args = array( 
	'post_type' => 'sm_books', 
	'posts_per_page' => 10, 
	'orderby' => 'date' , 
	'order' => 'desc',
	'post_status' => array( 'publish', 'future'  ) 
	);
	
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$child_id = get_the_ID(); 
?>

<div class="row" style="padding-bottom: 3em;"> <?php //repeat the row for each book ?>
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
		<aside style="clear: both;margin: 1em 0;">
			<p>
			ISBN: <?php the_field('isbn'); ?>			
			</p>
		</aside>
			<?php endif; ?>

		
		
		<aside style="margin: .5em 0 2em 0;" class="btn">
			<a href="/reviews/#<?php the_ID(); ?>">
				Read reviews &raquo;
			</a>		
		</aside>
		<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?>
								<aside style="margin: .5em 0 2em 0;" class="meta_data">
		        <?php echo get_post_meta($post->ID, 'meta_data', true) ?>
								</aside>
		<?php endif; ?>
		<?php //book sharing icons from functions.php
		pubspring_book_sharing(); ?>
	</div><!-- /four columns -->

	<div class="eight phone-four columns" id="<?php  $slug = basename(get_permalink( $child_id )); echo $slug;    ?>" >
	<!--	reviews-->
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
		</div>			
			<?php 
		endwhile;
	endif;
	 wp_reset_postdata();
	?>
	<br />	
<!--	END reviews -->
		<article class="book_synopsis">
			<h1 class="book-title entry-title <?php  $slug = basename(get_permalink( $child_id )); echo $slug;    ?>">
				<?php echo get_the_title($child_id); ?> 
			</h1>
		
			<h2 class="subtitle"><?php the_field('subtitle', $child_id); ?></h2>
				<?php the_field('synopsis', $child_id); ?>
		</article>

	</div>	
</div><!-- /row -->
<hr style="width:60%;margin:0 auto 5em auto;" />
<?php endwhile; endif; ?>