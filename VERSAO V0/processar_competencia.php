<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($connection, $_POST["nome"]);
    $cargahoraria = (int)$_POST["cargahoraria"];
    
    $sql = "INSERT INTO competencias (nome, cargahoraria) VALUES ('$nome', $cargahoraria)";
    
    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('Competência cadastrada com sucesso!');
                window.location.href = 'competencia_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar competência: " . mysqli_error($connection) . "');
                window.location.href = 'competencia_add.php';
              </script>";
    }
}

mysqli_close($connection);
?>
