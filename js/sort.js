(function($) {
	function sortStringAsc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return a2.localeCompare(b2);
	}

	function sortStringDesc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return b2.localeCompare(a2);
	}

	function sortIntAsc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return a2 - b2;
	}

	function sortIntDesc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return b2 - a2;
	}

	function sortDateAsc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return Date.parse(a2) - Date.parse(b2);
	}

	function sortDateDesc(a, b) {
		var a2 = $(a).find('.'+sortBy).text();
		var b2 = $(b).find('.'+sortBy).text();
		return Date.parse(b2) - Date.parse(a2);
	}

	var sortBy;
	var toggleSort;
	$.fn.superSort = function(parentSel, sortSel) {
		this.click(function() {
			sortBy = $(this).attr('class');
			var sortFunc = null;

			// Get opposite value of desc.
			var desc = ~$(this).data('desc');
			$(this).data('desc', desc);

			// Which function to use for sorting and desc or asc.
			if(sortBy === 'name' || 'client') sortFunc = (desc ? sortStringDesc : sortStringAsc);
			else if(sortBy === 'date' || sortBy === 'month') sortFunc = (desc ? sortDateDesc : sortDateAsc);
			else sortFunc = (desc ? sortIntDesc : sortIntAsc);

			// sort
			sortElements = $(this).parents(parentSel).find(sortSel);
			var sorted = sortElements.sort(sortFunc);
			console.log(sorted.get())
			// Reorder DOM elements
			var sortTo = sorted.parent();
			sorted.each(function(i, val) {
				sortTo.append(val)
			});
			$(this).parent()
				.parent()
				.find('.glyphicon')
				.remove();
			var upOrDown = desc ? 'down' : 'up';
			$(this).append(
				'<span class="glyphicon glyphicon-chevron-'+upOrDown+'"></span>'
			);
		});
	}
})(jQuery);

// Make sortable tables.
$(function() {
    $('.table-head:first h4').superSort('.first-row', '.data');
    $('.ytd-head h4').superSort('.second-row', '.data-ytd');
    $('.client-head h4').superSort('.second-row', '.data-client');
    $('.third-row .table-head h4').superSort('.third-row', '.client-third');
});