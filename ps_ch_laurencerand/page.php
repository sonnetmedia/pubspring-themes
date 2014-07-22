<?php //template name: Front Page
get_header(); ?>



<div class="container page_body">
	<div class="row-fluid">
		<div class="span7">
<div class="row-fluid">


						<span class="visible-phone"><?php  get_template_part('nav', 'interior');    ?></span>
					<div class="interior-container">
						<div style="padding: 0 50px;">
						
						<h3 class="visible-phone"><em>Lauren Cerand</em></h3>
						<span class="hidden-phone"><?php  get_template_part('nav', 'interior');    ?></span>
						</div>
					</div>
</div>

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
		
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>
				<?php the_post_thumbnail('full', array('class' => 'image-shadow')); ?> 
		
				<?php  	
				} 
				?>
<div class="row-fluid">
					<div class="interior-container">	
											<div class="inner-padding">
					<?php the_content(); ?>
					</div>
				</div>
</div>				
<?php  endwhile;   endif; ?>
</div><!-- //CLOSE -->		
	
	
	
	
	
		<div class="span2 middle-column hidden-phone">
			&nbsp;
		</div>
		<div class="span3" style="padding-top: 200px;">
		
		<?php
			dynamic_sidebar('sidebar-global'); 
		?>
		
		
		
		
		
		
		</div>
	
	
	</div>
</div><!--  /container page_body  -->		
<?php get_footer(); ?>