/* WPmob Basic Client-side Ajax Routines */

function WPmobAjax( actionName, actionParams, callback ) {	
	var ajaxData = {
		action: "wpmob_client_ajax",
		wpmob_action: actionName,
		wpmob_nonce: WPmob.security_nonce
	};
	
	for ( name in actionParams ) { ajaxData[name] = actionParams[name]; }

	jQuery.post( WPmob.ajaxurl, ajaxData, function( result ) {
		callback( result );	
	});	
}