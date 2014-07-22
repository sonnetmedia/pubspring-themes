<div class="show-on-phones">
		    <div class="navbar navbar-fixed-top">
		      <div class="navbar-inner nav_default_color">
		        <div class="container">
		        <div class="row">
		          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><br />
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </a>
		          <a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" style="color:#000 ;"><?php bloginfo('name'); ?></a>
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
	<div class="hide-on-phones">
		<div class="navbanner">
			<div class="container">
			<div class="row"  style="margin-top:10px;">
			
			<div class="five columns">
				<h1><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2 class="subtitle"><?php bloginfo('description'); ?></h2>
				
			</div>

<div class="seven columns">


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
<!--			<div class="seven columns">
			
			<div id="journal_carousel" class="carousel image-shadow" style="width: 500px;margin: 20px 0 40px 0;">
			<?php //echo do_shortcode( "[SlideDeck2 id=445]" ); ?>	
			</div><!-- /carousel_outer --*>
			
			
			
			</div>
			-->
			
			
			
			
			
			
			
			
			</div>
							<?php get_template_part('nav_menu', 'quotes'); ?>
			</div>
		</div>
	</div>
	
		<div class="inner-wrapper">	
		
							<?php //get_template_part('nav_menu', 'social_buttons'); ?>		
		
		