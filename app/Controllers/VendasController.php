<?php
//não precisa iniciar a sessão, pois este arquivo vem pelo Index.php
namespace App\Controllers;

// Importa o Model para ser utilizado
use App\Models\Vendas;
use App\Models\Produtos;
use App\Models\Usuario;
use App\Models\FormasPagamentos;

class VendasController
{

    // exibe a lista de usuarios
    public function listar()
    {
        //chama a Model de usuario e executa a busca no BD
        $vendas = Vendas::buscarTodos();


        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/vendas/listagem-vendas.php', [
            'title' => 'Listar - Bookshelf',
            "vendas" => $vendas
        ]);
    }

    //tentativa de fazer uma função para mostrar


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


    //Pegando os dados dos Models e enviando para o formulário de vendas exibir no inner join.
    public function novo()
    {
        //Chamando a função produtos de models
        $produtos = Produtos::buscarTodos();
        $usuarios = Usuario::buscarTodos();
        $vendas = Vendas::buscarTodos();
        $formasPagamento = FormasPagamentos::buscarTodos();
        render('/vendas/form-vendas.php', [
            'title' => 'Formulario vendas - Bookshelf',
            'produtos' => $produtos,
            'usuarios' => $usuarios,
            'formasPagamento' => $formasPagamento,
            'vendas' => $vendas
        ]);
    }

    // Salva uma nova venda no BD
    public function salvar()
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'cliente_id' => filter_input(INPUT_POST, 'cliente_id', FILTER_SANITIZE_SPECIAL_CHARS),
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
            $_SESSION['mensagem'] = "Venda para: " . $dados['cliente_id'] . ", cadastrado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    public function editar($id)
    {
        $dados = Vendas::buscarUm($id); //$dados recebe a função buscarUm($id)
        $usuarios = Usuario::buscarTodos(); //Buscando todas as infos dos nomes em usuarios
        $produtos = Produtos::buscarTodos();
        $formasPagamento = FormasPagamentos::buscarTodos();
        //print_r($dados); exit();
        render('/vendas/form-vendas.php', [
            'title' => 'Alterar venda - Bookshelf',
            'usuarios' => $usuarios,
            'produtos' => $produtos,
            'formasPagamento' => $formasPagamento,
            "dados" => $dados
            
            
        ]);
    }

    public function atualizar($id)
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'cliente_id' => filter_input(INPUT_POST, 'cliente_id', FILTER_SANITIZE_SPECIAL_CHARS),
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
            $_SESSION['mensagem'] = "Venda para: " . $dados['cliente_id'] . ", alterado com sucesso!";
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

        /* 
        //validação do nome
        if (empty($dados['cliente_id'])) {
            $erros[] = "O nome do cliente é obrigatório!";
        } else if (strlen($dados['cliente_id']) < 3) {
            $erros[] = "O nome deve ter pelo menos 3 caracteres.";
        }
*/
        return $erros;
    }
}
