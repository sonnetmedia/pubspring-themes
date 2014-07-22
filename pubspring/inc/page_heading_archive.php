	<div class="row">
		<div class="page_heading well"><?php /* page heading puts the title in a styled box - well is extra styling */ ?>
			<h2>
			
					<?php if (is_day()) : ?>
						<?php printf(__('Daily Archives: %s', 'pubspring'), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
						<?php printf(__('Monthly Archives: %s', 'pubspring'), get_the_date('F Y')); ?>
					<?php elseif (is_year()) : ?>
						<?php printf(__('Yearly Archives: %s', 'pubspring'), get_the_date('Y')); ?>
					<?php else : ?>
						<?php single_cat_title(); ?>
					<?php endif; ?>

			
			</h2>
		</div>
	</div>