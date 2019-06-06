<?php
	verificaPermissaoPagina(2); 
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>
	<form method="post" enctype="multipart/form-data">
		
		<?php
			if(isset($_POST['acao'])){			
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$cargo = $_POST['cargo'];
				$imagem = $_FILES['imagem'];
				if ($login == '') {
					Painel::alert('erro','Login não pode estar vazio!');
				}else if ($nome == '') {
					Painel::alert('erro','Nome não pode estar vazio!');
				}else if ($senha == '') {
					Painel::alert('erro','Senha não pode estar vazio!');
				}else if ($cargo == '') {
					Painel::alert('erro','Cargo não pode estar vazio!');
				}else if ($imagem == '') {
					Painel::alert('erro','Imagem não pode estar vazio!');
				}else{
					//podemos cadastrar!
					if ($cargo >= $_SESSION['cargo']) {
						Painel::alert('erro','Selecione um cargo mais baixo que o seu!');
					}else if (Painel::imagemValida($imagem) == false) {						
						Painel::alert('erro','Formato da imagem está invalido!');
					}else if (Usuario::userExists($login)){
						Painel::alert('erro','O login '.$login.' já existe!');
					}else{ 
						//Cadastrar no banco de dados
						$usuario = new Usuario();
						$imagem = Painel::uploadFile($imagem);
						$usuario->cadastrarUsuario($login, $senha, $imagem, $nome, $cargo);
						Painel::alert('sucesso','Cadastro do usuário '.$nome.' foi feito com sucesso!');
					}
				}
			}
			
		?>
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">
		</div><!--form-group-->
		<div class="form-group">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

		<div class="form-grup">
			<label>Cargo:</label>
			<select name="cargo">
				<?php foreach (Painel::$cargos as $key => $value) {
					if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
					
				} ?>
			</select>
		</div><!--form-grup-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div>