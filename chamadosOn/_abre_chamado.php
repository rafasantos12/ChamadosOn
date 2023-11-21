<?php

include 'conexao.php';

//recebendo os valores do formulário
//$id_chamado			=	$_POST['id_chamado'];
$tipo_problema			=	$_POST['tipo_problema'];
$sala					=	$_POST['sala'];
$descricao				=	$_POST['descricao'];
//$status				=	$_POST['status'];
//$iditem				=	$_POST['iditem'];
$data_envio				=	$_POST['hoje'];
$nome_user				=	$_POST['nome_user'];
//$idtec				=	$_POST['idtec'];
//$iduser_adm			=	$_POST['useradm'];

//Armazena os dados em uma variável
$form = "INSERT INTO `tb_chamados`(`tipo_problema`, `descricao`, `sala`, `data_envio`, `iduser`) VALUES ('$tipo_problema', '$descricao', '$sala', '$data_envio', '$nome_user')";

//faz a conexao e insere os dados
$inserir =  mysqli_query($conexao, $form);

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container form-group" style="width: 550px; margin-top: 20px">
	<center>
		<h4>Seu chamado foi encaminhado com sucesso!!</h4>
		<div style="margin-top: 20px">
			<center>
				<a href="pagina_chamado.php" role="button" class="btn btn-sm btn-primary" position="center">OK</a>
			</center>
		</div>
	</center>
</div>