<div class="row">
	<div class="page_heading well"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>
	
	
	<div class="three phone-four columns">
			<h2><?php the_category(' '); ?></h2>
	
	</div>
	
	<div class="nine phone-four columns hide-on-phones hide-on-portrait">
	
	
<!--<div class="hide-on-tables hide-on-portrait">	
<?php // 	echo do_shortcode ("[catlist name=recipes orderby=rand numberposts=4 thumbnail=yes thumbnail_size=150,150 class=catlist title_tag=span title_class=cat_title]")    ?>
</div>-->

	<?php 
	//pulls from the books post type for the books post type archive-books
	$recipe_list_args = array( 
	'post_type' => 'post', 
	'posts_per_page' => 4, 
	'orderby' => 'rand' , 
	'cat' => '10',
	);
	
	$recipe_list = new WP_Query( $recipe_list_args );
	if ( $recipe_list->have_posts() ) : 
	$count = 0; 
	while ( $recipe_list->have_posts() ) : $recipe_list->the_post();
	$count++;
	?>

<div class="catlist <?php if ($count == 4) : ?> hide-on-tablets<?php endif; ?>" style="  margin-left: 0%;"> 
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail(array(150,150), array('class' => 'catlist')); ?> 
	</a>
</div>     

			<?php 	endwhile; endif;   wp_reset_postdata(); //end loop ?>

	</div>
	
	
	
	</div>
</div>




