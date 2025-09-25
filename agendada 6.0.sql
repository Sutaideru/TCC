-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Set-2025 às 10:32
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
  `idcompetencia` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cargahoraria` int NOT NULL,
  PRIMARY KEY (`idcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idcurso` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN') NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN') NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacoes`
--

DROP TABLE IF EXISTS `relacoes`;
CREATE TABLE IF NOT EXISTS `relacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricula` int NOT NULL,
  `idcurso` int NOT NULL,
  `idcompetencia` int NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matricula` (`matricula`),
  KEY `fk_idcurso` (`idcurso`),
  KEY `fk_idcompetencia` (`idcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `relacoes`
--
ALTER TABLE `relacoes`
  ADD CONSTRAINT `fk_idcompetencia` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idcurso` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
