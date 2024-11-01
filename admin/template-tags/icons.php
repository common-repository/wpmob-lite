<?php

global $wpmob_icon_pack;
global $wpmob_icon_packs_iterator;
$wpmob_icon_packs_iterator = false;

global $wpmob_icon;
global $wpmob_icons_iterator;
$wpmob_icons_iterator = false;

global $wpmob_admin_menu_items;
global $wpmob_admin_menu_iterator;
global $wpmob_admin_menu_item;

$wpmob_admin_menu_items = $wpmob_admin_menu_iterator = $wpmob_admin_menu_item = false;

global $wpmob_site_icons;
global $wpmob_site_icon;
global $wpmob_site_icon_iterator;

$wpmob_site_icons = $wpmob_site_icon = $wpmob_site_icon_iterator = false;


function wpmob_have_icon_packs() {
	global $wpmob_lite;
	global $wpmob_icon_packs_iterator;	
	
	if ( !$wpmob_icon_packs_iterator ) {
		$wpmob_icon_packs = $wpmob_lite->get_available_icon_packs();
		$wpmob_icon_packs_iterator = new WPmobArrayIterator( $wpmob_icon_packs );
	} 
	
	$has_items = $wpmob_icon_packs_iterator->have_items();
	
	return $has_items;
}

function wpmob_the_icon_pack() {
	global $wpmob_icon_pack;	
	global $wpmob_icon_packs_iterator;	
	
	$wpmob_icon_pack = $wpmob_icon_packs_iterator->the_item();
}

function wpmob_the_icon_pack_name() {
	echo wpmob_get_icon_pack_name();	
}

function wpmob_get_icon_pack_name() {
	global $wpmob_icon_pack;	
	
//	print_r( $wpmob_icon_pack );
	
	return apply_filters( 'wpmob_icon_pack_name', $wpmob_icon_pack->name );		
}

function wpmob_get_icon_pack_author_url() {
	global $wpmob_icon_pack;

	if ( isset( $wpmob_icon_pack->author_url ) ) {
		return $wpmob_icon_pack->author_url;	
	} else {
		return false;	
	}
}

function wpmob_the_icon_pack_author_url() {
	$url = wpmob_get_icon_pack_author_url();
	if ( $url ) {
		echo $url;	
	} 
}

function wpmob_get_icon_pack_dark_bg() {
	global $wpmob_icon_pack;	
	return $wpmob_icon_pack->dark_background;
}


function wpmob_the_icon_pack_desc() {
	echo wpmob_get_icon_pack_desc();
}

function wpmob_get_icon_pack_desc() {
	global $wpmob_icon_pack;
	return apply_filters( 'wpmob_icon_pack_desc', $wpmob_icon_pack->description );		
}

function wpmob_is_icon_set_enabled() {
	global $wpmob_lite;
	global $wpmob_icon_pack;
	
	$settings = $wpmob_lite->get_settings();
	if ( isset( $settings->enabled_icon_packs[ $wpmob_icon_pack->name ] ) ) {
		return true;	
	} else {	
		return false;	
	}
}

function wpmob_the_icon_pack_class_name() {
	echo wpmob_get_icon_pack_class_name();
}

function wpmob_get_icon_pack_class_name() {
	global $wpmob_icon_pack;
	return apply_filters( 'wpmob_icon_pack_class_name', $wpmob_icon_pack->class_name );			
}

function wpmob_have_icons( $set_name ) {
	global $wpmob_icons_iterator;	
	global $wpmob_lite;
	
	if ( !$wpmob_icons_iterator ) {
		$icons = $wpmob_lite->get_icons_from_packs( $set_name );	
		$wpmob_icons_iterator = new WPmobArrayIterator( $icons );
	}
	
	return $wpmob_icons_iterator->have_items();
}

function wpmob_the_icon() {
	global $wpmob_icon;	
	global $wpmob_icons_iterator;		
	
	$wpmob_icon = $wpmob_icons_iterator->the_item();
	return $wpmob_icon;
}

function wpmob_the_icon_name() {
	echo wpmob_get_icon_name();	
}

function wpmob_get_icon_name() {
	global $wpmob_icon;
	return apply_filters( 'wpmob_icon_name', $wpmob_icon->name );	
}

function wpmob_the_icon_short_name() {
	echo wpmob_get_icon_short_name();	
}

function wpmob_get_icon_short_name() {
	global $wpmob_icon;
	return apply_filters( 'wpmob_icon_short_name', $wpmob_icon->short_name );	
}


function wpmob_the_icon_url() {
	echo wpmob_get_icon_url();	
}

function wpmob_get_icon_url() {
	global $wpmob_icon;
	return apply_filters( 'wpmob_icon_url', $wpmob_icon->url );	
}

function wpmob_the_icon_set() {
	echo wpmob_get_icon_set();
}

function wpmob_get_icon_set() {
	global $wpmob_icon;
	return apply_filters( 'wpmob_icon_set', $wpmob_icon->set );		
}


function wpmob_icon_has_image_size_info() {
	global $wpmob_icon;
	return isset( $wpmob_icon->image_size );	
}

function wpmob_icon_the_width() {
	echo wpmob_icon_get_width();	
}

function wpmob_icon_get_width() {
	global $wpmob_icon;
	return $wpmob_icon->image_size[0];	
}


function wpmob_icon_the_height() {
	echo wpmob_icon_get_height();	
}

function wpmob_icon_get_height() {
	global $wpmob_icon;
	return $wpmob_icon->image_size[1];
}

function wpmob_the_icon_class_name() {
	echo wpmob_get_icon_class_name();
}

function wpmob_get_icon_class_name() {
	global $wpmob_icon;
	return apply_filters( 'wpmob_icon_class_name', $wpmob_icon->class_name );			
}

function wpmob_admin_has_menu_items() {
	global $wpmob_admin_menu_items;
	global $wpmob_admin_menu_iterator;
	
	wpmob_build_menu_tree( 0, 1, $wpmob_admin_menu_items );	
	
	$wpmob_admin_menu_iterator = new WPmobArrayIterator( $wpmob_menu_items );
	
	return $wpmob_admin_menu_iterator->have_items();
}

function wpmob_admin_the_menu_item() {
	global $wpmob_admin_menu_item;
	global $wpmob_admin_menu_iterator;
	
	if ( $wpmob_admin_menu_iterator ) {
		$wpmob_admin_menu_item = $wpmob_admin_menu_iterator->the_item();
	}
}

function wpmob_has_site_icons() {
	global $wpmob_lite;
	global $wpmob_site_icons;
	global $wpmob_site_icon_iterator;
	
	if ( !$wpmob_site_icons ) {
		$wpmob_site_icons = $wpmob_lite->get_site_icons();
		$wpmob_site_icon_iterator = new WPmobArrayIterator( $wpmob_site_icons );
	}
	
	return $wpmob_site_icon_iterator->have_items();
}

function wpmob_the_site_icon() {
	global $wpmob_site_icon_iterator;	
	global $wpmob_site_icon;
	
	$wpmob_site_icon = apply_filters( 'wpmob_site_icon', $wpmob_site_icon_iterator->the_item() );	
	return $wpmob_site_icon;
}

function wpmob_the_site_icon_name() {
	echo wpmob_get_site_icon_name();	
}

function wpmob_get_site_icon_name() {
	global $wpmob_site_icon;
	return apply_filters( 'wpmob_site_icon_name', $wpmob_site_icon->name );	
}

function wpmob_the_site_icon_id() {
	echo wpmob_get_site_icon_id();
}

function wpmob_get_site_icon_id() {
	global $wpmob_site_icon;
	return $wpmob_site_icon->id;
}

function wpmob_the_site_icon_icon() {
	echo wpmob_get_site_icon_icon();
}

function wpmob_get_site_icon_icon() {
	global $wpmob_site_icon;
	global $wpmob_lite;
	
	$settings = $wpmob_lite->get_settings();
	if ( isset( $settings->menu_icons[ $wpmob_site_icon->id ] ) ) {
		$icon = WP_CONTENT_URL . $settings->menu_icons[ $wpmob_site_icon->id ];
	} else {
		$icon = WP_CONTENT_URL . $wpmob_site_icon->icon;
	}	
	
	return apply_filters( 'wpmob_site_icon_icon', $icon );
}

function wpmob_the_site_icon_location() {
	echo wpmob_get_site_icon_location();
}

function wpmob_get_site_icon_location() {
	global $wpmob_site_icon;
	global $wpmob_lite;
	
	$settings = $wpmob_lite->get_settings();
	if ( isset( $settings->menu_icons[ $wpmob_site_icon->id ] ) ) {
		$icon = WP_CONTENT_DIR . $settings->menu_icons[ $wpmob_site_icon->id ];
	} else {
		$icon = WP_CONTENT_DIR . $wpmob_site_icon->icon;
	}	
	
	return apply_filters( 'wpmob_site_icon_location', $icon );
}

function wpmob_the_site_icon_classes() {
	echo implode( ' ', wpmob_get_site_icon_classes() );	
}

function wpmob_get_site_icon_classes() {
	global $wpmob_site_icon;	
	
	$classes = array( $wpmob_site_icon->class_name );
	
	return apply_filters( 'wpmob_site_icon_classes', $classes );	
}

function wpmob_site_icon_has_dark_bg() {
	global $wpmob_lite;
	
	$set_info = $wpmob_lite->get_set_with_icon( wpmob_get_site_icon_location() );
	if ( $set_info ) {
		return $set_info->dark_background;	
	} else {
		return false;	
	}
}

?>