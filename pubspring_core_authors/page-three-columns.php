<?php 
//Template Name: Page Three Column
get_header(); ?>
<div class="container page_body index">
	<?php get_template_part('/inc/page_heading_title'); ?>
	<div class="row-fluid">
	
	
	<div class="span2">
		<?php dynamic_sidebar('sidebar-column'); ?>
	</div>
	
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="content" class="span7" role="main">	
			<?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
				<div class="flow_left" style="max-width: 300px;">
				<?php  do_action('captioned_images', 'category-medium');    ?>
				</div>
			<?php  }    ?>
			<?php the_content(); ?>
<hr />
	<?php 
	
	
	
	 $args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => $post->ID,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args); 
	 
		foreach($pages as $page) {
		 ?>	
		 	
<?php 
$content = $page->post_content;
$content = apply_filters( 'the_content', $content );
	?>

<h2 id="<?php  echo $page->post_name;    ?>"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
<div class="entry"><?php echo $content; ?></div>
<p class="small quiet" style="text-align: center;"><a href="#fb-root" class="small" style="text-align: center;"> - top - </a></p>
<hr />
		 <?php } ?>
	
</div>

<div class="span3 hidden-tablet">
	<?php get_template_part('sidebar'); ?>
</div>




				<?php endwhile; ?>
	
				<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
	
					<?php get_template_part( 'no-results', 'index' ); ?>
	
				<?php endif; ?>
<?php  //END CONTENT    ?>	
	</div><!-- /row -->
 </div> <!-- /container -->

<?php get_footer(); ?>