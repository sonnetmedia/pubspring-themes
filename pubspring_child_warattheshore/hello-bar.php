<script type="text/javascript">


	// This stuff sets up the facebook like button.
	var likeButtonWidth = '100';
	var likeButtonHeight = '20';
	var topOffset = '4px';
	var likeButtoniFrame = '<iframe src="http://www.facebook.com/plugins/like.php?href=' + document.location.href + '&amp;send=false&amp;layout=button_count&amp;width='+ likeButtonWidth +'&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height='+ likeButtonHeight +'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'+ likeButtonWidth +'px; height:'+ likeButtonHeight +'px;position:relative;top:'+ topOffset +';" allowTransparency="true"></iframe>';

	// Your Twitter handle.
	var twitterHandle = ''; // Your Twitter handle without the @
	var twitterTopOffset = '5px'; // how far from the top of the Hello Bar?
		var showFollowerCount = false;	
	// Here are your Hello Bar settings:
	var message = "Visit <?php bloginfo('name'); ?> on &nbsp;<a href='http://facebook.com/thewarattheshore'><img src='http://pubspring.us/wp-content/themes/pubspring/images/icons/facebook_bluesquare.gif' style='margin-bottom:6px;height:18px;'></a>&nbsp;&nbsp;&nbsp;&nbsp;";
	new HelloBar( message + ' ' + likeButtoniFrame, {
showWait: 0,
forgetful: false,
barColor: '#191918',
texture:'dark-gradient',
shadow:false,
borderSize:1,
height:35,
borderColor:'#EEE',
textColor:'#999',
helloBarLogo:false,

		onReady: function( hellobar, options ){
			// We can even read the options and see that the images should be dark.
			// Let's use the onLoad callback to bring the twitter iFrame in.
			var twitterCode = '';
			// And now let's update the message by adding the button.
			hellobar.elements.content.innerHTML += twitterCode;
		}
	}, 1.0 );
</script>
