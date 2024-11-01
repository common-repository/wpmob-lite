<?php while ( wpmob_has_tabs() ) { ?>
	<?php wpmob_the_tab(); ?>
	
	<div id="pane-content-pane-<?php wpmob_the_tab_id(); ?>" class="pane-content" style="display: none;">
		<div class="left-area">
			<ul>
				<?php while ( wpmob_has_tab_sections() ) { ?>
					<?php wpmob_the_tab_section(); ?>
					<li><a id="tab-section-<?php wpmob_the_tab_section_class_name(); ?> nv" rel="<?php wpmob_the_tab_section_class_name(); ?>" href="#"><?php wpmob_the_tab_name(); ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="right-area">
			<?php wpmob_rewind_tab_settings(); ?>
			
			<?php while ( wpmob_has_tab_sections() ) { ?>
				<?php wpmob_the_tab_section(); ?>

				<div style="display: none;" class="setting-right-section" id="setting-<?php wpmob_the_tab_section_class_name(); ?>">
					<?php while ( wpmob_has_tab_section_settings() ) { ?>
						<?php wpmob_the_tab_section_setting(); ?>

						<div class="wpmob-setting type-<?php wpmob_the_tab_setting_type(); ?>"<?php if ( wpmob_get_tab_setting_class_name() ) echo ' id="setting_' .  wpmob_get_tab_setting_class_name() . '"'; ?>>
							
							<?php if ( file_exists( dirname( __FILE__ ) . '/settings/' . wpmob_get_tab_setting_type() . '.php' ) ) { ?>
								<?php include( 'settings/' . wpmob_get_tab_setting_type() . '.php' ); ?>
							<?php } else { ?>
								<?php do_action( 'wpmob_show_custom_setting', wpmob_get_tab_setting_type() ); ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>				
			<?php } ?>	
			
			<br class="clearer" />		
		</div>
		<br class="clearer" />
	</div>
<?php } ?>