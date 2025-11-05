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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
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
            width: 100%;
            max-width: 700px;
            padding: 2rem 2rem;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            border: none;
            height: 450px;
        }

        .welcome-message, 
        .info-row {
    
        }

        .content-main {
            flex-grow: 1;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
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
    <div class="content-main">
        <div class="welcome-message">
            <h1 class="mb-2">Bem-vindo, <?php echo htmlspecialchars($usuario['usuario']); ?>!</h1>
            <p class="mb-0" style="margin-bottom: 30px">Esta é a sua página de conta no Sistema de Agenda.</p>
        </div>
        
        <h3 class="mb-4" style="color: #005caa;">Informações da Conta</h3>
        
        <div class="info-row">
            <div class="info-label">Nome de Usuário: <?php echo htmlspecialchars($usuario['usuario']); ?></div>
        </div>
    </div>

    <div class="button-group">
        <a href="home.php" class="btn btn-primary me-2" style="align-self: left; background-color: #005caa;">Voltar para Home</a>
        <a href="alt_pass.php" class="btn btn-warning" style="align-self: right">Alterar Senha</a>
        <a href="logout.php" class="btn btn-danger" style="align-self: center">Sair</a>
    </div>
</div>
    </main>
</body>

</html>