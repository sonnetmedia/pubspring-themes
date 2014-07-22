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
			<li id="facebook_icon"><a href="http://www.facebook.com/drzibners">Facebook</a></li>
<!--			<li id="twitter_icon"><a href="https://twitter.com/#!/">Twitter</a></li>			-->
		</ul>
		
		
		
	<div class="hide-on-phones">
		<div class="navbanner">
			<div class="container">
			
			<div class="row">
			
			<div class="five columns">
		<h1><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h3><?php bloginfo('description'); ?> </h3>
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

			</div>
<!--			large nav here -->
			<div class="five columns">
</h2>			


</div>
<div class="one column">

<!--<ul id="social_buttons" class="hide-on-phones">
	<li id="facebook_icon"><a href="https://www.facebook.com/sophia.mcclennen">Facebook</a></li>
	<li id="twitter_icon"><a href="https://twitter.com/#!/mcclennen65">Twitter</a></li>			
</ul>-->
</div>



			</div>
			

			
							<?php get_template_part('nav_menu', 'quotes'); ?>
			</div>
			
			
			
			
			
			
		</div>
	</div>
		
		
		