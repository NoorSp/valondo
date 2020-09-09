;(function($) {
	"use strict";
	
	$('.breadcrumb--entry').hover(
		function ()
		{
			var nav_button = $(this);
			var delay = $('.subBreadcrumb').attr("data-breadcrumb-duration");

			$(nav_button).addClass("hasFocus");
			$('.breadcrumb--entry a').removeAttr("title");
				
			window.setTimeout(function()
			{
				if ($(nav_button).hasClass("hasFocus"))
				{
					$(nav_button).children('.subBreadcrumb').fadeIn('fast');
				}
			}, delay);
			return false;
		},
		function ()
		{
			var nav_button = $(this);
			$(nav_button).removeClass("hasFocus");
			$('.subBreadcrumb').fadeOut('fast');
			return false;	
		}
	);

})(jQuery);