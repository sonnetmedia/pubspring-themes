<?php //template name: Front Page
get_header(); ?>

<div class="container page_body" style="padding-top: 50px;">




<div class="row padding-bottom" style="height: 100%;">
	<div class="span5">
		<section id="content" style="margin-bottom: 3em;">

<?php   wooslider( array( 'slider_type' => 'slides', 'animation' =>'fade','smoothheight' => 'true' ) );     ?>


		</section>
		
		
		<style>
		audio{
			opacity: .25;

		}
		</style>
		<audio controls autoplay loop>
		  <source src="/wp-content/themes/ps_ch_lairdhunt_kindone/images/laird2.ogg" type="audio/ogg" />
		  <source src="/wp-content/themes/ps_ch_lairdhunt_kindone/images/laird2.mp3" type="audio/mpeg" />
		</audio><br />
		<span style="font-size: 10px;">music for <em>Kind One</em> by duncan b barlow</span>
		
	</div><!-- /four columns -->

	
	
	
	<div class="span6" style="margin-left: 8px;">
	<p class="hand-writing">
	Once I lived in a place where demons dwelled. I was one of them. I am old and <span style="margin-left: 18px;">I was young</span> then, but <span style="font-size:32px ;">truth</span> is this was not so <span style="margin-left:-10px;">long ago, time just took the shackle it had on me and gave it a twist.</span> I live in Indiana now, if you can call these <span style="margin-left: 14px;">days</span> I spend in this house living. I might as <span style="margin-left:-14px;">well be hobbled.</span> A thing that lurches <span style="margin-left: 18px;">across</span> the earth. One bright morning of the world I was in Kentucky. I remember it all. <br /><span style="margin-left: -32px;">The citizens of the ring of hell</span> I <span style="margin-left: -12px;">have already planted my flag in do not forget.</span></p>
	<p style="text-align: right;"><em>Kind One</em>&nbsp;&nbsp;&nbsp;<a href="#book-info">more &raquo;</a></p>
	
	</div>
	
</div><!-- /row -->





<div id="book-info" class="row" style="margin-top: 450px;margin-bottom: 400px;">
		<?php //this pulls out the most recent book		
			$args = array( 'post_type' => 'sm_books', 'posts_per_page' => 1, 'orderby' => 'date' , 'order' => 'desc', 'post_status' => array( 'publish', 'future'  ) );
			$query = new WP_Query( $args );
			$child_id = get_the_ID(); 
			wp_reset_query(); 
		?>

<?php
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$child_id = get_the_ID(); ?>


<div class="span4">
	<div class="books">
		<div class="book">
			<img src="<?php the_field('cover_image'); ?>" alt="" class="image-shadow" style="width: 100%;" />
		</div>
	</div>

<br /><br />


<!-- 		<a data-toggle="modal" data-target="#modal_<?php //the_ID(); ?>" href="<?php //the_permalink(); ?>" >		</a>	 -->




</div>

<div class="span8">

<div class="quote" style="color: white;">


<?php the_field('short_description'); ?>

</div>

	<h1 id="book-detail" class="entry-title <?php  $slug = basename(get_permalink( $child_id )); echo $slug; ?>"><?php the_title(); ?></h1>

<h2><?php the_field('subtitle'); ?></h2>



	
		<div class="quote" >
		
		
		<?php the_field('synopsis'); ?>		
		
<!--<p>		<a href="http://lairdhunt.net/books">read more at www.lairdhunt.net</a></p>-->
		
		</div>

				<?php
if($post->post_status == 'future') : ?>
<a class="btn btn-primary hidden-phone" data-toggle="modal" data-target="#modal_<?php the_ID(); ?>" href="#" >Preorder Now</a>	
<a class="btn btn-primary visible-phone" href="#buy_books_<?php the_ID(); ?>" >Preorder Now</a>		



<?php else : ?>
<a class="btn btn-primary hidden-phone" data-toggle="modal" role="button" data-target="#modal_<?php the_ID(); ?>" href="#" >Buy Now</a>	
<a class="btn btn-primary visible-phone" href="#buy_books_<?php the_ID(); ?>" >Buy Now</a>		

<?php endif; ?> 
<div class="pull-right">
<?php //book sharing icons from functions.php
//pubspring_book_sharing(); ?>

<div class="fb-like" data-href="http://kindonenovel.com" data-send="false" data-width="450" data-show-faces="false" data-action="recommend" data-colorscheme="dark" data-font="trebuchet ms"></div>
 <a href="http://www.goodreads.com/update_status?isbn=0<?php the_field('isbn'); ?>&url=http://kindonenovel.com" target="_blank"><img alt="Share on Goodreads" style="height:30px;" border="0" src="<?php echo get_template_directory_uri(); ?>/images/booksellers/goodreads-badge-add-plus-2d25bb0f32eeac8660c13a521cf00c8e.png" /></a>
	        <script src="http://www.goodreads.com/javascripts/widgets/update_status.js" type="text/javascript"></script>
	    


</div>
</div>










<?php endwhile; endif; ?>
</div> <!--//END BOOK ROW -->


































</div><!--  /container page_body  -->		



		
<?php get_footer(); ?>