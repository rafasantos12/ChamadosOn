<?php 

	include 'conexao.php';

	$item				= $_POST['tipo_item'];
	$descricao			= $_POST['descricao'];
	$nome				= $_POST['nome_user'];

	$form = "INSERT INTO `tb_item`(`tipo_item`, `descricao_item`, `quem_cadastrou` ) VALUES ('$item','$descricao', '$nome')";

	$inserir =  mysqli_query($conexao, $form);

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Cadastro realizado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="cadastro_sala_disp.php" role="button" class="btn btn-sm btn-warning" position="center">OK</a>
			</center>
		</div>
	</center>
</div>