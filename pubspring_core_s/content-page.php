<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package pubspring_core_s
 * @since pubspring_core_s 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pubspring_core_s' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'pubspring_core_s' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
