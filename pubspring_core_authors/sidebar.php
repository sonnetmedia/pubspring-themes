<aside class="sidebar" role="complementary">

<?php add_to_top_of_sidebar(); ?>

<?php 
	if ( is_post_type_archive('sm_writing') ) {
		if ( !dynamic_sidebar( 'sidebar-writing') ) : 
				dynamic_sidebar('sidebar-writing'); 
		 endif; 
	}
 ?>

<?php 
	if ( is_home()  || is_archive() && !is_post_type_archive()   ) {
			dynamic_sidebar('sidebar-blog'); 
	}
?>
<?php

?>
<?php dynamic_sidebar('sidebar-global'); //GLOBAL WIDGET FOR ALL PAGES ?>
</aside><!-- /#sidebar -->
		






