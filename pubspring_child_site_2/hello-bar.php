<script type="text/javascript">



	// Your Twitter handle.
	var twitterHandle = 'mikejcasey'; // Your Twitter handle without the @
	var twitterTopOffset = '5px'; // how far from the top of the Hello Bar?
	// You should not need to edit anything else.
		var showFollowerCount = false;
	
    new HelloBar( '', {
		showWait: 0,
		forgetful: false,
		barColor: '#2e2e2e',
		texture:'dark-gradient',
		borderSize:1,
		height:35,
		borderColor:'#3b3b3b',
		textColor:'#333',
		helloBarLogo:false,
		onReady: function( hellobar, options ){
			// We can even read the options and see that the images should be dark.
			var twitterButton = '';
			if( options.imageStyle == 'dark-images' ){
				twitterButton = 'blue';
			}else{
				twitterButton = 'grey';
			}
			// Let's use the onLoad callback to bring the twitter iFrame in.
			var twitterCode = '<div class="container"><div class="row"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.html?button=' + twitterButton + '&text_color=' + options.textColor.replace('#','') + '&link_color=' + options.linkColor.replace('#','') + '&screen_name=' + twitterHandle + '&show_count=' + showFollowerCount +'" style="width:150px; height:20px;position:relative; left:406px;top:5px;' + twitterTopOffset + ';"></iframe><a href="http://michaeljcasey.com/feed/"><img src="/wp-content/themes/pubspring/images/icons/rss_32.png" height="20" style="height:19px;margin-bottom:3px;position:relative;left:405px;" /></a></div></div>';
			// And now let's update the message by adding the button.
			hellobar.elements.content.innerHTML += twitterCode;
		}
	}, 1.0 );
</script>