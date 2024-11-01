<ul>
	<?php while ( wpmob_has_menu_items() ) { ?>
		<?php wpmob_the_menu_item(); ?>	
		
		<?php if ( !wpmob_menu_is_disabled() ) { ?>	
        <li class="<?php wpmob_the_menu_item_classes(); ?>">
			<?php if ( wpmob_can_show_menu_icons() ) { ?>
				<img src="<?php wpmob_the_menu_icon(); ?>" alt="" width="30" height="30"/>
			<?php } ?>
			
			<a href="<?php wpmob_the_menu_item_link(); ?>"><?php wpmob_the_menu_item_title(); ?></a>
				
			<?php //if ( wpmob_menu_has_children() ) { ?>
				<?php //wpmob_show_children( 'menu.php' ); ?>
			<?php //} ?>
		</li>
		<?php } ?>
	<?php } ?>
</ul>