<?php  //loop-endnotes_by_chapter    ?>
<div class="twelve columns">
	<div class="one column">
		<p>Page</p>
	</div>
	<div class="eleven columns">
		<p>Note</p>
	</div>
</div>


<?php 
$post_permalink = get_permalink(); 
$args = array( 
	'post_type' => 'sm_endnotes', 
	'posts_per_page' => -1, 
	'orderby' => 'date' , 
	'order' => 'asc', 
	
	
	
	
	'tax_query' => array(
			array(
				'taxonomy' => 'endnote_chapters',
				'field' => 'slug',
				'terms' => 'chapter-00-prologue'
			)
		)
	
	
	
	
	
 );
$query = new WP_Query( $args );
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>






<?php
$terms = get_the_terms( $post->ID, 'endnote_chapters' );
						
if ( $terms && ! is_wp_error( $terms ) ) : 

	$chapter_name = array();

	foreach ( $terms as $term ) {
		$chapter_name[] = $term->name;
	}
						
	$the_chapter = join( ", ", $chapter_name );
?>

	<span><?php 
	
if($chapter_name[0]){
	echo $the_chapter; 
}	
	?></span>

<?php endif; ?> 
 
  
 
 
 
 


<div class="twelve columns">

	<div class="one column">
		<h2 class="note-page-number" id="<?php the_ID(); ?>" style="display: inline;"><?php  the_field('endnote-page_number');  ?>		</h2>
	</div>

	<div class="eleven columns"> 	
		<?php the_content(); ?>
		
					<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		
		<a href="<?php  the_permalink();   ?>" class="small">link</a>			
	</div>
</div>
<hr />
<?php endwhile; endif; ?>



