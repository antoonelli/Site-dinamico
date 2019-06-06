<?php include('config.php')  ?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
	<meta name="viweport" content="width=device-width, initial-scale=1.0"><!--responsivo-->
	<meta name="description" content="descrica do site">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image-x/png" href="images/icone.ico"/>
</head>
<body>
	<base base="<?php echo INCLUDE_PATH; ?>" />
	<?php 
		if (isset($_GET['url'])) {//manimulando url
			$url = $_GET['url'];	
		}else{
			$url = 'home';
		}
		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos"/>';
				break;
			case 'servicos':
				echo '<target target="servicos"/>';
				break;	
		}
	?>
	<div class="sucesso">Formulário enviado com sucesso!</div>
	<div class="erro-email">Formulário não pode ser enviado!</div>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH;?>images/ajax-loader.gif">
	</div>
	<header>
		<div class="center">
			<div class="logo left"><p>Alpha Sistem</p></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>

			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
		</div><!--center-->
	</header>

	<?php	
		if (file_exists('pages/'.$url.'.php')) {
			include('pages/'.$url.'.php');
		}else{
			if ($url != 'depoimentos' && $url != 'servicos') {			
				$pagina404 = true;
				include('pages/404.php');			
			}else{
				include('pages/home.php');
			}
		}
	?>


	<footer <?php if (isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/maquina.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
</body>
</html>