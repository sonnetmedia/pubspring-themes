<?php //small buttons for posts

function ps_goodreads() { ?>
<a href="http://www.goodreads.com/book/isbn/<?php the_field('isbn'); ?>" target="_blank" class="flow_left button-goodreads">
	<img alt="Share on Goodreads" style="height:30px;" border="0" src="<?php echo get_template_directory_uri(); ?>/images/booksellers/goodreads-badge-add-plus-2d25bb0f32eeac8660c13a521cf00c8e.png" />
</a>	   
<?php }

add_action ('ps_book_sharing', 'ps_goodreads', 10);

function ps_addthis() {
	 ?>
	 
	 <!-- AddThis Button BEGIN -->

<script type="text/javascript">
addthis.counter("#atcounter");
var addthis_config =
{
   ui_508_compliant: true,
      data_track_addressbar: false
}

var addthis_share = 
{ 
// ...
    templates: {
                   twitter: 'Check out {{title}} {{url}}',
               }
}
</script>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_compact"></a>

<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
<!-- AddThis Button END -->
<?php } 

add_action ('ps_sharing' ,'ps_addthis', 10);


function ps_addthis_small() { ?>




<script type="text/javascript">
addthis.counter("#atcounter");
var addthis_config =
{
   ui_508_compliant: true,
addthis_config.data_track_addressbar = false

}

var addthis_share = 
{ 
// ...
    templates: {
                   twitter: 'Check out... {{title}} {{url}}',
               }
}
</script>





<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>
<!-- AddThis Button END -->
<?php  }  

add_action ('ps_sharing_posts' ,'ps_addthis_small', 10);