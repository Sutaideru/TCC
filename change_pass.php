<?php 
include "protect.php";
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nova_senha'])) {
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    // Validate passwords match
    if ($nova_senha !== $confirmar_senha) {
        echo "<script>
                alert('As senhas não coincidem!');
                window.location.href = 'conta.php';
              </script>";
        exit();
    }
    
    // Validate password length
    if (strlen($nova_senha) < 6) {
        echo "<script>
                alert('A senha deve ter pelo menos 6 caracteres!');
                window.location.href = 'conta.php';
              </script>";
        exit();
    }
    
    $usuario_nome = $_SESSION['user'];
    
    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE users SET senha = ? WHERE usuario = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $nova_senha, $usuario_nome);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Você mudou sua senha com sucesso!');
                window.location.href = 'conta.php';
              </script>";
    } else {
        $erro = addslashes(mysqli_error($connection));
        echo "<script>
                alert('Erro ao trocar senha: " . $erro . "');
                window.location.href = 'conta.php';
              </script>";
    }
    $stmt->close();
} else {
    // Redirect if accessed directly without POST
    header("Location: conta.php");
}
?>
