<label class="textarea" for="<?php wpmob_the_tab_setting_name(); ?>">
	<?php wpmob_the_tab_setting_desc(); ?>
</label>

<?php if ( wpmob_the_tab_setting_has_tooltip() ) { ?>
<a href="#" class="wpmob-tooltip" title="<?php wpmob_the_tab_setting_tooltip(); ?>">?</a>
<?php } ?><br />	
<textarea rows="5" class="textarea"  id="<?php wpmob_the_tab_setting_name(); ?>" name="<?php wpmob_the_tab_setting_name(); ?>"><?php echo htmlspecialchars( wpmob_get_tab_setting_value() ); ?></textarea>