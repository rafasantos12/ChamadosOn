<?php 

	include 'conexao.php';

	$id = $_GET['id'];

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
	<meta charset="utf-8">
	<title>Alteração de Chamado</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Anton|Libre+Baskerville&display=swap" rel="stylesheet"> <!– Linkando fonte –>

	<!– tamanho da página do formulário –>
	<style type="text/css">
		#tamanhoForm{
			width: 800px;
		}
	</style>

	<!- tamanho de cada conteiner ->
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
		
	</style>
</head>
<body>
	<div class="container">
		<h4 style="color: #007bff;"><?php echo $_SESSION['login'];?></h4>
		<a style="color: #007bff;" id="formLogin" href="logout.php">Sair</a>
	</div>
	<h1 style="background-color: #007bff;" id="formTitulo" >Formulário para alterar chamado</h1>
	<div class="container">
		<div style="text-align: left;">
		 		<a href="minhas_solicitacoes.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		 	</div>
		<form action="_atualiza_chamado_usuario.php" method="POST">				

			<?php 

				$sql1 = "SELECT * FROM `tb_usuario`";
		    	$busca1 			= 	mysqli_query($conexao,$sql1);
		    	$array1 			= 	mysqli_fetch_array($busca1);
		    	$nome_user 			=	$array1['nome_user'];
		    	$id_user			=	$array1['id_user'];

		    	$id_user;

				$sql = "SELECT * FROM `tb_chamados` WHERE id_chamado = $id";
				$buscar = mysqli_query($conexao,$sql);
				while ($array = mysqli_fetch_array($buscar)) {
					$id 			=	$array['id_chamado'];
		    		$tipo_problema	=	$array['tipo_problema'];
		    		$descricao		=	$array['descricao'];
		   			$iditem 		=	$array['iditem'];
		   			$data_envio		=	$array['data_envio'];
		    		$status 		=	$array['status'];
		   			$iduser 		=	$array['iduser'];
		   			$idtec 			=	$array['idtec'];
		   			$iduser_adm		=	$array['iduser_adm'];

			?>

			<div class="form-group" style="margin-top: 20px">
			    <input style="display: none;" type="number" name="id" readonly="" class="form-control" value="<?php echo $id ?>">
		 	</div>
		 	<div class="form-group">
		 		<label>Opção Escolhida</label>
			    <input id="select2" readonly="" class="form-control" name="tipo" value="<?php echo $tipo_problema ?>" >
			    </input>
		 	</div>
		 	<div class="form-group">
		    	<label for="comment">Descrição</label>
		    	<textarea type="text" class="form-control" name="descricao" value="<?php $descricao ?>" ti rows="8" id="comment" required autocomplete="off"><?php echo $descricao ?></textarea>
		    </div>
		 	<div style="text-align: right;">
		 		<button type="submit" class="btn btn-primary">Fazer Alteração</button>
		 	</div>
		 	<?php } ?>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>