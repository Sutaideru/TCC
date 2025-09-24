<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Table professores
    $nome_professor = $_POST["nome_professor"];
    $turnos_professor = $_POST["turnos_professor"];
    $cursos_professor = $_POST["cursos_professor"];
    $competencias_professor = $_POST["competencias_professor"];
    
    // Tabela competências
    $nome_competencia = $_POST["nome_competencia"];
    $carga_horaria = $_POST["carga_horaria"];
    $professores_competencia = $_POST["professores_competencia"];
    $cursos_competencia = $_POST["cursos_competencia"];
    
    // Tabela cursos
    $nome_curso = $_POST["nome_curso"];
    $turnos_curso = $_POST["turnos_curso"];
    $professores_curso = $_POST["professores_curso"];
    $competencias_curso = $_POST["competencias_curso"];
    
    // Tabela users
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
}
?>
