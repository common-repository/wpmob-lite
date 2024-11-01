<?php

//-- Theme Filters --//

add_action( 'wpmob_theme_init', 'wpmob_theme_init' );
add_action( 'wpmob_theme_language', 'wpmob_theme_language' );
add_filter( 'wpmob_body_classes', 'wpmob_theme_body_classes' );
add_action( 'wpmob_post_head', 'wpmob_theme_compat_css' );
add_action( 'wpmob_post_head', 'wpmob_theme_iphone_meta' );

//--Device Theme Functions for Poseidon --//

function wpmob_theme_init() {
    wp_enqueue_script( 'wpmob_commons-js', wpmob_get_bloginfo('template_directory') . '/common.js', array('jquery'), md5( WPMOB_VERSION ) );
}

function wpmob_theme_compat_css() {
	$settings = wpmob_get_settings();
	if ( $settings->wpmob_theme_use_compat_css ) {
        echo '<style type="text/css">@import url('.wpmob_get_bloginfo('template_directory').'/style.css);</style>'." \n";
	    echo '<link rel="stylesheet" href="'.wpmob_get_skin_url().'.css" type="text/css" />';
    }
}

function wpmob_theme_language( $locale ) {
	// In a normal theme a language file would be loaded here
	// for text translation
}

// This spits out all the meta tags fopr iPhone/iPod touch/iPad stuff 
// (web-app, startup img, device width, status bar style)
function wpmob_theme_iphone_meta() {
	$settings = wpmob_get_settings();
	$status_type = $settings->wpmob_theme_webapp_status_bar_color;

	echo "<meta name='apple-mobile-web-app-capable' content='yes' /> \n";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' /> \n";
	echo "<meta name='apple-mobile-web-app-status-bar-style' content='" . $status_type . "' /> \n";	

	if ( $settings->wpmob_theme_webapp_use_loading_img ) {
		echo "<link rel='apple-touch-startup-image' href='" . wpmob_get_bloginfo('template_directory') . "/images/startup.png' /> \n";
	} 
}

// Add background image name and post icon type for styling diffs
function wpmob_theme_body_classes( $body_classes ) {
	$settings = wpmob_get_settings();
	$is_idevice = strstr( $_SERVER['HTTP_USER_AGENT'],'iPad') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod' );
	
	// Add the wpmob_theme background image as a body class
	$body_classes[] = $settings->wpmob_theme_background_image;
	$body_classes[] = $settings->wpmob_theme_icon_type;
	if ( $settings->wpmob_theme_webapp_status_bar_color == 'black-translucent' ) {
		$body_classes[] = $settings->wpmob_theme_webapp_status_bar_color;
	}

	if ( $is_idevice ) {
		$body_classes[] = 'idevice';
	}		
	
	return $body_classes;
}

// Previous + Next Post Functions For Single Post Pages
function wpmob_theme_get_previous_post_link() {
	$prev_post = get_previous_post(); 
	if ( $prev_post ) {
		$prev_post = get_previous_post( false ); 
		$prev_url = get_permalink( $prev_post->ID ); 
		echo '<a href="' . $prev_url . '" class="button right"><span class="before"></span><span class="after"></span></a>';
	}
}

function wpmob_theme_get_next_post_link() {
	$next_post = get_next_post(); 
	if ( $next_post ) {
		$next_post = get_next_post( false );
		$next_url = get_permalink( $next_post->ID ); 
//		echo '<a href="#" rel="' . $next_url . '" class="nav-fwd ajax-link">'. __( "Next", "wpmob-lite" ) . '</a>'; <- playing with ajax
		echo '<a href="' . $next_url . '" class="button left"><span class="before"></span><span class="after"></span></a>';
	}
}

// Dynamic archives heading text for archive result pages, and search
function wpmob_theme_archive_text() {
	if ( !is_home() ) {
		echo '<div class="archive-text">';
	}
	if ( is_search() ) {
		echo sprintf( __( "Search results &rsaquo; %s", "wpmob-lite" ), get_search_query() );
	} if ( is_category() ) {
		echo sprintf( __( "Categories &rsaquo; %s", "wpmob-lite" ), single_cat_title( "", false ) );
	} elseif ( is_tag() ) {
		echo sprintf( __( "Tags &rsaquo; %s", "wpmob-lite" ), single_tag_title(" ", false ) );
	} elseif ( is_day() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wpmob-lite" ),  get_the_time( 'F jS, Y' ) );
	} elseif ( is_month() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wpmob-lite" ),  get_the_time( 'F, Y' ) );
	} elseif ( is_year() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wpmob-lite" ),  get_the_time( 'Y' ) );
	} elseif ( is_404() ) {
		echo( __( "404 Not Found", "wpmob-lite" ) );
	}
	if ( !is_home() ) {
		echo '</div>';
	}
}

// If Ajax load more is turned off, this shows
function wpmob_theme_archive_navigation_back() {
	if ( is_search() ) {
		previous_posts_link( __( 'Back in Search', "wpmob-lite" ) );
	} elseif ( is_category() ) {
		previous_posts_link( __( 'Back', "wpmob-lite" ) );
	} elseif ( is_tag() ) {
		previous_posts_link( __( 'Back in Tag', "wpmob-lite" ) );
	} elseif ( is_day() ) {
		previous_posts_link( __( 'Back One Day', "wpmob-lite" ) );
	} elseif ( is_month() ) {
		previous_posts_link( __( 'Back One Month', "wpmob-lite" ) );
	} elseif ( is_year() ) {
		previous_posts_link( __( 'Back One Year', "wpmob-lite" ) );
	}
}

// If Ajax load more is turned off, this shows
function wpmob_theme_archive_navigation_next() {
	if ( is_search() ) {
		next_posts_link( __( 'Next in Search', "wpmob-lite" ) );
	} elseif ( is_category() ) {		  
		next_posts_link( __( 'Next', "wpmob-lite" ) );
	} elseif ( is_tag() ) {
		next_posts_link( __( 'Next in Tag', "wpmob-lite" ) );
	} elseif ( is_day() ) {
		next_posts_link( __( 'Next One Day', "wpmob-lite" ) );
	} elseif ( is_month() ) {
		next_posts_link( __( 'Next One Month', "wpmob-lite" ) );
	} elseif ( is_year() ) {
		next_posts_link( __( 'Next One Year', "wpmob-lite" ) );
	}
}

function wpmob_theme_wp_comments_nav_on() {
	if ( get_option( 'page_comments' ) ) {
		return true;
	} else {
		return false;
	}
}

function wpmob_theme_show_comments_on_pages() {
	$settings = wpmob_get_settings();
	if ( comments_open() ) {
		return $settings->wpmob_theme_show_comments_on_pages;
	} else {
		return false;
	}
}

function wpmob_theme_is_ajax_enabled() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_ajax_mode_enabled;
}

function wpmob_theme_use_calendar_icons() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_icon_type == 'calendar';
}

function wpmob_theme_use_thumbnail_icons() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_icon_type == 'thumbnails';
}

function wpmob_theme_background() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_background_image;
}

function wpmob_theme_show_categories_tab() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_show_categories;
}

function wpmob_theme_show_tags_tab() {
	$settings = wpmob_get_settings();
	return $settings->wpmob_theme_show_tags;
}

// Check what order comments are displayed, governs whether 'load more comments' link uses previous_ or next_ function
function wpmob_theme_comments_newer() {
if ( get_option( 'default_comments_page' ) == 'newest' ) {
		return true;
	} else {
		return false;
	}
}
function wpmob_get_menu_icon_custom($menu_id) {
    global $wpmob_lite;
    if ( !wpmob_menu_is_disabled() ) {
        $settings = $wpmob_lite->get_settings();

        if ( isset( $settings->menu_icons[ $menu_id ] ) ) {
            return WP_CONTENT_URL . $settings->menu_icons[ $menu_id ];
        } else {
            return wpmob_get_site_menu_icon( $menu_id );    
        }
    }
}
function wpmob_show_menu_custom( $template_name = false ) { 
    global $wpmob_menu_items;
    global $wpmob_menu_iterator;
    
    $wpmob_menu_items = array();
    
        
    if ( !$template_name ) {
        wpmob_build_menu_tree( 0, 1, $wpmob_menu_items, true );    
        $wpmob_menu_items = apply_filters( 'wpmob_menu_items', $wpmob_menu_items );
        $wpmob_menu_iterator = new WPmobArrayIterator( $wpmob_menu_items );    
            
        wpmob_do_template( 'menu.php' );
    } else {
        wpmob_build_menu_tree( 0, 1, $wpmob_menu_items );    
        $wpmob_menu_items = apply_filters( 'wpmob_menu_items', $wpmob_menu_items );
        $wpmob_menu_iterator = new WPmobArrayIterator( $wpmob_menu_items );
        
        include( $template_name );    
    }
/*    foreach($wpmob_menu_iterator as $menu_page){
        echo $menu_page->page_id.'<br>';
    } */
}
function wpmob_page_navigation(){
    $pages = get_pages("sort_column=menu_order&sort_order=asc&depth=1&echo=0"); 
    echo '<ul>';
    echo '<li>'.
    '<a href="'.get_option('home').'">Home</a></li>';
    foreach($pages as $pagenav){
        $subpages = get_pages("sort_column=menu_order&sort_order=asc&depth=1&echo=0&child_of=".$pagenav->ID); 
        echo '<li>'.
        '<a href="'.get_permalink($pagenav->ID).'">'.$pagenav->post_title.'</a>';
        if($subpages){
            echo '<ul style="display:none;">';
            foreach($subpages as $subpagesnav){
                echo '<li>'.$subpagesnav->post_title.'</li>';
            }
            echo '</ul>';
        }
        echo '</li>';                
    }
    echo '</ul>'; 
}
?>