// Initialization Menu, Submenu and Haks for Safari
jQuery(document).ready(function () {
	
	jQuery('img.menu_class').click(function () {
		jQuery('ul.the_menu').slideToggle('medium');
	});
	
	// Submenu
	jQuery('#main_menu ul > li').hover(
		function () {
			jQuery(this).find('ul').stop().delay(300).slideDown(500, "easeOutCirc");
		},	
		function () {
			jQuery(this).find('ul').stop().delay(250).slideUp(500, "easeInQuad");
		}
	);
	
	// Header haks for Safari
	if( $.browser.safari ){
		jQuery('.news_and_blog header h2, .news_and_blog_open aside article header h5').css('font-weight', '400');
	}
	
});