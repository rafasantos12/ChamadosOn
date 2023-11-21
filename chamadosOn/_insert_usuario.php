<?php 

	include 'conexao.php';
	include 'script/password.php';

	$nome_user			= $_POST['nome_user'];
	$nivel 				= $_POST['nivel_user'];
	$email 				= $_POST['email_user'];
	$login 				= $_POST['login_user'];
	$senha 				= $_POST['senha_user'];
	$status				= 'ativo';
	$responsavel		= $_POST['nome_resp'];

	$form = "INSERT INTO `bd_chamado`.`tb_usuario` (`nome_user`, `login`, `categoria`, `email`, `senha`, `status`, `quem_cadastrou`) VALUES ('$nome_user', '$login', '$nivel', '$email', sha1('$senha'), 'ativo', '$responsavel')";

	$inserir =  mysqli_query($conexao, $form);

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Usuário cadastrado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="cadastro_usuario.php" role="button" class="btn btn-sm btn-warning" position="center">OK</a>
			</center>
		</div>
	</center>
</div>