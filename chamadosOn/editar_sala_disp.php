<?php 

	include 'conexao.php';

	$id = $_GET['id_sala'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Alterar salas e dispositivos</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
	<h1 id="formTitulo">Alterar Salas e Dispositivos</h1>
	
	<div class="container" style="margin-top: 20px">
		<div style="text-align: left;">
		 	<a href="listar_sala_disp.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		</div>
			<center>
				<h4>Padrão de Preenchimento</h4><br>
				<h5>Para sala/laboratório/auditório/ginásio:<br>
					Número da sala + o bloco separado por - .<br>
					Exemplo: 1 - Bloco A.<br>
					<br>
					Para dispositivos:<br>
					Nome do dispositivo + especificações relevantes separado por - .<br>
					Exemplo: Projetor - modelo.
				</h5>
			</center>
		<form action="_atualiza_sala_disp.php" method="post">

			<?php 

				$sql = "SELECT * FROM `tb_item` WHERE id_item = $id";
				$buscar = mysqli_query($conexao,$sql);
				while ($array = mysqli_fetch_array($buscar)) {
					$id 			=	$array['id_item'];
		    		$tipo			=	$array['tipo_item'];
		   			$descricao		=	$array['descricao_item'];

			?>

			<div class="form-group">
				<label style="margin-top: 20px">Item cadastrado</label>
					<select  class="form-control" name="tipo_item" required disabled="">
							<option><?php echo $tipo ?></option>
							<option value="Sala">Sala</option>
							<option value="Laboratorio">Laboratorio</option>
							<option value="Auditorio">Auditorio</option>
							<option value="Ginasio">Ginasio</option>
							<option value="Dispositivo">Dipositivo</option>
					</select>
			</div>
			<div class="form-group">
				<label>Descrição</label>
				<textarea type="text" name="descricao" rows="4" class="form-control" ><?php echo $descricao ?></textarea>
				<small>não utilize acento nas palavras</small>
				<input type="number" name="id" style="display: none;" value="<?php echo $id ?>">
			</div>
			<div style="text-align: right;">
		 		<button type="submit" class="btn btn-warning">Salvar</button>
		 	</div>
		 	<?php } ?>
		</form>
		
	</div>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>