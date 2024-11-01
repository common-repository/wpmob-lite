<input type="text" autocomplete="off" class="text" id="<?php wpmob_the_tab_setting_name(); ?>" name="<?php wpmob_the_tab_setting_name(); ?>" value="<?php wpmob_the_tab_setting_value(); ?>" />
<label class="text" for="<?php wpmob_the_tab_setting_name(); ?>">
	<?php wpmob_the_tab_setting_desc(); ?>
</label>			
<?php if ( wpmob_the_tab_setting_has_tooltip() ) { ?>
<a href="#" class="wpmob-tooltip" title="<?php wpmob_the_tab_setting_tooltip(); ?>">?</a> 
<?php } ?>