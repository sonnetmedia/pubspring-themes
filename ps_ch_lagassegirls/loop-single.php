<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) 
	{ // check if the post has a Post Thumbnail assigned to it.
			?>
			
		<div class="six phone-four columns hide-on-phones">			
			<?php the_post_thumbnail('full', array('class' => 'image-shadow')); ?> 
			<hr class="space" />
			<div style="max-width: 85%;" class="sidebar-single">
			<?php 
				dynamic_sidebar('sidebar-single'); 
			//get_sidebar(); ?>
			</div>
		</div>

		<div class="six phone-four columns">
<?php  	} //END IF HAS POST THUMBNAIL
		else { 
	?>
	
		<div class="four phone-four columns mb-50 hide-on-phones hide-on-portrait sidebar-single">
			<?php dynamic_sidebar('sidebar-single'); ?>
		</div>
		
		<div class="eight phone-four columns mb-10">


<?php  }    // END ELSE      BELOW POST CONTENT WHETHER OR NOT THERE'S A THUMBNAIL ?>		
	
	
	
			<header>
				<h1 class="entry-title" style="margin-bottom: .25em;"><?php the_title(); ?></h1>	
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
	
					<div class="entry-meta" style="max-width: 100%;">
					<?php pubspring_entry_meta(); ?>
						<?php comments_template(); ?>
					</div>
			</div>


		</div><!-- END nine columns -->
		
		
	</div>

<?php endwhile; // End the loop ?>