<?php
  include ("conexao.php");

  if isset($_POST['usuario']) || isset($_POST['senha']) {
    if strlen($_POST['usuario'] == 0) {
      echo "Preencha um usuário";
    } elseif (strlen($_POST['senha']) == 0) {
      echo "Preencha uma senha";
    } else {
      $usuario = $connection->real_escape_string($_POST['usuario']);
      $senha = $connection->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM login WHERE usuario = '$usuario' AND senha = '$senha'";
      $sql_query = $connection->query($sql_code) or die("Falha na execução do código SQL: ". $connection->error);

      $quantidade = $sql_query->num_rows;

      if ($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)){
          session_start();
        }

        $_SESSION['user'] = $usuario['usuario'];
        $_SESSION['nome'] = $usuario['usuario'];

      } else {
        echo "Falha ao logar! Usuário ou senha incorretos";
      }

    };
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex; /* Flexbox para centralizar */
        justify-content: center; /* Centraliza horizontalmente */
        align-items: center; /* Centraliza verticalmente */
        height: 100vh; /* Garante que o body tenha a altura da janela */
        margin: 0; /* Remove margens do body */
      }

      .caixa-exemplo {
        width: 18%;
        height: 40%;
        padding: 10px;
        background-color: white;
        border-radius: 15px;
        justify-content: center;
        align-items: center;
        display: flex;
      }

    </style>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Agenda</title>
</head>
<body>
<div class="caixa-exemplo">
  <img src="./images/senai-logo" style="width: 80px; height: 40px; position: absolute; margin-right: 8%; margin-bottom: 16%">
  <form action="register_db.php" method="POST">
    <div class="mb-3" style="width: 240px;">
      <label for="exampleInputEmail1" class="form-label">Usuário</label>
      <input type="text" class="form-control" id="exampleInputUsername1" name="username">
    </div>
    <div class="mb-3" style="width: 240px;">
      <label for="exampleInputPassword1" class="form-label">Senha</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
      <button type="submit" class="btn btn-primary" style="width: 240px">Submit</button>
    <a href="home.php"><br>VaiSubmit</button>
    </a>
  </form>
</div>
</body>
</html>
