<?php 
	global $wpmob_lite; 
	$settings = wpmob_get_settings();
?>

<div class="box-holder-feedback round-6" id="blog-news-box">
    <h3><?php _e( "Contact us for WPmob customization", "wpmob-lite" ); ?></h3>
    <p class="sub">
        <a href="mailto:info@wpmobtheme.com"><img src="<?php wpmob_bloginfo('wpmob_url')?>/admin/images/wpmob.gif" alt="wpmob lite" style="padding-left: 9px;"></a>
    </p>
</div><!-- box-holder -->
<div style="clear: both;"></div>
<div class='wpmob-setting' id='touchboard'>
    
	<div class="box-holder round-6" id="right-now-box">

		<h3><?php _e( "Right Now", "wpmob-lite" ); ?></h3>

		<p class="sub"><?php _e( "At a Glance", "wpmob-lite" ); ?></p>

		<table class="fonty">
		<tbody>
			<tr>
				<td class="box-table-number"><?php wpmob_bloginfo( 'theme_count' ); ?></td>
				<td class="box-table-text"><a href="#" rel="themes" class="wpmob-admin-switch"><?php _e( "Themes", "wpmob-lite" ); ?></a></td>
			</tr>
			<tr>
				<td class="box-table-number"><?php wpmob_bloginfo( 'icon_count' ); ?></td>
				<td class="box-table-text"><a href="#" rel="icons" class="wpmob-admin-switch"><?php _e( "Icons", "wpmob-lite" ); ?></a></td>
			</tr>
			<tr>
				<td class="box-table-number"><?php wpmob_bloginfo( 'icon_set_count' ); ?></td>
				<td class="box-table-text"><a href="#" rel="icon-sets" class="wpmob-admin-switch"><?php _e( "Icon Sets", "wpmob-lite" ); ?></a></td>
			</tr>
			<?php if ( wpmob_get_bloginfo( 'warnings' ) ) { ?>
			<tr id="board-warnings">
				<td class="box-table-number"><?php wpmob_bloginfo( 'warnings' ); ?></td>
				<td class="box-table-text"><a href="#" rel="plugin-conflicts" class="wpmob-admin-switch"><?php _e( "Warnings", "wpmob-lite" ); ?></a></td>
			</tr>
			<?php } ?>
			<?php if ( wpmob_has_license() && !$settings->admin_client_mode_hide_licenses	 ) { ?>
			<tr id="wpmob-licenses-remaining">
				<td class="box-table-number">&nbsp;</td>
				<td class="box-table-text">&nbsp;</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>

		<div id="touchboard-ajax"></div>
		
	</div><!-- box-holder -->

	<div class="box-holder round-6" id="blog-news-box">
		<h3><?php _e( "WPmob News", "wpmob-lite" ); ?></h3>

		<p class="sub"><?php _e( "From the juicegraphic Blog", "wpmob-lite" ); ?></p>

		<div id="blog-news-box-ajax"></div>

	</div><!-- box-holder -->

</div><!-- wpmob-setting -->
