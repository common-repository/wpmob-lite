<select name="<?php wpmob_the_tab_setting_name(); ?>" id="<?php wpmob_the_tab_setting_name(); ?>" class="list">
	<?php while ( wpmob_tab_setting_has_options() ) { ?>
		<?php wpmob_tab_setting_the_option(); ?>
		
		<option value="<?php wpmob_tab_setting_the_option_key(); ?>"<?php if ( wpmob_tab_setting_is_selected() ) echo " selected"; ?>><?php wpmob_tab_setting_the_option_desc(); ?></option>
	<?php } ?>
</select>

<label class="list" for="<?php wpmob_the_tab_setting_name(); ?>">
	<?php wpmob_the_tab_setting_desc(); ?>	
</label>
<?php if ( wpmob_the_tab_setting_has_tooltip() ) { ?>
<a href="#" class="wpmob-tooltip" title="<?php wpmob_the_tab_setting_tooltip(); ?>">?</a>	
<?php } ?>