<?php 

	include 'conexao.php';

	$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alteração de técbnico</title>
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
	<h1 id="formTitulo" >Alterar técnico</h1>
	<div class="container">
		<div style="text-align: left;">
		 		<a href="listar_tecnico.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		 	</div>
		<form action="_atualiza_tecnico.php" method="POST">

			<?php 

				$sql = "SELECT * FROM `tb_tecnico` WHERE id_tec = $id";
				$buscar = mysqli_query($conexao,$sql);
				while ($array = mysqli_fetch_array($buscar)) {
					$id 			=	$array['id_tec'];
		    		$nome 			=	$array['nome_tec'];
		   			$email 			=	$array['email'];
		   			$nivel 	 		=	$array['nivel'];

			?>

			<div class="form-group" style="margin-top: 20px">
			    <label>id</label>
			    <input type="number" name="id_tecnico" disabled class="form-control" value="<?php echo $id ?>">
		 	</div>
		 	<div class="form-group">
		 		<label>Nome do técnico</label>
			    <input class="form-control" name="nome_tecnico" value="<?php echo $nome ?>" >
			    </input>
			    <input type="number" class="form-control" style="display: none;" name="id" value="<?php echo $id ?>" >
			    </input>
		 	</div>
		 	<div class="form-group">
			    <label>Email</label>
			    <input type="text" name="email" class="form-control" value="<?php echo $email ?>"></input> 
		 	</div>
		 	<div class="form-group">
			    <label >Nível de acesso</label>
			    <input type="number" disabled="" name="nivel" class="form-control" value="<?php echo $nivel ?>"></input> 
		 	</div>
			    <input type="number" name="id" readonly="" style="display: none;" value="<?php echo $id ?>" class="form-control" style="display: none" ></input> 
		 	<div style="text-align: right;">
		 		<button type="submit" class="btn btn-warning">Fazer Alteração</button>
		 	</div>
		 	<?php } ?>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

	
</html>