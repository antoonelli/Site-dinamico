<?php 

	class Painel{
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}
		public static function loggout(){
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}
		public static function carregarPagina(){
			if(isset($_GET['url'])){ 
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');	
				}else{
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}

		public static function listarUsuariosOnline(){
			self::limparUsuariosOnline();
			$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}
		public static function limparUsuariosOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = Mysql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 5 MINUTE");
		}
		public static function pegarVisitasTotais(){ 
			$pegarVisitasTotais = Mysql::conectar()->prepare("SELECT * FROM `td_admin.visitas`");
			$pegarVisitasTotais->execute();
			return $pegarVisitasTotais->rowCount();
		}
		public static function pegarVisitasHoje(){ 
			$pegarVisitasHoje = Mysql::conectar()->prepare("SELECT * FROM `td_admin.visitas` WHERE dia = ?");
			$pegarVisitasHoje->execute(array(date('Y-m-d')));
			return $pegarVisitasHoje->rowCount();
		}

		public static function alert($tipo, $mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="box-alert sucesso">'.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro">'.$mensagem.'</div>';
			}
		}

		public static function imagemValida($imagem){
			if( $imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' 	|| $imagem['type'] == 'image/png'){

				$tamanho = intval($imagem['size'] /1024);
				if($tamanho < 300){
					return true;
				}else{
					return false;
				}

				return true;
			}else{
				return false;
			}
		}

		public static function uploadFile($file){
			$formatoArquivo = explode('.', $file['name']);
			$imagemNome =uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

			
			if (move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$imagemNome)) {
				return $imagemNome;
			}else{
				return false;
			}
		}
		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}

		public static $cargos = ['0'=> 'Normal','1'=> 'Sub Administrador','2'=> 'Administrador'];
		

	}
?> 

