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
        <style>
      body {
        background-image: url('./images/nome.png');
        display: flex; /* Flexbox para centralizar */
        justify-content: center; /* Centraliza horizontalmente */
        align-items: center; /* Centraliza verticalmente */
        height: 100vh; /* Garante que o body tenha a altura da janela */
        margin: 0; /* Remove margens do body */
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
