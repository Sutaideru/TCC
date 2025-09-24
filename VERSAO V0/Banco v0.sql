-- Criação da nova estrutura do banco de dados com 5 tabelas
-- Removendo foreign keys circulares e usando tabela de relacionamento

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Remover tabelas existentes se existirem
DROP TABLE IF EXISTS `relacoes`;
DROP TABLE IF EXISTS `competencias`;
DROP TABLE IF EXISTS `cursos`;
DROP TABLE IF EXISTS `professores`;
DROP TABLE IF EXISTS `users`;

-- Tabela 1: users
CREATE TABLE `users` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela 2: professores
CREATE TABLE `professores` (
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN') NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela 3: cursos
CREATE TABLE `cursos` (
  `idcurso` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turnos` enum('M','T','N','MT','MN','TN') NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela 4: competencias
CREATE TABLE `competencias` (
  `idcompetencia` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cargahoraria` int NOT NULL,
  PRIMARY KEY (`idcompetencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela 5: relacoes (tabela de relacionamento)
CREATE TABLE `relacoes` (
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

-- Adicionando foreign keys para a tabela relacoes
ALTER TABLE `relacoes`
  ADD CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `professores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idcurso` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idcompetencia` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Inserindo dados de exemplo
INSERT INTO `users` (`usuario`, `senha`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), -- senha: password
('professor1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO `professores` (`nome`, `turnos`) VALUES
('João Silva', 'MT'),
('Maria Santos', 'TN'),
('Pedro Oliveira', 'M');

INSERT INTO `cursos` (`nome`, `turnos`) VALUES
('Informática', 'MT'),
('Administração', 'TN'),
('Enfermagem', 'MN');

INSERT INTO `competencias` (`nome`, `cargahoraria`) VALUES
('Programação Web', 80),
('Banco de Dados', 60),
('Gestão de Projetos', 40),
('Anatomia', 120);

INSERT INTO `relacoes` (`matricula`, `idcurso`, `idcompetencia`, `turnos`) VALUES
(1, 1, 1, 'MT'), -- João Silva - Informática - Programação Web
(1, 1, 2, 'MT'), -- João Silva - Informática - Banco de Dados
(2, 2, 3, 'TN'), -- Maria Santos - Administração - Gestão de Projetos
(3, 3, 4, 'M');  -- Pedro Oliveira - Enfermagem - Anatomia

COMMIT;
