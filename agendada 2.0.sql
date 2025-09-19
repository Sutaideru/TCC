-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2025 at 12:27 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendada`
--

-- --------------------------------------------------------

--
-- Table structure for table `competencias`
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

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
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

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professores`
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
-- Constraints for dumped tables
--

--
-- Constraints for table `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `curs` FOREIGN KEY (`curso`) REFERENCES `cursos` (`IDcurso`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `profs` FOREIGN KEY (`profes`) REFERENCES `professores` (`matricula`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `compet` FOREIGN KEY (`compets`) REFERENCES `competencias` (`IDcomp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profes` FOREIGN KEY (`profe`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `comp` FOREIGN KEY (`comps`) REFERENCES `competencias` (`IDcomp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos` FOREIGN KEY (`cursos`) REFERENCES `cursos` (`IDcurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
