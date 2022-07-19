var PSTULApp = {
	init:function($){
		// var show_popup = this.getCookie( 'PSTULApp_show_popup' );
		// if ( !show_popup ) {
		// 	this.popup();
		// }

		// this.popup();
	},

	popup:function(){
		// jQuery.get(pstul.root_url+'templates/popup.php', function(template) {
		// 	jQuery('body').after(template);
		// });
	},

	setCookie:function(key, value, expiry){
		var expires = new Date();
		expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
		document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
	},

	getCookie:function(key) {
		var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
		return keyValue ? keyValue[2] : null;
	},
};

jQuery(function(){
	PSTULApp.init();
});
