<?php

//não precisa iniciar a sessão, pois este arquivo vem pelo Index.php
namespace App\Controllers;

// Importa o Model para ser utilizado
use App\Models\Auth;

class AuthController
{
    public function login()
    {
        $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        $erros = [];
        if (empty($usuario)) {
            $erros[] = "O campo de E-mail e obrigatorio!";
        }
        if (empty($senha)) {
            $erros[] = "O campo de senha e obrigatorio!";
        }

        if (!empty($erros)) {
            //Envia os erros para a pagina de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados ja informados para serem incluidos.
            $_SESSION['dados'] = $usuario;

            ///print_r($erros); exit();
            //retorna para a pagina de cadastro
            header('Location: /entrar');
        } else {
            if (Auth::login($usuario, $senha)) {
                header('Location: /dashboard');
            } else {
                $_SESSION['erros'] = ['Usuario e/ou senha invalidas!'];
                header('location: /entrar');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_tipo']);

        session_destroy(); //Apaga completamente a sessao
        session_start();

        header('Location: /entrar');
        
    }
}
