$(document).ready(function(){
	var width = $(window).width();
	if(width > 768){
		// scrollMouse('.slider-text', 'effect-slider-text');
		$(window).scroll(function(){
			
		});
		
	}
	function scrollMouse(parentClass, addClass){
		$(parentClass).each(function(){
			// $(this).addClass('hidden');
			var classHeight = $(this).height();
			var spaceTop = $(this).offset().top;

			var documentHeight = $(document).height();

			var windowHeight = $(window).height();
			var scrollHeight = $(window).scrollTop();

			var spaceBottom = documentHeight - classHeight - spaceTop;
			var scrollBottom = documentHeight + windowHeight - scrollHeight;

			if((spaceBottom < scrollBottom) && (spaceTop < (windowHeight + scrollHeight))){

				$(parentClass).addClass(addClass);
			}else{

				$(parentClass).removeClass(addClass);
			}

		});
	}
});