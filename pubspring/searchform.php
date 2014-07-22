<form role="search" method="get" id="searchform" class="nice custom" action="<?php echo home_url('/'); ?>">
	<label class="visuallyhidden" for="s"><?php _e('Search for:', 'pubspring'); ?></label>
	<input type="text" value="" name="s" id="s" class="input-text" placeholder="<?php _e('Search', 'pubspring'); ?>">
	<input type="submit" id="searchsubmit" value="<?php _e('Search', 'pubspring'); ?>" class="white nice button radius">
</form>
