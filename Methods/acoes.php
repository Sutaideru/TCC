<?php
session_start();
require 'conexao.php';

if (isset($_POST['update_usuario'])){
    $usuario_id = mysqli_real_escape_string($connection, $_POST['usuario_id']);

    $matricula = mysqli_real_escape_string($connection, trim($_POST['matricula']));
    $nome_professor = mysqli_real_escape_string($connection, trim($_POST['nome_professor']));
    $turnos_professor = mysqli_real_escape_string($connection, trim($_POST['turnos_professor']));

    $sql = "UPDATE professores SET matricula = '$matricula', nome_professor = '$nome_professor', turnos_professor = '$turnos_professor' WHERE matricula = '$usuario_id'";

    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['mensagem'] = 'Professor atualizado com sucesso';
        header('Location: prof_add.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar professor';
        header('Location: prof_add.php');
        exit;
    }
}

if (isset($_POST['delete_professor'])){
    $professor_id = mysqli_real_escape_string($connection, $_POST['delete_professor']);

    $sql =  "DELETE FROM professores WHERE matricula = '$professor_id'";
    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['mensagem'] = 'Professor deletado com sucesso';
        header('Location: prof_add.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao deletar professor';
        header('Location: prof_add.php');
        exit;
    }
}

if (isset($_POST['update_uc'])){
    $uc_id = mysqli_real_escape_string($connection, $_POST['uc_id']);

    $nome_curso = mysqli_real_escape_string($connection, trim($_POST['nome_curso']));
    $turnos_curso = mysqli_real_escape_string($connection, trim($_POST['turnos_curso']));

    $sql = "UPDATE cursos SET nome_curso = '$nome_curso', turnos_curso = '$turnos_curso' WHERE IDcurso = '$uc_id'";

    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['mensagem'] = 'UC atualizada com sucesso';
        header('Location: uc_add.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar UC';
        header('Location: uc_add.php');
        exit;
    }
}


if (isset($_POST['delete_uc'])){
    $uc_id = mysqli_real_escape_string($connection, $_POST['delete_uc']);

    $sql =  "DELETE FROM cursos WHERE IDcurso = '$uc_id'";
    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['mensagem'] = 'UC deletada com sucesso';
        header('Location: uc_add.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao deletar UC';
        header('Location: uc_add.php');
        exit;
    }
}
?>