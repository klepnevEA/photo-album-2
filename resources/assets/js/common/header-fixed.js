'use strict';
function headerFixed(){
	
	jQuery(window).scroll(function(){
		headerFixedInner();
	})

	jQuery(window).on('load', function(){
		headerFixedInner();		
	})
	
	function headerFixedInner(){

		var wScroll = jQuery(window).scrollTop(),
			headerBar = jQuery('.header__bar'),
			stickyStart = headerBar.offset().top,
			barStatic = jQuery('.header__bar_user-wrapper'),
			barStaticPos = barStatic.offset().top, 
			bar = jQuery('.header__bar_fixed');
		
		if ( wScroll > stickyStart ) {

			bar.fadeIn(300);

			headerBar.css({
				'position': 'fixed',
				'top': '0',
				'left': '0',
				'z-index': '5'
			});
		} 
		if ( wScroll <= barStaticPos ) {
			
			bar.fadeOut(50);
			headerBar.css({
				'display': 'flex',
				'position': 'static'
			});
		}
	}
}

module.exports = headerFixed;