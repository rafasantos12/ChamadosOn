<?php

	include 'conexao.php';

	$id = $_POST['id'];

	//$id 			=	$_POST['id_user'];
	$nome 			=	$_POST['nome_user'];
	$login 			= 	$_POST['login_user'];
	$email 			=	$_POST['email'];
	$senha 	 		=	$_POST['senha'];
	$nivel 	 		=	$_POST['nivel'];
	$status 		=	$_POST['status'];

	$sql = "UPDATE `bd_chamado`.`tb_usuario` SET `nome_user` = '$nome', `login` = '$login', `email` = '$email', `senha` = ('$senha'), `categoria` = '$nivel', `status` = '$status' WHERE (`id_user` = '$id')";

		$atualizar = mysqli_query($conexao,$sql);

?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Usuário foi alterado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="listar_usuario.php" role="button" class="btn btn-warning btn-sm" position="center">OK</a>
			</center>
		</div>
	</center>
</div>