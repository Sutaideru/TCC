<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome_professor = mysqli_real_escape_string($connection, $_POST["nome_professor"]);
    $competencias_professor = (int)$_POST["competencias_professor"];
    $turnos_professor = mysqli_real_escape_string($connection, $_POST["turnos_professor"]);
    $cursos_professor = (int)$_POST["cursos_professor"];
    
    // SQL para inserir o professor na tabela
    $sql = "INSERT INTO professores (nome_professor, competencias_professor, turnos_professor, cursos_professor) 
            VALUES ('$nome_professor', $competencias_professor, '$turnos_professor', $cursos_professor)";
    
    if (mysqli_query($conection, $sql)) {
        echo "<script>
                alert('Professor cadastrado com sucesso!');
                window.location.href = 'prof_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar professor: " . mysqli_error($conection) . "');
                window.location.href = 'prof_add.php';
              </script>";
    }
}

mysqli_close($conection);
?>

