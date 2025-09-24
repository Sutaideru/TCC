<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($connection, $_POST["nome"]);
    $turnos = mysqli_real_escape_string($connection, $_POST["turnos"]);
    
    $sql = "INSERT INTO cursos (nome, turnos) VALUES ('$nome', '$turnos')";
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('Curso cadastrado com sucesso!');
                window.location.href = 'curso_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar curso: " . mysqli_error($connection) . "');
                window.location.href = 'curso_add.php';
              </script>";
    }
}

mysqli_close($connection);
?>
