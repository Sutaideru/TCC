<?php

    include("conexao.php");
    // Table professores
    $matricula = ["matricula"];
    $nome_professor = $_POST["nome_professor"];
    $turnos_professor = $_POST["turnos_professor"];
    //Tabela competências
    $IDcompetencia = $_POST["IDcompetencia"];
    $nome_competencia = $_POST["nome_competencia"];
    $carga_horaria = $_POST["carga_horaria"];
    // Tabela cursos
    $IDcurso = ["IDcurso"];
    $nome_curso = ["nome_curso"];
    $turnos_curso = ["turnos_curso"];
    // Tabela login
    $usuario = ["usuario"];
    $senha = ["senha"];
    // Tabela relações
    $IDrelacao = ["IDrelacao"];
    $turnos = ["turnos"]
?>

