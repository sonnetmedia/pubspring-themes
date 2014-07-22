<?php global_page_heading(); ?>

<?php  //$page_title = $wp_query->post->post_title;    ?>
<?php  $page_title = $post->post_title;    ?>
<div class="row title-row">
	<div class="span12"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>


<?php  if (is_archive())   { ?>

		<h2 class="page-header"><?php wp_title("",true); ?></h2>

<?php  }    ?>



<?php  if (is_home()) //is_home is home.php which is the news/blog page
  { ?>
		<h2 class="page-header <?php  $page_title;  ?>"><?php single_post_title();  ?></h2>

<?php  }    ?>



<?php  if (is_single())   { ?>
	
		<h2 class="page-header"><?php wp_title("",true); ?></h2>
		
<?php  }    

  elseif (is_page())   { ?>

		<h2 class="page-header<?php $page_title; ?>"><?php wp_title("",true); ?></h2>
		<?php // the_meta(); THIS WAS AN EXPERIMENT ?>

<?php  }    ?>











<?php  if (is_search()) {    ?>

		<h2 class="page-header">
					<?php printf( __( 'Search results: %s', 'test' ), '<span>' . get_search_query() . '</span>' ); ?>
		
		
		
		</h2>

<?php  }    ?>


	</div>
</div>
