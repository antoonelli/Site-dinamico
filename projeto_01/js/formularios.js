$(function(){
	$('body').on('submit','form', function(){
		var form = $(this);
		$.ajax({
			beforeSend:function(){
				$('.overlay-loading').fadeIn();//EFEITO DE CARREGAMENTO DE PÁGINA
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				$('.overlay-loading').fadeOut();
				setTimeout(function(){
					$('.sucesso').fadeOut();//MENSAGEM CONFIRMANDO O ENVIO DO EMAIL
				},3000)
			}else{
				$('.overlay-loading').fadeOut();
				setTimeout(function(){
					$('.erro-email').fadeOut();//MENSAGEM CONFIRMANDO O QUE NAO FOI ENVIADO O EMAIL
				},3000)
			}
		});
		return false;
	})
})