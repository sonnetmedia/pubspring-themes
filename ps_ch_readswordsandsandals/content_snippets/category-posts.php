<style>
ul.inline {
	margin-left: 0;
}
.inline li {
	margin-right: 1em;
}
</style>
<?php 
remove_action('pre_get_posts','sm_show_books_only');
$args = array(
	'post_type' => 'post',
	'series' => get_queried_object()->slug,
);
	$series_tax_posts = new WP_Query( $args );
	
	if ($series_tax_posts->have_posts()) :
?>
<div class="row-fluid" style="padding-bottom: 4em;">
 	<div class="span12">


<h5>Read more about the <?php get_queried_object()->name ?> series</h5>
<ul class="inline">
<?php while ($series_tax_posts->have_posts()) : $series_tax_posts->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile;  ?>
</ul>

</div></div>
<?php endif; ?>
