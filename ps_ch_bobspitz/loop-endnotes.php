<div class="twelve columns">
	<div class="one column">
		<p>Page</p>
	</div>
	<div class="eleven columns">
		<p>Note</p>
	</div>
</div>




<?php  


<?php 
  $cats = get_terms(); 
$post_permalink = get_permalink(); 
$args = array( 
	'post_type' => 'sm_endnotes', 
	'posts_per_page' => 100, 
	'orderby' => 'date' , 
	'order' => 'asc', 
	'post_status' => array( 'publish', 'future'  ),
	'cat' => $cat->tax_id,
	'endnote-chapters' => $cat->name
		
		

 );
$query = new WP_Query( $args );
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>



<?php  



               foreach ($cats as $cat) {

                   $cat_id= $cat->term_id;

                   echo "<h2>".$cat->name."</h2>";

                       <a href="<?php the_permalink();?>"><?php the_title(); ?></a>

               <?php } // done the foreach statement ?>


    ?>

<div class="twelve columns">
	<div class="one column">
		<h2 class="note-page-number" id="<?php the_ID(); ?>" style="display: inline;"><?php  the_field('endnote-page_number');  ?>		</h2>
	</div>

	<div class="eleven columns"> 	
		<?php the_content(); ?>
		<a href="<?php  the_permalink();   ?>" class="small">link</a>			
	</div>
</div>
<hr />
<?php endwhile; endif; ?>



