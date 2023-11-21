<?php 

	include 'conexao.php';
	include 'script/password.php';

	$nome 				= $_POST['nome_user'];
	$nivel 				= '1';
	$email 				= $_POST['email_user'];
	$login 				= $_POST['login_user'];
	$senha 				= $_POST['senha_user'];
	$status				= 'inativo';

	$form = "INSERT INTO `bd_chamado`.`tb_usuario` (`nome_user`, `login`, `categoria`, `email`, `senha`, `status`) VALUES ('$nome', '$login', '$nivel', '$email', sha1('$senha'), '$status')";

	$inserir =  mysqli_query($conexao, $form);

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Usuário cadastrado com sucesso!!<p>Aguarde o administrador aprovar sua solicitação</p></h4>
		<div style="margin-top: 20px">
			<center>
				<a href="cadastro_usuario_externo.php" role="button" class="btn btn-sm btn-warning" position="center">OK</a>
			</center>
		</div>
	</center>
</div>