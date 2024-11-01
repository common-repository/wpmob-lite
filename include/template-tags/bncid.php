<?php

function wpmob_has_license() {
	// Move this internally
	global $wpmob_lite;
	$settings = $wpmob_lite->get_settings();
	
	if ( time() > ( $settings->last_bncid_time + WPMOB_BNCID_CACHE_TIME ) ) {
		$result = $wpmob_lite->bnc_api->internal_check_token();	
		if ( $result ) {
			$settings->last_bncid_time = time();
			$settings->last_bncid_result = $wpmob_lite->bnc_api->verify_site_license( 'wpmob-lite' );
			$settings->last_bncid_licenses = $wpmob_lite->bnc_api->get_total_licenses( 'wpmob-lite' );
			
			if ( $settings->last_bncid_result ) {
				$setting->bncid_had_license = true;	
			}
		} else {
            $settings->last_bncid_time = time();
            $settings->last_bncid_result = true;            
            $settings->last_bncid_licenses = BNC_WPMOB_UNLIMITED;
          }		
			
		$wpmob_lite->save_settings( $settings );		
	}
	
	return $settings->last_bncid_result;
}

function wpmob_credentials_invalid() {
	global $wpmob_lite;
	return $wpmob_lite->bnc_api->credentials_invalid;
}

function wpmob_api_server_down() {
	global $wpmob_lite;
	
	$wpmob_lite->bnc_api->verify_site_license( 'wpmob-lite' );	
	return $wpmob_lite->bnc_api->server_down;
}

function wpmob_has_proper_auth() {
	wpmob_has_license();
	
	$settings = wpmob_get_settings();
	return $settings->last_bncid_licenses;
}

function wpmob_is_upgrade_available() {
	global $wpmob_lite;
	
	if ( WPMOB_LITE_BETA ) {
		$latest_info = $wpmob_lite->bnc_api->get_product_version( 'wpmob-lite', true );
	} else {
		$latest_info = $wpmob_lite->bnc_api->get_product_version( 'wpmob-lite' );	
	}
    
	if ( $latest_info ) {
		return ( $latest_info['version'] != WPMOB_VERSION );
	} else {
		return false;	
	}
}

global $wpmob_site_license;
global $wpmob_site_license_info;
global $wpmob_site_license_iterator;
$wpmob_site_license_iterator = false;

function wpmob_has_site_licenses() {
	global $wpmob_lite;
	global $wpmob_site_license_info;	
	global $wpmob_site_license_iterator;
	
	if ( !$wpmob_site_license_iterator ) {
		$wpmob_site_license_info = $wpmob_lite->bnc_api->user_list_licenses( 'wpmob-lite' );
		$wpmob_site_license_iterator = new WPmobArrayIterator( $wpmob_site_license_info['licenses'] );
	}	
	
	return $wpmob_site_license_iterator->have_items();
}

function wpmob_the_site_license() {
	global $wpmob_site_license;
	global $wpmob_site_license_iterator;
	
	$wpmob_site_license = $wpmob_site_license_iterator->the_item();
}

function wpmob_the_site_licenses_remaining() {
	echo wpmob_get_site_licenses_remaining();
}

function wpmob_get_site_licenses_remaining() {
	global $wpmob_site_license_info;	
	
	if ( $wpmob_site_license_info && isset( $wpmob_site_license_info['remaining'] ) ) {
		return $wpmob_site_license_info['remaining'];
	}
	
	return 0;
}

function wpmob_the_site_license_name() {
	echo wpmob_get_site_license_name();
}

function wpmob_get_site_license_name() {
	global $wpmob_site_license;
	return $wpmob_site_license;
}

function wpmob_is_licensed_site() {
	global $wpmob_lite;
	return $wpmob_lite->has_site_license();
}

function wpmob_get_site_license_number() {
	global $wpmob_site_license_iterator;
	return $wpmob_site_license_iterator->current_position();
}

function wpmob_can_delete_site_license() {
	return ( wpmob_get_site_license_number() > 1 );	
}

?>