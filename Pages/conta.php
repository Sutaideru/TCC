<?php 
include "protect.php";
include "conexao.php";


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
</head>
<body>
    <?php include "navbar.php"; ?>
    
    <div class="conta-container">
        <div class="welcome-message">
            <h1 class="mb-2">Bem-vindo, <?php echo htmlspecialchars($usuario['usuario']); ?>!</h1>
            <p class="mb-0">Esta é a sua página de conta no Sistema de Agenda.</p>
        </div>
        
        <h3 class="mb-4" style="color: #005caa;">Informações da Conta</h3>
        
        <div class="info-row">
            <div class="info-label">Nome de Usuário:</div>
            <div class="info-value"><?php echo htmlspecialchars($usuario['usuario']); ?></div>
        </div>
    <div class="alterar-senha">
        <a href="alt_pass.php" class="btn btn-warning" link=href"alt_pass.php">Alterar Senha</a>
    </div>
    <div class="mt-4">
            <a href="home.php" class="btn btn-primary me-2">Voltar para Home</a>
            <a href="logout.php" class="btn btn-outline-danger">Sair</a>
    </div>
</body>
</html>