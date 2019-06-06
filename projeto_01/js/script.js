$(function(){
	//aqqui vai todo nosso código de javaScript
	$('nav.mobile').click(function(){
		//O que vai acontecer quando clicarmos na nav.mobile
		var listaMenu = $('nav.mobile ul');
		/*if(listaMenu.is(':hidden') == true)
			listaMenu.fadeIn();
		else
			listaMenu.fadeOut();*/
		//listaMenu.slideToggle();
		if(listaMenu.is(':hidden') == true)
			listaMenu.show();
		else
			listaMenu.hide();
	});

	if($('target').length > 0) {
	//o elemento existe,postanto precisamos dar o scroll em algum elemento
	var elemento = '#'+$('target').attr('target');
	var divScroll = $(elemento).offset().top;
	$('html,body').animate({scrollTop:divScroll},2000);
	}
})
