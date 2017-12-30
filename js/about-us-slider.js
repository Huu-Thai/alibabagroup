$(document).ready(function(){
	
	$(".about-us-slider").owlCarousel({
		items:1,
		nav:true,
		margin:0,
		smartSpeed: 500

	});
	$('.about-us-slider .owl-dots').hide();
	$('.about-us-slider .owl-nav').css('margin','0');
	$(".about-us-slider .owl-prev").addClass('btn-prev');
	$('.about-us-slider .owl-next').addClass('btn-next');
	$('.btn-prev, .btn-next').text('');

});