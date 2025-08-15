-- Criação do banco e tabela
CREATE DATABASE IF NOT EXISTS projeto_crud DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE projeto_crud;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  token_recuperacao VARCHAR(255) NULL,
  data_token DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuário admin inicial (senha: admin123)
INSERT INTO usuarios (nome, email, senha) VALUES
('Administrador', 'admin@exemplo.com', '$2y$10$Yt4k1O9mVZ0aF8gVw8a5sO2m8n8lqk4Q8v7X9XWc7v6m0mQwOqC4.');
-- Observação: o hash acima é um placeholder; você pode recriar com password_hash('admin123', PASSWORD_DEFAULT) no PHP se preferir.