<?php 
/* Administration panel bootstrap */
require_once( 'template-tags/themes.php' );
require_once( 'template-tags/tabs.php' );

add_action( 'admin_menu', 'wpmob_admin_menu' );

function wpmob_admin_menu() {
	$settings = wpmob_get_settings();
	
	if ( $settings->put_wpmob_in_appearance_menu ) {
		add_submenu_page( 'themes.php', __( "WPmob Settings", "wpmob-lite" ), __( "WPmob Settings", "wpmob-lite" ), 'install_plugins', __FILE__, 'wpmob_admin_panel' );	
	} else {
		// Check to see if another plugin created the juicegraphic menu
		if ( !defined( 'WPMOB_MENU' ) ) {
			define( 'WPMOB_MENU', true );
			
			// Add the main plugin menu for WPmob Lite 
			add_menu_page( 'WPmob Lite', 'WPmob Lite', 'manage_options', __FILE__, '', get_wpmob_url() . '/admin/images/wpmob-admin-icon.png' );
		}
		
		add_submenu_page( __FILE__, __( "WPmob Settings", "wpmob-lite" ), __( "WPmob Settings", "wpmob-lite" ), 'install_plugins', __FILE__, 'wpmob_admin_panel' );	
	}
}

function wpmob_admin_panel() {	
	// Setup administration tabs
	wpmob_setup_tabs();
	
	// Generate tabs	
	wpmob_generate_tabs();
}

//! Can be used to add a tab to the settings panel
function wpmob_add_tab( $tab_name, $class_name, $settings, $custom_page = false ) {
	global $wpmob_lite;
	
	$wpmob_lite->tabs[ $tab_name ] = array(
		'page' => $custom_page,
		'settings' => $settings,
		'class_name' => $class_name
	);
}

function wpmob_generate_tabs() {
	include( 'html/admin-form.php' );
}

function wpmob_string_to_class( $string ) {
	return strtolower( str_replace( '--', '-', str_replace( '+', '', str_replace( ' ', '-', $string ) ) ) );
}	

function wpmob_show_tab_settings() {
	include( 'html/tabs.php' );
}

function wpmob_admin_get_languages() {
	$languages = array(
		'auto' => __( 'Auto-detect', 'wpmob-lite'),
		'fr_FR' => 'Français',
		'ja_JP' => '日本語',
		'it_IT' => 'Italiano',
		'es_ES' => 'Español',
		'de_DE' => 'Deutsch',
		'nb_NO' => 'Norsk',
		'br_PT' => 'Português',
		'nl_NL' => 'Nederlands',
		'sv_SE' => 'Svenska'		
	);	
	
	return apply_filters( 'wpmob_admin_languages', $languages );
}

function wpmob_save_reset_notice() {
	if ( isset( $_POST[ 'wpmob-submit' ] ) ) {
		echo ( '<div class="saved">' );
		echo __( 'Settings saved!', "wpmob-lite" );
		echo('</div>');
	} elseif ( isset( $_POST[ 'wpmob-submit-reset' ] ) ) {
		echo ( '<div class="reset">' );
		echo __( 'Defaults restored', "wpmob-lite" );
		echo( '</div>' );
	}
}

function wpmob_setup_general_tab() {
	global $wpmob_lite;
	$settings = $wpmob_lite->get_settings();
	
	$active_plugins = get_option( 'active_plugins' );
	$new_plugin_list = array();
	foreach( $active_plugins as $plugin ) {
		$dir = explode( '/', $plugin );
		$new_plugin_list[] = $dir[0];
	}

	$plugin_compat_settings = array();
	
	$plugin_compat_settings[] = array( 'section-start', 'warnings-and-conflicts', __( 'Warnings or Conflicts', 'wpmob-lite' ) );
	$plugin_compat_settings[] = array( 'plugin-compat' );
	$plugin_compat_settings[] = array( 'section-end' );	
	
	$plugin_compat_settings[] = array( 'section-start', 'plugin-compat-options', __( 'Theme & Page Compatibility', 'wpmob-lite' ) );
	$plugin_compat_settings[] = array( 'checkbox', 'include_functions_from_desktop_theme', __( 'Include functions.php from the active desktop theme', 'wpmob-lite' ), __( 'This option will include and load the functions.php from the active WordPress theme.  This may be required for themes with custom field features like post images, etc.', 'wpmob-lite' ) );
	$plugin_compat_settings[] = array( 'checkbox', 'convert_menu_links_to_internal', __( 'Convert permalinks into internal URLs', 'wpmob-lite' ), __( 'This option reduces the loading time for pages, but may cause issues with the menu when permalinks are non-standard or on another domain.', 'wpmob-lite' ) );
	$plugin_compat_settings[] = array( 'spacer' );
	$plugin_compat_settings[] = array( 'textarea', 'ignore_urls', __( 'Do not use WPmob Lite on these URLs/Pages', 'wpmob-lite' ), __( 'Each permalink URL fragment should be on its own line and relative, e.g. "/about" or "/products/store"', 'wpmob-lite' ) );
	$plugin_compat_settings[] = array( 'section-end' );
	
	$plugin_compat_settings[] = array( 'section-start', 'plugin-compatibility', __( 'Plugin Compatibility', 'wpmob-lite' ) );	
	if ( $wpmob_lite->plugin_hooks && count( $wpmob_lite->plugin_hooks ) ) {
		
		$plugin_compat_settings[] = array( 'copytext', 'plugin-compat-copy', __( "WPmob will attempt to disable selected plugin hooks when WPmob and your mobile theme are active. Check plugins to disable:", "wpmob-lite" ) ); 
				
		foreach( $wpmob_lite->plugin_hooks as $plugin_name => $hooks ) {
			if ( in_array( $plugin_name, $new_plugin_list ) ) {
				$proper_name = "plugin_disable_" . str_replace( '-', '_', $plugin_name );
				$plugin_compat_settings[] = array( 'checkbox', $proper_name, $wpmob_lite->get_friendly_plugin_name( $plugin_name ) );
			}
		}
	} else {
		$plugin_compat_settings[] = array( 'copytext', 'plugin-compat-copy-none', __( "There are currently no active plugins to disable.", "wpmob-lite" ) .  "<br />" . __( "If you have recently installed or reset WPmob Lite, it must gather active plugin information first.", "wpmob-lite" ) ); 
	}
		
	$plugin_compat_settings[] = array( 'copytext', 'plugin-compat-refresh', sprintf( __( "%sRegenerate Plugin List%s", "wpmob-lite" ), '<a href="#" class="regenerate-plugin-list round-24">', ' &raquo;</a>' ) ); 
	$plugin_compat_settings[] = array( 'section-end' );	
	
	$wpmob_advertising_types = array(
		'none' => __( 'No advertising', 'wpmob-lite' ),
		'google' => __( 'Google Adsense', 'wpmob-lite' ),
		'admob' => __( 'Admob Ads', 'wpmob-lite' )
	);
	
	$wpmob_advertising_types = apply_filters( 'wpmob_advertising_types', $wpmob_advertising_types );
	
	wpmob_add_tab( __( 'General', 'wpmob-lite' ), 'general',
		array(
			__( 'Overview', "wpmob-lite" ) => array ( 'overview',
				array(
					array( 'section-start', 'touchboard', __( 'WPmob board', "wpmob-lite" ) ),
					array( 'wpmob-board'),
					array( 'section-end' )
				)	
			),
            __( 'Social Network', 'wpmob-lite' ) => array ( 'social-network', 
                array(
                    array( 'section-start', 'social-networkin', __( 'Linked In', 'wpmob-lite' ) ),
                    array( 'text', 'linked_in_link', __( 'WPmob Linked In', 'wpmob-lite' ) ),        
                    array( 'section-end' ),

                    array( 'section-start', 'social-networyoutube', __( 'Youtube', 'wpmob-lite' ) ),
                    array( 'text', 'youtube_link', __( 'WPmob Youtube', 'wpmob-lite' ) ),        
                    array( 'section-end' ),
                    
                    array( 'section-start', 'social-networkfeed', __( 'Feed Burner', 'wpmob-lite' ) ),
                    array( 'text', 'feed_burner_link', __( 'WPmob Feed Burner', 'wpmob-lite' )),        
                    array( 'section-end' ),

                    array( 'section-start', 'social-networkfb', __( 'Facebook', 'wpmob-lite' ) ),
                    array( 'text', 'facebook_link', __( 'WPmob Facebook Link', 'wpmob-lite' )),        
                    array( 'section-end' ),

                    array( 'section-start', 'social-networktwitter', __( 'Twitter', 'wpmob-lite' ) ),
                    array( 'text', 'twitter_link', __( 'WPmob Twitter Link', 'wpmob-lite' ) ),        
                    array( 'section-end' ),

                    array( 'section-start', 'social-networkflickr', __( 'Flickr', 'wpmob-lite' ) ),
                    array( 'text', 'flickr_id', __( 'WPmob Flickr ID', 'wpmob-lite' ), __( 'If the title of your site is long, you can shorten it for display within WPmob.', 'wpmob-lite' ) ),        
                    array( 'text', 'flickr_api', __( 'WPmob Flickr API Key', 'wpmob-lite' )),        
                    array( 'section-end' ),
                )
            ),
			__( 'General Options', 'wpmob-lite' ) => array ( 'general-options', 
				array(
                    array( 'section-start', 'site-branding', __( 'Site Branding', 'wpmob-lite' ) ),
                    array( 'text', 'site_title', __( 'WPmob site title', 'wpmob-lite' ), __( 'If the title of your site is long, you can shorten it for display within WPmob.', 'wpmob-lite' ) ),        
                    array( 'checkbox', 'show_wpmob_in_footer', __( 'Display "Powered by WPmob Lite" in footer', 'wpmob-lite' ) ),                        
                    array( 'section-end' ),
                          
					array( 'section-start', 'language-text', __( 'Regionalization', 'wpmob-lite' ) ),
					array( 'list', 'force_locale', __( 'WPmob Lite language', 'wpmob-lite' ), __( 'The WPmob Lite admin panel / supported themes will be shown in this locale', 'wpmob-lite' ), 
						wpmob_admin_get_languages()
					),
					array( 'checkbox', 'respect_wordpress_date_format', __( 'Respect WordPress date format in themes', 'wpmob-lite' ), __( 'When checked WPmob will use the WordPress date format in themes that support it (set in WordPress -> Settings - > General).', 'wpmob-lite' ) ),
					array( 'section-end' ),

					array( 'section-start', 'landing-page', __( 'WPmob landing page', 'wpmob-lite' ) ),
					array( 'checkbox', 'enable_home_page_redirect', __( 'Enable custom homepage redirect (overrides default WordPress settings)', 'wpmob-lite' ), __( 'When checked WPmob overrides your WordPress homepage settings, and uses another page you select for its homepage.', 'wpmob-lite' ) ),
					array( 'redirect' ),
					array( 'section-end' ),

					array( 'spacer' ),			

					array( 'section-start', 'misc', __( 'Miscellaneous', 'wpmob-lite' ) ),
					array( 'checkbox', 'desktop_is_first_view', __( '1st time visitors see desktop theme', 'wpmob-lite' ), __( 'Your regular theme will be shown to 1st time mobile visitors first, with the Mobile View switch link available in the footer.', 'wpmob-lite' ) ),		
					array( 'checkbox', 'make_links_clickable', __( 'Convert all plain-text links in post content to clickable links', 'wpmob-lite' ), __( 'Normally links posted into post content are plain-text and cannot be clicked.  Enabling this option will make these links clickable, similar to the P2 theme.', 'wpmob-lite' ) ),	
					array( 'textarea', 'welcome_alert', __( 'Welcome message shown on 1st visit (HTML is OK)', 'wpmob-lite' ), __( 'The welcome message shows below the header for visitors until dismissed.', 'wpmob-lite' ) ),
					array( 'textarea', 'fourohfour_message', __( 'Custom 404 message (HTML is OK)', 'wpmob-lite' ), __( 'Change this to whatever you\'d like for your 404 page message.', 'wpmob-lite' ) ),	
					array( 'textarea', 'footer_message', __( 'Custom footer content (HTML is OK)', 'wpmob-lite' ), __( 'Enter additional content to be displayed in the WPmob footer. Everything here is wrapped in a paragraph tag.', 'wpmob-lite' ) ),	
					array( 'section-end' )
				)
			),
            __( 'Advertising &amp; Stats', 'wpmob-lite' ) => array ( 'advertising-stats-options', 
                array(
                    array( 'section-start', 'advertising', __( 'Advertising', 'wpmob-lite' ) ),
                    array( 
                        'list', 
                        'advertising_type', 
                        __( 'Advertising support', 'wpmob-lite' ), 
                        __( 'WPmob natively supports ads from Google Adsense or Admob. May not show on all devices (limitations of these services).', 'wpmob-lite' ), 
                        $wpmob_advertising_types
                    ),                
                    array( 
                        'list', 
                        'advertising_location', 
                        __( 'Advertising display location', 'wpmob-lite' ), 
                        __( 'Choose where you would like your ads positioned.', 'wpmob-lite' ), 
                        array(
                            'header' => __( 'Below the header', 'wpmob-lite' ),
                            'footer' => __( 'In the footer','wpmob-lite' )
                            
                        )    
                    ),    
                    array( 
                        'list', 
                        'advertising_pages', 
                        __( 'Show ads in these places', 'wpmob-lite' ), 
                        __( 'Choose which page views you\'d like ads displayed on', 'wpmob-lite' ),
                        array(
                            'ads_single' => __( 'Single Post Only', 'wpmob-lite' ),
                            'main_single_pages' => __( 'Home, Blog, Single Post, Pages', 'wpmob-lite' ),
                            'all_views' => __( 'All Pages (Home, Blog, Single Post, Pages, Search)', 'wpmob-lite' ),
                            'home_page_only' => __( 'Home Page Only', 'wpmob-lite' )                            
                        )    
                    ),                            
                    array( 'copytext', 'copytext-ads', sprintf(__( '%sNote: Adsense and Admob ads only show on service supported devices, and do NOT work in Web-App Mode%s', 'wpmob-lite' ), '<small>','</small>' ) ),
                    array( 'copytext', 'copytext-ads3', sprintf(__( '%sAlso, ads will not be shown in Developer Mode on desktop browsers unless the user agent is changed in the browser to a supported device.%s', 'wpmob-lite' ), '<small>','</small>' ) ),
                    array( 'section-end' ),    
                    array( 'section-start', 'custom-advertising', __( 'Custom Ads', 'wpmob-lite' ) ),
                    array( 'textarea', 'custom_advertising_code', __( 'Advertising code', 'wpmob-lite' ), __( 'You can enter custom advertising code (images, links, scripts, etc.) here', 'wpmob-lite' ) ),
                    array( 'section-end' ),                    
                    array( 'section-start', 'google', __( 'Google Adsense', 'wpmob-lite' ) ),
                    array( 'text', 'adsense_id', __( 'Adsense Publisher ID', 'wpmob-lite' ), __( 'Enter your full Publisher ID', 'wpmob-lite' ) ),
                    array( 'text', 'adsense_channel', __( 'Adsense Channel ID', 'wpmob-lite' ), __( 'Your Adsense Channel', 'wpmob-lite' ) ),                
                    array( 'section-end' ),
                    array( 'section-start', 'admob', __( 'Admob Ads', 'wpmob-lite' ) ),
                    array( 'text', 'admob_publisher_id', __( 'Admob Publisher ID', 'wpmob-lite' ), __( 'Enter your full Admob Publisher ID', 'wpmob-lite' ) ),            
                    array( 'section-end' ),
                    array( 'section-start', 'site-stats', __( 'Site Statistics', 'wpmob-lite' ) ),
                    array( 'textarea', 'custom_stats_code', __( 'Custom statistics code', 'wpmob-lite' ), __( 'Enter your custom statistics tracking code snippets (Google Analytics, MINT, etc.)', 'wpmob-lite' ) ),        
                    array( 'section-end' )
                )
            ),            
			__( 'Switch Link & Custom CSS', 'wpmob-lite' ) => array ( 'switch-custom-css', 
				array(			
					array( 'section-start', 'switch-link', __( 'Switch Link', 'wpmob-lite' ) ),
					array( 'checkbox', 'show_switch_link', __( 'Show switch link', 'wpmob-lite' ), __( 'When unchecked WPmob will not show a switch link allowing users to switch between the mobile view and your regular theme view', 'wpmob-lite' ) ),
					array( 'list', 'home_page_redirect_address', __( 'Switch link destination', 'wpmob-lite' ), __( 'Choose between the same URL from which a user chooses to switch, or your Homepage as the switch link destination.', 'wpmob-lite' ), 
						array(
							'same' => __( 'Same URL', 'wpmob-lite'),
							'homepage' => __( 'Site Homepage', 'wpmob-lite')
						)
					),
					array( 'textarea', 'desktop_switch_css', __( 'Theme switch styling', 'wpmob-lite' ), __( 'Here you can edit the CSS output to style the switch link appearance in the footer of your regular theme.', 'wpmob-lite' ) ),	
					array( 'section-end' ),
					array( 'spacer' ),			
					array( 'section-start', 'custom_stuff', __( 'Custom CSS File', 'wpmob-lite' ) ),
					array( 'text', 'custom_css_file', __( 'URL to a custom CSS file', 'wpmob-lite' ), __( 'Full URL to a custom CSS file to be loaded last in themes. Will override existing styles, preserving updateability of themes.', 'wpmob-lite' ) ),	
					array( 'section-end' )
				)
			),
			__( 'Push Notifications', 'wpmob-lite' ) => array ( 'push-notifications',
				array(
					array( 'section-start', 'prowl-notifications', __( 'Prowl Push Notifications', 'wpmob-lite' ) ),
					array( 'text-array', 'push_prowl_api_keys', __( 'Prowl API keys', 'wpmob-lite' ), __( 'Enter your Prowl API key here to enable push notifications from WPmob to your iPhone/iPod touch via the Prowl app, or Mac with Growl installed and configured for Prowl. If you have multiple keys, enter and save each one for a new input to appear.', 'wpmob-lite' ) ),	
					array( 'checkbox', 'push_prowl_comments_enabled', __( 'Notify of new comments &amp; pingbacks/tracksbacks', 'wpmob-lite' ), __( 'Requires Discussion settings to be enabled in the WordPress settings.', 'wpmob-lite' ) ),
					array( 'checkbox', 'push_prowl_registrations', __( 'Notify of new account registrations', 'wpmob-lite' ), __( 'Requires the "Anyone can register" WordPress setting to be enabled.', 'wpmob-lite' ) ),				
					array( 'checkbox', 'push_prowl_direct_messages', __( 'Allow users to send direct messages', 'wpmob-lite' ), __( 'Adds a push message form in the header to allow visitors to send messages to you.', 'wpmob-lite' ) ),							
					array( 'copytext', 'copytext-info-prowl', '<small>' . __( '(Requires Prowl app on iPhone / iPod touch, or Growl setup with Prowl on a Mac)', 'wpmob-lite' ) . '</small>' ),
					array( 'copytext', 'copytext-info-itunes', '<a href="http://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=320876271" target="_blank">' . __( "Get Prowl (App Store)", "wpmob-lite" ) . '</a> | <a href="http://prowl.weks.net/" target="_blank">' . __( "Prowl Website", "wpmob-lite" ) . '</a> | <a href="http://growl.info/" target="_blank">' . __( "Get Growl", "wpmob-lite" ) . '</a>' ),
					array( 'section-end' )
				)
			),
			__( 'Compatibility', 'wpmob-lite' ) => array( 'compatibility', 
				$plugin_compat_settings
			)
		)
	);
}

function wpmob_setup_theme_browser_tab() {
	$settings = wpmob_get_settings();
	if ( !$settings->admin_client_mode_hide_browser ) {
		wpmob_add_tab( __( 'Theme Browser', 'wpmob-lite' ), 'theme-browser', 
			array(
				__( 'Installed Themes', 'wpmob-lite' ) => array ( 'installed-themes',
					array(
						array( 'section-start', 'installed-themes', '&nbsp;' ),
						array( 'theme-browser' ),
						array( 'section-end' )
					)
				)
			)
		);		
	}
	
	$theme_menu = apply_filters( 'wpmob_theme_menu', array() );
	
	global $wpmob_lite;
	$current_theme = $wpmob_lite->get_current_theme_info();
	
	// Check for skins
	if ( isset( $current_theme->skins ) && count( $current_theme->skins ) ) {
		$skin_options = array( 'none' => __( 'None', 'wpmob-lite' ) );
		foreach( $current_theme->skins as $skin ) {
			$skin_options[ $skin->basename ] = $skin->name;	
		}
		
		$skin_menu =  array(
			__( 'Theme Skins', 'wpmob-lite' ) => array ( 'theme-skins',
				array(
					array( 'section-start', 'available-skins', __( 'Available Skins', 'wpmob-lite' ) ),
					array( 'list', 'current_theme_skin', __( 'Active skin', 'wpmob-lite' ), __( 'Skins are alternate stylesheets which change the look and feel of a theme.', 'wpmob-lite' ), 
						$skin_options
					),				
					array( 'section-end' )
				)
			)
		);
		
		$theme_menu = array_merge( $theme_menu, $skin_menu );
	}
	
	// Add the skins menu
	if ( $theme_menu ) {		
		$settings = $wpmob_lite->get_settings();
		
		wpmob_add_tab( __( "{$settings->current_theme_friendly_name}", 'wpmob-lite' ), 'custom_theme', $theme_menu );
	}
}

function wpmob_setup_bncid_account_tab() {
	$support_panel = array(
		__( 'BNCID', 'wpmob-lite' ) => array( 'bncid',
			array(	
				array( 'section-start', 'account-information', __( 'Account Information', 'wpmob-lite' ) ),
				array( 'copytext', 'bncid-info', sprintf( __( 'Your %sBNCID%s and License Key are used to enable site licenses for support and auto-upgrades.', 'wpmob-lite' ), '<a href="http://www.juicegraphic.com/docs/wpmob-lite-docs/what-is-a-bncid/" target="_blank">', '</a>' ) ),
				array( 'ajax-div', 'wpmob-profile-ajax', 'profile' ),		
				array( 'text', 'bncid', __( 'BNCID E-Mail', 'wpmob-lite' ) ),			
				array( 'text', 'wpmob_license_key', __( 'License Key', 'wpmob-lite' ) ),
				array( 'license-check', 'license-check' ),
				array( 'section-end' )
			)
		)
	);
	
	if ( wpmob_has_proper_auth() ) {
		$support_panel[ __( 'Manage Licenses', 'wpmob-lite' ) ] = array( 'manage-licenses', 
			array(
				array( 'section-start' , 'manage-my-licenses', __( 'Manage Licenses', 'wpmob-lite' ) ),
				array( 'manage-licenses', 'manage-these-licenses' ),
				array( 'section-end' )
			)
		);
	}
		
	global $blog_id;
	$settings = wpmob_get_settings();
}

function wpmob_setup_multisite_tab() {
	if ( wpmob_is_multisite_enabled() && wpmob_is_multisite_primary() ) {
		wpmob_add_tab( __( 'Multisite', 'wpmob-lite' ), 'multisite', 
			array(
				__( 'General', 'wpmob-lite' ) => array ( 'multisite-general',
					array(
						array( 'section-start', 'multisite-admin-panel', __( 'Secondary Admin Panels', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_disable_theme_browser_tab', __( 'Disable Theme Browser tab', 'wpmob-lite' ) ), 
						array( 'checkbox', 'multisite_disable_push_notifications_pane', __( 'Disable Push Notifications pane', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_disable_overview_pane', __( 'Disable Overview pane', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_disable_advertising_pane', __( 'Disable Advertising pane', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_disable_statistics_pane', __( 'Disable Statistics pane', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_disable_manage_icons_pane', __( 'Disable Manage Icons pane', 'wpmob-lite' ) ), 
						array( 'checkbox', 'multisite_disable_compat_pane', __( 'Disable Compatability pane', 'wpmob-lite' ) ), 
						array( 'checkbox', 'multisite_disable_debug_pane', __( 'Disable Tools and Debug pane', 'wpmob-lite' ) ), 
						array( 'checkbox', 'multisite_disable_backup_pane', __( 'Disable Backup/Import pane', 'wpmob-lite' ) ), 						
						array( 'section-end' )
					)
				),
				__( 'Inherited Settings', 'wpmob-lite' ) => array( 'multisite-inherited',
					array(
						array( 'section-start', 'multisite-inherit', __( 'Inherited Settings', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_inherit_advertising', __( 'Inherit advertising settings', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_inherit_prowl', __( 'Inherit Prowl settings', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_inherit_statistics', __( 'Inherit Statistics settings', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_inherit_theme', __( 'Inherit active theme', 'wpmob-lite' ) ),
						array( 'checkbox', 'multisite_inherit_compat', __( 'Inherit compatability settings', 'wpmob-lite' ) ),
						array( 'section-end' )
					)
				)
			)
		);	
	}
}

function wpmob_setup_plugins() {
	global $wpmob_lite;	
	$modules = $wpmob_lite->get_modules();
	ksort( $modules );
	
	wpmob_add_tab( __( 'Modules', 'wpmob-lite' ), 'modules', $modules );	
}

function wpmob_setup_tabs() {
	global $wpmob_lite;
	$settings = $wpmob_lite->get_settings();
	wpmob_setup_general_tab();	
	
	if ( $wpmob_lite->has_modules() ) {
		wpmob_setup_plugins();
	}	
		
	do_action( 'wpmob_admin_tab' );
	
	wpmob_setup_multisite_tab();

	wpmob_setup_theme_browser_tab();
    
	do_action( 'wpmob_later_admin_tabs' );
	
}

?>