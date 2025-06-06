<?php

//informa em qual área de mamória vai ficar alocado
namespace App\Models;

//importa o arquivo do BD para ser utilizado nesta class.
use App\core\Database;

//importa a classe do BD do php
use PDO;
use PDOException;

class Produtos
{
    //Busca todos os usuários
    public static function buscarTodos()
    {
        //inicia a conexão com o BD
        $pdo = Database::conectar();

        //monta o script SQL de consulta
        $sql = "SELECT * FROM produtos WHERE deleted_at IS NULL";

        //Retorna o resultado do script SQL
        return $pdo->query($sql)->fetchALL();
    }

    public static function buscarUm($id)
    {

        //inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT * FROM produtos WHERE deleted_at IS NULL AND id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    //Salva um usuario no BD com os dados da View
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            //criptografa a senha do usuario antes de salvar 
            //$senha = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO produtos (nome_livro, descricao_livro, preco, qtde_estoque) ";
            $sql .= "VALUES (:nome_livro, :descricao_livro, :preco, :qtde_estoque)";

            //prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome_livro', $dados['nome_livro'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao_livro', $dados['descricao_livro'], PDO::PARAM_STR);
            $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);

            //qtde_estoque pode ser que o PARAM seja INT?
            $stmt->bindParam(':qtde_estoque', $dados['qtde_estoque'], PDO::PARAM_STR);


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

            $sql = "UPDATE produtos SET ";
            $sql .= " nome_livro = :nome_livro,";
            $sql .= " descricao_livro = :descricao_livro,";
            $sql .= " preco = :preco,";
            $sql .= " qtde_estoque = :qtde_estoque";

            $sql .= " WHERE id_usuario = :id;";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome_livro', $dados['nome_livro'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao_livro', $dados['descricao_livro'], PDO::PARAM_STR);
            $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':qtde_estoque', $dados['qtde_estoque'], PDO::PARAM_STR);


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

        $sql = "UPDATE produtos SET deleted_at = NOW() WHERE id_usuario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function deletarFisico($id)
    {
        $pdo = Database::conectar();

        $sql = "DELETE FROM produtos WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
