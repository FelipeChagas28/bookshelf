<?php

//não precisa iniciar a sessão, pois este arquivo vem pelo Index.php
namespace App\Controllers;

// Importa o Model para ser utilizado
use App\Models\Vendas;

class vendasController
{

    // exibe a lista de usuarios
    public function listar()
    {
        //chama a Model de usuario e executa a busca no BD
        $vendas = Vendas::buscarTodos();

        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/vendas/listagem-vendas.php', [
            'title' => 'Listar vendas - Bookshelf',
            "vendas" => $vendas
        ]);
    }

    //Função relatorio para a rota relatorio funcionar
    public function relatorio()
    {
        //chama a Model de produtos e executa a busca no BD
        $vendas = Vendas::buscarTodos();

        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/vendas/relatorio-vendas.php', [
            'title' => 'Relatorio vendas - Bookshelf',
            "vendas" => $vendas
        ]);
    }

    //Abre o formulario para criar um usuario
    public function novo()
    {
        render('/vendas/form-vendas.php', ['title' => 'Formulario vendas - Bookshelf']);
    }

    // Salva um novo usuario no BD
    public function salvar()
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'cliente_vendas' => filter_input(INPUT_POST, 'cliente_vendas', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf_vendas' => filter_input(INPUT_POST, 'cpf_vendas', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => $_POST['data_venda'] ?? '',
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'livro_id' => filter_input(INPUT_POST, 'livro_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento_id' => filter_input(INPUT_POST, 'forma_pagamento_id', FILTER_SANITIZE_SPECIAL_CHARS),

        ];

        //print_r($_POST); exit();
        // Aqui vamos fazer as validações
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            //Envia os erros para a pagina de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados ja informados para serem incluidos.
            $_SESSION['dados'] = $dados;

            ///print_r($erros); exit();
            //retorna para a pagina de cadastro
            header('Location: /vendas/novo');
        } else {
            // Chama o Model passando os dados
            Vendas::salvar($dados);
            $_SESSION['mensagem'] = "Venda para: " . $dados['cliente_vendas'] . ", cadastrada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    public function editar($id)
    {
        $dados = Vendas::buscarUm($id);
        //print_r($dados); exit();
        render('/vendas/form-vendas.php', [
            'title' => 'Alterar venda - Bookshelf',
            "dados" => $dados
        ]);
    }

    public function atualizar($id)
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'cliente_vendas' => filter_input(INPUT_POST, 'cliente_vendas', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf_vendas' => filter_input(INPUT_POST, 'cpf_vendas', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => $_POST['data_venda'] ?? '',
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'livro_id' => filter_input(INPUT_POST, 'livro_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento_id' => filter_input(INPUT_POST, 'forma_pagamento_id', FILTER_SANITIZE_SPECIAL_CHARS),
        ];


        //print_r($_POST); exit();
        // Aqui vamos fazer as validações
        $erros = $this->validar($dados);
        $dados['id_usuario'] = $id;
        if (!empty($erros)) {

            //Envia os erros para a pagina de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados ja informados para serem incluidos.
            $_SESSION['dados'] = $dados;

            ///print_r($erros); exit();
            //retorna para a pagina de cadastro
            header('Location: /vendas/' . $id . '/editar');
        } else {
            // Chama o Model passando os dados

            Vendas::atualizar($dados);
            $_SESSION['mensagem'] = "vendas para: " . $dados['cliente_vendas'] . ", alterada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }




    //Apenas coloca a data de exclusão no BD
    public function deletelogico($id)
    {

        Vendas::deletarLogico($id);
        header('Location: /vendas');
    }

    //Exclúi definitivamente o registro da tabela
    public function deleteFisico($id)
    {

        Vendas::deletarFisico($id);
        header('Location: /vendas');
    }

    //implementando a validação e sanitização dos dados do form (limpeza e segurança)
    public function validar($dados)
    {
        $erros = [];

        //validação do nome do livro
        if (empty($dados['cliente_vendas'])) {
            $erros[] = "O nome do cliente é obrigatório!";
        } else if (strlen($dados['cliente_vendas']) < 3) {
            $erros[] = "O nome do cliente deve ter pelo menos 3 caracteres.";
        }

        return $erros;
    }
}
