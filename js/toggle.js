$(function() {
	$('.second-row, .third-row, .total-second').hide();
	// toggle animation when clicking YTD values.
	$(".data p.ytd").click(function() {
		$(this).parent()
			.parent()
			.parent()
			.find('.second-row, .total-second')
			.slideToggle(300);
	});
	$('.second-row .ytd-prod').click(function() {
		$(this).parent()
			.next()
			.slideToggle(300);
	})
});