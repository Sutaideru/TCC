<?php 
include "protect.php";
include "conexao.php";
include "navbar.php";


$usuario_nome = $_SESSION['user'];
$sql_code = "SELECT usuario FROM users WHERE usuario = ?";
$stmt = $connection->prepare($sql_code);
$stmt->bind_param("s", $usuario_nome);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    die("Erro ao buscar informações do usuário.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Bootstrap/bootstrap.css" rel="stylesheet" />
    <script src="Bootstrap/bootstrap.js"></script>
    <script src="scripts.js"></script>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico" />
    <title>Minha Conta - Agenda</title>

    <style>
        
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        
        nav {
            height: 60px; 
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            padding: 0 1rem;
            position: sticky; 
            top: 0;
            z-index: 1000;
        }


        main.content-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .caixa-exemplo {
            width: 90%;
            max-width: 400px;
            padding: 2rem 1.5rem;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
            height: 350px;
        }

        .caixa-exemplo h4 {
            color: #005caa;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        small.text-muted {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .mt-4 {
            width: 100%;
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>


<main class="content-wrapper">
    <div class="caixa-exemplo">
        <h4 class="mb-3">Alterar Senha</h4>
        <form method="POST" action="change_pass.php" onsubmit="return validarSenha()">
            <div class="mb-3">
                <label for="nova_senha" class="form-label">Nova Senha:</label>
                <input type="password" class="form-control" id="nova_senha" name="nova_senha" required minlength="8" style="width: 350px" />
                <small class="text-muted">Mínimo de 8 caracteres</small>
            </div>
            <div class="mb-3">
                <label for="confirmar_senha" class="form-label">Confirmar Nova Senha:</label>
                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required minlength="6" />
            </div>
        </form>
        <div class="mt-4">
            <a href="conta.php" class="btn btn-primary me-2" style="margin-right:10px">Voltar</a>
            <button type="submit" class="btn btn-warning" style="margin-right: 10px">Alterar Senha</button>
            <a href="logout.php" class="btn btn-danger" style="margin-right:10px">Sair</a>
        </div>
    </div>
</main>

<script>
    function validarSenha() {
        var senha = document.getElementById('nova_senha').value;
        var confirmar = document.getElementById('confirmar_senha').value;

        if (senha !== confirmar) {
            alert('As senhas precisam ser iguais!');
            return false;
        }

        if (senha.length < 6) {
            alert('A senha deve ter pelo menos 6 caracteres!');
            return false;
        }

        return true;
    }
</script>

</body>
</html>