<?php if ( wpmob_has_themes() ) { ?>
	<?php while ( wpmob_has_themes() ) { ?>
		<?php wpmob_the_theme(); ?>
		
		<div class="<?php wpmob_the_theme_classes( "wpmob-theme-box round-8" ); ?>">
			<div class="wpmob-right-align <?php if ( wpmob_is_theme_active() ) { echo 'active-theme'; } ?>">
				<?php if ( wpmob_is_theme_custom() ) { ?>
				<a href="#" class="wpmob-tooltip-center" title="<?php echo sprintf( __( 'Theme Location (relative to wp-content):<br />%s', 'wpmob-lite' ), wpmob_get_theme_location() ); ?>">?</a>
				<?php } ?>
				
				<input type="hidden" class="theme-location" name="theme-location-<?php echo md5( wpmob_get_theme_location() ); ?>" value="<?php wpmob_the_theme_location(); ?>" />
				<input type="hidden" class="theme-name" name="theme-name-<?php echo md5( wpmob_get_theme_location() ); ?>" value="<?php wpmob_the_theme_title(); ?>" />
				<?php if ( !wpmob_is_theme_active() ) { ?>
				
				<a href="#" class="ajax-button activate-theme"><?php _e( 'Activate', 'wpmob-lite' ); ?></a>
				
				<!-- <input type="submit" class="button activate" name="activate-theme-<?php echo md5( wpmob_get_theme_location() ); ?>" value="<?php _e( 'Activate', 'wpmob-lite' ); ?>" />  -->
				<!-- <p class="update-available">Update Available &raquo;</p> -->
				<?php } ?>
				<?php if ( !wpmob_is_theme_custom() ) { ?>
				<!-- <input type="submit" class="button copy" name="copy-theme-<?php echo md5( wpmob_get_theme_location() ); ?>" value="<?php _e( 'Copy', 'wpmob-lite' ); ?>" /> -->
				<a href="#" class="ajax-button copy-theme"><?php _e( 'Copy', 'wpmob-lite' ); ?></a>
				<?php } ?>
				<?php if ( wpmob_is_theme_custom() ) { ?>
				<!-- <input type="submit" class="button deleteme deletetheme" name="delete-theme-<?php echo md5( wpmob_get_theme_location() ); ?>" value="<?php _e( 'Delete', 'wpmob-lite' ); ?>" <?php if ( wpmob_is_theme_active() ) echo "disabled"; ?> title="<?php _e( "You cannot delete the active theme.", "wpmob-lite" ); ?>" /> -->
					<a href="#" class="ajax-button delete-theme"><?php _e( 'Delete', 'wpmob-lite' ); ?></a>
				<?php } ?>
				<?php if ( wpmob_is_theme_active() && wpmob_active_theme_has_settings() ) { ?>
					<!-- <input type="submit" id="settings-link" class="button settings-link" name="settings-link" value="<?php _e( 'Theme Settings', 'wpmob-lite' ); ?> &raquo;" />  -->
					<a href="#" class="ajax-button theme-settings"><?php _e( 'Theme Settings', 'wpmob-lite' ); ?></a>
				<?php } ?>
			</div>
					
			<div class="wpmob-theme-left-wrap round-6">
				<img src="<?php wpmob_the_theme_screenshot(); ?>" alt="<?php echo sprintf( __( '%s Theme Image', 'wpmob-lite' ), wpmob_get_theme_title() ); ?>" />
				<h6><?php echo sprintf( __( '%s', 'wpmob-lite' ), wpmob_get_theme_version() ); ?></h6>
			</div>
			<div class="wpmob-theme-right-wrap">
				<h4><?php wpmob_the_theme_title(); ?></h4>
				<p class="wpmob-theme-author green-text"><?php echo sprintf( __( 'By %s', 'wpmob-lite' ), wpmob_get_theme_author() ); ?></p>
				<p class="wpmob-theme-description"><?php wpmob_the_theme_description(); ?></p>

				<?php if ( wpmob_theme_has_features() ) { ?>
					<p class="wpmob-theme-features"><?php echo sprintf( __( 'Features: %s', 'wpmob-lite' ), implode( wpmob_get_theme_features(), ', ' ) ); ?></p>
				<?php } ?>		
				<br class="clearer" />	
			</div>
		</div>
	<?php } ?>
<?php } else { ?>
	<?php _e( "There are currently no themes installed.", "wpmob-lite" ); ?>
<?php } ?>