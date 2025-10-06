<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome_curso = mysqli_real_escape_string($connection, $_POST["nome_curso"]);
    $turnos_curso = mysqli_real_escape_string($connection, $_POST["turnos_curso"]);
    
    // SQL para inserir o curso na tabela
    $sql = "INSERT INTO cursos (nome_curso, turnos_curso) 
            VALUES ('$nome_curso', '$turnos_curso')";
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('UC cadastrada com sucesso!');
                window.location.href = 'uc_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar UC: " . mysqli_error($conection) . "');
                window.location.href = 'uc_add.php';
              </script>";
    }
}

mysqli_close($conection);
?>

