<!DOCTYPE html>
<html lang="pt-br">
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
</head>
<body>
<ul class="nav" style="background-color: #005caa;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="home.php" style="color:white;">Home</a>
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
</ul>

 Updated form to match new database structure 
<form action="processar_professor.php" method="POST">
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="nome" class="form-label">Nome do Professor</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
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
  <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-top: 20px;">Cadastrar Professor</button>
</form>
</body>
</html>
