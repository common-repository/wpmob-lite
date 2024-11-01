<?php global $wpmob_lite; global $_parent_pages; $current_scheme = get_user_option('admin_color'); $settings = wpmob_get_settings(); wpmob_check_free_activation($_GET['rcwpmob']);if($_GET['rcwpmob']){?><script type="text/javascript">window.location="<?php echo admin_url( 'admin.php?page=wpmob-lite/admin/admin-panel.php');?>";</script><?php }?>
<div id="wpmob_container">
 <?php if(!wpmob_get_free_activation()){?>
<div id="unlicense"><div id="unlicensed-board" class="round-6">
        <strong><?php  echo sprintf( __( "This copy of WPmob Lite %s is unlicensed.", "wpmob-lite" ), wpmob_get_bloginfo( 'version' ) ); ?></strong>
                <span style="color:#1A6B8F;"><?php  _e( "Get started with Free Activation &raquo;", "wpmob-lite" ); ?></span>
<div id="mc_embed_signup" style="padding-top: 8px;">
<div id="subcribform">
<form action="http://juicegraphic.us2.list-manage.com/subscribe/post?u=087735c8e250d68ef29d92d7e&amp;id=296c49a4d3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
    <fieldset>
<div class="mc-field-group">
<label for="mce-EMAIL">Email Address <strong class="note-required" style="display: none;">*</strong>
</label>
<input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" size="30">
<div class="mc-field-group" style="display:none">
<label for="mce-ACTKEY">Wpmob Activation Link <strong class="note-required">*</strong>
</label>
<input type="text" value="<?php echo admin_url('admin.php?page='.wpmob_get_key())?>" name="ACTKEY" class="required url" id="mce-ACTKEY">
</div>
</div>
<input type="submit" value="Get Free Activation" name="subscribe" id="mc-embedded-subscribe" class="btn">
    </fieldset>    
    <a href="#" id="mc_embed_close" class="mc_embed_close" style="display: none;">Close</a>
</form>
</div>
    <div id="mce-responses">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
    </div>
</div>   
</div></div>   
<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='MMERGE2';ftypes[2]='url';var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: ERROR_BGCOLOR none repeat scroll 0% 0%; font-weight: bold; float: left; z-index: 1; width: 80%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: ERROR_COLOR;';
}
var mce_jQuery = jQuery.noConflict();
mce_jQuery(document).ready( function($) {
  var options = { errorClass: 'mce_inline_error', errorElement: 'div', errorStyle: 'color:#FF3F3F;width:221px;float: right;', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
  var mce_validator = mce_jQuery("#mc-embedded-subscribe-form").validate(options);
  options = { url: 'http://juicegraphic.us2.list-manage.com/subscribe/post-json?u=087735c8e250d68ef29d92d7e&id=296c49a4d3&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                beforeSubmit: function(){
                    mce_jQuery('#mce_tmp_error_msg').remove();
                    mce_jQuery('.datefield','#mc_embed_signup').each(
                        function(){
                            var txt = 'filled';
                            var fields = new Array();
                            var i = 0;
                            mce_jQuery(':text', this).each(
                                function(){
                                    fields[i] = this;
                                    i++;
                                });
                            mce_jQuery(':hidden', this).each(
                                function(){
                                    if ( fields[0].value=='MM' && fields[1].value=='DD' && fields[2].value=='YYYY' ){
                                        this.value = '';
                                    } else if ( fields[0].value=='' && fields[1].value=='' && fields[2].value=='' ){
                                        this.value = '';
                                    } else {
                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                    }
                                });
                        });
                    return mce_validator.form();
                }, 
                success: mce_success_cb
            };
  mce_jQuery('#mc-embedded-subscribe-form').ajaxForm(options);

});
function mce_success_cb(resp){
    mce_jQuery('#mce-success-response').hide();
    mce_jQuery('#mce-error-response').hide();
    if (resp.result=="success"){
        mce_jQuery('#mce-'+resp.result+'-response').show();
        mce_jQuery('#mce-'+resp.result+'-response').html(resp.msg);
        mce_jQuery('#mc-embedded-subscribe-form').each(function(){
            this.reset();
        });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
            var alreadyexists = resp.msg.split(' ');
            if(alreadyexists[2]=='already'){
                window.location = "<?php echo admin_url('admin.php?page='.wpmob_get_key());?>";    
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                mce_jQuery('#mce-'+resp.result+'-response').show();
                mce_jQuery('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = mce_jQuery(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = mce_jQuery(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = mce_jQuery(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = mce_jQuery().parent(input_id).get(0);
                }
                if (f){
                    mce_jQuery(f).append(html);
                    mce_jQuery(input_id).focus();
                } else {
                    mce_jQuery('#mce-'+resp.result+'-response').show();
                    mce_jQuery('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            mce_jQuery('#mce-'+resp.result+'-response').show();
            mce_jQuery('#mce-'+resp.result+'-response').html(msg);
        }
    }
}
</script>       
<?php }?>
<div id="wpmobheader">
<img src="<?php wpmob_bloginfo('wpmob_url')?>/admin/images/header.png" alt="juicegraphic title" style="padding: 23px 0 0 22px;">
<form method="post" action="" id="bnc-form" class="<?php if ( $wpmob_lite->locale ) echo 'locale-' . strtolower( $wpmob_lite->locale ); ?>">
	<div id="bnc" class="<?php echo $current_scheme; ?> <?php if ( WPMOB_LITE_BETA ) { echo 'beta'; } else { echo 'normal'; } ?> wrap">
		<div id="wpmob-admin-top" style="display:none;">
			<h2><?php echo WPMOB_PRODUCT_NAME . ' <span class="version">' . WPMOB_VERSION; ?></span></h2>
			<div id="wpmob-api-server-check"></div>
			<?php wpmob_save_reset_notice(); ?>
		</div>

		<div id="wpmob-admin-form">	
			<ul id="wpmob-top-menu">
			
				<?php do_action( 'wpmob_pre_menu' ); ?>
				
				<?php $pane = 1; ?>
				<?php foreach( $wpmob_lite->tabs as $name => $value ) { ?>
					<li><a id="pane-<?php echo $pane; ?>" class="pane-<?php echo wpmob_string_to_class( $name ); ?>" href="#"><?php echo $name; ?></a></li>
					<?php $pane++; ?>
				<?php } ?>
		
				<?php do_action( 'wpmob_post_menu' ); ?>
				
				<li>
					<div class="wpmob-ajax-results blue-text" id="ajax-loading" style="display:none"><?php _e( "Loading...", "wpmob-lite" ); ?></div>
					<div class="wpmob-ajax-results blue-text" id="ajax-saving" style="display:none"><?php _e( "Saving...", "wpmob-lite" ); ?></div>
					<div class="wpmob-ajax-results green-text" id="ajax-saved" style="display:none"><?php _e( "Done", "wpmob-lite" ); ?></div>
					<div class="wpmob-ajax-results red-text" id="ajax-fail" style="display:none"><?php _e( "Oops! Try saving again.", "wpmob-lite" ); ?></div>
					<br class="clearer" />
				</li>
			</ul>
			<div id="wpmob-tabbed-area"  class="round-6 box-shadow <?php if ( wpmob_get_bloginfo( 'support_licenses_remaining' ) == BNC_WPMOB_UNLIMITED ){ echo 'developer'; } if ( $settings->admin_client_mode_hide_tools ) { echo ' client-mode'; } ?>">
				<?php wpmob_show_tab_settings(); ?>
			</div>
			
			<br class="clearer" />
			
			<input type="hidden" name="wpmob-admin-tab" id="wpmob-admin-tab" value="" />
			<input type="hidden" name="wpmob-admin-menu" id="wpmob-admin-menu" value="" />
		</div>
		<input type="hidden" name="wpmob-admin-nonce" value="<?php echo wp_create_nonce( 'wpmob-post-nonce' ); ?>" />

		<p class="submit" id="bnc-submit">
			<input class="button-primary" type="submit" name="wpmob-submit" tabindex="1" value="<?php _e( "Save Changes", "wpmob-lite" ); ?>" />
		</p>
		
		<p class="submit" id="bnc-submit-reset">
			<input class="button" type="submit" name="wpmob-submit-reset" tabindex="2" value="<?php _e( "Reset Settings", "wpmob-lite" ); ?>" />
			<span id="saving-ajax">
				<?php _e( "Saving", "wpmob-lite" ); ?>&hellip; <img src="<?php echo WPMOB_URL . '/admin/images/ajax-loader.gif'; ?>" alt="ajax image" />
			</span>
		</p>
	
		<br class="clearer" />
		
		<ul id="link-menu">
			<li><?php echo sprintf( __( "'WPmob Lite' and 'WPmob Pro' are trademarks of %sJuicegraphic,Inc.%s", "wpmob-lite" ), '<a href="http://www.juicegraphic.com">', '</a>' ); ?></li>
		</ul>
		<div class="poof">&nbsp;</div>
		<div id="wpmob-tooltip" class="round-12">&nbsp;</div>	
		<div id="wpmob-tooltip-left" class="round-12">&nbsp;</div>	
		<div id="wpmob-tooltip-center" class="round-12">&nbsp;</div>	
	</div> <!-- wpmob-admin-area -->
</form>
</div>
</div>

