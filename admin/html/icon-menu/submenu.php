<ul<?php if ( wpmob_get_menu_depth() == 1 ) echo ' style="display: none;"'; ?>>
	<?php while ( wpmob_has_menu_items() ) { ?>
		<?php wpmob_the_menu_item(); ?>
		
		<?php if ( !wpmob_menu_item_duplicate() ) { ?>

		<li class="<?php wpmob_the_menu_item_classes(); ?>">
			<div class="icon-drop-target <?php wpmob_the_menu_item_classes(); ?>" title="<?php wpmob_the_menu_id(); ?>">
				<img src="<?php wpmob_the_menu_icon(); ?>" alt="" />
			</div>
			
			<div class="menu-enable">		
				<input class="checkbox" type="checkbox" title="<?php wpmob_the_menu_id(); ?>" <?php if ( !wpmob_menu_is_disabled() ) echo "checked"; ?> />
			</div>
			
			<span class="title"><?php wpmob_the_menu_item_title(); ?></span>

			<div class="clearer"></div>
			
			<?php if ( wpmob_menu_has_children() ) { ?>
				<?php wpmob_show_children( WPMOB_ADMIN_DIR . '/html/icon-menu/submenu.php', true ); ?>
			<?php } ?>			
		</li>
		
		<?php } ?>

	<?php } ?>
</ul>