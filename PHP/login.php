<?php

include("conexao.php");

if(issets($_POST['submit'])){
    $usuario = ["usuario"]
    $senha = ["senha"]

    $sql = "select * from login where usuario = '$usuario' and senha = '$senha'"
    $result = mysqli_query($connection, $sql)
}

?>
