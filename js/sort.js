function sortStringAsc(a, b) {
	var a2 = $(a).find('.'+valToSort).text();
	var b2 = $(b).find('.'+valToSort).text();
	return a2.localeCompare(b2);
}

function sortStringDesc(a, b) {
	var a2 = $(a).find('.'+valToSort).text();
	var b2 = $(b).find('.'+valToSort).text();
	return b2.localeCompare(a2);
}

function sortIntAsc(a, b) {
	var a2 = $(a).find('.'+valToSort).text();
	var b2 = $(b).find('.'+valToSort).text();
	return a2 - b2;
}

function sortIntDesc(a, b) {
	var a2 = $(a).find('.'+valToSort).text();
	var b2 = $(b).find('.'+valToSort).text();
	return b2 - a2;
}

var valToSort;
$(function() {
	///////////
	// Sort //
	///////////
	var toggleSort;
	$(".table-head h4").click(function() {
		var sortBy = $(this).attr('class');
		var sortFunc = null;
		if(sortBy === 'name') sortFunc = (toggleSort ? sortStringAsc : sortStringDesc);
		else sortFunc = (toggleSort ? sortIntAsc : sortIntDesc);
		valToSort = sortBy;
		var valSorted = $('.sort')
			.sort(sortFunc)
			
		$('.sort').each(function(i, item) {
				console.log(valSorted[i])
				$(item).html(valSorted[i]);
			})
			// .get();
		toggleSort = !toggleSort;
	});
})