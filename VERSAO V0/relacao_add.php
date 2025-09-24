<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Criar Relação</title>
</head>
<body>
<ul class="nav" style="background-color: #005caa;">
  <li class="nav-item">
    <a class="nav-link" href="home.php" style="color:white;">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="prof_add.php" style="color:white;">Adicionar Professor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="curso_add.php" style="color:white;">Adicionar Curso</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="competencia_add.php" style="color:white;">Adicionar Competência</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="relacao_add.php" style="color:white;">Criar Relação</a>
  </li>
</ul>

<form action="processar_relacao.php" method="POST">
  <div class="mb-3" style="width: 500px; margin-left: 35%; margin-top: 5%;">
    <label for="matricula" class="form-label">Professor</label>
    <select class="form-control" id="matricula" name="matricula" required>
      <option value="">Selecione o professor</option>
      <?php
      $sql = "SELECT matricula, nome FROM professores";
      $result = $connection->query($sql);
      while($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['matricula'] . "'>" . $row['nome'] . "</option>";
      }
      ?>
    </select>
  </div>
  
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="idcurso" class="form-label">Curso</label>
    <select class="form-control" id="idcurso" name="idcurso" required>
      <option value="">Selecione o curso</option>
      <?php
      $sql = "SELECT idcurso, nome FROM cursos";
      $result = $connection->query($sql);
      while($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['idcurso'] . "'>" . $row['nome'] . "</option>";
      }
      ?>
    </select>
  </div>
  
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="idcompetencia" class="form-label">Competência</label>
    <select class="form-control" id="idcompetencia" name="idcompetencia" required>
      <option value="">Selecione a competência</option>
      <?php
      $sql = "SELECT idcompetencia, nome FROM competencias";
      $result = $connection->query($sql);
      while($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['idcompetencia'] . "'>" . $row['nome'] . "</option>";
      }
      ?>
    </select>
  </div>
  
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="turnos" class="form-label">Turno</label>
    <select class="form-control" id="turnos" name="turnos" required>
      <option value="">Selecione o turno</option>
      <option value="M">Manhã</option>
      <option value="T">Tarde</option>
      <option value="N">Noite</option>
      <option value="MT">Manhã e Tarde</option>
      <option value="MN">Manhã e Noite</option>
      <option value="TN">Tarde e Noite</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-top: 20px;">Criar Relação</button>
</form>
</body>
</html>
