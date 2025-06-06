CREATE DATABASE IF NOT EXISTS projeto_bookshelf CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

SHOW DATABASES;

USE projeto_bookshelf;

CREATE TABLE usuarios (
	id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14),
    data_nascimento DATE,
    celular VARCHAR(20),
    rua VARCHAR(255),
    numero VARCHAR(255),
    complemento VARCHAR(255),
    bairro VARCHAR(255),
    cidade VARCHAR(255),
    cep VARCHAR(10),
    estado CHAR(2),
    email VARCHAR(255) NOT NULL,
    tipo ENUM('Administrador', 'Funcionário', 'Cliente') NOT NULL,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    deleted_at TIMESTAMP NULL DEFAULT NULL
    
);

CREATE TABLE IF NOT EXISTS formas_pagamentos (
	id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    taxa DECIMAL(4,3), -- Valor em porcentagem a ser aplicado (50% = 0,5), (5% = 0.05)
    desconto DECIMAL(4,3), -- Valor em porcentagem a ser aplicado
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS produtos (

    id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_livro VARCHAR(255),
    descricao_livro VARCHAR(255),
    preco DECIMAL(10,2),
    qtde_estoque INT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS vendas (
    id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cliente_vendas VARCHAR(255) NOT NULL,
    cpf_vendas VARCHAR(14),
    data_venda DATE,
    quantidade INT NOT NULL,
    livro_id BIGINT UNSIGNED NOT NULL,
    forma_pagamento_id INT UNSIGNED NOT NULL,
    
    FOREIGN KEY (forma_pagamento_id) REFERENCES formas_pagamentos (id_usuario),
    FOREIGN KEY (livro_id) REFERENCES produtos (id_usuario),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

SELECT 
    v.id_usuario AS id_venda,
    v.cliente_vendas,
    v.cpf_vendas,
    v.data_venda,
    v.quantidade,
    p.nome_livro,
    p.preco,
    v.created_at
FROM vendas v
INNER JOIN produtos p ON v.livro_id = p.id_usuario;

SELECT  
    v.cliente_vendas,
    v.cpf_vendas,
    p.nome_livro,
    v.quantidade,
    v.data_venda
FROM vendas AS v
INNER JOIN produtos p ON v.livro_id = p.id_usuario
WHERE v.deleted_at IS NULL;






INSERT INTO formas_pagamentos (descricao, taxa, desconto) VALUES 
('Dinheiro', 0.000, 0.10),      -- 5% desconto
('Cartão de Crédito', 0.050, 0.000),  -- 3% taxa
('PIX', 0.000, 0.020),           -- 2% desconto
('Cartão de Débito', 0.015, 0.000);

INSERT INTO vendas (
    cliente_vendas,
    cpf_vendas,
    data_venda,
    quantidade,
    livro_id,
    forma_pagamento_id
) VALUES 
(
    'Maria Silva Santos',
    '123.456.789-01',
    '2024-06-01',
    2,
    5,
    1
);