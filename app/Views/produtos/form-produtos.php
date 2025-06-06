<?php
if (isset($_SESSION['dados'])) {
  $dados = $_SESSION['dados'];
  unset($_SESSION['dados']);
}


if (isset($dados['id_usuario'])) {
  $rota = "/produtos/" . $dados['id_usuario'] . "/atualizar";
} else {
  $rota = "/produtos/salvar";
}

//print_r($dados); exit();
if (isset($_SESSION['erros'])):
  $erros = $_SESSION['erros'];


?>

  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Erro ao cadastrar!</h4>
    <p>Verifique os itens abaixo em seu formulário antes de tentar novamento</p>
    <ul>
      <?php foreach ($erros as $e): ?>
        <li><?= $e ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endif;
unset($_SESSION['erros']); ?>

<div class="container-cadastro-produto">
  <form class="row g-2" action="<?= $rota ?>" method="POST">

    <h1 class="titulo-cadastro-produto">Cadastro de produtos</h1>

    <div class="col-md-6">
      <label for="input-nome-livro" class="form-label">Nome do livro</label>
      <input type="text" placeholder="Insira o nome do livro..." class="form-control" value="<?= isset($dados['nome_livro']) ? $dados['nome_livro'] : null ?>"
        id="input-nome-livro" name="nome_livro">
    </div>
    <div class="mb-3">
      <label for="input-descricao-livro" class="form-label">Descrição</label>

      <!-- <textarea class="form-control" value="<?= isset($dados['descricao_livro']) ? $dados['descricao_livro'] : null ?>"
        id="input-descricao" name="descricao_livro" rows="3"></textarea> -->

      <input type="text" placeholder="Insira a descrição do livro..." class="form-control" value="<?= isset($dados['descricao_livro']) ? $dados['descricao_livro'] : null ?>"
        id="input-descricao-livro" name="descricao_livro">
    </div>
    <div class="col-md-2">
      <label for="input-preco" class="form-label">Preço</label>
      <input type="text" placeholder="..." class="form-control" value="<?= isset($dados['preco']) ? $dados['preco'] : null ?>"
        id="input-preco" name="preco" >
    </div>
    <div class="col-md-2">
      <label for="input-qtde_estoque" class="form-label">Estoque</label>
      <input type="number" placeholder="..." class="form-control" value="<?= isset($dados['qtde_estoque']) ? $dados['qtde_estoque'] : null ?>"
        id="input-qtde_estoque" name="qtde_estoque" min="1" step="1">
    </div>


    <div class="cadastro-produto-botoes">
      <div class="col-12 d-flex justify-content-center">
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </div>
      </div>
    </div>

  </form>
</div>