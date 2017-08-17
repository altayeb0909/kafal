( function( $ ) {
function scrollBanner() {
    var MQL = 992;
	$(document).scroll(function(){
        if ($(window).width() > MQL) {
		var scrollPos = $(this).scrollTop();
		$('#header-text').css({
			'top' : (scrollPos/3)+'px',
			'opacity' : 1-(scrollPos/510)
		});
		$('#masthead').css({
			'background-position' : 'center ' + (-scrollPos/2)+'px'
		});
    }
	});
}
scrollBanner();
})( jQuery );

( function( $ ) {
// Navigation Scripts to Show Header on Scroll-Up
jQuery(document).ready(function($) {
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.navbar-custom').height();
        $(window).on('scroll', {
                previousTop: 0
            },
            function() {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop) {
                    //if scrolling up...
                    if (currentTop > 0 && $('.navbar-custom').hasClass('is-fixed')) {
                        $('.navbar-custom').addClass('is-visible');
                    } else {
                        $('.navbar-custom').removeClass('is-visible is-fixed');
                    }
                } else if (currentTop > this.previousTop) {
                    //if scrolling down...
                    $('.navbar-custom').removeClass('is-visible');
                    if (currentTop > headerHeight && !$('.navbar-custom').hasClass('is-fixed')) $('.navbar-custom').addClass('is-fixed');
                }
                this.previousTop = currentTop;
            });
    }
});
})( jQuery );