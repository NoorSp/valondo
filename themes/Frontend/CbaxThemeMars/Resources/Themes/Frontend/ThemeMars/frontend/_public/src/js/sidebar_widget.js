;(function ($) {
	"use strict";

	var $widget = $('.cbax-sidebar-widget'),
		$button = $widget.find('.sidebar-widget-button');

	$button.on('click touchstart', function () {
		$widget.toggleClass('expanded');
	});

	$('body').on('click touchstart', function (event) {
		var target = event.target;

		if ($widget.hasClass('expanded')) {
			if (target === $widget || $.contains($widget[0], target)) {
				return;
			}
			$widget.removeClass('expanded');
		}
	});
})(jQuery);