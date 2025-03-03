<?php
/*
   Plugin Name: WPmob Lite
   Plugin URI: http://www.juicegraphic.com
   Description: The professional version of WPmob: a plugin to present your website with a mobile theme tailored for Apple <a href="http://www.apple.com/iphone/">iPhone</a> / <a href="http://www.apple.com/ipodtouch/">iPod touch</a>, <a href="http://www.android.com/">Google Android</a>, <a href="http://www.blackberry.com/">Blackberry Storm & Torch</a> and other popular touch smartphones.
	Author: Hendra( Juicegraphic,Inc. )
	Version: 1.4
	Author URI: http://www.juicegraphic.com
	Text Domain: wpmob-lite
	Domain Path: /lang
	
	# All admin and theme(s) Designs / Images / CSS
	# are Copyright 2009 - 2010 Juicegraphic,Inc.
	#
	# 'WPmob' and 'WPmob Lite' are unregistered trademarks of Juicegraphic,Inc., 
	# and cannot be re-used in conjuction with the GPL v2 usage of this software 
	# under the license terms of the GPL v2 without permission.
	# 
	# This program is free software; you can redistribute it and/or
	# modify it under the terms of the GNU General Public License
	# as published by the Free Software Foundation; either version 2
	# of the License, or (at your option) any later version.
	# 
	# This program is distributed in the hope that it will be useful,
	# but WITHOUT ANY WARRANTY; without even the implied warranty of
	# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	# GNU General Public License for more details.
	# 
	# You should have received a copy of the GNU General Public License
	# along with this program; if not, write to the Free Software
	# Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

global $wpmob_lite;
// Should not have spaces in it, same as above
define( 'WPMOB_VERSION', '1.4' );

// Configuration
require_once( 'include/config.php' );

// Load settings
require_once( 'include/settings.php' );

// BNC API
require_once( 'include/classes/bnc-api.php' );

// Template Tags
require_once( 'include/template-tags/theme.php' );
require_once( 'include/template-tags/menu.php' );
require_once( 'include/template-tags/bncid.php' );
require_once( 'admin/template-tags/warnings.php' ); 

// Administration Panel
require_once( 'admin/admin-panel.php' );

// Main WPmob Class
require_once( 'include/classes/wpmob-lite.php' );

// Main Debug Class
require_once( 'include/classes/debug.php' );

function wpmob_create_object() {
	global $wpmob_lite;
	
	$wpmob_lite = new WPmoblite;
	$wpmob_lite->initialize();			
}
        
add_action( 'plugins_loaded', 'wpmob_create_object' );

/*! \mainpage WPmob Lite 2.0 Documentation
 *
 * \section intro_sec Introduction
 *
 * This documentation is auto-generated from the WPmob Lite 2.x code-base, and is refreshed periodically throughout the day.  This documentation
 * focuses exclusively on the WPmob code, detailing the usage of most of the functions as well as the parameters required.
 *
 * \section intro_index Documentation
 *
 * You can browse the available documentation sections using the sidebar on the right.
 *
 */
 
 ?>
