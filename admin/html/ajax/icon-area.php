<?php global $wpmob_lite; ?>
<?php if ( isset( $wpmob_lite->post['area'] ) && $wpmob_lite->post['area'] == 'manage' ) $manage = true; else $manage = false; ?>

	<?php if ( !$manage ) { ?>
	<div id="icon-help-message">
		<?php _e( "Drag icons from the pool to", "wpmob-lite" ); ?><br />
		<?php _e( "associate them with menu pages.", "wpmob-lite" ); ?><br />
		<?php _e( "Don't forget to save your changes!", "wpmob-lite" ); ?>
	</div>
	<?php } else { ?>
		<?php $pack = $wpmob_lite->get_icon_pack( $wpmob_lite->post['set'] ); ?>
		<div id="manage-set-desc">
			<h5><em><?php echo htmlentities( $pack->name ); ?></em>
			<?php if ( isset( $pack->author ) ) { ?> 
				by <?php echo htmlentities( $pack->author ); ?>
				</h5>
				<div id="manage-set-desc-links">
					<?php if ( isset( $pack->author_url ) ) { ?><a href="<?php echo $pack->author_url; ?>"><?php _e( 'Author Website', 'wpmob-lite' ); ?></a> | <?php } ?><a href="#" class="delete-set"><?php _e( 'Delete Set', 'wpmob-lite' ); ?></a>
				</div>
			<?php } else { ?>
				</h5>
				<?php if ( !( $manage && $wpmob_lite->post['set'] == __( "Custom Icons", "wpmob-lite" ) ) ) { ?>
				<div id="manage-set-desc-links">
					<a href="#" class="delete-set"><?php _e( 'Delete Set', 'wpmob-lite' ); ?></a>
				</div>			
				<?php } ?>
			<?php } ?>
		</div>
	<?php } ?>
	
	<?php if ( wpmob_have_icons( $wpmob_lite->post['set'] ) ) { ?>	
	<?php $pack = $wpmob_lite->get_icon_pack( $wpmob_lite->post['set'] ); ?>
	<ul>
		<?php while ( wpmob_have_icons( $wpmob_lite->post['set'] ) ) { ?>
			<?php wpmob_the_icon(); ?>
			<li class="<?php wpmob_the_icon_class_name(); ?> <?php if ( $pack->dark_background ) echo 'dark'; else echo 'light'; ?>">
				<?php if ( $manage && $wpmob_lite->post['set'] == __( "Custom Icons", "wpmob-lite" ) ) { ?>
					<a href="#" class="delete-icon">X</a>
				<?php } ?>
				<div class="icon-image"><img src="<?php wpmob_the_icon_url(); ?>" alt="" /></div>
				<div class="icon-info">
					<span class="icon-name"><?php wpmob_the_icon_short_name(); ?></span>
					<?php if ( wpmob_icon_has_image_size_info() ) { ?>
					<span class="icon-size"><?php wpmob_icon_the_width(); ?>x<?php wpmob_icon_the_height(); ?></span>
					<?php } ?>
				</div>
			</li>
		<?php } ?>
	</ul>
<?php } else { ?>
	<?php if ( $manage ) { ?>
		<div id="empty-icon-pool"><?php _e( "No Custom Icons to Display", "wpmob-lite" ); ?></div>
	<?php } else { ?>
		<div id="empty-icon-pool"><?php echo __( "No Custom Icons to Display", "wpmob-lite" ) . '<br />' . __( "Add them in the 'Manage Icons + Sets' area", "wpmob-lite" ); ?></div>
	<?php } ?>
<?php } ?>
<div class="clearer"></div>