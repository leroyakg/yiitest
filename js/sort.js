(function() {
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

	var sortBy;
	$(function() {
		var toggleSort;
		$(".table-head h4").click(function() {
			sortBy = $(this).attr('class');
			var sortFunc = null;
			// Get opposite value of desc.
			var desc = ~$(this).data('desc');
			$(this).data('desc', desc);
			// Which function to use for sorting and desc or asc.
			if(sortBy === 'name') sortFunc = (desc ? sortStringDesc : sortStringAsc);
			else sortFunc = (desc ? sortIntDesc : sortIntAsc);
			// sort
			var sorted = $('.data').sort(sortFunc)
			// Reorder DOM elements
			sorted.each(function(i, val) {
				$('.main').append($(val));
			});
			$('.table-head h4 .glyphicon').remove();
			var upOrDown = desc ? 'down' : 'up';
			$(this).append(
				'<span class="glyphicon glyphicon-chevron-'+upOrDown+'"></span>'
			);
		});
	});
})();