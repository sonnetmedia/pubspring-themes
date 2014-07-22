<div>

<h1 <?php post_class('entry-title no-margin'); ?>><?php the_title() ?></h1>
<?php 	echo '<time class="small light updated" style="font-size:80%;" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'pubspring'), get_the_time('F, Y'), get_the_time()) .'</time>';
 ?>

	<?php the_field('description'); ?>	
	<div class="quote_attribution text-right">&mdash;
		<?php $link_to_original = get_post_meta($post->ID, 'link_to_original', true);
		if($link_to_original) : ?>
				<a href="<?php the_field('link_to_original'); ?>"><em><?php the_field('publication'); ?></em> (link to original &raquo; )</a>
	<?php else: ?>
				<em><?php the_field('publication'); ?></em>
			<?php endif; ?>
	</div>

</div>
<hr />
<!--adds date jS-->