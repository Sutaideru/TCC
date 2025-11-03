-- phpMyAdmin SQL Dump
-- version 5.2.0
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Out-2025 às 12:22
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

-- Banco de dados: `agendada`

-- --------------------------------------------------------
-- Tabela: competencias
-- --------------------------------------------------------
DROP TABLE IF EXISTS `competencias`;
CREATE TABLE IF NOT EXISTS `competencias` (
  `IDcompetencia` INT NOT NULL AUTO_INCREMENT,
  `nome_competencia` VARCHAR(255) NOT NULL,
  `carga_horaria` INT NOT NULL,
  PRIMARY KEY (`IDcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabela: unidadescurriculares
-- --------------------------------------------------------
DROP TABLE IF EXISTS `unidadescurriculares`;
CREATE TABLE IF NOT EXISTS `unidadescurriculares` (
  `IDuc` INT NOT NULL AUTO_INCREMENT,
  `nome_uc` VARCHAR(255) NOT NULL,
  `turnos_uc` ENUM('M','T','N','MT','MN','TN','MTN') NOT NULL,
  `carga_horaria_total_uc` INT NOT NULL,
  `carga_horaria_dia_uc` INT NOT NULL,
  `sigla_uc` VARCHAR(255) NOT NULL,
  `curso_modulo_uc` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`IDuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabela: professores
-- --------------------------------------------------------
DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `matricula` INT NOT NULL,
  `nome_professor` VARCHAR(255) NOT NULL,
  `turnos_professor` ENUM('M','T','N','MT','MN','TN','MTN') NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabela: relacoes
-- --------------------------------------------------------
DROP TABLE IF EXISTS `relacoes`;
CREATE TABLE IF NOT EXISTS `relacoes` (
  `IDrelacao` INT NOT NULL AUTO_INCREMENT,
  `matricula` INT NOT NULL,
  `IDuc` INT NOT NULL,
  `IDcompetencia` INT NOT NULL,
  `turnos` ENUM('M','T','N','MT','MN','TN','MTN') NOT NULL,
  PRIMARY KEY (`IDrelacao`),
  KEY `fk_matricula` (`matricula`),
  KEY `fk_IDuc` (`IDuc`),
  KEY `fk_IDcompetencia` (`IDcompetencia`),
  CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_IDuc` FOREIGN KEY (`IDuc`) REFERENCES `unidadescurriculares` (`IDuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_IDcompetencia` FOREIGN KEY (`IDcompetencia`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabela: users
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usuario` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de usuário padrão
INSERT INTO `users` (`usuario`, `senha`) VALUES
('admin', '$2b$12$ifZubrBvvrl83xmLWN1t4OdXzVPgbBNeWkd6vLtPgxAFQVGSCVUTe');

COMMIT;

 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
