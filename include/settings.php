<?php

class WPmobSettings extends stdClass {	};

// Settings are added as setting_name => default_value
class WPmobDefaultSettings extends WPmobSettings {
	function WPmobDefaultSettings() {
                                     
        // header go here
        $this->logo_url = '';
        $this->image_header = '';
        
        // social network go here
        $this->facebook_link = '';
        $this->twitter_link = '';
        $this->flickr_id = '';
        $this->flickr_api = '';
        $this->linked_in_link = '';
        $this->youtube_link = '';
        $this->feed_burner_link = '';
        
		// default settings go here
		$this->site_title = get_bloginfo( 'name' );	
		$this->desktop_is_first_view = false;
		$this->welcome_alert = '';
		$this->fourohfour_message = sprintf( __('%sSorry, the content you were looking for cannot be found. Please use the menu in the header to access the site search, or browse other site content.%s', 'wpmob-lite'), '<p>', '</p>' );
		$this->footer_message = '';
		$this->desktop_switch_css = '
#wpmob-desktop-switch {
  padding: 15px 15px 30px;
  font-size: 250%;
  background: url(' . WPMOB_URL . '/include/images/switch-stripe.png) repeat 0 0;
  color: #ccd8da;
  text-shadow: #000 0 -1px 1px;
  font-weight: bold;
  text-align: center;
  border-top: 5px solid #000;
  width: auto;
  clear: both;
  display: block;
  margin: 0 auto -20px;
}';
		$this->custom_css_file = '';
		$this->current_theme_friendly_name = __( 'Poseidon', 'wpmob-lite' );
		$this->current_theme_location = '/plugins/' . WPMOB_ROOT_DIR . '/themes';
		$this->current_theme_name = 'Poseidon';
		$this->current_theme_skin = 'white-blue.css';
		
		$this->show_wpmob_in_footer = true;
		
		// Thumbnail images
		$this->post_thumbnails_enabled = true;
		$this->post_thumbnails_new_image_size = 92;
		
		// Excerpt information
		$this->excerpt_length = 26;
		
		// Global core related options
		$this->disable_menu = false;
		
		// Icons
		$this->site_icon = 'classic/Home.png';
		
		// Advertising
        $this->advertising_type = 'admob';
        $this->advertising_location = 'header';    
        $this->custom_advertising_code = '';
                
        $this->admob_publisher_id = 'a14cf6fb8dc9bd9';  
        $this->admob_channel = '';      
		$this->adsense_id = false;
        $this->adsense_channel = '';
        $this->advertising_pages = 'main_single_pages';
        
/*		// Adsense
		$this->adsense_id = false;
		$this->adsense_channel = '';

		// Admob
		$this->admob_id = false;
		$this->admob_channel = '';

*/		// Ad Options
		$this->advertising_pages = 'all_views';   

		// Stats
		$this->custom_stats_code = '';
		
		// Tools
		$this->developer_mode = 'off';	
		$this->debug_log = false;	
		$this->debug_log_level = WPMOB_SECURITY;
		$this->admin_client_mode_hide_licenses = false;
		$this->admin_client_mode_hide_browser = false;
		$this->admin_client_mode_hide_tools = false;
		
		// Prowl
		$this->push_prowl_api_keys = array();
		$this->push_prowl_comments_enabled = false;
		$this->push_prowl_registrations = false;
		$this->push_prowl_direct_messages = false;
		
		// Optimization
		// General
		$this->show_footer_load_times = false;

		// Menu & Icons
		$this->glossy_bookmark_icon = true;
		$this->menu_show_home = true;
		$this->menu_show_rss = true;
		$this->menu_show_email = true;
		$this->menu_custom_rss_url = '';
		$this->menu_custom_email_address = '';
		$this->menu_sort_order = 'wordpress';
		
		$this->wpmob_menu_icons = '';
		$this->enabled_icon_packs = array();
		
		// Devices
		$this->custom_user_agents = '';
		
		// BNC API
		$this->bncid = '';
		$this->wpmob_license_key = '';
		
		// Real menu settings
		$this->menu_icons = array();
		$this->default_menu_icon = '/plugins/' . WPMOB_ROOT_DIR . '/resources/icons/classic/Default.png';
		$this->disabled_menu_items = array();
		$this->temp_disabled_menu_items = array();
		$this->enable_menu_icons = true;
		$this->menu_disable_parent_as_child = false;
		
		// Temporary menu settings
		$this->temp_menu_icons = array();
		
		$this->temp_icon_file_to_unzip = '';
		$this->temp_icon_set_for_readme = '';

		// to be hooked up for each theme
		$this->theme_settings = array();
		
		// Custom menu links
		$this->custom_menu_text_1 = '';
		$this->custom_menu_link_1 = '';
		$this->custom_menu_position_1 = 'top';
		$this->custom_menu_force_external_1 = false;
		$this->custom_menu_text_2 = '';
		$this->custom_menu_link_2 = '';
		$this->custom_menu_position_2 = 'top';
		$this->custom_menu_force_external_2 = false;
		$this->custom_menu_text_3 = '';
		$this->custom_menu_link_3 = '';
		$this->custom_menu_position_3 = 'top';	
		$this->custom_menu_force_external_3 = false;
		
		$this->last_bncid_time = 0;
		$this->last_bncid_result = false;		
		$this->bncid_had_license = false;	
		$this->last_bncid_licenses = 0;
		
		$this->enable_home_page_redirect = false;
		$this->home_page_redirect_target = 0;
		
		// Switch link Settings
		$this->show_switch_link = true;
		$this->home_page_redirect_address = 'same';

		// Plugin compatibility
		$this->disable_shortcodes = true;
		$this->disable_google_libraries = true;
		$this->include_functions_from_desktop_theme = false;
		$this->dismissed_warnings = array();
		$this->convert_menu_links_to_internal = true;
		
		$this->plugin_hooks = false;
		
		// Set up dynamic plugin disabling code
		global $wpmob_lite;
		if ( $wpmob_lite->plugin_hooks && count( $wpmob_lite->plugin_hooks ) ) {
			foreach( $wpmob_lite->plugin_hooks as $name => $hook ) {
				$proper_name = "plugin_disable_" . str_replace( '-', '_', $name );				
				$this->$proper_name = false;
			}
		}
		$user= wp_get_current_user();
        $uid = (int)$user->ID;
        $uemail = $user->user_email;
        $date = getdate();
        $setkey=md5($uid.'wpmob'.$uemail.$date);
        
		$this->put_wpmob_in_appearance_menu = false;
		$this->respect_wordpress_date_format = false;
		$this->force_locale = 'auto';
		$this->has_migrated_icons = false;
		$this->make_links_clickable = false;
		$this->restore_string = '';
		$this->backup_or_restore = 'backup';
		
		$this->ignore_urls = '';
        
        $this->free_activated=false;
        $this->wpmob_key_free_activation=$setkey;
        
		// Multisite
		$this->multisite_disable_overview_pane = true;
		$this->multisite_disable_manage_icons_pane = true;
		$this->multisite_disable_compat_pane = true;
		$this->multisite_disable_debug_pane = true;
		$this->multisite_disable_backup_pane = true;
		$this->multisite_disable_theme_browser_tab = true;
		$this->multisite_disable_push_notifications_pane = true;
		$this->multisite_disable_advertising_pane = true;
		$this->multisite_disable_statistics_pane = true;
		
		$this->multisite_inherit_statistics = false;
		$this->multisite_inherit_prowl = false;
		$this->multisite_inherit_advertising = false;
		$this->multisite_inherit_theme = false;
		$this->multisite_inherit_compat = false;
	}
};
?>