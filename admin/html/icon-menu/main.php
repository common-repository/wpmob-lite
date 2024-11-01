<?php 
	// Main menu hook for admin panel 
?>
<ul class="icon-menu">
<?php if ( wpmob_has_menu_items() ) { ?>
	<?php while ( wpmob_has_menu_items() ) { ?>
		<?php wpmob_the_menu_item(); ?>
		<li class="<?php wpmob_the_menu_item_classes(); ?>">
			<div class="icon-drop-target <?php wpmob_the_menu_item_classes(); ?>" title="<?php wpmob_the_menu_id(); ?>">
				<img src="<?php wpmob_the_menu_icon(); ?>" alt="" />
			</div>
					
			<div class="menu-enable">		
				<input class="checkbox" type="checkbox" title="<?php wpmob_the_menu_id(); ?>" <?php if ( !wpmob_menu_is_disabled() ) echo "checked"; ?> />
			</div>
			
			<?php if ( wpmob_menu_has_children() ) { ?>
				<a href="#" class="expand title"><?php wpmob_the_menu_item_title(); ?></a>
			<?php } else { ?>
				<span class="title"><?php wpmob_the_menu_item_title(); ?></span>
			<?php } ?>
	
			
			<div class="clearer"></div>
			
			<?php if ( wpmob_menu_has_children() ) { ?>
				<?php wpmob_show_children( WPMOB_ADMIN_DIR . '/html/icon-menu/submenu.php', true ); ?>
			<?php } ?>
		</li>
	<?php } ?>
<?php } else { ?>
	<li><span class="title"><?php echo __( "There are no WordPress pages available to configure.", "wpmob-lite" ); ?></span></li>
<?php } ?>
</ul>