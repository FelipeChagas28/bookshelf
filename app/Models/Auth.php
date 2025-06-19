<?php

//informa em qual área de mamória vai ficar alocado
namespace App\Models;

//importa o arquivo do BD para ser utilizado nesta class.
use App\core\Database;

//importa a classe do BD do php
use PDO;
use PDOException;

class Auth
{
    public static function login($usuario, $senha)
    {
        //inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL AND email = :email LIMIT 1";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $usuario, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if (session_start() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            return true;
        }
        return false;
    }
}
