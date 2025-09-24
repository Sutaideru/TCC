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
    <script src="scripts.js"></script>
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
  <li class="nav-item">
    <a class="nav-link" href="relacao_add.php" style="color:white;">Criar Relação</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php" style="color:white;">Sair</a>
  </li>
</ul>

<div class="container mt-4">
    <h2>Bem-vindo, <?php echo $_SESSION['user']; ?>!</h2>
    
     Added tables to display data from new structure 
    <div class="row">
        <div class="col-md-6">
            <h3>Professores</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Turnos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM professores";
                    $result = $connection->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['matricula'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['turnos'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-6">
            <h3>Cursos</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Turnos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM cursos";
                    $result = $connection->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['idcurso'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['turnos'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Competências</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Carga Horária</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM competencias";
                    $result = $connection->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['idcompetencia'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['cargahoraria'] . " horas</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-6">
            <h3>Relações Professor-Curso-Competência</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Curso</th>
                        <th>Competência</th>
                        <th>Turnos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT r.*, p.nome as professor_nome, c.nome as curso_nome, comp.nome as competencia_nome 
                            FROM relacoes r 
                            JOIN professores p ON r.matricula = p.matricula 
                            JOIN cursos c ON r.idcurso = c.idcurso 
                            JOIN competencias comp ON r.idcompetencia = comp.idcompetencia";
                    $result = $connection->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['professor_nome'] . "</td>";
                        echo "<td>" . $row['curso_nome'] . "</td>";
                        echo "<td>" . $row['competencia_nome'] . "</td>";
                        echo "<td>" . $row['turnos'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
