<?php
//não precisa iniciar a sessão, pois este arquivo vem pelo Index.php
namespace App\Controllers;

// Importa o Model para ser utilizado
use App\Models\Usuario;

class UsuarioController
{

    // exibe a lista de usuarios
    public function listar()
    {
        //chama a Model de usuario e executa a busca no BD
        $usuarios = Usuario::buscarTodos();

        // exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação
        render('/usuarios/listagem-usuarios.php', [
            'title' => 'Listar - Bookshelf',
            "usuarios" => $usuarios
        ]);
    }

    //Abre o formulario para criar um usuario
    public function novo()
    {
        render('/usuarios/form-usuarios.php', ['title' => 'Formulario - Bookshelf']);
    }

    // Salva um novo usuario no BD
    public function salvar()
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf' => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_nascimento' => $_POST['data_nascimento'] ?? '',
            'celular' => filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_SPECIAL_CHARS),
            'rua' => filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS),
            'numero' => filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS),
            'complemento' => filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS),
            'bairro' => filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS),
            'cidade' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'cep' => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS),
            'estado' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'senha' => $_POST['senha'] ?? null,
            'confirma_senha' => $_POST['confirma_senha'] ?? null,
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
            header('Location: /usuarios/novo');
        } else {
            // Chama o Model passando os dados
            Usuario::salvar($dados);
            $_SESSION['mensagem'] = "Usuario: " . $dados['nome'] . ", cadastrado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /usuarios');
        }
    }

    public function editar($id)
    {
        $dados = Usuario::buscarUm($id);
        //print_r($dados); exit();
        render('/usuarios/form-usuarios.php', [
            'title' => 'Alterar usuario - Bookshelf',
            "dados" => $dados
        ]);
    }

    public function atualizar($id)
    {

        // 1. Sanitização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf' => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_nascimento' => $_POST['data_nascimento'] ?? '',
            'celular' => filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_SPECIAL_CHARS),
            'rua' => filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS),
            'numero' => filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS),
            'complemento' => filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS),
            'bairro' => filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS),
            'cidade' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'cep' => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS),
            'estado' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'senha' => $_POST['senha'] ?? null,
            'confirma_senha' => $_POST['confirma_senha'] ?? null,
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
            header('Location: /usuarios/' . $id . '/editar');
        } else {
            // Chama o Model passando os dados

            Usuario::atualizar($dados);
            $_SESSION['mensagem'] = "Usuario: " . $dados['nome'] . ", alterado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /usuarios');
        }
    }

    //Apenas coloca a data de exclusão no BD
    public function deletelogico($id){

        Usuario::deletarLogico($id);
        header('Location: /usuarios');
    }

    //Exclúi definitivamente o registro da tabela
    public function deleteFisico($id){

        Usuario::deletarFisico($id);
        header('Location: /usuarios');
    }

    //implementando a validação e sanitização dos dados do form (limpeza e segurança)
    public function validar($dados)
    {
        $erros = [];

        //validação do nome
        if (empty($dados['nome'])) {
            $erros[] = "O nome é obrigatório!";
        } else if (strlen($dados['nome']) < 3) {
            $erros[] = "O nome deve ter pelo menos 3 caracteres.";
        }

        //validação da senha
        if (empty($dados['senha'])) {
            $erros[] = "A senha é obrigatória!";
        } else if (strlen($dados['senha']) < 6) {
            $erros[] = "A senha deve ter pelo menos 6 caracteres.";
        }

        //validação do email
        if (empty($dados['email'])) {
            $erros[] = "O E-mail é obrigatório!";
        } else if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $erros[] = "E-mail informado é inválido!";
        }

        //validação do tipo
        if (empty($dados['tipo'])) {
            $erros[] = "O tipo de usuario é obrigatório!";
        } else if (!in_array($dados['tipo'], ['Administrador', 'Funcionário', 'Cliente'])) {
            $erros[] = "O tipo de usuario é obrigatório!";
        }

        //outras validações
        //validar o CPF informado se é valido de acordo com o calculo
        //validar se o CPF já foi cadastrado (busca no BD)
        //validar se o e-mail ja foi cadastrado (busca no BD)

        //Validação da senha
        if (empty($dados['confirma_senha']) || empty($dados['confirma_senha'])) {
            $erros[] = "A senha e confirmação de senha deve ser iguais!";
        } else if ($dados['confirma_senha'] != $dados['confirma_senha']) {
            $erros[] = "A senha e confirmação de senha deve ser iguais!";
        }

        return $erros;
    }
}
