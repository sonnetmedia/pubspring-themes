//THIS IS REALLY A LAND OF LOST CODE

//THIS IS THE OLD TOP NAVIGATION

<div class="hide-on-phones show-on-phones" style="display: none;">
	<div class="navbanner">
		<div class="container">
		<div class="row">
		
		<div class="twelve columns">
			<h1 style="display: inline;"><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			
			<a href="">+ menu</a>
			
			<div class="ten columns offset-by-one slide-menu" style="background-color:#d1d0cb;padding: 1em;color: #000;">
				
			<?php 
												
							    wp_nav_menu( array(
						'theme_location' => 'slide-down',
						'container' =>false,
						'menu_class' => '',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'items_wrap' => '<nav role="navigation2"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
						
						'walker' => new Walker_Nav_Menu())
					); ?>
			
				
				</div>
			
		
		
		</div>
		</div>
	</div>
</div>


//stuff
<?php


$cpt_query_args = array(
'post_type' => 'sm_endnotes',
'posts_per_page' => 5,
'cat' => $cat->cat_id,
'endnote_chapters' => $cat->name
);


            // get all the categories from the database
            $cats = get_categories(); 
 
                // loop through the categries
                foreach ($cats as $cat) {
                    // setup the cateogory ID
                    $cat_id= $cat->term_id;
                    // Make a header for the cateogry
                    echo "<h2>".$cat->name."</h2>";
                    // create a custom wordpress query
                    query_posts($cpt_query_args);
                    // start the wordpress loop!
                    if (have_posts()) : while (have_posts()) : the_post(); ?>
 
                        <?php // create our link now that the post is setup ?>
                        <a href="<?php the_permalink();?>"><?php the_content(); ?></a>
                        <?php echo '<hr/>'; ?>
 
                    <?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
                <?php } // done the foreach statement ?>

