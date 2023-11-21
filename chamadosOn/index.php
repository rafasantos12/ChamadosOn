<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados Unifasipe</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007BFF;
        }
        .error-message {
            color: #FF4136;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <?php
        if (isset($_SESSION['nao_autenticado'])):
        ?>
        <div class="alert alert-danger error-message" role="alert">
            ERRO: Usuário ou senha inválidos.
        </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
        <img src="img/logon.png" class="img-fluid mx-auto d-block" alt="Logo" style="max-width: 100%; margin-top: 20px; margin-bottom: 30px;">
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Seu login" autofocus required>
            </div>
            <div class="form-group">
                <input name="senha" class="form-control" type="password" placeholder="Sua senha" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <small>Não tem cadastro? Clique <a href="cadastro_usuario_externo.php">aqui</a></small>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
