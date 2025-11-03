<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_uc = mysqli_real_escape_string($connection, $_POST["nome_uc"]);
    $turnos_uc = mysqli_real_escape_string($connection, $_POST["turnos_uc"]);
    $carga_total = mysqli_real_escape_string($connection, $_POST["carga_horaria_total_uc"]);
    $carga_dia = mysqli_real_escape_string($connection, $_POST["carga_horaria_dia_uc"]);
    $sigla_uc = mysqli_real_escape_string($connection, $_POST["sigla_uc"]);
    $curso_modulo_uc = mysqli_real_escape_string($connection, $_POST["curso_modulo_uc"]);
    $local = mysqli_real_escape_string($connection, $_POST["local"]);

    $sql = "INSERT INTO unidadescurriculares 
                (nome_uc, turnos_uc, carga_horaria_total_uc, carga_horaria_dia_uc, sigla_uc, curso_modulo_uc, local)
            VALUES 
                ('$nome_uc', '$turnos_uc', '$carga_total', '$carga_dia', '$sigla_uc', '$curso_modulo_uc', '$local')";

    if (mysqli_query($connection, $sql)) {
        echo "<script>
                alert('UC cadastrada com sucesso!');
                window.location.href = 'uc_add.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar UC: " . mysqli_error($connection) . "');
                window.location.href = 'uc_add.php';
              </script>";
    }
}

mysqli_close($connection);
?>
