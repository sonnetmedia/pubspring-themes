<?php 
function pubspring_child_enqueue_scripts() {

	wp_register_script('bootstrap-dropdown', 
	get_template_directory_uri() . '/js/libs/bootstrap-dropdown.js', array('jquery'), '1.0.0.', true);
	wp_enqueue_script('bootstrap-dropdown');
	
}     
add_action('wp_enqueue_scripts', 'pubspring_child_enqueue_scripts');

// create widget areas: 
$sidebars = array('Front Page');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-frontpage',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="frontpage twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){
	
 // jQuery SmoothScroll | Version 09-11-02
    $('a[href*=#]').not('a[href=#tag_search_tool]')
                   .not('a[href=#chapter_search_tool]')
                   .click(function() {

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

