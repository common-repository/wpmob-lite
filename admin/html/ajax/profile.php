<div id="wpmob-admin-profile">
	<h5><?php _e( "Active Site Licenses", "wpmob-lite" ); ?></h5>
	
	<?php if ( wpmob_has_site_licenses() ) { ?>
		<p><?php _e( "You have activated these sites for automatic upgrades & support:", "wpmob-lite" ); ?></p>
		<ol class="round-6">
			<?php while ( wpmob_has_site_licenses() ) { ?>
				<?php wpmob_the_site_license(); ?>
				<li <?php if ( wpmob_can_delete_site_license() ) { echo 'class="green-text"'; } ?>>
					<?php wpmob_the_site_license_name(); ?> <?php if ( wpmob_can_delete_site_license() ) { ?><a class="wpmob-remove-license" href="#" rel="<?php wpmob_the_site_license_name(); ?>" title="<?php _e( "Remove license?", "wpmob-lite" ); ?>">(x)</a><?php } ?></li>
					<?php $count++; ?>
			<?php } ?>
		</ol>
		<?php if ( wpmob_get_site_licenses_remaining() != BNC_WPMOB_UNLIMITED ) { ?>
			<?php echo sprintf( __( "%s%d%s licenses remaining.", "wpmob-lite" ), '<strong>', wpmob_get_site_licenses_remaining(), '</strong>' ); ?><br /><br />	
		<?php } ?>
		
		<?php if ( wpmob_get_site_licenses_remaining() ) { ?>
			<?php if ( !wpmob_is_licensed_site() ) { ?>
				<a class="wpmob-add-license ajax-button" href="#"><?php _e( "Connect a license for this site", "wpmob-lite" ); ?> &raquo;</a>		
			<?php } else { ?>
				
			<?php } ?>
		<?php } else { ?>
			 <a href="http://www.juicegraphic.com/store/upgrade/?utm_source=wpmob_pro&utm_medium=web&utm_campaign=admin-upgrades"><?php _e( "Upgrade WPmob Lite to obtain more licenses.", "wpmob-lite" ); ?></a>
		<?php } ?>	
	<?php } else { ?>
		<p>
			<br />
			<?php if ( wpmob_get_site_licenses_remaining() ) { ?>
				<?php _e( "You have not activated a license for this website's domain.", "wpmob-lite" ); ?>
				<a class="wpmob-add-license round-24" id="partial-activation" href="#"><?php _e( "Activate This Domain &raquo;", "wpmob-lite" ); ?></a>
			<?php } else { ?>
				<?php _e( "You have no licenses left.", "wpmob-lite" ); ?>
			 <a href="http://www.juicegraphic.com/store/upgrade/?utm_source=wpmob_pro&utm_medium=web&utm_campaign=admin-upgrades"><?php _e( "Upgrade WPmob Lite to obtain additional licenses.", "wpmob-lite" ); ?></a>
			<?php } ?>
		</p>	
	<?php } ?>
	<br class="clearer" />
</div>

<?php
global $wpmob_lite;
$wpmob_lite->bnc_api->verify_site_license( 'wpmob-lite' );
?>