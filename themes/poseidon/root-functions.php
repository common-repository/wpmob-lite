<?php

//-- Admin Panel Filters --//

add_filter( 'wpmob_supported_device_classes', 'wpmob_theme_supported_devices' );
add_filter( 'wpmob_custom_templates', 'wpmob_theme_custom_templates' );
add_filter( 'wpmob_default_settings', 'wpmob_theme_default_settings' );
add_filter( 'wpmob_theme_menu', 'wpmob_theme_admin_menu' );
add_filter( 'wpmob_setting_filter_wpmob_theme_custom_user_agents', 'wpmob_theme_user_agent_filter' );

//-- Global Functions For Poseidon --//

function wpmob_theme_supported_devices( $devices ) {
	if ( isset( $devices['iphone'] ) ) {
		$settings = wpmob_get_settings();

		if ( strlen( $settings->wpmob_theme_custom_user_agents  ) ) {
		
			// get user agents
			$agents = explode( "\n", str_replace( "\r\n", "\n", $settings->wpmob_theme_custom_user_agents ) );
			if ( count( $agents ) ) {	
				// add our custom user agents
				$devices['iphone'] = array_merge( $devices['iphone'], $agents );
			}
		}
	}
	
	return $devices;	
}

function wpmob_theme_user_agent_filter( $agents ) {
	return trim( $agents );	
}

function wpmob_theme_custom_templates( $templates ) {
	$settings = wpmob_get_settings();

	if ( $settings->wpmob_theme_show_archives ) {
		$templates[ __( 'Archives', 'wpmob-lite' ) ] = array( 'wpmob-archives' );
	}

	if ( $settings->wpmob_theme_show_links ) {
		$templates[ __( 'Links', 'wpmob-lite' ) ] = array( 'wpmob-links' );
	}
	
	return $templates;
}


// All default settings must be added to the $settings object here
// All settings should be properly namespaced, i.e. theme_name_my_setting instead of just my_setting
function wpmob_theme_default_settings( $settings ) {
	$settings->wpmob_theme_webapp_use_loading_img = true;
	$settings->wpmob_theme_webapp_status_bar_color = 'default';
	$settings->wpmob_theme_use_compat_css = true;
	$settings->wpmob_theme_show_comments_on_pages = false;
//	$settings->wpmob_theme_ajax_mode_enabled = false;
//	$settings->wpmob_theme_icon_type = 'calendar';
//	$settings->wpmob_theme_background_image = 'thinstripes';
	$settings->wpmob_theme_custom_user_agents = '';
	$settings->wpmob_theme_show_categories = true;
	$settings->wpmob_theme_show_tags = true;
	$settings->wpmob_theme_show_archives = true;
    $settings->wpmob_theme_show_links = true;
    $settings->free_activated = false;

	return $settings;
}

function wpmob_theme_thumbnail_options() {
	$thumbnail_options = array();
	$thumbnail_options['calendar'] = __( 'Calendar', 'wpmob-lite' );
	if ( function_exists( 'add_theme_support' ) ) {
		$thumbnail_options['thumbnails'] = __( 'WordPress Thumbnails', 'wpmob-lite' );
	}	
	$thumbnail_options['none'] = __( 'None', 'wpmob-lite' );	
	
	return $thumbnail_options;
}

// The administrational page for the wpmob_theme theme is constructed here
function wpmob_theme_admin_menu( $menu ) {	
	$menu = array(
		__( "General", "wpmob-lite" ) => array ( 'general',
            array(
                array( 'section-start', 'img-header', __( 'Image & Logo Header', 'wpmob-lite' ) ),
                array( 'text', 'logo_url', __( 'WPmob logo url', 'wpmob-lite' ), __( 'Should be 167px (width) by 70px (height). Transparent .PNG is recommended. If no image is specified here the default Site Icon and Site Title will be used.', 'wpmob-lite' )),        
                array( 'text', 'image_header', __( 'WPmob image @ header', 'wpmob-lite' ), __( 'Should be 320px (width) by 167px (height). If no image is specified here the default Site Images will be used.', 'wpmob-lite' )),        
                array( 'section-end' ),
                                
                array( 'section-start', 'misc-options', __( 'Miscellaneous Options', "wpmob-lite" ) ),
/*                array( 'checkbox', 'wpmob_theme_ajax_mode_enabled', __( 'Enable AJAX "Load More" link', "wpmob-lite" ), __( 'Posts and comments will be appended to existing content with an AJAX "Load More..." link. If unchecked regular post/comment pagination will be used.', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_use_compat_css', __( 'Use compatibility CSS', "wpmob-lite" ), __( 'Add the compat.css file from the theme folder. Contains various CSS declarations for a variety of plugins.', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_show_comments_on_pages', __( 'Show comments on pages', "wpmob-lite" ), __( 'Enabling this setting will cause comments to be shown on pages, if they are enabled in the WordPress settings.', "wpmob-lite" ) ),
*/                array( 'list', 'wpmob_theme_background_image', __( 'Theme background image', "wpmob-lite" ), __( 'Choose a background tile for your theme.', "wpmob-lite" ), 
                    array( 
                        'thinstripes' => __( 'Thin Stripes', 'wpmob-lite' ), 
                        'thickstripes' => __( 'Thick Stripes', 'wpmob-lite' ), 
                        'pinstripes-blue' => __( 'Pinstripes Vertical (Blue)', 'wpmob-lite' ), 
                        'pinstripes-grey' => __( 'Pinstripes Vertical (Grey)', 'wpmob-lite' ), 
                        'pinstripes-horizontal' => __( 'Pinstripes Horizontal', 'wpmob-lite' ), 
                        'pinstripes-diagonal' => __( 'Pinstripes Diagonal', 'wpmob-lite' ), 
                        'skated-concrete' => __( 'Skated Concrete', 'wpmob-lite' ), 
                        'none' => __( 'None', 'wpmob-lite' ) 
                    ) 
                ),    
                array( 'section-end' ),
                array( 'section-start', 'menu-options', __( 'Menu Options', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_show_categories', __( 'Show Categories in tab-bar', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_show_tags', __( 'Show Tags in tab-bar', "wpmob-lite" ) ),
                array( 'copytext', 'copytext-info-push-message', __( 'The push message and account tabs are shown/hidden automatically.', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_show_archives', __( 'Show Archives template in menu', "wpmob-lite" ) ),
                array( 'checkbox', 'wpmob_theme_show_links', __( 'Show Links template in menu', "wpmob-lite" ) ),
                array( 'section-end' )    
            )

		),
		__( 'User Agents', "wpmob-lite" ) => array( 'user-agents',
			array(
				array( 'section-start', 'devices', __( 'Default User Agents', "wpmob-lite" ) ),	
				array( 'user-agents'),
				array( 'section-end' ),
				array( 'spacer' ),				
				array( 'section-start', 'user-agents', __( 'Custom User Agents', "wpmob-lite" ) ),
				array( 'textarea', 'classic_custom_user_agents', __( 'Enter additional user agents on separate lines, not device names or other information.', 'wpmob-lite' ) . '<br />' . sprintf( __( 'Visit %sWikipedia%s for a list of device user agents', 'wpmob-lite' ), '<a href="http://en.wikipedia.org/wiki/List_of_user_agents_for_mobile_phones" target="_blank">', '</a>' ) ),	
				array( 'section-end' )
			)				
		),
		__( 'Web-App Mode', "wpmob-lite" ) => array( 'web-app-mode',
			array(
				array( 'section-start', 'settings', __( 'Settings', "wpmob-lite" ) ),	
				array( 'checkbox', 'wpmob_theme_webapp_use_loading_img', __( 'Use startup splash screen image', "wpmob-lite" ), __( 'When checked WPmob will show the theme startup image while in web-app mode.', "wpmob-lite" ) ),
				array( 'copytext', 'copytext-info-web-app', __( 'The startup splash screen image is located inside this theme folder at: /iphone/images/startup.png ', "wpmob-lite" ) ),
				array( 'list', 'wpmob_theme_webapp_status_bar_color', __( 'Status Bar Color', "wpmob-lite" ), __( 'Choose between grey (default), black or black-translucent.', "wpmob-lite" ), 
					array( 
						'default' => __( 'Default (Grey)', 'wpmob-lite' ), 
						'black' => __( 'Black', 'wpmob-lite' ), 
						'black-translucent' => __( 'Black Translucent', 'wpmob-lite' )
					) 
				),					array( 'section-end' )
			)
		)					
	);	
	
	return $menu;
}

?>