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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Minha Conta - Agenda</title>
</head>
<body>
    <meta name="viewport" content="width=<div class="password-section">
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
            <a href="conta.php" class="btn btn-primary me-2">Voltar</a>
            <a href="logout.php" class="btn btn-outline-danger">Sair</a>
        </div>
    </div>
    
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