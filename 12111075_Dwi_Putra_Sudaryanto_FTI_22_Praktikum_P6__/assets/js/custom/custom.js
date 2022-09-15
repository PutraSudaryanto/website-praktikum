/*custom.js
Adding custom javascript or jquery function
* Copyright (c) 2014, Ommu Platform. All rights reserved.
* version: 0.0.1
*/

/**
 * load content ground
 */
if(dialogGroundUrl != '') {
	$.ajax({
		type: 'get',
		url: dialogGroundUrl,
		//dataType: 'json',
		success: function(data) {
			var content = $('.wrapper', data).html();
			$('div.body .content .wrapper').html(content);
		},
        complete: function(xhr,status) {
        }
	});
}

//hide dialog
function dialogClosed() {
	$('body').attr('style', '');
	$('div.dialog').fadeOut().attr('id','').attr('name','');
	$('div.dialog .dialog-box .content').html('').attr('id', '');
}
//hide notifier
function notifierClosed() {
	if($('div[name="dialog-wrapper"]').html() == '') {
		$('body').attr('style', '');
	}
	$('div.notifier').fadeOut().attr('name','');
	$('div.notifier .dialog-box .content').html('').attr('id', '');
}

//dialog close action
function dialogActionClosed() {
	$('.dialog .dialog-box a.closed').click(function() {
		dialogClosed();
	});
	$('.notifier .dialog-box input#closed').click(function() {
		notifierClosed();
	});
}

$(document).ready(function() {

	dialogActionClosed();
	
});