<?php
	global $wpmob_lite;
	$wpmob_lite->bnc_api->verify_site_license( 'wpmob-lite' );
	$settings = wpmob_get_settings();
?>

	
<?php if ( wpmob_has_proper_auth() && !$settings->admin_client_mode_hide_licenses ) { ?>
	<?php if ( wpmob_has_license() ) { ?>
	<p class="license-valid round-6"><span><?php _e( 'License accepted, thank you for supporting WPmob Lite!', 'wpmob-lite' ); ?></span></p>	
	<?php } else { ?>
	<p class="license-partial round-6"><span><?php echo sprintf( __( 'Your BNCID and License Key have been accepted. <br />Next, %sconnect a site license%s to this domain to enable support and automatic upgrades.', 'wpmob-lite' ), '<a href="#pane-5" class="configure-licenses">', '</a>' ); ?></span></p>
	<?php } ?>
<?php } else { ?>
	<?php if ( wpmob_credentials_invalid() ) { ?>
	<p class="license-invalid bncid-failed round-6"><span><?php echo __( 'This BNCID/License Key combination you have entered was rejected by the juicegraphic server. Please try again.' ); ?></span></p>	
	<?php } else { ?>
	<p class="license-invalid round-6"><span><?php echo sprintf( __( 'Please enter your BNCID and License Key to begin the license activation process, or %spurchase a license &raquo;%s', 'wpmob-lite' ), '<a href="http://www.juicegraphic.com/products/wpmob-lite/">', '</a>' ); ?></span></p>
	<?php } ?>
<?php } ?>