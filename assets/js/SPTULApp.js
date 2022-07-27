var SPTULApp = {
	init:function($){
		var self = this;
		var lang = this.getCookie( 'SPTULApp_lang' );
		var lang_is_redirect = this.getCookie( 'SPTULApp_is_redirect' );
		var current_lang = jQuery('.sptul__current_lang').data('current-lang');
		var popup = jQuery('.sptul');
		var cookie_expires = 2;

		if ( !lang && sptul_app.ukraine_code != current_lang ) {
			popup.addClass('show');
		}else if ( lang != current_lang && !lang_is_redirect && sptul_app.ukraine_code != current_lang ) {
			self.setCookie('SPTULApp_is_redirect', true, cookie_expires);
			redirect_url = jQuery('.sptul__list__item__link[data-lang-slug="' + lang + '"]').attr('href');
			window.location.href = redirect_url;
		}

		jQuery('.sptul__list__item__link').on('click', function(){
			var lang = jQuery(this).data('lang-slug');
			self.setCookie('SPTULApp_lang', lang, cookie_expires);
			self.setCookie('SPTULApp_is_redirect', true, cookie_expires);
		});
	},

	setCookie:function(name, value, days){
		var expires = "";
		if ( days ) {
			var date = new Date();
			date.setTime(date.getTime() + (days*24*60*60*1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	},

	getCookie:function(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
		return null;
	},
};

jQuery(function(){
	SPTULApp.init();
});
