<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wpmob_title(); ?></title>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wpmob_head(); ?>
</head>
<body>  
<div id="wrapper">           
      <!-- BEGIN LOGO -->
      <a id="logo" href="<?php bloginfo('url')?>" title="Poseidon">           
      <?php if(wpmob_get_logo_url()){?>
        <img src="<?php wpmob_logo_url(); ?>" alt="Logo" height="59" style="margin-left: 7px;"/>       
      <?php }else{?>
        <img src="<?php wpmob_skin_url(); ?>/logo.png" alt="Poseidon" height="59" style="margin-left: 7px;"/>
      <?php }?>
      </a>
      <!-- END LOGO -->
      <div class="hr"></div>

      <!-- BEGIN HEADER -->
      <?php if(wpmob_get_image_header()){?>
        <img id="header" src="<?php wpmob_image_header(); ?>" alt="header image" height="167"/>  
      <?php }else{ ?>
        <img id="header" src="<?php wpmob_skin_url(); ?>/headerimg.jpg" alt="juicegraphic.com" height="167"/>       
      <?php }?>
      <!-- END HEADER -->

      <div class="hr"></div>

      <!-- BEGIN NAVIGATION & SEARCH -->
      <?php if ( wpmob_has_menu() ) { ?>
    <div id="main-menu">     
      <div id="navigation">
        <a title="Navigate" id="navigate" class="button normal">
          <span class="before"></span>
          Navigate <img src="<?php wpmob_skin_url(); ?>/down.png" alt="" />
          <span class="after"></span>
        </a>
        <form id="searchform" action="<?php bloginfo('url'); ?>" method="get">
          <div class="button normal search">
            <span class="before"></span>
            <input id="s" type="text" name="s" value="search" />
            <input id="searchsubmit" type="submit" value="" />
            <span class="after"></span>
          </div>
        </form>
      </div>
      <div id="menu">
        <?php
        wpmob_show_menu(); 
        ?>
      </div>
  </div>
  <?php } ?> 
      <!-- END MENU-->

      <div class="hr bold"></div>
			<?php do_action( 'wpmob_advertising_top' ); ?>
			
			<?php do_action( 'wpmob_body_top' ); ?>
          <div id="content">
		    
