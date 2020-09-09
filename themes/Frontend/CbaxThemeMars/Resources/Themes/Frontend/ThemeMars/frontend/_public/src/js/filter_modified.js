;(function ($) {
	"use strict";

	if ($('div').hasClass('cbax-aside')) {
		$('.action--filter-options').addClass('is--collapsed');
		$('.filter--container').addClass('is--open-filters');

		var $filterSidebar = $('.cbax-filter-sidebar'),
			filterPermanent = $filterSidebar.attr('data-filter-permanent-open'),
			filterCounter = $filterSidebar.attr('data-filter-panel-counter'),
			filterSubmit = $filterSidebar.attr('data-filter-auto-submit');

		if (filterPermanent) {
			$('.cbax-filter-sidebar .filter-panel').addClass('is--collapsed-permanent');
			$('.cbax-filter-sidebar .filter-panel--icon').hide();
		} else {
			$('.cbax-filter-sidebar .filter-panel').each(function (index) {
				if (index < filterCounter) {
					$(this).addClass('is--collapsed is--collapsed-permanent');
				}
				else if ($(this).find('input').is(':checked')) {
					$(this).addClass('is--collapsed');
				}
			});
		}

		if (filterSubmit) {
			var filterForm = '#filter',
				instantLoading = $(filterForm).data('instant-filter-result');

			$(filterForm + ' .filter-panel--content input').unbind('change');
			$(filterForm + ' .filter--btn-apply').hide();
			$(filterForm + ' input').bind('change', function () {
				if (!instantLoading) {
					$.loadingIndicator.open();
				}
				$(filterForm).submit();
			});

			$('.filter--active-container :not(.is--disabled) .filter--active').bind('click', function () {
				if (!instantLoading) {
					$.loadingIndicator.open();
				}
			});
		}
	}

})(jQuery);