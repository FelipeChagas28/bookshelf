<?php

//informa em qual área de mamória vai ficar alocado
namespace App\Models;

//importa o arquivo do BD para ser utilizado nesta class.
use App\core\Database;

//importa a classe do BD do php
use PDO;
use PDOException;

class Vendas
{
    //Busca todos os usuários
    public static function buscarTodos()
    {
        //inicia a conexão com o BD
        $pdo = Database::conectar();

        //monta o script SQL de consulta
        $sql = "SELECT 
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
WHERE v.deleted_at IS NULL";
        //Retorna o resultado do script SQL
        return $pdo->query($sql)->fetchALL();
    }



    public static function buscarUm($id)
    {

        //inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT 
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
WHERE v.deleted_at IS NULL";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Salva uma venda no BD com os dados da View
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            //criptografa a senha do usuario antes de salvar 
            //$senha = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO vendas (cliente_id, cpf_vendas, data_venda, quantidade, livro_id, forma_pagamento_id) ";
            $sql .= "VALUES (:cliente_id, :cpf_vendas, :data_venda, :quantidade, :livro_id, :forma_pagamento_id)";

            //prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':cliente_id', $dados['cliente_id'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf_vendas', $dados['cpf_vendas'], PDO::PARAM_STR);
            $stmt->bindParam(':data_venda', $dados['data_venda']);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
            $stmt->bindParam(':livro_id', $dados['livro_id'], PDO::PARAM_STR);
            $stmt->bindParam(':forma_pagamento_id', $dados['forma_pagamento_id'], PDO::PARAM_STR);

            //demais campos...

            //executa o SQL no Banco de dados
            $stmt->execute();

            //retorna o ID do registro no BD
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    public static function atualizar($dados)
    {
        try {
            $pdo = Database::conectar();

            $sql = "UPDATE vendas SET ";
            $sql .= " cliente_id = :cliente_id,";
            $sql .= " cpf_vendas = :cpf_vendas,";
            $sql .= " data_venda = :data_venda,";
            $sql .= " quantidade = :quantidade,";
            $sql .= " livro_id = :livro_id,";
            $sql .= " forma_pagamento_id = :forma_pagamento_id";

            $sql .= " WHERE id_usuario = :id;";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':cliente_id', $dados['cliente_id'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf_vendas', $dados['cpf_vendas'], PDO::PARAM_STR);
            $stmt->bindParam(':data_venda', $dados['data_venda']);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
            $stmt->bindParam(':livro_id', $dados['livro_id'], PDO::PARAM_STR);
            $stmt->bindParam(':forma_pagamento_id', $dados['forma_pagamento_id'], PDO::PARAM_STR);

            $stmt->bindParam(":id", $dados['id_usuario'], PDO::PARAM_INT);


            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }


    public static function deletarLogico($id)
    {
        $pdo = Database::conectar();

        $sql = "UPDATE vendas SET deleted_at = NOW() WHERE id_usuario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function deletarFisico($id)
    {
        $pdo = Database::conectar();

        $sql = "DELETE FROM vendas WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
