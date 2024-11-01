<?php
// The main icon picker for the menu items
?>

<?php require_once( WPMOB_ADMIN_DIR . '/template-tags/icons.php' ); ?>

<div id="wpmob-icon-area">
	<div class="round-6" id="wpmob-icon-packs">
		<div id="icon-select">
			<label for="active-icon-set"><?php _e( "Active Icon Set: ", "wpmob-lite" ); ?></label>
			<select name="active-icon-set" id="active-icon-set">
			<?php while ( wpmob_have_icon_packs() ) { ?>
				<?php wpmob_the_icon_pack(); ?>
				<option value="<?php wpmob_the_icon_pack_name(); ?>"><?php wpmob_the_icon_pack_name(); ?></option>	
			<?php } ?>
			</select>
		</div>
		
		<div id="wpmob-icon-list"></div>		
	</div>
	
	<div class="round-6" id="wpmob-icon-menu">
		<h4><?php _e( 'Menu Pages &amp; Associated Icons', 'wpmob-lite' ); ?></h4>
	
		<div class="menu-meta">			
			<h6><?php _e( 'Site, Theme &amp; Bookmark Icons', 'wpmob-lite' ); ?></h6>
		
			<div class="menu-actions">
				<a id="reset-menu-all" href="/"><?php _e( 'Reset All Pages & Icons', 'wpmob-lite' ); ?></a>
			</div>			
			
			<div class="clearer"></div>
		</div>	
	
		<ul class="icon-menu">
			<?php while ( wpmob_has_site_icons() ) { ?>
				<?php wpmob_the_site_icon(); ?>
				
				<li class="<?php wpmob_the_site_icon_classes(); ?>">
					<div class="icon-drop-target<?php if ( wpmob_site_icon_has_dark_bg() ) echo ' dark'; ?>" title="<?php wpmob_the_site_icon_id(); ?>">
						<img src="<?php wpmob_the_site_icon_icon(); ?>" alt="" /> 
					</div>
					
					<span class="title"><?php wpmob_the_site_icon_name(); ?></span>
					
					<div class="clearer"></div>
				</li>
			<?php } ?>
		</ul>
		
		<div id="remove-icon-area">
			<?php _e( "Drag an icon here to remove it from the menu", "wpmob-lite" ); ?>
		</div>
		
		<div id="pages-area">
		<div class="menu-meta">			
			<h6><?php _e( 'WordPress Pages', 'wpmob-lite' ); ?></h6>
			<div class="menu-actions">
				<?php _e( "Show / Hide", "wpmob-lite" ); ?>: <a href="#" id="pages-check-all"><?php _e( "Check All", "wpmob-lite" ); ?></a> | <a href="#" id="pages-check-none"><?php _e( "None", "wpmob-lite" ); ?></a>
			</div>		
			
			<div class="clearer"></div>
		</div>
		
		<?php wpmob_show_menu( WPMOB_ADMIN_DIR . '/html/icon-menu/main.php' ); ?>
		<input type="hidden" name="hidden-menu-items" id="hidden-menu-items" value="" />
	</div>
		</div>
	
	<div class="clearer"></div>
</div>