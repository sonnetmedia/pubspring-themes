<?php 
//Template Name: Home - Page Content
get_header(); ?>
<div class="container page_body index">
	<div class="row-fluid">
		<div id="content" role="main">		
							<?php while (have_posts()) : the_post(); 
				
					the_content();
					endwhile;
				?>

			
		</div>
		
	</div>
<!-- /row -->
<hr />
<h3>Latest Updates</h3>		
	<div class="row-fluid">



		
		
		
		
				
		
		<?php 
		$news_parameters = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'order'=> 'DESC', 
							'orderby' => 'post_date' 
						);
						
		$news =  new WP_Query( $news_parameters ); 
				$count = 0; 
		if ( $news->have_posts() )  : while ( $news->have_posts() ) : $news->the_post(); $count++;
		
		?>
		
		<div class="span5 
		<?php  if ( $count > 1 ) : 
		echo 'offset1';
		endif; ?>
		
		
		
		" style="min-height: ;">
		
		<?php //the_time('F jS'); ?> 
					<h2 class="entry-title no-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


<?php 
global $more;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

?>
	<?php the_content('Continue reading...'); ?>
		</div>
		
							<?php endwhile; endif; ?>		

		
		
		
		
		
		

		
		</div>



















</div> <!-- /container -->
<?php get_footer(); ?>