<?php

    $servidor = "localhost";
    $user ="root";
    $password = "";
    $db = "agendada";

    $connection = mysqli_connect($servidor, $user, $password, $db);
    echo "";

    if($connection->error){
        die("Falha ao conectar ao banco de dados: ". $connection->error);
    }
?>
