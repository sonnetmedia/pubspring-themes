<aside id="sidebar" role="complementary">
	<div class="sidebar-box">


<?php 
// If we are not on a regular page, call the blog widget on top of the global widget	
if (is_home()) { dynamic_sidebar('sidebar-blog');  } 
elseif (is_single()) { dynamic_sidebar('sidebar-blog');  }

elseif ( is_post_type_archive('sm_writing') || is_tax('sm_writing_cats')       ) { 
$menu_obj = wp_get_nav_menu_object('sub_navigation_writings'); 
		    wp_nav_menu( array(
						'theme_location' => 'sub_navigation_writings',
						'container' => 'div',
//						'menu_class' => 'nav nav-pills show-on-phones nav_position',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'fallback_cb' => false,
						'depth' => 0,
						'items_wrap' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns"><h6>Writing '.esc_html($menu_obj->name).' </h6><ul class="submenu">%3$s</ul></div></article>',
						
						'walker' => '')
					); 






 }
?>

<?php
	dynamic_sidebar('sidebar-global'); 
?>

</div>
</aside><!-- /#sidebar -->
		





<?php
//$location = 'primary';
//$menu_obj = sm_get_menu_by_location($location ); 
//wp_nav_menu( array('theme_location' => $location, 'items_wrap'=> '<h3>'.esc_html($menu_obj->name).'</h3><ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>') );
?>