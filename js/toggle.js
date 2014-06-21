$(function() {
	$('.third-row, .total-second, .data-ytd, .data-client').hide();
	// toggle animation when clicking YTD values.
	$(".data p.ytd").click(function() {
		$(this).parents('.data')
			.find('.data-ytd')
			.slideToggle(300);

		// var otherTable = $(this).parents('.data').find('.data-client');
		// if(otherTable.is(':hidden')) {
		// 	otherTable.slideToggle(300);
		// }
	});
	// Toggle clients
	$(".data p.name").click(function() {
		$(this).parents('.data')
			.find('.data-client')
			.slideToggle(300);

		// var otherTable = $(this).parents('.data').find('.data-ytd');
		// if(otherTable.is(':hidden')) {
		// 	otherTable.slideToggle(300);
		// }
	});
	$('.second-row .ytd-prod').click(function() {
		$(this).parent()
			.next()
			.slideToggle(300);
	});
});