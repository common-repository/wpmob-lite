<?php

function wpmob_read_global( $var ) {
	return isset( $_SERVER[$var] ) ? $_SERVER[$var]: '';
}

function wpmob_google_append_url( &$url, $param, $value ) {
	$url .= '&' . $param . '=' . urlencode($value);
}

function wpmob_google_append_globals( &$url, $param ) {
	wpmob_google_append_url( $url, $param, $GLOBALS['google'][$param] );
}

function wpmob_google_append_color( &$url, $param ) {
	global $google_dt;
	
	$color_array = split(',', $GLOBALS['google'][$param]);
	wpmob_google_append_url($url, $param, $color_array[$google_dt % sizeof($color_array)]);
}

function wpmob_google_set_screen_res() {
	$screen_res = wpmob_read_global( 'HTTP_UA_PIXELS' );
	if ( $screen_res == '' ) {
		$screen_res = wpmob_read_global( 'HTTP_X_UP_DEVCAP_SCREENPIXELS' );
	}
	
	if ( $screen_res == '' ) {
		$screen_res = wpmob_read_global( 'HTTP_X_JPHONE_DISPLAY' );
	}
	
	$res_array = split( '[x,*]', $screen_res );
	if ( sizeof( $res_array ) == 2 ) {
		$GLOBALS['google']['u_w'] = $res_array[0];
		$GLOBALS['google']['u_h'] = $res_array[1];
	}
}

function wpmob_google_set_muid() {
	$muid = wpmob_read_global( 'HTTP_X_DCMGUID' );
	if ( $muid != '' ) {
		$GLOBALS['google']['muid'] = $muid;
	}
	$muid = wpmob_read_global( 'HTTP_X_UP_SUBNO' );
	
	if ( $muid != '' ) {
		$GLOBALS['google']['muid'] = $muid;
	}
	$muid = wpmob_read_global( 'HTTP_X_JPHONE_UID' );
	
	if ( $muid != '' ) {
		$GLOBALS['google']['muid'] = $muid;
	}
	$muid = wpmob_read_global( 'HTTP_X_EM_UID' );
	
	if ( $muid != '' ) {
		$GLOBALS['google']['muid'] = $muid;
	}
}

function wpmob_google_set_via_and_accept() {
	$ua = wpmob_read_global( 'HTTP_USER_AGENT' );
	if ( $ua == '' ) {
		$GLOBALS['google']['via'] = wpmob_read_global( 'HTTP_VIA' );
		$GLOBALS['google']['accept'] = wpmob_read_global( 'HTTP_ACCEPT' );
	}
}

function wpmob_google_get_ad_url() {
	$google_ad_url = 'http://pagead2.googlesyndication.com/pagead/ads?';
	wpmob_google_append_url( $google_ad_url, 'dt', round(1000 * array_sum(explode(' ', microtime()))) );
	
	foreach ( $GLOBALS['google'] as $param => $value ) {
		if ( $param == 'client' ) {
			wpmob_google_append_url( $google_ad_url, $param, 'ca-mb-' . $GLOBALS['google'][$param] );
		} else if ( strpos( $param, 'color_' ) === 0 ) {
			wpmob_google_append_color( $google_ad_url, $param );
		} else if (strpos( $param, 'url' ) === 0) {
			$google_scheme = ( $GLOBALS['google']['https'] == 'on' ) ? 'https://' : 'http://';
			wpmob_google_append_url( $google_ad_url, $param, $google_scheme . $GLOBALS['google'][$param] );
		} else {
			wpmob_google_append_globals( $google_ad_url, $param );
		}
	}
	return $google_ad_url;
}

function wpmob_get_google_ad( $adsense_id, $adsense_channel = false ) {
	$GLOBALS['google']['ad_type'] = 'text';

	$GLOBALS['google']['client'] = $adsense_id;	
	if ( $adsense_channel ) {
		$GLOBALS['google']['channel'] = $adsense_channel;
	}
	
	$GLOBALS['google']['format'] = 'mobile_single';
	$GLOBALS['google']['https'] = wpmob_read_global('HTTPS');
	$GLOBALS['google']['ip'] = wpmob_read_global('REMOTE_ADDR');
	$GLOBALS['google']['markup'] ='chtml';
	$GLOBALS['google']['oe'] ='utf8';
	$GLOBALS['google']['output'] ='chtml';
	$GLOBALS['google']['ref'] = wpmob_read_global('HTTP_REFERER');
	$GLOBALS['google']['url'] = wpmob_read_global('HTTP_HOST') . read_global('REQUEST_URI');
	$GLOBALS['google']['useragent'] = wpmob_read_global('HTTP_USER_AGENT');
	
	$google_dt = time();
	
	wpmob_google_set_screen_res();
	wpmob_google_set_muid();
	wpmob_google_set_via_and_accept();	
		
	$advertisement = '';
	
	$google_ad_handle = @fopen( wpmob_google_get_ad_url(), 'r' );	
	if ( $google_ad_handle ) {
		while ( !feof( $google_ad_handle ) ) {
			$advertisement = $advertisement . fread( $google_ad_handle, 8192 );
		}
		
		fclose( $google_ad_handle );		
	}
	
	return $advertisement;
}

?>