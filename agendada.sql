-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2025 at 01:37 PM
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
  `IDcompetencia` int NOT NULL AUTO_INCREMENT,
  `nomecompetencia` varchar(255) NOT NULL,
  `cargahor` int NOT NULL,
  `profess` int NOT NULL,
  `cursos` int NOT NULL,
  PRIMARY KEY (`IDcompetencia`),
  KEY `profess` (`profess`),
  KEY `cursos` (`cursos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `IDcurso` int NOT NULL AUTO_INCREMENT,
  `nomecurso` varchar(255) NOT NULL,
  `turnos` int NOT NULL,
  `profes` int NOT NULL,
  `compet` int NOT NULL,
  PRIMARY KEY (`IDcurso`),
  KEY `profes` (`profes`),
  KEY `compet` (`compet`)
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
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nomeprof` varchar(255) NOT NULL,
  `curs` int NOT NULL,
  `turns` int NOT NULL,
  `competen` int NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `curs` (`curs`),
  KEY `competen` (`competen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `cursos` FOREIGN KEY (`cursos`) REFERENCES `curso` (`IDcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profess` FOREIGN KEY (`profess`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `compet` FOREIGN KEY (`compet`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profes` FOREIGN KEY (`profes`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `competen` FOREIGN KEY (`competen`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curs` FOREIGN KEY (`curs`) REFERENCES `curso` (`IDcurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
