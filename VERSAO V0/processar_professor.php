<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($connection, $_POST["nome"]);
    $turnos = mysqli_real_escape_string($connection, $_POST["turnos"]);
    
    $sql = "INSERT INTO professores (nome, turnos) VALUES ('$nome', '$turnos')";
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('Professor cadastrado com sucesso!');
                window.location.href = 'prof_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar professor: " . mysqli_error($connection) . "');
                window.location.href = 'prof_add.php';
              </script>";
    }
}

mysqli_close($connection);
?>
