<div class="navbar-inner">
  <div class="container">
  
  <?php global_topbar(); ?>

  <div class="nav_main_content">
     <h1>
     	<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
         <?php bloginfo('name'); ?>
       </a>
     </h1>
     
     
     
    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      MENU
    </button>
    <div class="nav-collapse collapse">
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
    
    </div>
    
	<?php global_topbar_quotes(); ?>  
	
</div>  
</div>
