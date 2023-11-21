<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
            background-color: #007bff;
            color: #fff;
            border-radius: 0;
            font-family: 'Libre Baskerville', serif;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-back {
            border-radius: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1 class="form-title">Cadastrar usuário</h1>

    <div class="container">
        <div class="text-left">
            <a href="index.php" role="button" class="btn btn-back">Voltar</a>
        </div>
        <form action="_insert_usuario_externo.php" method="post">
            <div class="form-group">
                <label for="nome_user">Nome do usuário:</label>
                <input type="text" name="nome_user" class="form-control" required placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label for="login_user">Nome de login:</label>
                <input type="text" name="login_user" class="form-control" required placeholder="Login">
            </div>
            <div class="form-group">
                <label for="email_user">Email:</label>
                <input type="text" name="email_user" class="form-control" required placeholder="Email">
            </div>
            <div class="form-group">
                <label for="senha_user">Senha:</label>
                <input id="txtSenha" type="password" name="senha_user" class="form-control" required placeholder="Senha">
            </div>
            <div class="form-group">
                <label for="repetir">Repetir senha:</label>
                <input type="password" name="repetir" class="form-control" required placeholder="Repetir senha" oninput="validaSenha(this)">
                <small>Precisa ser igual à senha digitada acima.</small>
            </div>
            <input type="hidden" name="nivel_user" value="1">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validaSenha(input) {
            if (input.value != document.getElementById('txtSenha').value) {
                input.setCustomValidity('A senha de repetição é diferente');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
</body>
</html>
