<?php 

	include 'conexao.php';

	$nome 				= $_POST['nome_tecnico'];
	$email 				= $_POST['email_tecnico'];
	$nivel				= $_POST['nivel_tecnico'];
	$responsavel		= $_POST['nome_resp'];

	$form = "INSERT INTO `tb_tecnico`(`nome_tec`, `email`, `nivel`, `quem_cadastrou`) VALUES ('$nome','$email','$nivel', '$responsavel')";

	$inserir =  mysqli_query($conexao, $form);

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Técnico cadastrado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="cadastro_tecnico.php" role="button" class="btn btn-sm btn-warning" position="center">OK</a>
			</center>
		</div>
	</center>
</div>