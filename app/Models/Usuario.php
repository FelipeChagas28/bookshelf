<?php

//informa em qual área de mamória vai ficar alocado
namespace App\Models;

//importa o arquivo do BD para ser utilizado nesta class.
use App\core\Database;

//importa a classe do BD do php
use PDO;
use PDOException;

class Usuario
{
    //Busca todos os usuários
    public static function buscarTodos()
    {
        //inicia a conexão com o BD
        $pdo = Database::conectar();

        //monta o script SQL de consulta
        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL";
        //Retorna o resultado do script SQL
        return $pdo->query($sql)->fetchALL();
    }

    public static function buscarUm($id)
    {

        //inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL AND id_usuario = :id";

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
            $senha = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (nome, cpf, data_nascimento, celular, rua, numero, complemento, bairro, cidade, cep, estado, email, tipo, senha) ";
            $sql .= "VALUES (:nome, :cpf, :data_nascimento, :celular, :rua, :numero, :complemento, :bairro, :cidade, :cep, :estado, :email, :tipo, :senha)";

            //prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

            
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

            $sql = "UPDATE usuarios SET ";
            $sql .= " nome = :nome,";
            $sql .= " cpf = :cpf,";
            $sql .= " data_nascimento = :data_nascimento,";
            $sql .= " celular = :celular,";
            $sql .= " rua = :rua,";
            $sql .= " numero = :numero,";
            $sql .= " complemento = :complemento,";
            $sql .= " bairro = :bairro,";
            $sql .= " cidade = :cidade,";
            $sql .= " cep = :cep,";
            $sql .= " estado = :estado,";
            $sql .= " email = :email,";
            $sql .= " tipo = :tipo";

            $sql .= " WHERE id_usuario = :id;";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);

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

        $sql = "UPDATE usuarios SET deleted_at = NOW() WHERE id_usuario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function deletarFisico($id){
        $pdo = Database::conectar();

        $sql = "DELETE FROM usuarios WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
