<?php

include 'conexao.php';

session_start();

//ESTE IF É PARA IMPEDIR QUE A PAGINA PÓS-LOGIN SEJA ACESSADA DIRETAMENTE
if(!$_SESSION['login']) {
		header('Location: index.php');
		exit();
	}

	$login = $_SESSION['login'];

		$sql = "SELECT * FROM `tb_usuario` WHERE login = '$login'";
    	$busca 				= 	mysqli_query($conexao,$sql);
    	$array 				= 	mysqli_fetch_array($busca);
    	$nome_user 			=	$array['nome_user'];
    	$id_user			=	$array['id_user'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Cadastro de salas e dispositivos</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<style type="text/css">
		#tamanhoContainer{
			width: 500px;
		}
		#formTitulo{
			margin-top: 0px;
			background-color: #008B00;
			color: #ffffff;
			align-items: center;
			justify-content: center;
			border-radius: 0px;
			font-weight: bold;
			font-family: 'Libre Baskerville', serif;
			height: 100px;
			display: flex;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<h4><?php echo $_SESSION['login'];?></h4>
		<a style="color: black;" id="formLogin" href="logout.php">Sair</a>
	</div>
	<h1 id="formTitulo">Cadastrar Salas e Dispositivos</h1>
	
	<div class="container" style="margin-top: 20px">
		<div style="text-align: left;">
		<a href="menu.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		 		</div>
			
		 	<center>
				<h5>Padrão de Preenchimento</h5><br>
				<h6>Para sala/laboratório/auditório/ginásio:<br>
					Número da sala + o bloco separado por - .<br>
					Exemplo: 1 - Bloco A.<br>
					<br>
					Para dispositivos:<br>
					Nome do dispositivo + especificações relevantes separado por - .<br>
					Exemplo: Projetor - modelo.
				</h6>
			</center>
		<form action="_insert_sala_disp.php" method="post">
			<div class="form-group">
				<label style="margin-top: 20px">Tipo do cadastro</label>
					<select  class="form-control" name="tipo_item" required>
					        <option value="Setor ">Setor</option>
							<option value="Sala">Sala</option>
							<option value="Laboratorio">Laboratorio</option>
							<option value="Auditorio">Auditorio</option>
							<option value="Ginasio">Ginasio</option>
							<option value="Dispositivo">Dipositivo</option>
							
					</select>
			</div>
			<div class="form-group">
				<label>Descrição</label>
				<textarea type="text" name="descricao" rows="4" class="form-control"></textarea>
				<small>não utilize acento nas palavras</small>
			</div>
			<div style="text-align: right;">
		 		<button type="submit" class="btn">Cadastrar</button>
		 	</div>
			<input type="text" name="nome_user" readonly="" style="display: none;" value="<?php echo $nome_user ?>">
		</form>
		
	</div>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>	