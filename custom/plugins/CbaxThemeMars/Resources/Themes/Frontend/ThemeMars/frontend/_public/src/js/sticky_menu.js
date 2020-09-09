;(function ($) {
	"use strict";

	// Zu einem Element scrollen (Übergabe des Selector)
	function scrollTo(element, duration) {
		duration = parseInt(duration);
		if (duration < 1) {
			duration = 400;
		}
		$('html, body').stop(false, false).animate({
			scrollTop: ($(element).offset().top)
		}, duration);
	}

	var $navigationMain = $('.navigation-main'),
		$navigationSticky = $('.navigation-sticky'),
		$dummySticky = $('.dummy-sticky'),
		durationStickySearch = $navigationSticky.attr("data-stickysearch-duration"),
		$menuButton = $navigationSticky.find('.entry--menu-bottom'),
		$backToTopButton = $('#backtotop');

	if ($navigationMain.length > 0) {
		var navigationOffsetTop = $navigationMain.offset().top ? $navigationMain.offset().top : 110,
			navigationHeight = $navigationMain.outerHeight(),
			stickyShow = $navigationSticky.attr("data-sticky-show"),
			stickyPhoneShow = $navigationSticky.attr("data-sticky-phone-show"),
			stickyTabletShow = $navigationSticky.attr("data-sticky-tablet-show");
	}

	$backToTopButton.on('click', function () {
		var durationBackToTop = $(this).attr("data-backtotop-duration");

		scrollTo('.page-wrap', durationBackToTop);
	});

	$menuButton.on('click', 'a', function (event) {
		event.preventDefault();

		if (!$navigationMain.hasClass('is--sticky')) {
			$navigationMain.css({
				'display': 'none',
				'position': 'fixed',
				'top': $navigationSticky.outerHeight(),
				'width': '100%',
				'z-index': 4444
			});

			$dummySticky.css({
				'height': navigationHeight
			});
			$dummySticky.show();

			$navigationMain.addClass('is--sticky');
		}

		$navigationMain.slideToggle(parseInt(durationStickySearch));
	});


	$(window).on("scroll", function () {
		var fromTop = $(window).scrollTop();

		if (fromTop > 110) {
			$backToTopButton.fadeIn();
		} else {
			$backToTopButton.fadeOut();
		}


		if (navigationOffsetTop > 0 && navigationHeight > 0 && stickyShow) {

			if (StateManager.isCurrentState(['xs', 's']) && !stickyPhoneShow) {
				return false;
			} else if (StateManager.isCurrentState(['m', 'l']) && !stickyTabletShow) {
				return false;
			}

			/** Suchleiste oder Suchleiste und Navigationsleiste */
			if (stickyShow === 'search' || stickyShow === 'search_and_menu' || stickyShow === 'search_and_menu_auto') {
				var addClasses = (stickyShow === 'search_and_menu') ? 'hasFocus bottom-menu' : 'hasFocus';

				if (fromTop > navigationOffsetTop) {
					if (!$navigationSticky.hasClass('hasFocus')) {

						$navigationSticky.css({
							'position': 'fixed',
							'top': '-' + navigationHeight + 'px',
							'width': '100%',
							'z-index': 4444
						});

						$navigationSticky.addClass(addClasses);
						$navigationSticky.show();

						$navigationSticky.animate({
							'top': '0px'
						}, parseInt(durationStickySearch), 'swing', function() {

							if (stickyShow === 'search_and_menu_auto' && !StateManager.isCurrentState(['xs', 's'])) {
								if (!$navigationMain.hasClass('is--sticky')) {
									$navigationMain.css({
										'display': 'none',
										'position': 'fixed',
										'top': $navigationSticky.outerHeight(),
										'width': '100%',
										'z-index': 4444
									});

									$dummySticky.css({
										'height': navigationHeight
									});
									$dummySticky.show();

									$navigationMain.addClass('is--sticky');
								}

								$navigationMain.slideToggle(parseInt(durationStickySearch));
							}
						});

					}
				} else {

					$navigationMain.css({
						'display': '',
						'position': '',
						'top': '',
						'width': '',
						'z-index': ''
					});

					$dummySticky.css({
						'height': 0
					});
					$dummySticky.hide();

					$navigationMain.removeClass('is--sticky');

					$navigationSticky.removeClass(addClasses);
					$navigationSticky.hide();
				}
			}

			/** Navigationsleiste */
			if (stickyShow === 'menu') {
				if (fromTop > navigationOffsetTop) {

					$navigationMain.css({
						'position': 'fixed',
						'top': '0',
						'width': '100%',
						'z-index': 4444
					});

					$dummySticky.css({
						'height': navigationHeight
					});
					$dummySticky.show();

					$navigationMain.addClass('is--sticky');
				} else {

					$navigationMain.css({
						'position': 'relative',
						'top': '',
						'width': '',
						'z-index': ''
					});

					$dummySticky.css({
						'height': 0
					});
					$dummySticky.hide();

					$navigationMain.removeClass('is--sticky');
				}
			}

		}

	});

})(jQuery);