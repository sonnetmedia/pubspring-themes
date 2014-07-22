<?php 
//Template Name: home, books centered
get_header(); ?>

<style>

.text-right p{
padding-right: 0.3em;
	text-align: right;
//	border-right: 3px solid #EEE;
}

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
<div class="container page_body">
<small class="latest">latest book</small>
<?php //Pull the most recent book post type and get related reviews and a synopsis
$post_permalink = get_permalink();
	$args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
	$query = new WP_Query( $args );	
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>

<div class="row-fluid">
	
	<div class="span4">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<h2 style="font-size: 1.4em;line-height: 150%;"><?php the_field('subtitle'); ?></h2>
		<?php $child_id = get_the_ID(); ?>		
		<?php endwhile; endif;wp_reset_query(); ?>
		<br />
		<br />		
<?php 
$review_loop = new WP_Query(array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 20, 'orderby' => 'rand','meta_key' => 'related_book', 'meta_value' => $child_id, )	);
if ($review_loop->have_posts()) :	?>		

	<section class="quotes">
			<?php while($review_loop->have_posts()) : $review_loop->the_post(); ?>
		<div class="quote_box" <?php if( ($review_loop->current_post) >0 ) { echo("style='display:none;'");}?>>
			<blockquote>
				<?php the_field('short_quote'); ?>

				<div class="quote_attribution" style="text-align: left;padding-left: 20px;">&mdash;
					<?php the_field('attribution'); ?>
				</div>
			</blockquote>
		</div><!-- /END quote_box -->
			<?php endwhile;  ?>
	</section>
</div>
<?php endif;wp_reset_postdata(); ?>

	
	<div class="span4">
		
		<?php 	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			<section id="content" style="margin-bottom: 3em;">
			
			
			
				<a href="<?php the_permalink(); ?>" >
								<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail('category-medium', array('class' => 'image-shadow')); 
						} 
						?>
				</a>
				<div class="caption" style="margin-top:.5em;">
						<?php  get_template_part('inc/button', 'buy_retailers');    ?>
				</div>
				
					
					
					
					
					
					
					
					<?php if($post->post_status == 'future') : ?>
							<aside style="clear: both;margin: 1em 0;">
							<p>Publication Date: <?php the_time('M d, Y') ?></p>
							</aside>
					<?php endif; ?> 
					<?php if ( get_post_meta($post->ID, 'meta_data', true) ) : ?><?php echo get_post_meta($post->ID, 'meta_data', true) ?><?php endif; ?>
					
					
					
					
					
					
			</section>
		<?php endwhile; endif;wp_reset_query(); ?>			

	</div><!-- /four columns -->
		
		
	<div class="span4">
	<h2 class="widgettitle">Journal</h2>
		<ul class="post_list">
				<?php 
				$news_parameters = array('post_type' => 'post', 'posts_per_page' => 3,'order'=> 'DESC', 'orderby' => 'post_date' );
				$news =  new WP_Query( $news_parameters ); 
				if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post();
				?>
				
					<li><time><?php the_time('F jS'); ?></time> <br /><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;
				echo '<div class="dig-in"><a href="/journal/">view all posts</a></div>';
				 endif; ?>		
			</ul>
			<hr />
			
			<?php the_widget('TribeEventsListWidget',  'title=Upcoming Events&limit=3&no_upcoming_events=false'); ?> 
			
			
			
						<?php //dynamic_sidebar('frontpage-widget'); ?>
			
			
		</div>

</div><!-- /row -->

		
</div><!--  /container page_body  -->		
		
<?php get_footer(); ?>