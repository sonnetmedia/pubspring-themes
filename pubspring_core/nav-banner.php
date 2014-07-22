<header class="navbanner subhead hidden-phone" id="overview">
  <div class="container">
  	<div class="row">
  	<div class="span6">
		<h1 style="margin: 0;">
		<img src="/wp-content/themes/ps_ch_pubspring_main/images/ps_logo_90x111.png" height="59" alt="" align="baseline" style="height: 59px;margin-top: -13px;margin-right: 4px;" />
		
		<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>  	
<!--	  <h3 class="page-side pull-left"><?php bloginfo('description'); ?></h3>    -->
		</div>
		<div class="span6">
					<?php 
					    wp_nav_menu( array(
					'theme_location' => 'primary_navigation',
					'container' =>false,
					'menu_class' => 'nav nav-pills',
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

	 

	</div><!-- /END ROW -->
  </div>
</header>

