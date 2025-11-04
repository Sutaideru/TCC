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
<title>Cadastro de UC</title>
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
  .container-principal {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    min-height: 100vh;
    padding-top: 120px;
  }
  .retangulo-azul {
    background-color: #0d6efd;
    color: white;
    width: 80%;
    max-width: 900px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    padding: 40px;
    margin-bottom: 50px;
  }
  .retangulo-azul h2 {
    text-align: center;
    font-weight: bold;
    margin-bottom: 30px;
  }
  .form-label { font-weight: 600; }
  .form-control, .form-select { border-radius: 10px; border: none; padding: 10px; }
  .btn-light { background-color: white; color: #0d6efd; border: none; width: 100%; font-weight: 600; border-radius: 10px; padding: 10px; transition: 0.3s; }
  .btn-light:hover { background-color: #f8f9fa; transform: scale(1.03); }
</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-principal">
  <div class="retangulo-azul">
    <h2>Cadastro de UC</h2>
    <form action="processar_uc.php" method="POST" class="mb-4">
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome_uc" class="form-control" placeholder="Digite o nome da UC" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Turnos</label>
        <select name="turnos_uc" class="form-select" required>
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

      <div class="mb-3">
        <label class="form-label">Carga Horária Total</label>
        <input type="number" name="carga_horaria_total_uc" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Carga Horária por Dia</label>
        <input type="number" name="carga_horaria_dia_uc" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Sigla</label>
        <input type="text" name="sigla_uc" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Curso / Módulo</label>
        <input type="text" name="curso_modulo_uc" class="form-control" required>
      </div>

      <div class="mb-5">
        <label class="form-label">Local</label>
        <input type="text" name="local" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-light">Cadastrar UC</button>
    </form>
  </div>
    <div class="table-container mb-0">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>UC</th>
            <th>Turnos</th>
            <th>Carga Horária Total</th>
            <th>Carga Horária Diária</th>
            <th>Sigla</th>
            <th>Curso/Módulo</th>
            <th>Local</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = 'SELECT * FROM unidadescurriculares';
            $ucs = mysqli_query($connection, $sql);
            if (mysqli_num_rows($ucs) > 0){
              foreach ($ucs as $uc){
          ?>
          <tr>
            <td><?= $uc['IDuc'] ?></td>
            <td><?= $uc['nome_uc'] ?></td>
            <td><?= $uc['turnos_uc'] ?></td>
            <td><?= $uc['carga_horaria_total_uc'] ?></td>
            <td><?= $uc['carga_horaria_dia_uc'] ?></td>
            <td><?= $uc['sigla_uc'] ?></td>
            <td><?= $uc['curso_modulo_uc'] ?></td>
            <td><?= $uc['local'] ?></td>
            <td>
              <a href="uc-view.php?IDuc=<?= $uc['IDuc'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
              <a href="uc-edit.php?IDuc=<?= $uc['IDuc'] ?>" class="btn btn-success btn-sm">Editar</a>
              <form action="acoes.php" method="POST" class="d-inline">
                <button type="submit" onclick="return confirm('Certeza que deseja excluir esta UC?')" name="delete_uc" value="<?= $uc['IDuc'] ?>" class="btn btn-danger btn-sm">Excluir</button>
              </form>
            </td>
          </tr>
          <?php
              }
            } else {
              echo "<tr><td colspan='8'><h5>Nenhuma UC encontrada</h5></td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
