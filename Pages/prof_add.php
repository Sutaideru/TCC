<?php
  include"protect.php";
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
<form action="processar_professor.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome_professor" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Competências</label>
    <input type="number" name="competencias_professor" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Turno</label>
    <input type="text" name="turnos_professor" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Curso</label>
    <input type="number" name="cursos_professor" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar Professor</button>
</form>
</body>
</html>


