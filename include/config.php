<?php

//! Set this to 'true' to enable debugging
define( 'WPMOB_DEBUG', false );

//! Set this to 'true' to enable simulation of all warnings and conflicts
define( 'WPMOB_SIMULATE_ALL', false );

// Set up beta variable
if ( strpos( dirname( __FILE__), "/wpmob-lite-beta/" ) !== false ) {
	define( 'WPMOB_LITE_BETA', true );	
	define( 'WPMOB_ROOT_DIR', 'wpmob-lite-beta' );
} else {
	define( 'WPMOB_LITE_BETA', false );	
	define( 'WPMOB_ROOT_DIR', 'wpmob-lite' );
}

//! The key in the database for the WPmob settings
if ( WPMOB_LITE_BETA ) {
	define( 'WPMOB_SETTING_NAME', 'wpmob-lite-beta' );
	define( 'WPMOB_DIR', WP_PLUGIN_DIR . '/wpmob-lite-beta' );	
	define( 'WPMOB_URL', WP_PLUGIN_URL . '/wpmob-lite-beta' );
	define( 'WPMOB_PRODUCT_NAME', 'WPmob Lite Beta' );
} else {
	define( 'WPMOB_SETTING_NAME', 'wpmob-lite' );
	define( 'WPMOB_DIR', WP_PLUGIN_DIR . '/wpmob-lite' );
	define( 'WPMOB_URL', WP_PLUGIN_URL . '/wpmob-lite' );
	define( 'WPMOB_PRODUCT_NAME', 'WPmob Lite' );
}

//! The WPmob Lite user cookie
define( 'WPMOB_COOKIE', 'wpmob-lite-view' );
define( 'WPMOB_BNCID_CACHE_TIME', 3600 );
define( 'BNC_WPMOB_UNLIMITED', 9999 );

define( 'WPMOB_ADMIN_DIR', WPMOB_DIR . '/admin' );
define( 'WPMOB_ADMIN_AJAX_DIR', WPMOB_ADMIN_DIR . '/html/ajax' );
define( 'WPMOB_BASE_CONTENT_DIR', WP_CONTENT_DIR . '/wpmob-data' );
define( 'WPMOB_BASE_CONTENT_URL', WP_CONTENT_URL . '/wpmob-data' );

define( 'WPMOB_TEMP_DIRECTORY', WPMOB_BASE_CONTENT_DIR . '/temp' );
define( 'WPMOB_CUSTOM_SET_DIRECTORY', WPMOB_BASE_CONTENT_DIR .'/icons' );		
define( 'WPMOB_CUSTOM_ICON_DIRECTORY', WPMOB_BASE_CONTENT_DIR . '/icons/custom' );
define( 'WPMOB_CUSTOM_THEME_DIRECTORY', WPMOB_BASE_CONTENT_DIR .'/themes' );
define( 'WPMOB_CUSTOM_LANG_DIRECTORY', WPMOB_BASE_CONTENT_DIR .'/lang' );

define( 'WPMOB_DEBUG_DIRECTORY', WPMOB_BASE_CONTENT_DIR . '/debug' );
define( 'WPMOB_CACHE_DIRECTORY', WPMOB_BASE_CONTENT_DIR . '/cache' );

define( 'WPMOB_CACHE_URL', WPMOB_BASE_CONTENT_URL . '/cache' );
define( 'WPMOB_CUSTOM_ICON_URL', WPMOB_BASE_CONTENT_URL .'/icons/custom' );

global $wpmob_menu_items; 		//! the built menu item tree
global $wpmob_menu_iterator; 		//! the iterator for the main menu
global $wpmob_menu_item;			//! the current menu item

global $wpmob_icon_pack;
global $wpmob_icon_packs;
global $wpmob_icon_packs_iterator;

$wpmob_icon_pack = false;
$wpmob_icon_packs = false;
$wpmob_icon_packs_iterator = false;

// These all need to be negative so as not to conflict with real page numbers
define( 'WPMOB_ICON_HOME', -1 );
define( 'WPMOB_ICON_BOOKMARK', -2 );
define( 'WPMOB_ICON_DEFAULT', -3 );
define( 'WPMOB_ICON_EMAIL', -4 );
define( 'WPMOB_ICON_RSS', -5 );

define( 'WPMOB_ICON_FACEBOOK', -6 );
define( 'WPMOB_ICON_TWITTER', -7 );
define( 'WPMOB_ICON_YOUTUBE', -8 );
define( 'WPMOB_ICON_LINKEDIN', -9 );
//define( 'WPMOB_ICON_FLICKR', -10 );

define( 'WPMOB_ICON_CUSTOM_1', -101 );
define( 'WPMOB_ICON_CUSTOM_2', -102 );
define( 'WPMOB_ICON_CUSTOM_3', -103 );
define( 'WPMOB_ICON_CUSTOM_PAGE_TEMPLATES', -500 );

global $wpmob_device_classes;
$wpmob_device_classes[ 'iphone' ] = array( 
	'iphone', 
	'ipod', 
	'aspen', 
	'incognito', 
	'webmate', 
	'android', 
	'2.1-update1',
	'dream', 
	'cupcake', 
	'froyo', 
	'blackberry9500', 
	'blackberry9520', 
	'blackberry9530', 
	'blackberry9550', 
	'blackberry9800', 
	'webos',
	's8000', 
	'bada'
);
?>