$(function(){
	var open = true;
	var windowSize = $(window)[0].innerWidth;

	if (windowSize <= 768) {
		$('.menu').css('width','0').css('padding','0');
		open = false;
	}

	$('.menu-btn').click(function(){
		if (open) {
			//menu abertp
			$('.menu').animate({'width':0,'padding':0},function(){
				open = false;
			});
			$('.content,header').css('width','100%');
			$('.content,header').animate({'left':0},function(){
				open = false;
			});
		}else{
			//menu fechado
			$('.menu').animate({'width':'200px','padding':0},function(){
				open = true;
			});
			$('.content,header').css('width','calc(80% - 200px);');
			$('.content,header').animate({'left':'200px'},function(){
				open = true;
			});

		}
	})
})