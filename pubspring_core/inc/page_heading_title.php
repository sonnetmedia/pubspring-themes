<div class="row">
	<div class="span12"><?php // /* page heading puts the title in a styled box - well is extra styling */ ?>


<?php  if (is_archive())   { ?>




		<h2 class="page-header">
		<?php  
		
//		echo 'Keyword: '; 
		
		   ?>
		<?php wp_title("",true); ?></h2>

<?php  }    ?>







<?php  if (is_page())   { ?>

		<h2 class="page-header"><?php wp_title("",true); ?></h2>

<?php  }    ?>



<?php  if (is_single())   { ?>
	
		<h2 class="page-heade"><?php wp_title("",true); ?></h2>
		
<?php  }    ?>








<?php  if (is_search()) {    ?>

		<h2 class="page-header">
					<?php printf( __( 'Search results: %s', 'test' ), '<span>' . get_search_query() . '</span>' ); ?>
		
		
		
		</h2>

<?php  }    ?>


	</div>
</div>
