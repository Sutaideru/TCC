<?php
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $db = "agendada";

    $connection = mysqli_connect($servidor, $user, $password, $db);
    
    if(mysqli_connect_error()){
        die("Falha ao conectar ao banco de dados: ". mysqli_connect_error());
    }
?>
