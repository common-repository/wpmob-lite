<?php

global $wpmob_themes;
global $wpmob_cur_theme;

$wpmob_themes = false;
$wpmob_cur_theme = false;

global $wpmob_theme_item;	
global $wpmob_theme_iterator;

$wpmob_theme_item = $wpmob_theme_iterator = false;

function wpmob_rewind_themes() {
	global $wpmob_themes;
	$wpmob_themes = false;
}


function wpmob_has_themes() {
	global $wpmob_lite;
	global $wpmob_theme_iterator;
	
	if ( !$wpmob_theme_iterator ) {	
		$wpmob_themes = $wpmob_lite->get_available_themes();
		$wpmob_theme_iterator = new WPmobArrayIterator( $wpmob_themes ); 
	} 
	
	return $wpmob_theme_iterator->have_items();
}

function wpmob_the_theme() {
	global $wpmob_theme_iterator;
	global $wpmob_cur_theme;
	
	$wpmob_cur_theme = $wpmob_theme_iterator->the_item();
	
	return apply_filters( 'wpmob_theme', $wpmob_cur_theme );
}

function wpmob_the_theme_classes( $extra_classes = array() ) {
	echo implode( ' ', wpmob_get_theme_classes( $extra_classes ) ) ;	
}

function wpmob_get_theme_classes( $extra_classes = array() ) {
	$classes = explode( ' ', $extra_classes );
		
	if ( wpmob_is_theme_active() ) {
		$classes[] = 'active';
	}
	
	if ( wpmob_is_theme_custom() ) {
		$classes[] = 'custom';	
	}
	
	return $classes;
}

function wpmob_is_theme_active() {
	global $wpmob_lite;
	global $wpmob_cur_theme;
	
	$settings = $wpmob_lite->get_settings();
		
	$current_theme_location = $settings->current_theme_location . '/' . $settings->current_theme_name;
	
	return ( $wpmob_cur_theme->location == $current_theme_location );
}

function wpmob_active_theme_has_settings() {
	$menu = apply_filters( 'wpmob_theme_menu', array() );
	return count( $menu );	
}

function wpmob_is_theme_custom() {
	global $wpmob_cur_theme;
	return ( $wpmob_cur_theme->custom_theme );	
}

function wpmob_the_theme_version() {
	echo wpmob_get_theme_version();
}	

function wpmob_get_theme_version() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_version', $wpmob_cur_theme->version );
	}
	
	return false;		
}


function wpmob_the_theme_title() {
	echo wpmob_get_theme_title();	
}

function wpmob_get_theme_title() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_title', $wpmob_cur_theme->name );
	}
	
	return false;		
}

function wpmob_the_theme_location() {
	echo wpmob_get_theme_location();	
}

function wpmob_get_theme_location() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_location', $wpmob_cur_theme->location );
	}
	
	return false;		
}

function wpmob_the_theme_features() {
	echo implode( wpmob_get_theme_features(), ', ' );	
}

function wpmob_get_theme_features() {
	global $wpmob_cur_theme;
	return apply_filters( 'wpmob_theme_features', $wpmob_cur_theme->features );	
}

function wpmob_theme_has_features() {
	global $wpmob_cur_theme;
	return $wpmob_cur_theme->features;		
}

function wpmob_the_theme_author() {
	echo wpmob_get_theme_author();	
}

function wpmob_get_theme_author() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_author', $wpmob_cur_theme->author );
	}
	
	return false;		
}

function wpmob_the_theme_description() {
	echo wpmob_get_theme_description();	
}

function wpmob_get_theme_description() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_description', $wpmob_cur_theme->description );
	}
	
	return false;		
}

function wpmob_the_theme_screenshot() {
	echo wpmob_get_theme_screenshot();
}

function wpmob_get_theme_screenshot() {
	global $wpmob_cur_theme;
	if ( $wpmob_cur_theme ) {
		return apply_filters( 'wpmob_theme_screenshot', $wpmob_cur_theme->screenshot );
	}
	
	return false;	
}

?>