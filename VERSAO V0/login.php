<?php
include("conexao.php");

if(isset($_POST['submit'])){
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM users WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = mysqli_query($connection, $sql);
    
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['user'] = $usuario;
        header('Location: home.php');
    } else {
        echo "Usuário ou senha incorretos";
    }
}
?>
