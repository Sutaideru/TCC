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
    body {
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
    
    .caixa-exemplo {
        width: 33%;
        height: 75%;
        padding: 10px;
        background-color: rgba(240, 240, 240, 1);
        border-radius: 15px;
        border: 2px solid black;
        justify-content: center;
        align-items: center;
        display: flex;
        margin-left: 35%;
        margin-top: 90px;
        flex-direction: column;
    }
    </style>
</head>
<body>
    
    <div class="caixa-exemplo">
        <div class="welcome-message" class="">
            <h1 class="mb-2">Bem-vindo, <?php echo htmlspecialchars($usuario['usuario']); ?>!</h1>
            <p class="mb-0" style="margin-bottom: 30px">Esta é a sua página de conta no Sistema de Agenda.</p>
        </div>
        
        <h3 class="mb-4" style="color: #005caa;">Informações da Conta</h3>
        
        <div class="info-row">
            <div class="info-label">Nome de Usuário: <?php echo htmlspecialchars($usuario['usuario']); ?></div>
        </div>
        <div class="mt-4">
            <a href="home.php" class="btn btn-primary me-2">Voltar para Home</a>
            <a href="logout.php" class="btn btn-outline-danger" style="margin-right: 20px; margin-left: 10px;">Sair</a>
            <a href="alt_pass.php" class="btn btn-warning" link=href"alt_pass.php">Alterar Senha</a>
    </div>
</body>
</html>