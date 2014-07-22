<?php
// hook the translation filters to change admin menu
//add_filter(  'gettext',  'change_post_to_article'  );
//add_filter(  'ngettext',  'change_post_to_article'  );

//function change_post_to_article( $translated ) {
  //   $translated = str_ireplace(  'Posts',  'Blog/News',  $translated );  // ireplace is PHP5 only
    // return $translated;
//}
//add script support at the child level so we don't call them in the parent if we don't need them
function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){
 // jQuery SmoothScroll | Version 09-11-02
    $('a[href*=#]').click(function() {

        // duration in ms
        var duration = 1200;

        // easing values: swing | linear
        var easing = 'swing';

        // get / set parameters
        var newHash = this.hash;
        var target = $(this.hash).offset().top;
        var oldLocation = window.location.href.replace(window.location.hash, '');
        var newLocation = this;

        // make sure it's the same location
        if (oldLocation + newHash == newLocation)
        {
            // animate to target and set the hash to the window.location after the animation
            $('html:not(:animated),body:not(:animated)').animate({
                scrollTop: target
            },
            duration, easing,
            function() {

                // add new hash to the browser location
                window.location.href = newLocation;
            });

            // cancel default click action
            return false;
        }

    });	
});
</script>
<?php 
}
add_action('wp_footer', 'wp_cycle_args');
 function hr_scripts() { ?> 
<script type="text/javascript" src="http://use.typekit.com/ltq3isx.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
add_action('wp_head', 'hr_scripts');
// create widget areas: 
$sidebars = array('Front Page');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-frontpage',
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="frontpage twelve phone-four columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}