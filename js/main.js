( function( $ ) {
function scrollBanner() {
	$(document).scroll(function(){
		var scrollPos = $(this).scrollTop();
		$('#header-text').css({
			'top' : (scrollPos/3)+'px',
			'opacity' : 1-(scrollPos/510)
		});
		$('#masthead').css({
			'background-position' : 'center ' + (-scrollPos/2)+'px'
		});
	});
}
scrollBanner();
})( jQuery );