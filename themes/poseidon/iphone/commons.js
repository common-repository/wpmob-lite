// -----------------------------------------------------------------------------

// Calculating relative time
function relativeTime(time) {
  var values = time.split(' ');
  time = values[1] + ' ' + values[2] + ', ' + values[5] + ' ' + values[3];
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var diff = parseInt((relative_to.getTime() - Date.parse(time)) / 1000) + (relative_to.getTimezoneOffset() * 60);
  if (diff < 60)
    return 'less than a minute ago';
  else if (diff < 120)
    return 'about a minute ago';
  else if (diff < (60*60))
    return (parseInt(diff / 60)).toString() + ' minutes ago';
  else if (diff < (120*60))
    return 'about an hour ago';
  else if (diff < (24*60*60))
    return 'about ' + (parseInt(diff / 3600)).toString() + ' hours ago';
  else if (diff < (48*60*60))
    return '1 day ago';
  else
    return (parseInt(diff / 86400)).toString() + ' days ago';
}

//------------------------------------------------------------------------------

// Twitter callback
/*function twitterCallback(tweets) {
  for (var i in tweets) {
    var screen_name = tweets[i].user.screen_name;
    var text = tweets[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
      return '<a href="'+url+'">'+url+'</a>';
    }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
      return reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'/">'+reply.substring(1)+'</a>';
    });
    jQuery('#twitter').append
    (
      '<div class="tweet">'+
        '<div class="date">'+
          '<a href="http://twitter.com/'+screen_name+'/statuses/'+tweets[i].id+'">'+
            relativeTime(tweets[i].created_at)+
          '</a>'+
        '</div>'+
        '<p>'+text+'</p>'+
      '</div>'
    );
  }
}*/

//------------------------------------------------------------------------------

// Flickr callback
/*function flickrCallback(photos_data) {
  if (photos_data['stat'] != 'ok') return false;
  for (var i in photos_data['photos']['photo']) {
    var photo = photos_data['photos']['photo'][i];
    var css_class = 'photo';
    if (i % 3 == 0) css_class += ' first';
    if (i <= 2) css_class += ' top';
    jQuery('#flickr').append(
      '<div class="'+css_class+'">'+
        '<a href="http://www.flickr.com/photos/'+photo['owner']+'/'+photo['id']+'" title="'+photo['title']+'">'+
          '<img src="http://farm'+photo['farm']+'.static.flickr.com/'+photo['server']+'/'+photo['id']+'_'+photo['secret']+'_s.jpg" alt="'+photo['title']+'" width="75" height="75" />'+
        '</a>'+
      '</div>'
    );
  }
  jQuery('#flickr').append('<div class="clear"></div>');
}*/

// -----------------------------------------------------------------------------
function lastPostFunc() 
{   
    jQuery('div#progress').show();
    jQuery( '#content' ).append( "<div class='ajax-page-target'></div>" );
    jQuery.post(jQuery('a.load-more-link').attr( 'rel' ), 
    function(data){
        if (data != "") {
            jQuery("div.ajax-page-target").after(data); 
        }
        jQuery('div#progress').hide();            
    });
};
jQuery(document).ready(function(){
/*    jQuery('a.load-more-link').click(function(){
        lastPostFunc();
    });*/
  // Binding Navigate button action
  jQuery('#navigate').click(function(){
    if ( ! jQuery('#menu').is(':animated'))
      jQuery('#menu').slideToggle(300);
  });
  
  // Configuring search edit
  jQuery('#s').focus(function(){
    if (jQuery(this).val() == 'search')
    {
      jQuery(this).val('');
    }
  });
  jQuery('#s').blur(function(){
    if (jQuery(this).val() == '')
    {
      jQuery(this).val('search');
    }
  });
  
  // Comments nickname length
  jQuery('#comments .comment .date span').each(function() {
    if (jQuery(this).width() > 90) {
      var s = jQuery(this).text();
      do {
        jQuery(this).text(jQuery(this).text().slice(0, -1));
      } while (jQuery(this).width() > 75);
      jQuery(this).attr('title', s).append('...');
    }
  });
  
  // Binding Submit Comment button action
  jQuery('#commentsubmit').click(function(){
    jQuery(this).parent().parent().submit();
  });
  
  // Centering .center class button
  jQuery('.button.center').each(function(){
    jQuery(this).css('width', jQuery(this).width()).css('float', 'none');
  });
  
});