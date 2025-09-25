<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user'])){
    die("<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='Bootstrap/bootstrap.css' rel='stylesheet'>
    <script src='Bootstrap/bootstrap.js'></script> 
    <script src='scripts.js'></script>
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
    <meta>
</head>
<body>
<div class='alert alert-danger' role='alert'>Acesso negado. 
<a href='index.php'>Voltar para login<a>
</div>
</body>
</html>");
}

?>