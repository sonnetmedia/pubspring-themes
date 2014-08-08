<?php get_header(); ?>
<?php //template: Front Page ?>
<div class="container page_body">
	<div class="row padding-bottom" style="padding-top:40px;">		
		<div class="six phone-four columns hide-on-phones">
			<div class="image-shadow" style="max-width: 100%;width: 450px;height: 675px;">
				<?php echo do_shortcode("[SlideDeck2 id=459]"); ?>
			</div>
		</div><!-- /four columns -->
	<div class="six phone-four columns image-shadow hide-on-phones">
			<div class="widget_box" style="padding-bottom:60px;">					
				<?php //echo do_shortcode ("[catlist id=-7 orderby=rand numberposts=4 thumbnail=no  title_class=cat_title]")   ; ?>
				<img src="/files/2014/07/9780738217871.jpg" style="float:left;margin:0 10px 10px 5px;max-height:150px;" class="image-shadow">
					<br /><br />
					<strong>The New Cookbook!<br /><br />Big Flavor, Bold Taste and No Gluten!</strong>
					<br />
					<a href="/books/">Read more about the book here.</a>
			</div>
		</div>
	</div>
	<div class="row padding-bottom">
		<div class="six phone-four columns">
			<h3 class="margin-top:3em;"><a href="/category/news/" class="grayDark">Latest News</a></h3>		
			<?php 
				$news_parameters = array(
				'post_type' => 'post',
				'cat' => 7,
				'posts_per_page' => 1,
				'order'=> 'DESC', 
				'orderby' => 'post_date' 
				);
				$news =  new WP_Query( $news_parameters ); 
				if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>
			<?php //the_time('F jS'); ?> 
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
				<!--<hr />-->
			<?php endwhile; 
				echo	"<h6 style='margin-top:16px;clear:both;'><a href='/category/news/' class='grayDark'>More News &raquo;</a></h6><hr />";		
			endif; ?>		
	</div><!-- /four columns -->
	<div class="six phone-four columns pull-up-400f" style="margin-top:-470px;">
		<div style="margin-bottom: 3em;">		
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
			</div>
					<?php
						dynamic_sidebar('sidebar-frontpage'); 
					?>
			</div>
		</div>
	</div><!--  /container page_body  -->			
<?php get_footer(); ?>