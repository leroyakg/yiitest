$(function() {
	$('.third-row, .total-second, .data-ytd, .data-client, .ytd-head, .client-head').hide();
	// toggle animation when clicking YTD values.
	$(".data p.ytd").click(function() {
		$(this).parents('.data')
			.find('.data-ytd, .ytd-head')
			.slideToggle(300);

		var otherTable = $(this).parents('.data').find('.data-client, .client-head');
		if(otherTable.is(':visible')) {
			otherTable.slideToggle(300);
		}
		var totalTable = $(this).parents('.data').find('.total-second');
		console.log(otherTable.is(':hidden'))
		if(otherTable.is(':hidden')) {
			totalTable.slideToggle(300)
		}
	});
	// Toggle clients
	$(".data p.name").click(function() {
		$(this).parents('.data')
			.find('.data-client, .client-head')
			.slideToggle(300);

		var otherTable = $(this).parents('.data').find('.data-ytd, .ytd-head');
		if(otherTable.is(':visible')) {
			otherTable.slideToggle(300);
		}
		var totalTable = $(this).parents('.data').find('.total-second');
		console.log(otherTable.is(':hidden'))
		if(otherTable.is(':hidden')) {
			totalTable.slideToggle(300)
		}
	});
	$('.second-row .ytd-prod, .second-row .client-prod').click(function() {
		$(this).parent()
			.next()
			.slideToggle(300);
	});
});