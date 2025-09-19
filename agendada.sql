-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Set-2025 às 11:37
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
  `IDcomp` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargaHr` int NOT NULL,
  `profes` int NOT NULL,
  `curso` int NOT NULL,
  PRIMARY KEY (`IDcomp`),
  KEY `idx_profe` (`profes`),
  KEY `idx_cursos` (`curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `competencias`
--

INSERT INTO `competencias` (`IDcomp`, `nome`, `cargaHr`, `profes`, `curso`) VALUES
(24, 'Drible', 120, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `IDcurso` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `turnos` int NOT NULL,
  `profe` int NOT NULL,
  `compets` int NOT NULL,
  PRIMARY KEY (`IDcurso`),
  KEY `idx_profe` (`profe`),
  KEY `idx_comps` (`compets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`IDcurso`, `nome`, `turnos`, `profe`, `compets`) VALUES
(45, 'Arte da Bola', 12, 0, 0);

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

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`usuario`, `senha`) VALUES
('Vampp', 'vempeta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `matricula` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `turnos` int NOT NULL,
  `cursos` int NOT NULL,
  `comps` int NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `idx_curso` (`cursos`),
  KEY `idx_comps` (`comps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`matricula`, `nome`, `turnos`, `cursos`, `comps`) VALUES
(2134561, 'Vampeta', 12, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
