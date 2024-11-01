<?php

global $wpmob_plugin_warning_iterator;
global $wpmob_plugin_warning;

function wpmob_get_plugin_warning_count() {
	global $wpmob_lite;
	$settings = wpmob_get_settings();
	
	$warnings = apply_filters( 'wpmob_plugin_warnings', $wpmob_lite->warnings );
	ksort( $warnings );
	
	$new_warnings = array();
	foreach( $warnings as $key => $value ) {
		if ( !in_array( $key, $settings->dismissed_warnings ) ) {
			$new_warnings[ $key ] = $value;
		}
	}
	
	return count( $new_warnings );
}

function wpmob_has_plugin_warnings() {
	global $wpmob_lite;
	global $wpmob_plugin_warning_iterator;	
	$settings = wpmob_get_settings();
	
	if ( !$wpmob_plugin_warning_iterator ) {
		$warnings = apply_filters( 'wpmob_plugin_warnings', $wpmob_lite->warnings );
		ksort( $warnings );
		
		$new_warnings = array();
		foreach( $warnings as $key => $value ) {
			if ( !in_array( $key, $settings->dismissed_warnings ) ) {
				$new_warnings[ $key ] = $value;
			}
		}
		
		$wpmob_plugin_warning_iterator = new WPmobArrayIterator( $new_warnings );	
	}
	
	return $wpmob_plugin_warning_iterator->have_items();
}

function wpmob_the_plugin_warning() {
	global $wpmob_plugin_warning_iterator;
	global $wpmob_plugin_warning;	
	
	if ( $wpmob_plugin_warning_iterator ) {
		$wpmob_plugin_warning = apply_filters( 'wpmob_plugin_warning', $wpmob_plugin_warning_iterator->the_item() );	
	}
}

function wpmob_plugin_warning_the_name() {
	echo wpmob_plugin_warning_get_name();	
}

function wpmob_plugin_warning_get_name() {
	global $wpmob_plugin_warning;	
	return apply_filters( 'wpmob_plugin_warning_name', $wpmob_plugin_warning[0] );
}

function wpmob_plugin_warning_the_desc() {
	echo wpmob_plugin_warning_get_desc();
}

function wpmob_plugin_warning_get_desc() {
	global $wpmob_plugin_warning;	
	return apply_filters( 'wpmob_plugin_warning_desc', $wpmob_plugin_warning[1] );
}

function wpmob_plugin_warning_has_link() {
	global $wpmob_plugin_warning;
	
	return ( $wpmob_plugin_warning[2] == true );
}

function wpmob_plugin_warning_get_link() {
	global $wpmob_plugin_warning;
	
	return $wpmob_plugin_warning[2];
}

function wpmob_plugin_warning_the_link() {
	echo wpmob_plugin_warning_get_link();
}

?>