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
<meta>
</head>
<body>
<ul class="nav" style = "background-color: #005caa;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="home.php" style="color:white;">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="novo_prof.php" style="color:white;">Novo Prof</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="prof_add.php" style="color:white;">Prof Add</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php" style="color:white;">Index</a>
  </li>
</ul>
 Added action, method and corrected field names to match database 
<form action="processar_professor.php" method="POST">
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="nome_professor" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome_professor" name="nome_professor" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="competencias_professor" class="form-label">Competências (ID)</label>
    <input type="number" class="form-control" id="competencias_professor" name="competencias_professor" required>
  </div>
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="turnos_professor" class="form-label">Turno</label>
    <select class="form-control" id="turnos_professor" name="turnos_professor" required>
      <option value="">Selecione o turno</option>
      <option value="M">Manhã</option>
      <option value="T">Tarde</option>
      <option value="N">Noite</option>
      <option value="MT">Manhã e Tarde</option>
      <option value="MN">Manhã e Noite</option>
      <option value="TN">Tarde e Noite</option>
    </select>
  </div>
  <div class="mb-3" style="width: 500px; margin-left: 35%;">
    <label for="cursos_professor" class="form-label">Curso (ID)</label>
    <input type="number" class="form-control" id="cursos_professor" name="cursos_professor" required>
  <button type="submit" class="btn btn-primary" style="margin-top:50px">Cadastrar Professor</button>
  </div>
</form>
</body>
</html>
