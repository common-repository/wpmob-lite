<?php 
	$settings = wpmob_get_settings();
?>
<ul>
	<li><?php _e( "Active Theme", "wpmob-lite" ); ?>: <span><?php wpmob_bloginfo( 'active_theme_friendly_name' ); ?></span></li>
	<li><?php _e( "WPmob Version", "wpmob-lite" ); ?>: <span><?php wpmob_bloginfo( 'version' ); ?></span> 
	<?php if ( wpmob_is_upgrade_available() ) { ?>
	<a id="upgrade-link" href="<?php echo admin_url(); ?>plugins.php?plugin_status=upgrade" class="green-text"><?php echo '(' . __( "Upgrade Available", "wpmob-lite" ) . ')'; ?></a></li>
	<?php } else { ?>
	<span class="current grey-999-text"><?php echo '(' . __( "Up To Date", "wpmob-lite" ) . ')'; ?></span>
	<?php } ?>
</ul>