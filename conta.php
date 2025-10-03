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
    <style>
        .conta-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .info-row {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #005caa;
            margin-bottom: 5px;
        }
        .info-value {
            color: #333;
            font-size: 1.1em;
        }
        .welcome-message {
            background: linear-gradient(135deg, #005caa 0%, #0077cc 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .password-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }
    </style>
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
        
        <div class="info-row">
            <div class="info-label">Status da Conta:</div>
            <div class="info-value"><span class="badge bg-success">Ativa</span></div>
        </div>
        
        <div class="password-section">
            <h4 class="mb-3" style="color: #005caa;">Alterar Senha</h4>
            <form method="POST" action="change_pass.php" onsubmit="return validarSenha()">
                <div class="mb-3">
                    <label for="nova_senha" class="form-label">Nova Senha:</label>
                    <input type="password" class="form-control" id="nova_senha" name="nova_senha" required minlength="6">
                    <small class="text-muted">Mínimo de 6 caracteres</small>
                </div>
                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label">Confirmar Nova Senha:</label>
                    <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required minlength="6">
                </div>
                <button type="submit" class="btn btn-warning">Alterar Senha</button>
            </form>
        </div>
        
        <div class="mt-4">
            <a href="home.php" class="btn btn-primary me-2">Voltar para Home</a>
            <a href="logout.php" class="btn btn-outline-danger">Sair</a>
        </div>
    </div>
    
    <script>
        function validarSenha() {
            var senha = document.getElementById('nova_senha').value;
            var confirmar = document.getElementById('confirmar_senha').value;
            
            if (senha !== confirmar) {
                alert('As senhas não coincidem!');
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