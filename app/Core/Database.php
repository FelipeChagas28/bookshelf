<?php

namespace App\core;

//importa a classe do PDO (Gestão de BD com OO)
use PDO;

//importa a classe do PDO para tratamento de erros
use PDOException;

class Database {
    public static function conectar() {
        $host = 'localhost'; // endereço do servidor de BD
        
        // MUDAR PARA 3306 QUANDO TIVER NO PC DA FATEC
        $porta = '3307'; // Porta do servidor de BD

        $banco = 'projeto_bookshelf'; // Nome do banco de dados
        $usuario = 'root'; //usuario padrão XAMPP
        $senha = ''; //sistema padrão do XAMPP

        //cria a string de conexão com o banco de dados
        $dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4";

        //tenta executar um determinado código
        try{
            return new PDO($dsn, $usuario, $senha, [
                //ativa o modo de erro do PDO
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //define o modo de busca padrão como associativo
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch(PDOException $e) {
            // se ocorrer um erro, exibe uma mensagem de erro
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
}