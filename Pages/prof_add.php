<?php
  include "protect.php";
  include "conexao.php";
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
        background-image: url('');
      }
      .caixa-exemplo {
        width: 30%;
        height: 100%;
        padding: 20px;
        background-color: white;
        margin-left: 35%;
        margin-top: 15%;
        border-radius: 15px;
        justify-content: center;
      }
    </style>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Agenda</title>
<meta>
</head>
<body>
<?php
include 'navbar.php'
?>
  <form action="processar_professor.php" method="POST" class="mb-3">
  <div class="mb-3" style= "display: flex; width: 1000px; justify-content: center; align-items: center; margin-left: 25%; margin-top: 300px">
    <label class="form-label">Matrícula</label>
    <input type="number" name="matricula" class="form-control" required>
  </div>
  <div class="mb-3" style= "display: flex; width: 1000px; justify-content: center; align-items: center; margin-left: 25%;">
    <label class="form-label">Nome </label>
    <input type="text" name="nome_professor" class="form-control" required>
  </div>
  <div style= "display: flex; width: 1000px; justify-content: center; align-items: center; margin-left: 25%;">
    <label class="form-label">Turnos </label>
    <select name="turnos_professor" required class="mb-3" style= "display: flex; width: 300px; justify-content: center; align-items: center; margin-left: 2%">
      <option value=""> Selecione o turno </option>
      <option value="M">Manhã</option>
      <option value="T">Tarde</option>
      <option value="N">Noite</option>
      <option value="MT">Manhã e Tarde</option>
      <option value="MN">Manhã e Noite</option>
      <option value="TN">Tarde e Noite</option>
      <option value="MTN">Manhã, Tarde e Noite</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" style= "display: flex; justify-content: center; margin-left: 45%">Cadastrar Professor</button>
</form>

<div class="card-body">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Matricula</th>
      <th>Nome</th>
      <th>Turnos</th>
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
      <td><?=$usuario['matricula'] ?></td>
      <td><?=$usuario['nome_professor'] ?></td>
      <td><?=$usuario['turnos_professor'] ?></td>
    </tr>
    <?php
      }
    } else {
      echo "<h5>Nenhum professor encontrado</h5>";
    }
    ?>
  </tbody>
</table>

</body>
</html>