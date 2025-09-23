<?php

    $servidor = "localhost";
    $user ="root";
    $password = "";
    $db = "agendada";

    $conection = mysqli_connect($servidor, $user, $password, $db);
    echo "";

    if($connection->errror){
        die("Falha ao conectar ao banco de dados: ". $connection->error);
    }
?>