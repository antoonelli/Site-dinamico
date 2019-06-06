<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viweport" content="width=device-width, initial-scale=1.0"><!--responsivo-->
	<link href="<?php echo INCLUDE_PATH_PAINEL;?>css/style.css" rel="stylesheet">
</head>
<body>
	<div class="menu">
		<div class="manu-wraper">
		<div class="box-usuario">
			<?php
				if($_SESSION['img'] == ''){
				?>
				<div class="avatar-usuario">
					<i class="fa fa-user"></i>
				</div><!--avatar-usuario-->
				<?php }else{?>
				<div class="imagem-usuario">
					<img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $_SESSION['img'];?>">
			 	</div><!--avatar-usuario-->
			<?php }?>
			<div class="nome-usuario">
				<p><?php echo $_SESSION['nome']; ?></p>
				<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
			</div><!--nome-usuario-->
		</div><!--box usuario-->
		<div class="itens-menu">
			<h2>Cadastro</h2>
			<a <?php selecionadoMenu('cadastrar-depoimento'); ?><?php verificaPermissaoMenu(2) ?>href="<?php echo INCLUDE_PATH_PAINEL;?>">Cadastros Depoimentos</a>
			<a <?php selecionadoMenu('cadastrar-servico'); ?> href="">Cadastros Serviços</a>
			<a <?php selecionadoMenu('cadastrar-slide'); ?> href="">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a <?php selecionadoMenu('listar-depoimento'); ?> href="">Listar Depoimentos</a>
			<a <?php selecionadoMenu('listar-servico'); ?> href="">Listar Serviços</a>
			<a <?php selecionadoMenu('listar-slide'); ?> href="">Listar Slides</a>
			<h2>Cadastro</h2>
			<a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="">Cadastrar Depoimentos</a>
			<a <?php selecionadoMenu('cadastrar-servico'); ?> href="">Cadastrar Serviços</a>
			<h2>ADM do painel</h2>
			<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>editar-usuario">Editar Usuário</a>
			<a <?php selecionadoMenu('listar-usuario'); ?> href="">Listar Serviços</a>
			<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2) ?> href="<?php echo INCLUDE_PATH_PAINEL;?>adicionar-usuario">Adicionar Usuários</a>
			<h2>Configuração Geral</h2>
			<a <?php selecionadoMenu('editar'); ?> href="">Editar</a>
		</div>
		</div><!--manu-wraper-->
	</div><!--menu-->

	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>

		<div class="loggout">
			<a href="<?php echo INCLUDE_PATH_PAINEL?>home"><i class="fa fa-home"> Página Inicial</i></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fa fa-window-close"></i></a>
		</div>
		<div class="clear"></div>
		</div><!--cente-->
	</header>
	<div class="content">
			<?php Painel::carregarPagina();?>
	</div><!--box-content-->

	<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL;?>js/main.js"></script>
</body>
</html>