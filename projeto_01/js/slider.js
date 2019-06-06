$( function(){
	
	var curSlide = 0;

	var maxSlide = $('.banner-slider').length -1;

	var delay = 10;

	initSlide();

	changeSlide();

	function initSlide(){
		$('.banner-slider').hide();
		$('.banner-slider').eq(0).show();
	}

	function changeSlide(){
		setInterval(function(){
			$('.banner-slider').eq(curSlide).fadeOut(2000);
			curSlide++;
			if (curSlide > maxSlide)
			curSlide = 0; 
			$('.banner-slider').eq(curSlide).fadeIn(2000);
		},delay * 1000);
	}
})