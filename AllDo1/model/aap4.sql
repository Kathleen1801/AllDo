SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Estrutura para tabela `historico`

CREATE TABLE `historico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contratante_email` VARCHAR(255) DEFAULT NULL,
  `contratado_email` VARCHAR(255) DEFAULT NULL,
  `trabalho_id` INT DEFAULT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `status` ENUM('em_andamento','concluido', 'cancelado') DEFAULT 'em_andamento',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estrutura para tabela `trabalhos`

CREATE TABLE `trabalhos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `preco` INT NOT NULL,
  `email_usuario` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Estrutura para tabela `usuarios`

CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` CHAR(13) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `tipo` VARCHAR(20) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `profissao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Estrutura para tabela `contrato`

CREATE TABLE `contratar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `metodo_pagamento` varchar(100) NOT NULL,
  `telefone` CHAR(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



