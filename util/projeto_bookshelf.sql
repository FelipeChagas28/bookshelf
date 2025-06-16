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
    cpf_vendas VARCHAR(14), -- Não sei se precisa desse
    data_venda DATE,
    quantidade INT NOT NULL,
    livro_id BIGINT UNSIGNED NOT NULL,
    forma_pagamento_id INT UNSIGNED NOT NULL,
    cliente_id BIGINT UNSIGNED NOT NULL,
    
    FOREIGN KEY (cliente_id) REFERENCES usuarios (id_usuario),
    FOREIGN KEY (forma_pagamento_id) REFERENCES formas_pagamentos (id_usuario),
    FOREIGN KEY (livro_id) REFERENCES produtos (id_usuario),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

SELECT 
    v.id_usuario AS id_venda,
    u.nome,
    v.cpf_vendas,
    v.data_venda,
    v.quantidade,
    p.nome_livro,
    p.preco,
    v.created_at
FROM vendas v
INNER JOIN produtos p ON v.livro_id = p.id_usuario
INNER JOIN usuarios u ON v.cliente_id = u.id_usuario
WHERE v.deleted_at IS NULL;








