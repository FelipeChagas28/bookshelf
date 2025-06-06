<?php

//não precisa iniciar a sessão, pois este arquivo vem pelo Index.php
namespace App\Controllers;

// Importa o Model para ser utilizado
use App\Models\Produtos;

class ProdutosController
{

    // exibe a lista de produtos
    public function listar()
    {
        //chama a Model de produtos e executa a busca no BD
        $produtos = Produtos::buscarTodos();

        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/produtos/listagem-produtos.php', [
            'title' => 'Listar produtos - Bookshelf',
            "produtos" => $produtos
        ]);
    }

    //Função relatorio para a rota relatorio funcionar
    public function relatorio()
    {
        //chama a Model de produtos e executa a busca no BD
        $produtos = Produtos::buscarTodos();

        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/produtos/relatorio-produtos.php', [
            'title' => 'Relatorio produtos - Bookshelf',
            "produtos" => $produtos
        ]);
    }

    //Abre o formulario para criar um usuario
    public function novo()
    {
        render('/produtos/form-produtos.php', ['title' => 'Formulario produtos - Bookshelf']);
    }

    // Salva um novo usuario no BD
    public function salvar()
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome_livro' => filter_input(INPUT_POST, 'nome_livro', FILTER_SANITIZE_SPECIAL_CHARS),
            'descricao_livro' => filter_input(INPUT_POST, 'descricao_livro', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'qtde_estoque' => filter_input(INPUT_POST, 'qtde_estoque', FILTER_SANITIZE_SPECIAL_CHARS),

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
            header('Location: /produtos/novo');
        } else {
            // Chama o Model passando os dados
            Produtos::salvar($dados);
            $_SESSION['mensagem'] = "Livro: " . $dados['nome_livro'] . ", cadastrado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /produtos');
        }
    }

    public function editar($id)
    {
        $dados = Produtos::buscarUm($id);
        //print_r($dados); exit();
        render('/produtos/form-produtos.php', [
            'title' => 'Alterar produto - Bookshelf',
            "dados" => $dados
        ]);
    }

    public function atualizar($id)
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome_livro' => filter_input(INPUT_POST, 'nome_livro', FILTER_SANITIZE_SPECIAL_CHARS),
            'descricao_livro' => filter_input(INPUT_POST, 'descricao_livro', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'qtde_estoque' => filter_input(INPUT_POST, 'qtde_estoque', FILTER_SANITIZE_SPECIAL_CHARS),
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
            header('Location: /produtos/' . $id . '/editar');
        } else {
            // Chama o Model passando os dados

            Produtos::atualizar($dados);
            $_SESSION['mensagem'] = "Produto: " . $dados['nome_livro'] . ", alterado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /produtos');
        }
    }




    //Apenas coloca a data de exclusão no BD
    public function deletelogico($id)
    {

        Produtos::deletarLogico($id);
        header('Location: /produtos');
    }

    //Exclúi definitivamente o registro da tabela
    public function deleteFisico($id)
    {

        Produtos::deletarFisico($id);
        header('Location: /produtos');
    }

    //implementando a validação e sanitização dos dados do form (limpeza e segurança)
    public function validar($dados)
    {
        $erros = [];

        //validação do nome do livro
        if (empty($dados['nome_livro'])) {
            $erros[] = "O nome é obrigatório!";
        } else if (strlen($dados['nome_livro']) < 3) {
            $erros[] = "O nome do livro deve ter pelo menos 3 caracteres.";
        }

        return $erros;
    }
}
