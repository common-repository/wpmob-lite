function lastPostFunc(){var posturl=jQuery('a.load-more-link').attr('rel')+'#progress';jQuery('div#progress').show();jQuery('#content').append("<div class='ajax-page-target'></div>");jQuery.post(posturl,function(data){if(data!=""){jQuery("div.ajax-page-target").after(data)}jQuery('div#progress').hide()})};jQuery(document).ready(function(){jQuery('a.load-more-link').click(function(){lastPostFunc()});jQuery('#navigate').click(function(){if(!jQuery('#menu').is(':animated'))jQuery('#menu').slideToggle(300)});jQuery('#s').focus(function(){if(jQuery(this).val()=='search'){jQuery(this).val('')}});jQuery('#s').blur(function(){if(jQuery(this).val()==''){jQuery(this).val('search')}});jQuery('#comments .comment .date span').each(function(){if(jQuery(this).width()>90){var s=jQuery(this).text();do{jQuery(this).text(jQuery(this).text().slice(0,-1))}while(jQuery(this).width()>75);jQuery(this).attr('title',s).append('...')}});jQuery('#commentsubmit').click(function(){jQuery(this).parent().parent().submit()});jQuery('.button.center').each(function(){jQuery(this).css('width',jQuery(this).width()).css('float','none')})});