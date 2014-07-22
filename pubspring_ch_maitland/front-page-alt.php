<?php get_header(); ?>
<?php //Template Name: Front Page with Slideshow ?>

<div class="container page_body">

	
	

	<div class="row" style="margin-bottom: 2em;">
		<div class="four phone-four columns">

	<section id="content" style="margin-bottom: 3em;">
			
			
<?php		
	//Pull the most recent book post type and get related reviews and a synopsis
	$post_permalink = get_permalink();
	$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
		


			
		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 2px 0 10px 0;" />
		</a>	
<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	

<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	

<?php if($post->post_status == 'future') : ?>
		<aside style="clear: both;margin: 1em 0;">
		<p>	Available  <?php the_time('M d, Y') ?></p>
		</aside>
<?php endif; ?> 


							<?php endwhile; endif;wp_reset_query(); ?>
			
	
		</section>

	</div><!-- /four columns -->



	<div class="eight phone-four columns">

		<section class="layered-paper">
		
		
		
		<?php //Pull the most recent book post type and get related reviews and a synopsis
		$book_query_args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future' ));
		$book_query = new WP_Query( $book_query_args );	
		
		 while ($book_query->have_posts()) : $book_query->the_post();
		
		 endwhile; 
		 $child_id = get_the_ID();
		 ?>
		<?php //now pull the review loop
		$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 20, 'orderby' => 'rand','meta_key' => 'related_book', 'meta_value' => $child_id, ));
		if ($review_loop->have_posts()) :	?>		
		
				<section class="slideshow_quote-removed">
		
			<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>
		
								<div class="quote_box" <?php if( ($review_loop->current_post) > 0 ) { echo("style='display:none;'");}?>>
									<div class="quote highlight">
<!--									&ldquo;--><em>
										<?php the_field('short_quote'); ?>
<!--										&rdquo;--></em>
										</div>
				
										<div class="quote_attribution text-right" style="text-align: right;text-indent: 180px;">&mdash;
											<?php the_field('attribution'); ?>
										</div>
									</div>
									
					<?php endwhile;  ?>
				</section>
					
		<?php endif;wp_reset_postdata(); ?>
		
		
		
		</section>
		
		
		<br />		<br />
		
		
		
				
				<?php 		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		
		
					<div class="quote"><?php the_field('short_description'); ?></div>
		
									<?php endwhile; endif;wp_reset_query(); ?>
		
				
		
		
	
		
		
		
		
		
		
		
		
		
					
		
		
	</div>





</div><!-- /row -->











<div class="row row_spaced hide-on-phones">

		<div class="eight columns">

<!--	         get_template_part('loop', 'gallery');-->

<div class="hide-on-phones shadow" style="margin: 6px 0;width: 600px;">
<?php //echo do_shortcode( "[SlideDeck2 id=590]" ); ?>	

<?php while (have_posts()) : the_post(); 

	the_content();
	endwhile;
?>




</div><!-- /carousel_outer -->

<h2><a href="/category/photos/">Click here to see more images on the blog &raquo;</a></h2>
		</div><!-- /eight columns -->
		
		
<div class="four phone-four columns">
				
		<h1>News</h1>
		
		<style>
				ul.post_list {
					margin-left: 0;
				}
		ul.post_list li
		{
			list-style-type: none;
			line-height: 22px;
			margin-bottom: 1em;
		}
				ul.post_list li a{
					font-size: 18px;
				}
		</style>
		
		
		
		<ul class="post_list">
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'cat' => 7,
							'posts_per_page' => 4,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		
					<li><?php the_time('F jS'); ?> <br /><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		
							<?php endwhile; endif; ?>		
							</ul>


</div>		
		
		
		


	</div><!-- /row -->























		
		
		
		
</div><!--  /container page_body  -->		
		
<?php get_footer(); ?>