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
    <script src='./Methods/scripts.js'></script>
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
    <meta>
        <style>
      body {
        background-image: url('./images/nome.png');
        display: flex; 
        justify-content: center; 
        align-items: center; 
        height: 100vh;
        margin: 0; 
      }
    </style>
</head>
<body>
<div class='alert alert-danger' role='alert' style='display: flex; position: fixed; border-radius: 15px'>Acesso negado. 
<a href='index.php' style='color:red;'>Voltar para login<a>
</div>
</body>
</html>");
}

?>

