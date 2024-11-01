<div id="manage-sets">	
	<div id="manage-upload-area">
		<div id="manage-upload-button">	
			<a href="#"><?php _e( "Upload Icon / Set", "wpmob-lite" ); ?></a>
		</div>
		<div id="manage-status-area">			
			<div id="manage-set-upload">	
				<div id="manage-set-upload-name"></div>		
			</div>		
			<div id="manage-status">
				<img id="manage-spinner" src="<?php echo WPMOB_URL . '/admin/images/spinner.gif'; ?>" style="display:none;" alt="" />
				<h6><?php _e( "Ready for upload...", "wpmob-lite" ); ?></h6>
				<p class="info"></p>
				
				<div id="wpmob-set-input-area" style="display:none;">
					<label for="wpmob-set-name"><?php _e( "Set name", "wpmob-lite" ); ?></label>
					<input type="text" class="text" name="wpmob-set-name" />
					
					<label for="wpmob-set-description"><?php _e( "Set description", "wpmob-lite" ); ?></label>
					<input type="text" class="text" name="wpmob-set-description" />
					
					<input type="submit" class="button" name="wpmob-set-info-submit" value="<?php _e( "Save", "wpmob-lite" ); ?>" />
				</div>
			</div>
		</div>
	</div>
	
	<div id="manage-info-area">
		<h4><?php _e( "Information + Help", "wpmob-lite" ); ?></h4>
		<h5><?php _e( "Uploading Icons", "wpmob-lite" ); ?>:</h5>
		<p><?php echo sprintf( __( "Single images and those in .ZIP packages <em>must</em> be in .PNG format. When you upload a .ZIP you <em>must</em> name the set. The .ZIP size limit on your server is %dMB.", "wpmob-lite" ), wpmob_get_bloginfo( 'max_upload_size' ) ); ?></p>
		<h5><?php _e( "Home Screen Icons", "wpmob-lite" ); ?>:</h5>
		<p><?php _e( "For images that will used as a Home Screen (Bookmark) icon, they should be 59x60 pixels or higher for best results on iPhone 2G, 3G and 3GS, and 119x120 pixels or higher for iPhone 4.", "wpmob-lite" ); ?></p>
		<h5><?php _e( "Resources", "wpmob-lite" ); ?>:</h5>
		<p>
			<?php echo sprintf( __( '%sOnline Icon Generator%s', 'wpmob-lite' ), '<a href="http://www.flavorstudios.com/iphone-icon-generator" target="_blank">', '</a>' ); ?><br />
			<?php echo sprintf( __( '%sDownload WPmob Lite Icon Template%s (PSD)', 'wpmob-lite' ), '<a href="' . WPMOB_URL . '/include/images/bookmark_icon_template.zip">', '</a>' ); ?><br />
			<?php echo sprintf( __( '%sDownload WPmob Lite iPhone 4 Icon Template%s (PSD)', 'wpmob-lite' ), '<a href="' . WPMOB_URL . '/include/images/retina_bookmark_icon_template.zip">', '</a>' ); ?>
		</p>
	</div>
	<div class="clearer"></div>
	
	<div id="manage-icon-area">
		<h4><?php _e( "Manage Installed Icons + Sets", "wpmob-lite" ); ?></h4>
		<div id="pool-color-switch">
			<?php _e( "Pool Background Color", "wpmob-lite" ); ?>: <a href="#" class="light"><?php _e( "Light", "wpmob-lite" ); ?></a> | <a href="#" class="dark"><?php _e( "Dark", "wpmob-lite" ); ?></a>
		</div>
		<div class="clearer"></div>
		
		<div id="manage-icon-set-area" class="round-6">
			<ul id="icon-set-list">
				<?php while ( wpmob_have_icon_packs() ) { ?>
					<?php wpmob_the_icon_pack(); ?>
					<li class="<?php if ( wpmob_get_icon_pack_dark_bg() ) echo 'dark'; else echo 'light'; ?>"><a href="#" title="<?php wpmob_the_icon_pack_name(); ?>"><?php wpmob_the_icon_pack_name(); ?></a></li>
				<?php } ?>
			</ul>
			
			<div id="manage-icon-ajax"></div>
		</div>
	</div>
</div>