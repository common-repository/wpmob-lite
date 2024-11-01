<div id="system-info">
	<table>
		<tr>
			<td class="desc"><?php _e( "WordPress Version", "wpmob-lite" ); ?></td>
			<td><?php echo sprintf( __( "%s", "wpmob-lite" ), get_bloginfo( 'version' ) ); ?></td>
		</tr>			
		<tr>
			<td class="desc"><?php _e( "Server Configuration", "wpmob-lite" ); ?></td>
			<td><?php echo $_SERVER['SERVER_SOFTWARE']; ?>, <?php echo $_SERVER['GATEWAY_INTERFACE']; ?>, PHP <?php echo phpversion(); ?></td>
		</tr>
		<tr>
			<td class="desc"><?php _e( "Browser User Agent", "wpmob-lite" ); ?></td>
			<td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td>
		<tr/>
<!-- 
		<tr>
			<td class="desc"><?php _e( "Active Plugins", "wpmob-lite" ); ?></td>
			<td>(not available)</td>
		<tr/>
 -->	
	</table>
</div>