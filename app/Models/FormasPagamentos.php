<?php

//informa em qual área de mamória vai ficar alocado
namespace App\Models;

//importa o arquivo do BD para ser utilizado nesta class.
use App\core\Database;

//importa a classe do BD do php
use PDO;
use PDOException;

//Função q criei para chamar as formas de pagamento
class FormasPagamentos
{
    //Busca todas as formas de pagamentos
    public static function buscarTodos()
    {
        //inicia a conexão com o BD
        $pdo = Database::conectar();

        //monta o script SQL de consulta
        $sql = "SELECT * FROM formas_pagamentos WHERE deleted_at IS NULL";

        //Retorna o resultado do script SQL
        return $pdo->query($sql)->fetchALL();
    }
}
