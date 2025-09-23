<?php

    include("conexao.php");
    // Table professores
    $matricula = ["matricula"]
    $nome_professor = $_POST["nome_professor"];
    $turnos_professor = $_POST["turnos_professor"];
    $cursos_professor = $_POST["cursos_professor"];
    $competencias_professor = $_POST["competencias_professor"]
    //Tabela competências
    $IDcompetencia = $_POST["IDcompetencia"]
    $nome_competencia = $_POST["nome_competencia"]
    $carga_horaria = $_POST["carga_horaria"]
    $professores_competencia = $_POST["professores_competencia"]
    $cursos_competencia = $_POST["cursos_competencia"]
    // Tabela cursos
    $IDcurso = ["IDcurso"]
    $nome_curso = ["nome_curso"]
    $turnos_curso = ["turnos_curso"]
    $professores_curso = ["professores_curso"]
    $competencias_curso = ["competencias_curso"]
    // Tabela login
    $usuario = ["usuario"] 
    $senha = ["senha"]

?>
