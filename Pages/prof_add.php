<?php
  include "protect.php";
  include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="Bootstrap/bootstrap.css" rel="stylesheet">
  <script src="Bootstrap/bootstrap.js"></script> 
  <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
  <title>Professores</title>

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

 
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

  
    .main-content {
      margin-top: 90px;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }


    .card-form {
      background-color: #0d6efd;
      border-radius: 20px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
      padding: 40px 50px;
      width: 100%;
      max-width: 600px;
      color: white;
      margin-bottom: 40px;
    }

    .card-form h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-label {
      font-weight: 600;
    }

    .form-control, .form-select {
      border-radius: 10px;
      border: none;
      padding: 10px;
    }

    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.4);
    }

    .btn-light {
      width: 100%;
      border-radius: 10px;
      font-size: 1.1rem;
      font-weight: 500;
      background-color: #ffffff;
      color: #0d6efd;
      border: none;
      transition: 0.3s;
    }

    .btn-light:hover {
      background-color: #e9ecef;
      transform: scale(1.02);
    }

   
    .table-container {
      width: 90%;
      max-width: 900px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      padding: 20px;
    }

    .table th {
      background-color: #0d6efd;
      color: white;
      text-align: center;
    }

    .table td {
      text-align: center;
      vertical-align: middle;
    }

    h5 {
      text-align: center;
      color: #6c757d;
    }
  </style>
</head>
<body>

  <?php include 'navbar.php'; ?>

  <div class="main-content">

  
    <div class="card-form">
      <h2>Cadastro de Professor</h2>
      <form action="processar_professor.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Matrícula</label>
          <input type="number" name="matricula" class="form-control" placeholder="Digite a matrícula" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" name="nome_professor" class="form-control" placeholder="Digite o nome completo" required>
        </div>

        <div class="mb-4">
          <label class="form-label">Turnos</label>
          <select name="turnos_professor" class="form-select" required>
            <option value="">Selecione o turno</option>
            <option value="M">Manhã</option>
            <option value="T">Tarde</option>
            <option value="N">Noite</option>
            <option value="MT">Manhã e Tarde</option>
            <option value="MN">Manhã e Noite</option>
            <option value="TN">Tarde e Noite</option>
            <option value="MTN">Manhã, Tarde e Noite</option>
          </select>
        </div>

        <button type="submit" class="btn btn-light">Cadastrar Professor</button>
      </form>
    </div>

   
    <div class="table-container">
      <table class="table table-bordered table-striped">
        <thead>
          <tr style="color: black;">
            <th style="color: black;">Matrícula</th>
            <th style="color: black;">Nome</th>
            <th style="color: black;">Turnos</th>
            <th style="color: black;">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = 'SELECT * FROM professores';
            $usuarios = mysqli_query($connection, $sql);
            if (mysqli_num_rows($usuarios) > 0){
              foreach ($usuarios as $usuario){
          ?>
          <tr>
            <td><?=$usuario['matricula']?></td>
            <td><?=$usuario['nome_professor']?></td>
            <td><?=$usuario['turnos_professor']?></td>
            <td>
              <a href="professor-view.php?matricula=<?=$usuario['matricula']?>" class="btn btn-secondary btn-sm">Visualizar</a>
              <a href="professor-edit.php?matricula=<?=$usuario['matricula']?>" class="btn btn-success btn-sm">Editar</a>
              <form action="acoes.php" method="POST" class="d-inline">
                <button type="submit" action="acoes.php" onclick="return confirm('Certeza que deseja excluir este professor?')" name="delete_professor" value="<?=$usuario['matricula']?>" class="btn btn-danger btn-sm">Excluir</button>
              </form>
            </td>
          </tr>
          <?php
              }
            } else {
              echo "<h5>Nenhum professor encontrado</h5>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
