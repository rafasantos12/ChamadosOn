<?php
include 'conexao.php';

session_start();

if(empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}


$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senha_usuario = mysqli_real_escape_string($conexao, $_POST['senha']);

//SELECT 'CAMPO" FORM "NOME TABELA" WHERE "NOME CAMPO QUE SERÁ COMPARADO"
$query = "SELECT * FROM tb_usuario WHERE login = '$login'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row <= 0) {
	$_SESSION['nao_autenticado'] = true;
	header("Location: index.php");
	
}else{

	while ($array = mysqli_fetch_array($result)) {
		
		$id_user		=	$array['id_user'];
		$status1		=	$array['status'];
		$login_usuario	=	$array['login'];
		$senha			=	$array['senha'];

		$senhadecodificada = sha1($senha_usuario);
			
		if ( $row > 0 AND $senhadecodificada == $senha AND $login_usuario == $login AND $status1 == 'ativo') {

			$_SESSION['login'] = $login;
			header("Location: menu.php");

		}else{

			$_SESSION['nao_autenticado'] = true;
			header("Location: index.php");
			exit();
		}
	}
}