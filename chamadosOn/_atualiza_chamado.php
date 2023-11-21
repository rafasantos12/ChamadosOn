<?php

include 'conexao.php';

$id = $_POST['id'];

//$id_chamado				=	$_POST['id_chamado'];
//$tipo_problema			=	$_POST['tipo_problema'];
//$descricao				=	$_POST['descricao'];
$status						=	$_POST['status'];
$iditem						=	$_POST['disp'];
//$data_envio				=	$_POST['data_envio'];
//$nome_user				=	$_POST['iduser'];
$idtec						=	$_POST['tecnico'];
$iduser_adm					=	$_POST['iduser_adm'];

$sql = "UPDATE `tb_chamados` SET `status` = '$status', `idtec` = '$idtec', `iduser_adm` = '$iduser_adm' WHERE `tb_chamados`.`id_chamado` = '$id'";

	$atualizar = mysqli_query($conexao,$sql);

?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Seu chamado foi alterado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="listar_chamado.php" role="button" class="btn btn-warning btn-sm" position="center">OK</a>
			</center>
		</div>
	</center>
</div>