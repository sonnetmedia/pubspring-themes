<div class="show-on-phones">
		    <div class="navbar navbar-fixed-top">
		      <div class="navbar-inner nav_default_color">
		        <div class="container">
		        <div class="row">
		          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </a>
		          <a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		          <div class="nav-collapse">
		            
			<?php 			    wp_nav_menu( array(
						'theme_location' => 'primary_navigation',
						'container' =>false,
						'menu_class' => 'nav nav-pills show-on-phones nav_position',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						
						'walker' => new Bootstrap_Walker_Nav_Menu())
					); ?>

		            
		           <!--  widgets:area slug="header"  on phones we may pull in our twitter button-->
		            
		          </div><!--/.nav-collapse -->
		          </div>
		        </div>
		      </div>
		    </div>
		</div>
		
		
		<ul id="social_buttons" class="hide-on-phones">
			<li id="facebook_icon"><a href="https://www.facebook.com/readsusanisaacs">Facebook</a></li>
			<li id="twitter_icon"><a href="https://twitter.com/#!/pageandscreen">Twitter</a></li>			
		</ul>
		
		
		
	<div class="hide-on-phones">
		<div class="navbanner">
			<div class="container">
			
			<div class="row" style="background-color:gra;">
			
			<div class="seven columns">
		<h1><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php 
												
							    wp_nav_menu( array(
						'theme_location' => 'primary_navigation',
						'container' =>false,
						'menu_class' => 'nav nav-pills hide-on-phones nav_position',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'items_wrap' => '<nav role="navigation"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
						
						'walker' => new Bootstrap_Walker_Nav_Menu())
					); ?>








<?php
$banner_quote = new WP_Query( array( 'post_type' => 'sm_reviews',	'post_status' => 'publish', 'posts_per_page' => 1, 	'orderby' => 'rand', 'tax_query' => array(array('taxonomy' => 'sm_review_type','field' => 'slug','terms' => 'hot')),					
));

if ($banner_quote->have_posts()): while($banner_quote->have_posts()) : $banner_quote->the_post();

?>

	<div class="animatedTK fadeInTK  quote hot">
		<?php the_field('short_quote'); ?>
	</div>

	<div class="animatedTK fadeInTK  quote_attribution text-right" style="color: #666;">
		&mdash; <?php the_field('attribution'); ?>

				<span class="tighten" style="margin-left: -5px;">, on</span>
					<em>
				<?php 
				$reviewed_book = get_field('related_book');
				//var_dump( $reviewed_book );
				echo get_the_title($reviewed_book);
				?>
				</em>

		</div>



<?php endwhile; endif; wp_reset_postdata(); ?>
		

	








			</div>


			</div>
			

			
							<?php get_template_part('nav_menu', 'quotes'); ?>
			</div>
			
			
			
			
			
			
		</div>
	</div>
		
		
		