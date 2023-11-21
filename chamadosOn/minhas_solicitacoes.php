<?php

include 'conexao.php';

session_start();

//ESTE IF É PARA IMPEDIR QUE A PAGINA PÓS-LOGIN SEJA ACESSADA DIRETAMENTE
if(!$_SESSION['login']) {
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de chamados</title>

	<!– Linkando fonte do Font Awesome –>
	<script src="https://kit.fontawesome.com/9f30e32661.js" crossorigin="anonymous"></script>

	<!– Linkando CSS bootstrap –>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!– Linkando fonte –>
	<link href="https://fonts.googleapis.com/css?family=Anton|Libre+Baskerville&display=swap" rel="stylesheet"> 

	<style type="text/css">
		#tamanhoContainer{
			width: 500px;
		}
		#formTitulo{
			margin-top: 0px;
			background-color: #ffc107;
			color: #ffffff;
			align-items: center;
			justify-content: center;
			border-radius: 0px;
			font-weight: bold;
			font-family: 'Libre Baskerville', serif;
			height: 100px;
			display: flex;
		}
		#buttonAbrir{
			font-family: 'Libre Baskerville', serif;
			margin-bottom: 40px;
			background-color: #80B3FF;
			border-radius: 5px;
			font-weight: bold;
			color: #ffffff;
		}
		.table tbody tr {
  border-bottom: 1px solid #dee2e6; /* Adiciona uma linha horizontal entre as linhas da tabela */
}
	</style>

</head>
<body>
	<div class="container">
		<h4 style="color: #008B00;"><?php echo $_SESSION['login'];?></h4>
		<a style="color: #007bff;" id="formLogin" href="logout.php">Sair</a>
	</div>
	<h1 id="formTitulo" style="background-color: #008B00;">Lista de Chamados</h1>
	<div class="container" style="margin-top: 40px">
		<div style="text-align: left;">
		 		<a href="menu.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		        <a href="pagina_chamado.php" role="button" class="btn float-right" style="border-radius: 1px; border-color: black; border-radius: 5px;">Novo Chamado</a>
		<br><br>
		<table class="table">
		  <thead style="background-color: #008B00;">
		    <tr>
		      <!--<th scope="col">ID</th>-->
		      <th scope="col">SOLICITAÇÃO</th>
		      <th scope="col">SALA</th>
		      <th scope="col">DESCRIÇÃO</th>
		      <th scope="col">DISPOSITIVO</th>
		      <th scope="col">ENVIO</th>
		      <th scope="col">STATUS</th>
		      <th scope="col">USUÁRIO</th>
		      <th scope="col">TÉCNICO</th>
		      <th scope="col">ADM</th>
		      <th scope="col"><center>AÇÃO</center></th>
		    </tr>
		  </thead>
		  <tbody>
		    
		    	<?php
		    		$login = $_SESSION['login'];

					$sql = "SELECT * FROM `tb_usuario` WHERE login = '$login'";
			    	$busca1 			= 	mysqli_query($conexao,$sql);
			    	$array1 			= 	mysqli_fetch_array($busca1);
			    	$nome_user 			=	$array1['nome_user'];


		    		$sql = "SELECT * FROM `tb_chamados` WHERE iduser = '$nome_user'";
		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca)) {
		    			$id 			=	$array['id_chamado'];
		    			$tipo_problema	=	$array['tipo_problema'];
		    			$sala 			=	$array['sala'];
		    			$descricao		=	$array['descricao'];
		   				$iditem 		=	$array['iditem'];
		   				$data_envio		=	$array['data_envio'];
		    			$status 		=	$array['status'];
		   				$iduser 		=	$array['iduser'];
		   				$idtec 			=	$array['idtec'];
		   				$iduser_adm		=	$array['iduser_adm'];

		    		?>
					<tr>
		      		<!--<td style="background-color: #F0F8FF;"><?php echo $id 					?></td>-->
		      		<td style="background-color: #F0F8FF;"><?php echo $tipo_problema 		?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $sala 	 			?></td>
		      		<td style="background-color: #F0F8FF; word-wrap: break-word; max-width: 200px;"><?php echo $descricao ?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $iditem 				?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $data_envio 			?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $status 				?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $iduser 				?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $idtec 				?></td>
		      		<td style="background-color: #F0F8FF;"><?php echo $iduser_adm			?></td>

		   			<?php if ($status == 'pendente') { ?>
		      		<td style="background-color: #F0F8FF;"><center>
		      			<a class="btn btn-primary btn-sm" href="editar_solicitacao_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a>

		      			<a class="btn btn-danger btn-sm" style="color:#fff" href="_deletar_solicitacao_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>

		      		</center></td>
		   				<?php } ?>

		   				<?php if ($status == 'atendido') { ?>
		      				<td style="background-color: #F0F8FF;"><center>
		      				</center></td>
		   				<?php } ?>

		      	<?php } ?>

		    </tr>
		  </tbody>
		</table>

	</div>

	<!– Linkando scripts bootstrap –>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>