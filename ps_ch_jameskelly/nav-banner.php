<header class="navbanner subhead hidden-phone" id="overview">
  <div class="container">
  	<div class="row-fluid">
		<div class="span12 pull-right">
					<?php 
					    wp_nav_menu( array(
					'theme_location' => 'primary_navigation',
					'container' =>false,
					'menu_class' => 'nav nav-pills pull-right',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					
					'walker' => new Bootstrap_Walker_Nav_Menu())
					); ?>
			</div>
			
		</div>
			
		<div class="row-fluid">
			
			<div class="span12">
				<h1><a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>  	
				</div>
			

	</div><!-- /END ROW -->
	
	
	<?php global_banner(); ?>
	
	
  </div>
</header>

