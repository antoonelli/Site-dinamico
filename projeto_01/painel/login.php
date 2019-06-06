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
	<div class="box-login">
		<?php 
			if(isset($_POST['acao'])){
				$user     = $_POST['user'];
				$password = $_POST['password'];
				$sql      = MySql::conectar()->prepare("SELECT * FROM `tb_adminusuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					//logou com sucesso
					$_SESSION['login']    = true;
					$_SESSION['user']     = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo']    = $info['cargo'];
					$_SESSION['nome']     = $info['nome'];
					$_SESSION['img']      = $info['img'];
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//falhou
					echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
				}
			}
		?>
		<form method="post">
			<h2>Efetue o login</h2>
			<input type="text" name="user" placeholder="Login..." required/>
			<input type="password" name="password" placeholder="Senha..." required/>
			<input type="submit" name="acao" value="Logar!">
		</form>
	</div><!--box-login-->
</body>
</html>