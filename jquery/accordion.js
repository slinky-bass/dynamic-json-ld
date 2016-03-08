$(function() {
	$('.accordion_content').hide();

	$('.accordion_toggle a').click(function(e){
		if($(this).parent().hasClass('current')) {
			$(this).parent()
				.removeClass('current')
				.next('.accordion_content').stop(true, true).slideUp();
		} else {
			$(document).find('.current')
				.removeClass('current')
				.next('.accordion_content').stop(true, true).slideUp();
			$(this).parent()
				.addClass('current')
				.next('.accordion_content').stop(true, true).slideDown();
		}
		e.preventDefault();
	});
});
