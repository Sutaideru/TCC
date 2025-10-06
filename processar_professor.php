<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $matricula = mysqli_real_escape_string($connection, $_POST["matricula"]);
    $nome_professor = mysqli_real_escape_string($connection, $_POST["nome_professor"]);
    $turnos_professor = mysqli_real_escape_string($connection, $_POST["turnos_professor"]);
    
    // SQL para inserir o professor na tabela
    $sql = "INSERT INTO professores (matricula, nome_professor, turnos_professor) 
            VALUES ('$matricula', '$nome_professor', '$turnos_professor')";
    
    if (mysqli_query($connection, $sql)) {
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

