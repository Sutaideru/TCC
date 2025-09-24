<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Adicionar Competência</title>
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
    <a class="nav-link active" href="competencia_add.php" style="color:white;">Adicionar Competência</a>
  </li>
</ul>

<form action="processar_competencia.php" method="POST">
  <div class="mb-3" style="width: 500px; margin-left: 35%; margin-top: 5%;">
    <label for="nome" class="form-label">Nome da Competência</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
  </div>
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="cargahoraria" class="form-label">Carga Horária</label>
    <input type="number" class="form-control" id="cargahoraria" name="cargahoraria" min="1" required>
  </div>
  <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-top: 20px;">Cadastrar Competência</button>
</form>
</body>
</html>
