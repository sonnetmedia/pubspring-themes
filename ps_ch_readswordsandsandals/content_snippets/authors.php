
<?php $args = array(
	'blog_id'      => $GLOBALS['blog_id'],
	'role'         => 'editor',
	'meta_key'     => 'pubspring_show_user_on_website',
	'meta_value'   => '1',
	'meta_compare' => '',
	'meta_query'   => array(),
	'include'      => array(),
	'exclude'      => array(),
	'orderby'      => 'login',
	'order'        => 'ASC',
	'offset'       => '',
	'search'       => '',
	'number'       => '',
	'count_total'  => false,
	'fields'       => 'all',
	'who'          => ''
 ); ?>
 
 
 
 
 <div class="sidebar-section">
 <h6 class="no-margin">Authors</h6>
 <ul class="upcoming">
 <?php 
 $authorusers = get_users($args);
 foreach ($authorusers as $user) {
         echo '<li><a href="/author/'. $user->user_nicename .'">' . $user->display_name . '</a></li>';
     }
  ?>
 
 
 </ul>
 </div>
 
 