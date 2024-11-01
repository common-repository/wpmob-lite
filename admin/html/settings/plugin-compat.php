<?php if ( wpmob_has_plugin_warnings() ) { ?>
<table>
	<tr>
		<th><?php _e( "Problem Area", "wpmob-lite" ); ?></th>
		<th><?php _e( "Description", "wpmob-lite" ); ?></th>
		<th><?php _e( "Action", "wpmob-lite" ); ?></th>
	</tr>
	<?php while ( wpmob_has_plugin_warnings() ) { ?>
		<?php wpmob_the_plugin_warning(); ?>
		<tr>
			<td class="plugin-name"><?php wpmob_plugin_warning_the_name(); ?></td>
			<td class="warning-item-desc"><?php wpmob_plugin_warning_the_desc(); ?></td>
			<td>
			<?php if ( wpmob_plugin_warning_has_link() ) { ?>
				<a href="<?php wpmob_plugin_warning_the_link(); ?>" class="info-button" target="_blank"><?php _e( "More Info", "wpmob-lite" ) ?></a>
			<?php } ?>
			<a href="#" id="<?php wpmob_plugin_warning_the_name(); ?>" class="dismiss-button"><?php _e( "Dismiss", "wpmob-lite" ) ?></a></td>
		</tr>
	<?php } ?>	
</table>
<?php } else { ?>
	<p class="no-warnings"><?php _e( "No known warnings or conflicts.", "wpmob-lite" ) ?></p>
<?php } ?>