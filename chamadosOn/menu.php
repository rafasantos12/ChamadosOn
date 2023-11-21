<?php
include 'conexao.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

// Obtém o nível de acesso do usuário
$usuario = $_SESSION['login'];
$sql = "SELECT categoria FROM tb_usuario WHERE login = '$usuario' AND status = 'ativo'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['categoria'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        #formTitulo {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
            font-size: 24px;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            background-color: #ffffff;
            border-radius: 5px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333333;
        }

        .card-text {
            font-size: 14px;
            color: #666666;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h4 style="color: #005100;">Seja bem-vindo <?php echo $_SESSION['login']; ?>!</h4>
    <a id="formLogin" href="logout.php" class="btn btn-primary">Sair</a>
</div>
<h1 id="formTitulo">Menu</h1>
<div class="container">
    <div class="row">
        <?php if ($nivel == 0 || $nivel == 1) { ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Emitir Solicitação</h5>
                        <p class="card-text">Emita solicitações de chamados ao setor de Tecnologia.</p>
                        <center><a href="pagina_chamado.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($nivel == 1) { ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Suas Solicitações</h5>
                        <p class="card-text">Acesse as solicitações que você emitiu.</p>
                        <center><a href="minhas_solicitacoes.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($nivel == 0) { ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista dos Chamados</h5>
                        <p class="card-text">Visualize todos os chamados e efetue alterações.</p>
                        <center><a href="listar_chamado.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php if ($nivel == 0) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Salas ou Dispositivos</h5>
                        <p class="card-text">Cadastro de estoque.</p>
                        <center><a href="cadastro_sala_disp.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Salas e Dispositivos</h5>
                        <p class="card-text">Consulte os dispositivos cadastrados.</p>
                        <center><a href="listar_sala_disp.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($nivel == 0) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Usuário</h5>
                        <p class="card-text">Sempre que uma nova pessoa for utilizar o sistema, faça o cadastro dela para ela ter acesso ao formulário de solicitação.</p>
                        <center><a href="cadastro_usuario.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista dos Usuários</h5>
                        <p class="card-text">Consulte todas as pessoas que estão utilizando o sistema. Você também pode editar o usuário delas.</p>
                        <center><a href="listar_usuario.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($nivel == 0) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Técnico</h5>
                        <p class="card-text">Sempre que um novo técnico for utilizar o sistema, faça o cadastro dele para garantir a integridade do sistema.</p>
                        <center><a href="cadastro_tecnico.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista dos Técnicos</h5>
                        <p class="card-text">Consulte todos os técnicos que estão utilizando o sistema. Você também pode editar o usuário deles.</p>
                        <center><a href="listar_tecnico.php" class="btn btn-primary btn-sm">Abrir</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
