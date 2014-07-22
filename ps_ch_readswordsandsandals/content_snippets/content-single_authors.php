<?php /* Start loop */ ?>

<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<article>

	<div class="article_header">
		<h1 class="page-title">
<?php echo $curauth->display_name; ?>

		 </h1>
	</div><!-- //END HEADER -->


<!--//bio stuff here -->

<?php
$authorID = $curauth->ID;
the_author_meta( description, $authorID);?>

<?php //the_author_meta( 'user_nicename' , $authorID); ?>


<?php if(get_the_author_meta('user_url' , $authorID) != ''): ?>
<a href="<?php the_author_meta( 'user_url' , $authorID); ?>" title="website"><?php the_author_meta( 'user_url' , $authorID); ?></a><br />
<?php endif; ?>


<?php if(get_the_author_meta('facebook' , $authorID) != ''): ?>
<a href="http://facebook.com/<?php the_author_meta( 'facebook' , $authorID); ?>" title="Facebook">Facebook</a><br />
<?php endif; ?>


<?php if(get_the_author_meta('twitter' , $authorID) != ''): ?>
<a href="http://twitter.com/<?php the_author_meta( 'twitter' , $authorID); ?>" title="Twitter">Twitter</a><br />
<?php endif; ?>



<section>

	<?php  get_template_part('/content_snippets/books','list_author');  ?>

</section>		
				
				



<?php if ( have_posts() ) : ?>
<h3 style="clear: both;"><?php _e('Posts by ', 'pubspring'); echo $curauth->display_name; ?></h3>	
<?php while ( have_posts() ) : the_post(); ?>
	<div class="entry-content">

		


	
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
	<?php //the_category(' '); ?>
	
	<h2 class="title-list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="excerpt">
		<?php the_content('Continue reading...'); ?>
	</div>
	
	
	<div class="divider"></div>
	</section>	
										
					
			<hr />			
		</div>

<?php endwhile;endif; // End the loop ?>



<footer>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
	<p><?php the_tags(); ?></p>
</footer>

	</article>