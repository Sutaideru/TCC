-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Set-2025 às 10:30
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias`
--

DROP TABLE IF EXISTS `competencias`;
CREATE TABLE IF NOT EXISTS `competencias` (
  `IDcompetencia` int NOT NULL AUTO_INCREMENT,
  `nome_competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `carga_horaria` int NOT NULL,
  `professores_competencia` int NOT NULL,
  `cursos_competencia` int NOT NULL,
  PRIMARY KEY (`IDcompetencia`),
  KEY `profess` (`professores_competencia`),
  KEY `cursos` (`cursos_competencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `IDcurso` int NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `turnos_curso` int NOT NULL,
  `professores_curso` int NOT NULL,
  `competencias_curso` int NOT NULL,
  PRIMARY KEY (`IDcurso`),
  KEY `profes` (`professores_curso`),
  KEY `compet` (`competencias_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nome_professor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cursos_professor` int NOT NULL,
  `turnos_professor` int NOT NULL,
  `competencias_professor` int NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `curs` (`cursos_professor`),
  KEY `competen` (`competencias_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `cursos` FOREIGN KEY (`cursos_competencia`) REFERENCES `curso` (`IDcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profess` FOREIGN KEY (`professores_competencia`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `compet` FOREIGN KEY (`competencias_curso`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profes` FOREIGN KEY (`professores_curso`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `competen` FOREIGN KEY (`competencias_professor`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curs` FOREIGN KEY (`cursos_professor`) REFERENCES `curso` (`IDcurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
