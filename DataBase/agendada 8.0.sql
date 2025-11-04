-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Nov-2025 às 14:06
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
  `nome_competencia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `carga_horaria` int NOT NULL,
  PRIMARY KEY (`IDcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Tutorial 1', '#FFD700', '2025-11-16 00:50:00', '2025-11-16 19:00:00'),
(2, 'Tutorial 2', '#0071c5', '2025-11-18 10:00:00', '2025-11-18 13:00:00'),
(3, 'Tutorial 3', '#40e0d0', '2025-11-20 20:08:00', '2025-11-20 21:00:00'),
(4, 'Tutorial 4', '#FFD700', '2025-11-23 17:30:00', '2025-11-23 18:00:00'),
(5, 'Tutorial 5', '#40e0d0', '2025-11-25 12:00:00', '2025-11-26 12:30:00'),
(6, 'Tutorial 6', '#0071c5', '2025-11-27 06:00:00', '2025-11-28 12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `matricula` int NOT NULL,
  `nome_professor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `turnos_professor` enum('M','T','N','MT','MN','TN','MTN') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacoes`
--

DROP TABLE IF EXISTS `relacoes`;
CREATE TABLE IF NOT EXISTS `relacoes` (
  `IDrelacao` int NOT NULL AUTO_INCREMENT,
  `matricula` int NOT NULL,
  `IDuc` int NOT NULL,
  `IDcompetencia` int NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN','MTN') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDrelacao`),
  KEY `fk_matricula` (`matricula`),
  KEY `fk_IDuc` (`IDuc`),
  KEY `fk_IDcompetencia` (`IDcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidadescurriculares`
--

DROP TABLE IF EXISTS `unidadescurriculares`;
CREATE TABLE IF NOT EXISTS `unidadescurriculares` (
  `IDuc` int NOT NULL AUTO_INCREMENT,
  `nome_uc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `turnos_uc` enum('M','T','N','MT','MN','TN','MTN') COLLATE utf8mb4_general_ci NOT NULL,
  `carga_horaria_total_uc` int NOT NULL,
  `carga_horaria_dia_uc` int NOT NULL,
  `sigla_uc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `curso_modulo_uc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`usuario`, `senha`) VALUES
('admin', '$2b$12$ifZubrBvvrl83xmLWN1t4OdXzVPgbBNeWkd6vLtPgxAFQVGSCVUTe');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `relacoes`
--
ALTER TABLE `relacoes`
  ADD CONSTRAINT `fk_IDcompetencia` FOREIGN KEY (`IDcompetencia`) REFERENCES `competencias` (`IDcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IDuc` FOREIGN KEY (`IDuc`) REFERENCES `unidadescurriculares` (`IDuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
