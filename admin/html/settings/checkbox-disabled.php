<input type="checkbox" class="checkbox" name="<?php wpmob_the_tab_setting_name(); ?>" id="<?php wpmob_the_tab_setting_name(); ?>"<?php if ( wpmob_the_tab_setting_is_checked() ) echo " checked"; ?> disabled />	
<label class="checkbox disabled" for="<?php wpmob_the_tab_setting_name(); ?>">
	<?php wpmob_the_tab_setting_desc(); ?>
	
	<?php if ( wpmob_the_tab_setting_has_tooltip() ) { ?>
	<a href="#" class="wpmob-tooltip" title="<?php wpmob_the_tab_setting_tooltip(); ?>">?</a>
	<?php } ?>
</label>