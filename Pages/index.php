<?php
  include "conexao.php";

  if (isset($_POST['usuario']) || isset($_POST['senha'])) {
    if (strlen($_POST['usuario']) == 0) {
      echo "<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='Bootstrap/bootstrap.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
    <script src='Bootstrap/bootstrap.js'></script> 
    <script src='scripts.js'></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
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
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
</head>
<body>
<div class='alert alert-danger' role='alert' style='display: flex; top: 20%; position: fixed; border-radius: 15px'>
Preencha um usuário</div>
</body>
</html>";
    } elseif (strlen($_POST['senha']) == 0) {
      echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='Bootstrap/bootstrap.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
    <script src='Bootstrap/bootstrap.js'></script> 
    <script src='scripts.js'></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
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
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
</head>
<body>
<div class='alert alert-danger' role='alert' style='display: flex; top: 20%; position: fixed; border-radius: 15px'>Preencha uma senha</div>
</body>
</html>";
    } else {
      $usuario = $connection->real_escape_string($_POST['usuario']);
      $senha = $_POST['senha']; // Não escapar a senha pois será usada com password_verify

      $sql_code = "SELECT * FROM users WHERE usuario = '$usuario'";
      $sql_query = $connection->query($sql_code) or die("Falha na execução do código SQL: ". $connection->error);

      $quantidade = $sql_query->num_rows;

      if ($quantidade == 1){
        $usuario_data = $sql_query->fetch_assoc();

        if (password_verify($senha, $usuario_data['senha'])) {
          if (!isset($_SESSION)){
            session_start();
          }

          $_SESSION['user'] = $usuario_data['usuario'];

          header('Location: home.php');
        } else {
          echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='Bootstrap/bootstrap.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
    <script src='Bootstrap/bootstrap.js'></script> 
    <script src='scripts.js'></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
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
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
</head>
<body>
<div class='alert alert-danger' role='alert' style='display: flex; top: 20%; position: fixed; border-radius: 15px'>
Falha ao logar! Usuário ou senha incorretos
</div>
</body>
</html>";
        }

      } else {
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='Bootstrap/bootstrap.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
    <script src='Bootstrap/bootstrap.js'></script> 
    <script src='scripts.js'></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
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
    <link rel='icon' type='image/x-icon' href='./images/calendario.ico'>
    <title>Agenda</title>
</head>
<body>
<div class='alert alert-danger' role='alert' style='display: flex; top: 20%; position: fixed; border-radius: 15px'>
Falha ao logar! Usuário ou senha incorretos
</div>
</body>
</html>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
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
  <img src="./images/senai-logo" style="width: 107px; height: 27px; position: absolute; margin-right: 8%; margin-bottom: 16%">
  <form method="POST">
    <div class="mb-3" style="width: 240px;">
      <label for="exampleInputUsername1" class="form-label">Usuário</label>
      <input type="text" class="form-control" id="exampleInputUsername1" name="usuario">
    </div>
    <div class="mb-3" style="width: 240px;">
      <label for="senha" class="form-label">Senha</label>
      <div class="input-group">
        <input type="password" class="form-control" id="senha" name="senha">
        <button type="button" id="btn-senha" onclick="mostrarSenha()" style="position: absolute; margin-left: 200px; z-index: 100000; border: none; margin-top: 5px;">
          <i class="bi bi-eye-fill"></i>
        </button>
      </div>
    </div> 
    <button type="submit" class="btn btn-primary" style="width: 240px">Submit</button>
  </form>
</div>
</body>
</html>
