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
		
		
		
		
		
<div class="navbanner hide-on-phones">
<div class="container">
<div class="row">

<div class="three columns">

			<h1><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
</div>

<nav id="primary-nav" class="six columns">
<?php 
	wp_nav_menu( array(
		'theme_location' => 'primary_navigation',
		'container' =>false,
		'menu_class' => '',
		'echo' => true,
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0,
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'walker' => new Walker_Nav_Menu())
	); ?>



			</nav>
			
<div class="three columns">
<?php dynamic_sidebar("sidebar-navbanner"); ?>


</div>			
			
			</div><!-- /row -->
			</div><!-- /container -->
					
			</div><!-- /navbanner -->		
		
		
		
<div class="container hide-on-phones">		
	<div class="row">
		<div class="three columns menu_button">
			<a href="javascript:;" onclick="return false;" class="show_menu">
				<div class="menu_flag">
					<h2>menu +</h2>
				</div>

			<h3>menu +</h3>
						</a>
		</div>	
	</div>
</div>
		
		
		
		
		
		
							<?php get_template_part('nav_menu', 'social_buttons'); ?>		
		
		