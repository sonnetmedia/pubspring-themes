<div class="nav">
			<?php 
			    wp_nav_menu( array(
			'theme_location' => 'primary_navigation',
			'container' =>false,
			'menu_class' => 'nav',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'items_wrap' => '<ul id="%1$s" class="%2$s nav nav-pills">%3$s</ul>',
			
			'walker' => new Bootstrap_Walker_Nav_Menu())
			); ?>
</div>
