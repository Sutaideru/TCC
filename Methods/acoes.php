<?php
session_start();
require 'conexao.php';

if (isset($_POST['update_usuario'])){
    $usuario_id = mysqli_real_escape_string($connection, $_POST['usuario_id']);
    $matricula = mysqli_real_escape_string($connection, trim($_POST['matricula']));
    $nome_professor = mysqli_real_escape_string($connection, trim($_POST['nome_professor']));
    $turnos_professor = mysqli_real_escape_string($connection, trim($_POST['turnos_professor']));

    $sql = "UPDATE professores 
            SET matricula = '$matricula', nome_professor = '$nome_professor', turnos_professor = '$turnos_professor' 
            WHERE matricula = '$usuario_id'";
    mysqli_query($connection, $sql);

    $_SESSION['mensagem'] = (mysqli_affected_rows($connection) > 0)
        ? 'Professor atualizado com sucesso'
        : 'Erro ao atualizar professor';
    header('Location: prof_add.php');
    exit;
}

if (isset($_POST['delete_professor'])){
    $professor_id = mysqli_real_escape_string($connection, $_POST['delete_professor']);
    mysqli_query($connection, "DELETE FROM professores WHERE matricula = '$professor_id'");
    $_SESSION['mensagem'] = (mysqli_affected_rows($connection) > 0)
        ? 'Professor deletado com sucesso'
        : 'Erro ao deletar professor';
    header('Location: prof_add.php');
    exit;
}

if (isset($_POST['update_uc'])){
    $uc_id = mysqli_real_escape_string($connection, $_POST['uc_id']);
    $nome_uc = mysqli_real_escape_string($connection, trim($_POST['nome_uc']));
    $turnos_uc = mysqli_real_escape_string($connection, trim($_POST['turnos_uc']));
    $carga_total = mysqli_real_escape_string($connection, trim($_POST['carga_horaria_total_uc']));
    $carga_dia = mysqli_real_escape_string($connection, trim($_POST['carga_horaria_dia_uc']));
    $sigla = mysqli_real_escape_string($connection, trim($_POST['sigla_uc']));
    $curso_modulo = mysqli_real_escape_string($connection, trim($_POST['curso_modulo_uc']));
    $local = mysqli_real_escape_string($connection, trim($_POST['local']));

    $sql = "UPDATE unidadescurriculares 
            SET nome_uc = '$nome_uc', turnos_uc = '$turnos_uc',
                carga_horaria_total_uc = '$carga_total', carga_horaria_dia_uc = '$carga_dia',
                sigla_uc = '$sigla', curso_modulo_uc = '$curso_modulo', local = '$local'
            WHERE IDuc = '$uc_id'";
    mysqli_query($connection, $sql);

    $_SESSION['mensagem'] = (mysqli_affected_rows($connection) > 0)
        ? 'UC atualizada com sucesso'
        : 'Erro ao atualizar UC';
    header('Location: uc_add.php');
    exit;
}

if (isset($_POST['delete_uc'])){
    $uc_id = mysqli_real_escape_string($connection, $_POST['delete_uc']);
    mysqli_query($connection, "DELETE FROM unidadescurriculares WHERE IDuc = '$uc_id'");
    $_SESSION['mensagem'] = (mysqli_affected_rows($connection) > 0)
        ? 'UC deletada com sucesso'
        : 'Erro ao deletar UC';
    header('Location: uc_add.php');
    exit;
}
?>
