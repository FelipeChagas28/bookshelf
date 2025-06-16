INSERT INTO
    usuarios (
        id_usuario,
        nome,
        cpf,
        data_nascimento,
        celular,
        rua,
        numero,
        complemento,
        bairro,
        cidade,
        cep,
        estado,
        email,
        tipo,
        senha,
        created_at,
        updated_at,
        deleted_at
    )
VALUES
    (
        NULL,
        'Felipe Chagas',
        '12345678910123',
        '2003-06-28',
        '14562565485',
        'Rua fracisco gruta ',
        '58',
        NULL,
        'brinca',
        'Jau',
        '4654451',
        'SP',
        'felipe@gmail.com',
        '',
        '94865489654896496123asdf',
        current_timestamp(),
        current_timestamp(),
        NULL
    );

INSERT INTO
    produtos (
        id_usuario,
        nome_livro,
        descricao_livro,
        preco,
        qtde_estoque,
        created_at,
        updated_at,
        deleted_at
    )
VALUES
    (
        NULL,
        'Harry Potter',
        'Bruxaria sinistra',
        '45',
        '4',
        current_timestamp(),
        current_timestamp(),
        NULL
    );

INSERT INTO
    formas_pagamentos (descricao, taxa, desconto)
VALUES
    ('Dinheiro', 0.000, 0.10),
    ('Cartão de Crédito', 0.050, 0.000),
    ('PIX', 0.000, 0.020),
    ('Cartão de Débito', 0.015, 0.000);

-- Insert vendas
INSERT INTO
    vendas (
        cpf_vendas,
        data_venda,
        quantidade,
        livro_id,
        forma_pagamento_id,
        cliente_id
    )
VALUES
    ('123.456.789-00', '2025-06-13', 6, 6, 1, 12);

INSERT INTO
    vendas (
        cpf_vendas,
        data_venda,
        quantidade,
        livro_id,
        forma_pagamento_id,
        cliente_id
    )
VALUES
    ('123.456.789-00', '2025-06-13', 2, 6, 2, 11);