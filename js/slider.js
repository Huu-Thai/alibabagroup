$(document).ready(function(){
	var owl = $(".slider");
	owl.owlCarousel({
		items:1,
		loop:true,
		nav:true,
		margin:0,
		autoplay: 200,
		smartSpeed: 500
		
	});
	


	// Fired before current slide change
	owl.on('change.owl.carousel', function(event) {
		// var $currentItem = $('.owl-item', owl).eq(event.item.index);
		// var $elemsToanim = $currentItem.find(".active");
		// setAnimation ($elemsToanim, 'out');
		
		// $('.slider .owl-item .slider-text').removeClass('active-text');
		// $('.slider .active .slider-text').addClass('active-text');

	});
	
	$('.slider .owl-dots').hide();
	$('.slider .owl-nav').css('margin','0');
	$('.slider .owl-next, .slider .owl-prev').css('background','none');
	$(".slider .owl-prev").addClass('btn-prev');
	$('.slider .owl-next').addClass('btn-next');
	$('.btn-prev, .btn-next').text('');
});