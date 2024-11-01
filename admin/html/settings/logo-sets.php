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
        <div class="clearer"></div>
        <div id="manage-icon-set-area" class="round-6">
            <ul id="icon-set-list">
                <?php //while ( wpmob_have_icon_packs() ) { ?>
                    <?php //wpmob_the_icon_pack(); ?>
                    <li class="<?php //if ( wpmob_get_icon_pack_dark_bg() ) echo 'dark'; else echo 'light'; ?>"><a href="#" title="<?php //wpmob_the_icon_pack_name(); ?>"><?php //wpmob_the_icon_pack_name(); ?></a></li>
                <?php //} ?>
            </ul>
            
            <div id="manage-icon-ajax"></div>
        </div>        
	</div>
	
	 	
	
