<?php get_header(); ?>
<div class="container page_body">

	<div class="row padding-top padding-bottom">
		<div class="six phone-four columns">
			<section id="content" style="margin-bottom: 3em;">
				<?php 
					$what_im_watching_parameters = array('post_type' => 'post','cat' => 14, 'posts_per_page' => 1, 'order'=> 'DESC', 'orderby' => 'post_date');
					$what_im_watching =  new WP_Query( $what_im_watching_parameters ); 
					 while ($what_im_watching->have_posts() ) : $what_im_watching->the_post(); 
				?>
			
				<h3 style="margin-bottom: 6px;">
					<a href="<?php the_permalink(); ?>"><?php echo 'What I\'m Watching';//the_title_attribute(); ?></a>
				</h3>
				
				<?php $home_page_image = get_post_meta($post->ID, 'home_page_image', true); if($home_page_image) : ?>
	
				<a href="<?php the_permalink(); ?>" >
					<img src="<?php the_field('home_page_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 10px 0;" />
				</a>	

			<?php else : ?>
				<?php 
				global $more;
				$more = 0;
				the_content('',true); ?>

			<?php endif; ?>
			
				<h2 class="post-title"><a href="<?php the_permalink(); ?>">Read "<?php the_title_attribute(); ?>" &raquo; </a></h2>
			<?php endwhile;?>
		</section>
	</div><!-- /four columns -->

	<div class="six phone-four columns">
		<h3><?php  _e('News', 'pubspring');    ?></h3>		

			
		<?php 
		$news_parameters = array('post_type' => 'post','cat' => 7,'posts_per_page' => 3,'order'=> 'DESC', 'orderby' => 'post_date');
		$news =  new WP_Query( $news_parameters ); 
		if ( $news->have_posts() ) : 
		 $count = 0; 
		while ( $news->have_posts() ) : $news->the_post();
		$count++;
		?>
		<?php //the_time('F jS'); ?> 
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php the_excerpt(); ?>
		<?php if ($count != 3) : 
		echo "<hr />";
		endif; ?>
		<?php endwhile; endif; ?>	
			
	</div>
	<hr style="width: 100%;" />
</div><!-- /row -->


<div class="row">
	<div class="seven columns">

		<?php //Pull the most recent book post type and get related reviews and a synopsis
		$book_query_args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future' ));
		$book_query = new WP_Query( $book_query_args );	
		
		 while ($book_query->have_posts()) : $book_query->the_post();
		
		 endwhile; 
		 $child_id = get_the_ID();
		 ?>


			<h1 class="left book-title entry-title <?php  $slug = basename(get_permalink( $child_id )); echo $slug;    ?>">
				<?php echo get_the_title($child_id); ?> 
			</h1>
			<h2 class="subtitle" style="margin-top: 6px;">&nbsp;<?php the_field('subtitle', $child_id); ?></h2>
<br />

	<ul class="box hide-on-phones">
		
		
		<?php //now pull the review loop
		$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 20, 'orderby' => 'rand','meta_key' => 'related_book', 'meta_value' => $child_id, ));
		if ($review_loop->have_posts()) :	?>		
		
				<section class="slideshow_quote-removed">
		
			<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>
		
								<li class="quote_box" <?php if( ($review_loop->current_post) > 0 ) { echo("style='display:none;'");}?>>
									<div class="quote highlight_dark">
<!--									&ldquo;--><em>
										<?php the_field('short_quote'); ?>
<!--										&rdquo;--></em>
										</div>
				
										<div class="quote_attribution text-right" style="text-align: right;text-indent: 180px;">&mdash;
											<?php the_field('attribution'); ?>
										</div>
									</li>
									
					<?php endwhile;  ?>
				</section>
					
		<?php endif;wp_reset_postdata(); ?>
		
		
		
		</ul>
		
		
		
		<?php		
			//Pull the most recent book post type and get related reviews and a synopsis
			$post_permalink = get_permalink();
			$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
			$query = new WP_Query( $args );
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			?>
				
				<?php  the_field('short_description');    ?>
				
				
				<div class="three columns">
				<a class="btn btn-primary hide-on-phones" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
				<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
				
				<a class="btn btn-primary show-on-phones" href="#buy_books_<?php the_ID(); ?>" >
				<?php if($post->post_status == 'future') : ?>Preorder<?php else : ?>Buy<?php endif; ?> Now</a>	
				
				<?php if($post->post_status == 'future') : ?>
						<aside style="clear: both;margin: 1em 0;">
						<p>	Available  <?php the_time('M d, Y') ?></p>
						</aside>
				<?php endif; ?> 
				</div>
				
				<div class="six columns">
				<a href="<?php the_permalink(); ?>" class="btn btn-primar">Read more about the book</a>
				</div>
	
</div>






<div class="five columns">

<div class="twelve columns">


		<a data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="<?php the_permalink(); ?>" >
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;margin: 2px 0 10px 0;" />
		</a>	
</div>

							<?php endwhile; endif;wp_reset_query(); ?>
			



						



</div>







</div><!-- /row -->
		
</div><!--  /container page_body  -->		






		
<?php get_footer(); ?>