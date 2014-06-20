$(function() {
	$('.second-row, .third-row').hide();
	// toggle animation when clicking YTD values.
	$(".sort p.ytd").click(function() {
		$(this).parent()
			.parent()
			.parent()
			.find('.second-row')
			.slideToggle(300);
	});
	$('.second-row .detail-prod').click(function() {
		$(this).parent()
			.next()
			.slideToggle(300);
	})
});