<?php 
//Template Name: Home - Quote Posts
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<div class="span3">
			<section>		
				<?php  get_template_part('/content/bookcover', 'single');    ?>	
			<section>		
		</div>
		<div id="content" class="span7" role="main">		
			<section>		
				<?php  get_template_part('/content/quote', 'single');    ?>
				
				<hr />
				<?php while (have_posts()) : the_post(); 
				
					the_content();
					endwhile;
				?>
				
				
			</section>
		</div>
	</div>
<!-- /row -->

<div class="row-fluid">
		<div class="span3">
			<section>	
				<?php dynamic_sidebar('frontpage-widget'); ?>
			<section>		
		</div>
		<div id="content" class="span7" role="main">		
			<section>

				
		<h3>Latest Updates</h3>		
		
		
		
		
				
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							//'cat' => 7,
							'posts_per_page' => 2,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(); ?>

		
							<?php endwhile; endif; ?>		

		
		







			</section>
		</div>
	</div>





</div> <!-- /container -->
<?php get_footer(); ?>