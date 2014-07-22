<?php 


 function header_scripts() { ?> 
<script type="text/javascript">
  (function() {
    var config = {
      kitId: 'zgf2zci',
      scriptTimeout: 3000
    };
    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
  })();
</script>
<meta name="google-site-verification" content="vE-0nLiM9SWS6TZI8Jq0d4-cvu05lDctqvHCbkL0iqg" />
<?php }
add_action('wp_head', 'header_scripts');

function wp_cycle_args() { 
//END PHP to show script?>
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

<?php //BEGIN 
}
add_action('wp_footer', 'wp_cycle_args');