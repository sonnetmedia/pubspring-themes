

<script type="text/javascript">
	// This stuff sets up the facebook like button.
	var likeButtonWidth = '100';
	var likeButtonHeight = '20';
	var topOffset = '4px';
	var likeButtoniFrame = '<iframe src="http://www.facebook.com/plugins/like.php?href=' + document.location.href + '&amp;send=false&amp;layout=button_count&amp;width='+ likeButtonWidth +'&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height='+ likeButtonHeight +'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'+ likeButtonWidth +'px; height:'+ likeButtonHeight +'px;position:relative;top:'+ topOffset +';" allowTransparency="true"></iframe>';

	// Your Twitter handle.
	var twitterHandle = 'benjanastas'; // Your Twitter handle without the @
	var twitterTopOffset = '5px'; // how far from the top of the Hello Bar?
		var showFollowerCount = false;	
	// Here are your Hello Bar settings:
	var message = "<?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;";
	new HelloBar( message + ' ' + likeButtoniFrame, {
showWait: 0,
forgetful: false,
barColor: '#f9f9f9',
texture:'dark-gradient',
shadow:false,
borderSize:1,
height:35,
borderColor:'#EEE',
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
			var twitterCode = '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.html?button=' + twitterButton + '&text_color=' + options.textColor.replace('#','') + '&link_color=' + options.linkColor.replace('#','') + '&screen_name=' + twitterHandle + '&show_count=' + showFollowerCount +'" style="width:300px; height:20px; position: relative; top: ' + twitterTopOffset + ';"></iframe>';
			// And now let's update the message by adding the button.
			hellobar.elements.content.innerHTML += twitterCode;
		}
	}, 1.0 );
</script>