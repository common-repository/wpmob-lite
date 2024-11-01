<?php

global $wpmob_tab_iterator;
global $wpmob_tab;
global $wpmob_tab_id;

global $wpmob_tab_section_iterator;
global $wpmob_tab_section;

global $wpmob_tab_section_settings_iterator;
global $wpmob_tab_section_setting;

global $wpmob_tab_options_iterator;
global $wpmob_tab_option;

$wpmob_tab_iterator = false;

function wpmob_has_tabs() {
	global $wpmob_tab_iterator;
	global $wpmob_lite;
	global $wpmob_tab_id;
	
	if ( !$wpmob_tab_iterator ) {
		$wpmob_tab_iterator = new WPmobArrayIterator( $wpmob_lite->tabs );
		$wpmob_tab_id = 0;
	}
	
	return $wpmob_tab_iterator->have_items();	
}

function wpmob_rewind_tab_settings() {
	global $wpmob_tab_section_iterator;
	$wpmob_tab_section_iterator = false;
}

function wpmob_the_tab() {
	global $wpmob_tab;
	global $wpmob_tab_iterator;
	global $wpmob_tab_id;
	global $wpmob_tab_section_iterator;
	
	$wpmob_tab = apply_filters( 'wpmob_tab', $wpmob_tab_iterator->the_item() );
	$wpmob_tab_section_iterator = false;
	$wpmob_tab_id++;
}

function wpmob_the_tab_id() {
	echo wpmob_get_tab_id();
}

function wpmob_get_tab_id() {
	global $wpmob_tab_id;
	return apply_filters( 'wpmob_tab_id', $wpmob_tab_id );	
}

function wpmob_has_tab_sections() {
	global $wpmob_tab;	
	global $wpmob_tab_section_iterator;
	
	if ( !$wpmob_tab_section_iterator ) {
		$wpmob_tab_section_iterator = new WPmobArrayIterator( $wpmob_tab['settings'] );
	}
	
	return $wpmob_tab_section_iterator->have_items();
}

function wpmob_the_tab_section() {
	global $wpmob_tab_section;
	global $wpmob_tab_section_iterator;
	global $wpmob_tab_section_settings_iterator;
		
	$wpmob_tab_section = apply_filters( 'wpmob_tab_section', $wpmob_tab_section_iterator->the_item() );
	$wpmob_tab_section_settings_iterator = false;
}

function wpmob_the_tab_name() {
	echo wpmob_get_tab_name();
}

function wpmob_get_tab_name() {
	global $wpmob_tab_section_iterator;
		
	return apply_filters( 'wpmob_tab_name', $wpmob_tab_section_iterator->the_key() );
}

function wpmob_the_tab_class_name() {
	echo wpmob_get_tab_class_name();
}

function wpmob_get_tab_class_name() {
	return wpmob_string_to_class( wpmob_get_tab_name() );	
}


function wpmob_has_tab_section_settings() {
	global $wpmob_tab_section;
	global $wpmob_tab_section_settings_iterator;
	
	if ( !$wpmob_tab_section_settings_iterator ) {
		$wpmob_tab_section_settings_iterator = new WPmobArrayIterator( $wpmob_tab_section[1] );
	}
	
	return $wpmob_tab_section_settings_iterator->have_items();
}

function wpmob_the_tab_section_setting() {
	global $wpmob_tab_section_setting;
	global $wpmob_tab_section_settings_iterator;
	global $wpmob_tab_options_iterator;
		
	$wpmob_tab_section_setting = apply_filters( 'wpmob_tab_section_setting', $wpmob_tab_section_settings_iterator->the_item() );
	$wpmob_tab_options_iterator = false;
}

function wpmob_the_tab_section_class_name() {
	echo wpmob_get_tab_section_class_name();
}

function wpmob_get_tab_section_class_name() {
	global $wpmob_tab_section;
	
	return $wpmob_tab_section[0];
}

function wpmob_the_tab_setting_type() {
	echo wpmob_get_tab_setting_type();
}

function wpmob_get_tab_setting_type() {
	global $wpmob_tab_section_setting;
	return apply_filters( 'wpmob_tab_setting_type', $wpmob_tab_section_setting[0] );
}

function wpmob_the_tab_setting_name() {
	echo wpmob_get_tab_setting_name();
}

function wpmob_get_tab_setting_name() {
	global $wpmob_tab_section_setting;
	
	return apply_filters( 'wpmob_tab_setting_name', $wpmob_tab_section_setting[1] );		
}

function wpmob_the_tab_setting_class_name() {
	echo wpmob_get_tab_setting_class_name();
}

function wpmob_get_tab_setting_class_name() {
	global $wpmob_tab_section_setting;
	
	if ( isset( $wpmob_tab_section_setting[1] ) ) {
		return apply_filters( 'wpmob_tab_setting_class_name', wpmob_string_to_class( $wpmob_tab_section_setting[1] ) );	
	} else {
		return false;	
	}	
}

function wpmob_the_tab_setting_has_tooltip() {
	return ( strlen( wpmob_get_tab_setting_tooltip() ) > 0 );
}

function wpmob_the_tab_setting_tooltip() {
	echo wpmob_get_tab_setting_tooltip();
}

function wpmob_get_tab_setting_tooltip() {
	global $wpmob_tab_section_setting;
	
	if ( isset( $wpmob_tab_section_setting[3] ) ) {
		return htmlspecialchars( apply_filters( 'wpmob_tab_setting_tooltip', $wpmob_tab_section_setting[3] ), ENT_COMPAT, 'UTF-8' );	
	} else {
		return false;	
	}	
}


function wpmob_the_tab_setting_desc() {
	echo wpmob_get_tab_setting_desc();
}

function wpmob_get_tab_setting_desc() {
	global $wpmob_tab_section_setting;
	return apply_filters( 'wpmob_tab_setting_desc', $wpmob_tab_section_setting[2] );		
}

function wpmob_the_tab_setting_value() {
	echo wpmob_get_tab_setting_value();
}

function wpmob_get_tab_setting_value() {
	$settings = wpmob_get_settings();
	$name = wpmob_get_tab_setting_name();
	if ( isset( $settings->$name ) ) {
		return $settings->$name;	
	} else {
		return false;	
	}
}

function wpmob_the_tab_setting_is_checked() {
	return wpmob_get_tab_setting_value();
}

function wpmob_tab_setting_has_options() {
	global $wpmob_tab_options_iterator;
	global $wpmob_tab_section_setting;
	
	if ( isset( $wpmob_tab_section_setting[4] ) ) {			
		if ( !$wpmob_tab_options_iterator ) {
			$wpmob_tab_options_iterator = new WPmobArrayIterator( $wpmob_tab_section_setting[4] );	
		}
		
		return $wpmob_tab_options_iterator->have_items();
	} else {
		return false;	
	}
}

function wpmob_tab_setting_the_option() {
	global $wpmob_tab_options_iterator;
	global $wpmob_tab_option;	
	
	$wpmob_tab_option = apply_filters( 'wpmob_tab_setting_option', $wpmob_tab_options_iterator->the_item() );
}

function wpmob_tab_setting_the_option_desc() {
	echo wpmob_tab_setting_get_option_desc();
}	

function wpmob_tab_setting_get_option_desc() {
	global $wpmob_tab_option;		
	return apply_filters( 'wpmob_tab_setting_option_desc', $wpmob_tab_option );
}	

function wpmob_tab_setting_the_option_key() {
	echo wpmob_tab_setting_get_option_key();
}

function wpmob_tab_setting_get_option_key() {
	global $wpmob_tab_options_iterator;
	return apply_filters( 'wpmob_tab_setting_option_key', $wpmob_tab_options_iterator->the_key() );	
}

function wpmob_tab_setting_is_selected() {
	return ( wpmob_tab_setting_get_option_key() == wpmob_get_tab_setting_value() );
}

?>