<?php 
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		};
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/projeto_01/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL', __DIR__.'/painel');
	//conectar com bacon de dados
	define('HOST', 'localhost');
	define('USER','root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');

	//Constantes para o painel de controle
	define('NOME_EMPRESA', 'Alpha Sistem');

	//variaveis painel



	//Funções
	function pegaCargo($cargo){
		$arr = [
			'0'=> 'Normal',
			'1'=> 'Sub Administrador',
			'2'=> 'Administrador'
		];
		return $arr[$cargo];
	}

	function selecionadoMenu($par){
		$url = explode('/', @$_GET['url'])[0];
		if ($url == $par) {
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{ 
			echo 'style="display:none;"';
		}
	}
	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{ 
			include('painel/pages/permissao-negada.php');
			die();
		}
	}
 ?>