<?php 
/**
 * Template Name: Dearie Page
 * 
 */
get_header(); ?>

<div class="container page_body">
<div class="row">


	<?php 
	//pulls from the books post type for the books post type archive-books	
	$post_permalink = get_permalink(); 
		$args = array( 
		'post_type' => 'sm_books', 
		'posts_per_page' => 1, 
		'post_status' => array( 'publish', 'future' ) 
		);
		
		$query = new WP_Query( $args );
	
	while ($query->have_posts()) : $query->the_post(); ?>

<div class="seven phone-four columns">
<h1 class="book-title entry-title" style="display: inline;font-size: 700%;">
	<?php the_title(); ?>
</h1>
<h2 class="subtitle" style="display: inline;padding-left: 10px;">
	<span class="show-on-phones"><br /></span><?php the_field('subtitle'); ?>
</h2>




					<?php $child_id = get_the_ID(); ?>		
<?php  endwhile;    ?>



<h2 class="menus"><a href="/dearie/bibliography/">&raquo; Bibligraphy</a>&nbsp;&nbsp;&nbsp;<a href="/dearienotes/">&raquo; End Notes</a>&nbsp;&nbsp;&nbsp;<a href="/category/about-the-book/">&raquo; Blog Posts</a>&nbsp;&nbsp;&nbsp;<a href="/dearie/excerpt/">&raquo; Excerpt</a></h2>




<?php  //PAGE CONTENT    ?>

	<?php while (have_posts()) : the_post(); ?>
	
	
	<div class="page_content hide-on-phones">
			<?php the_content(); ?>
	</div>
	
	

<?php endwhile; // End the loop ?>













<?php  //END PAGE CONTENT    ?>
</div>





















<div class="five phone-four columns">
<?php  	while ($query->have_posts()) : $query->the_post(); ?>
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

<?php  endwhile;    ?>

</div>






</div><!-- //row -->

<!--
<div class="row">
	<div class="six phone-four columns">
<h2 class="menus"><a href="/dearie/bibliography/">&raquo; Bibligraphy</a>&nbsp;&nbsp;&nbsp;<a href="/dearienotes/">&raquo; End Notes</a>&nbsp;&nbsp;&nbsp;<a href="/category/about-the-book/">&raquo; Blog Posts</a>&nbsp;&nbsp;&nbsp;<a href="/dearie/excerpt/">&raquo; Excerpt</a></h2>
	</div>		
</div>
-->
<div class="row">
<div class="twelve columns phone-four"><br /><br />
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
</div></div>




<div class="row">
	<div class="six phone-four columns offset-by-three">
	<hr style="margin: 8em auto;"/>
	</div>		
</div>



<?php  while ($query->have_posts()) : $query->the_post(); ?>
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
							
							
							
			
							
							
							
							
							
							
							
							
		
	
				</div><!-- /four columns -->
				<div class="eight phone-four columns">
					<?php $child_id = get_the_ID(); ?>		
			<?php endwhile; wp_reset_query(); ?>
		
			<?php while ($query->have_posts()) : $query->the_post(); ?>
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
	
	
	
	<?php  //END books loop    ?>
</div> <!-- /container -->
<?php get_footer(); ?>