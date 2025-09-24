<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = (int)$_POST["matricula"];
    $idcurso = (int)$_POST["idcurso"];
    $idcompetencia = (int)$_POST["idcompetencia"];
    $turnos = mysqli_real_escape_string($connection, $_POST["turnos"]);
    
    $check_professor = "SELECT matricula FROM professores WHERE matricula = $matricula";
    $check_curso = "SELECT idcurso FROM cursos WHERE idcurso = $idcurso";
    $check_competencia = "SELECT idcompetencia FROM competencias WHERE idcompetencia = $idcompetencia";
    
    $professor_exists = mysqli_query($connection, $check_professor);
    $curso_exists = mysqli_query($connection, $check_curso);
    $competencia_exists = mysqli_query($connection, $check_competencia);
    
    if(mysqli_num_rows($professor_exists) == 0){
        echo "<script>
                alert('Erro: Professor não existe!');
                window.location.href = 'relacao_add.php';
              </script>";
        exit;
    }
    
    if(mysqli_num_rows($curso_exists) == 0){
        echo "<script>
                alert('Erro: Curso não existe!');
                window.location.href = 'relacao_add.php';
              </script>";
        exit;
    }
    
    if(mysqli_num_rows($competencia_exists) == 0){
        echo "<script>
                alert('Erro: Competência não existe!');
                window.location.href = 'relacao_add.php';
              </script>";
        exit;
    }
    
    $sql = "INSERT INTO relacoes (matricula, idcurso, idcompetencia, turnos) 
            VALUES ($matricula, $idcurso, $idcompetencia, '$turnos')";
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('Relação criada com sucesso!');
                window.location.href = 'relacao_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao criar relação: " . mysqli_error($connection) . "');
                window.location.href = 'relacao_add.php';
              </script>";
    }
}

mysqli_close($connection);
?>
