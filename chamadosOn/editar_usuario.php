<?php 

	include 'conexao.php';

	$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alteração de usuário</title>
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
	<h1 id="formTitulo" >Alterar usuário</h1>
	<div class="container">
		<div style="text-align: left;">
		 		<a href="listar_usuario.php" role="button" class="btn" style="border-radius: 1px; border-color: black; border-radius: 5px;">Voltar</a>
		 	</div>
		<form action="_atualiza_usuario.php" method="POST">

			<?php 

				$sql = "SELECT * FROM `tb_usuario` WHERE id_user = $id";
				$buscar = mysqli_query($conexao,$sql);
				while ($array = mysqli_fetch_array($buscar)) {
					$id 			=	$array['id_user'];
		    		$nome 			=	$array['nome_user'];
		   			$login 			= 	$array['login'];
		   			$email 			=	$array['email'];
		    		$senha 	 		=	$array['senha'];
		   			$nivel 	 		=	$array['categoria'];
		   			$status 		=	$array['status'];

			?>

			<div class="form-group" style="margin-top: 20px">
			    <label>id</label>
			    <input type="number" name="id_user" disabled class="form-control" value="<?php echo $id ?>">
		 	</div>
		 	<div class="form-group">
		 		<label>Nome do usuário</label>
			    <input class="form-control" name="nome_user" value="<?php echo $nome ?>" >
			    </input>
			    <input class="form-control" name="id" style="display: none;" value="<?php echo $id ?>" >
			    </input>
		 	</div>
		 	<div class="form-group">
			    <label>Login</label>
			    <input type="text" class="form-control" name="login_user" value="<?php echo $login ?>" >
			    </input>
		 	</div>
		 	<div class="form-group">
			    <label>Email</label>
			    <input type="text" name="email" class="form-control" value="<?php echo $email ?>"></input> 
		 	</div>
		 	<div class="form-group">
			    <label>Senha</label>
			    <input id="txtSenha" type="password" name="senha" class="form-control" value="<?php echo $senha ?>"></input>  
		 	</div>
		 	<div class="form-group">
				<label>Repetir senha</label>
				<input type="password" name="repetir" class="form-control"  value="<?php echo $senha ?>" required autocomplete="of" placeholder="Repetir senha" oninput="validaSenha(this)">
				<small>Precisa ser igual a senha digitada acima.</small>
			</div>
		 	<div class="form-group">
			    <label>Nível de acesso</label> 
			    <input type="number" name="nivel" class="form-control" min="0" max="1" value="<?php echo $nivel ?>"></input> 
		 	</div>
		 	<div class="form-group">
			    <label>Status</label>
			    <select name="status" class="form-control">
			    	<option value="ativo">ativo</option>
			    	<option value="inativo">inativo</option>
			    </select>
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

	<script>
		function validaSenha (input){
			if (input.value != document.getElementById('txtSenha').value) {
				input.setCustomValidity('A senha de repetição é diferente');
			} else {
				input.setCustomValidity('');
			}
		}
	</script>
</body>

	
</html>