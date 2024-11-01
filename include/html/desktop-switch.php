<?php if ( wpmob_show_switch_link() ) { ?>
	<div id="wpmob-desktop-switch">	
		<?php _e( "Desktop Version", "wpmob-lite" ); ?> | <a href="<?php wpmob_the_desktop_switch_link(); ?>"><?php _e( "Switch To Mobile Version", "wpmob-lite" ); ?></a>
	</div>
<?php } ?>