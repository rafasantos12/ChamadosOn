<?php
include 'conexao.php';
session_start();

// Redireciona para a pagina de login caso n esteja logado
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}


$login = $_SESSION['login'];
$sql = "SELECT * FROM `tb_usuario` WHERE login = '$login'";
$busca1 = mysqli_query($conexao, $sql);
$array1 = mysqli_fetch_array($busca1);
$nome_user = $array1['nome_user'];
$id_user = $array1['id_user'];

//pega a data atual
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('d/m/Y H:i');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Abertura de Chamado</title>
    <!-- Adding Bootstrap and font styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton|Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   
    <style type="text/css">
       
        body {
            font-family: 'Libre Baskerville', serif;
            background-image: url('your-background-image.jpg');
            background-size: cover;
            background-color: #f0f0f0;
        }

        header {
            background: linear-gradient(135deg, #008B00, #005200);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 32px;
        }

        h1#formTitulo {
            font-size: 32px;
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .btn-logout, .btn-light {
            background-color: #008B00;
            color: #fff;
            border: none;
        }

        .btn-logout:hover, .btn-light:hover {
            background-color: #005200;
        }

        .form-group {
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #select {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 style="color: #008B00;"><?php echo $_SESSION['login']; ?></h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    </div>
</div>
<h1 id="formTitulo">Formulário para abertura de chamados</h1>
<div class="container">
    <div style="text-align: left;">
        <a href="menu.php" role="button" class="btn btn-light"><i class="fas fa-arrow-left"></i> Voltar</a>
    </div>
    <form action="_abre_chamado.php" method="POST">
        <div class="form-group" style="margin-top: 20px">
        </div>
        <div class="form-group">
            <label>O que deseja?</label>
            <select id="select" class="form-control" name="tipo_problema">
                <option value="Suporte TI">Suporte - TI</option>
                <option value="reserva de sala">Reservar sala</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Solicitante</label>
            <select id="select" class="form-control" name="sala">
                <?php
                $sql0 = "SELECT * FROM `tb_item` WHERE tipo_item != 'dispositivo' ORDER BY tipo_item ASC";
                $busca0 = mysqli_query($conexao, $sql0);

                while ($array = mysqli_fetch_array($busca0)) {
                    $tipo_item = $array['tipo_item'];
                    $sala = $array['descricao_item'];
                ?>
                    <option value="<?php echo $tipo_item . $sala ?>"><?php echo $tipo_item . $sala ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label> Descrição</label>
            <textarea class="form-control" rows="4" name="descricao" maxlength="120"
                      placeholder="Inserir Unidade e descrição do problema! (Chamados sem detalhes serão recusados automaticamente.)"></textarea>
        </div>
        <br>
        <div style="text-align: right;">
            <button type="submit" class="btn btn-light"><i class="fas fa-plus"></i> Abrir Chamado</button>
        </div>
        <input type="text" name="id_user" readonly style="display: none;" value="<?php echo $id_user ?>">
        <input type="text" name="hoje" readonly style="display: none;" value="<?php echo $hoje ?>">
        <input type="text" name="nome_user" readonly style="display: none;" value="<?php echo $nome_user ?>">
    </form>
</div>

<!-- Bootstrap and FontAwesome Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
