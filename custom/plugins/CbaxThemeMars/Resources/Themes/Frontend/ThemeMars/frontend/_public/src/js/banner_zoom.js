;(function ($) {
	'use strict';

	$.subscribe('plugin/swEmotionLoader/onLoadEmotionFinished', function () {
		var zoomBanner = $('.emotion--banner.banner-zoom');

		zoomBanner.each(function () {
			$(this).find('img').css('transition', 'all ' + $(this).data('duration'));
		});

		zoomBanner.hover(
			function () {
				var zoom = $(this).data('zoom');

				if (zoom) {
					$(this).find('img').css('transform', 'scale(' + zoom + ')');
				}
			},
			function () {
				$(this).find('img').css('transform', '');
			}
		)
	});

})(jQuery);