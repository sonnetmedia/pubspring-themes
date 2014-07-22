<?php
// hook the translation filters to change admin menu
//add_filter(  'gettext',  'change_post_to_article'  );
//add_filter(  'ngettext',  'change_post_to_article'  );

//function change_post_to_article( $translated ) {
  //   $translated = str_ireplace(  'Posts',  'Blog/News',  $translated );  // ireplace is PHP5 only
    // return $translated;
//}
//add script support at the child level so we don't call them in the parent if we don't need them

function pubspring_child_enqueue_scripts() {

	wp_register_script('bootstrap-tooltip', 
	get_template_directory_uri() . '/js/libs/bootstrap-tooltip.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-tooltip');
	
	wp_register_script('bootstrap-dropdown', 
	get_template_directory_uri() . '/js/libs/bootstrap-dropdown.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-dropdown');
	
}     
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');



function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){

$('img.wp-post-image').tooltip()

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
 function header_scripts() { ?> 
<script type="text/javascript">
  (function() {
    var config = {
      kitId: 'llk4ofn',
      scriptTimeout: 3000
    };
    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
  })();
</script>
<style type="text/css">
    h2.subtitle {
        color: black;
        margin-top: 1em;
        margin-bottom: 1em;
        font-size: 19px;
    }

</style>

<?php }
add_action('wp_head', 'header_scripts');
// create widget areas: 
$sidebars = array('Front Page');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-frontpage',
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
$sidebars = array('Single Pages');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-single',
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}




register_nav_menus( array(
	'recipes' => 'Global Recipes Menu'
) );