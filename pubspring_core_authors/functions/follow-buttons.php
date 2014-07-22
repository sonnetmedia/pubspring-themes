<?php if(get_field('sm_social_accounts', 'options')) { ?>

	<!-- AddThis Follow BEGIN -->
	<h5>Find me on...</h5>
	<div class="addthis_toolbox addthis_32x32_style addthis_default_style">

		<?php while(the_repeater_field('sm_social_accounts', 'options')) { 

	echo '<a class="addthis_button_' .get_sub_field('sm_social_account_name'). '_follow" addthis:userid="' .get_sub_field('sm_social_user_name'). '"></a>';

		} ?>
	</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f6b87be4180e916"></script>

<?php }  ?>
