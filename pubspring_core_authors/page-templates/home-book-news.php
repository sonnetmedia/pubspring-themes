<?php get_header(); ?>
<?php //template name: Home - Book+Blog+Social ?>
<div class="container page_body">
	<div class="row-fluid mt50 padding-bottom">
		<div class="sidebar-columns span5">
			<section id="content" style="margin-bottom: 3em;">
				<?php		
					//Pull the most recent book post type and get related reviews and a synopsis
					$post_permalink = get_permalink();
					$args = array( 'post_type' => 'sm_books','posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future') );
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
				?>
				
					<?php  get_template_part('/content/bookcover', 'single');    ?>
		
						<?php if($post->post_status == 'future') : ?>
							<aside style="clear: both;margin: .5em 0;">
								<p>	Available  <?php the_time('M d, Y') ?></p>
							</aside>
						<?php endif; ?> 

				<?php endwhile; endif;wp_reset_query(); ?>
			</section>
		</div><!-- /four columns -->

	<div class="content-columns span7">
		
		
		<section style="margin-bottom: 3em;">
		<div class="span6" style="margin-left: 0;">
			<?php
				dynamic_sidebar('frontpage-widget'); 
			?>	
		</div>
		
		<div class="span3">
		
		<?php  
				do_action('pubspring_sharing', 'global_social_links', 1);
		  ?>
		
		
		
		</div>
		
		
		
		
		</section>
		
				
						<hr />
		
		
				
		<h3>Latest Updates</h3>		
		
		
		
		
				
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				
		if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
		
		?>
		<?php //the_time('F jS'); ?> 
					<h2 class="entry-title no-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


<?php 
global $more;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

?>
	<?php the_content('Continue reading...'); ?>

		
							<?php endwhile; endif; ?>		

		
		
		
					
		
		
	</div>





</div><!-- /row -->





		
		
		
		
</div><!--  /container page_body  -->		

		
<?php get_footer(); ?>