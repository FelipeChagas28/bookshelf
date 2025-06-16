<!-- 
<div class="registro-vendas-produto">

    <form class="row g-2">

      <h1 class="titulo-cadastro-form-vendas">Registro de vendas</h1>

      <div class="col-md-6">
        <label for="inputNome" class="form-label">Cliente</label>
        <input type="text" class="form-control" id="inputNome" name="cliente">
      </div>
      <div class="col-md-3">
        <label for="inputCpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="inputEmail4" name="cpf">
      </div>
      <div class="col-md-4">
        <label for="inputProduto" class="form-label">Produto</label>
        <select id="inputProduto" class="form-select" name="produto">
          <option selected></option>
          <option value="">...</option>
          <option value="">...</option>
          <option value="">...</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="inputEmail4" min="1" step="1" name="quantidade">
      </div>
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Data da venda</label>
        <input type="date" class="form-control" id="inputEmail4" name="data_venda">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Pagamento</label>
        <select id="inputState" class="form-select" name="forma_pagamento_id">
          <option selected>Selecione...</option>
          <option value="Cliente">Dinheiro</option>
          <option value="Funcionário">Cartão</option>
          <option value="Admistrador">Pix</option>
        </select>
      </div>


      <div class="registro-vendas-botoes">
        <input class="btn btn-primary" type="button" value="Voltar" onclick="window.location.href='';">
        <input class="btn btn-primary" type="button" value="Limpar" onclick="window.location.href='';">
        <input class="btn btn-primary" type="button" value="Salvar" onclick="window.location.href='';">

      </div>

    </form>
  </div>
-->

<?php
if (isset($_SESSION['dados'])) {
  $dados = $_SESSION['dados'];
  unset($_SESSION['dados']);
}

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

<div class="container-cadastro-vendas">
  <form class="row g-2" action="/vendas/salvar" method="POST">

    <h1 class="titulo-cadastro-vendas">Cadastro de vendas</h1>

    <div class="col-md-4">
      <label for="produto_id">Cliente:</label>
      <select name="cliente_id" required>
        <option value="">Selecione um cliente</option>
        <?php foreach ($usuarios as $usuario): ?>
          <option value="<?= $usuario['id_usuario'] ?>">
            <?= $usuario['nome'] ?>
          </option>
        <?php endforeach; ?>
      </select>

    </div>
    <div class="col-md-4">
      <label for="input-cpf" class="form-label">CPF</label>
      <input type="text" placeholder="Insira o CPF do cliente..." class="form-control" value="<?= isset($dados['cpf_vendas']) ? $dados['cpf_vendas'] : null ?>"
        id="input-cpf" name="cpf_vendas">
    </div>
    <div class="col-md-3">
      <label for="input-data-venda" class="form-label">Data da venda</label>
      <input type="date" class="form-control" value="<?= isset($dados['data_venda']) ? $dados['data_venda'] : null ?>"
        id="input-data-venda" name="data_venda">
    </div>
    <div class="col-md-2">
      <label for="input-quantidade" class="form-label">Quantidade</label>
      <input type="number" placeholder="..." class="form-control" value="<?= isset($dados['quantidade']) ? $dados['quantidade'] : null ?>"
        id="input-quantidade" name="quantidade">
    </div>


    <div class="col-md-4">
      <label for="produto_id">Livro:</label>
      <select name="produto_id" required>
        <option value="">Selecione um livro</option>
        <?php foreach ($produtos as $produto): ?>
          <option value="<?= $produto['id_produto'] ?>">
            <?= $produto['nome_livro'] ?>
          </option>
        <?php endforeach; ?>
      </select>

    </div>



    <div class="col-md-4">
      <label for="input-forma-pagamento" class="form-label">Forma de pagamento</label>
      <select id="input-forma-pagamento" class="form-select" name="forma_pagamento_id">
        <option>Selecione...</option>
        <option <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == "dinheiro" ? "selected" : null ?> value="dinheiro">dinheiro</option>
        <option <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == "pix" ? "selected" : null ?> value="pix">pix</option>
        <option <?= isset($dados['forma_pagamento_id']) && $dados['forma_pagamento_id'] == "cartao" ? "selected" : null ?> value="cartao">cartao</option>
      </select>
    </div>

    <div class="registro-vendas-botoes">
      <input class="btn btn-primary" type="submit" value="Voltar">
      <input class="btn btn-primary" type="submit" value="Limpar">
      <input class="btn btn-primary" type="submit" value="Salvar">

    </div>
  </form>
</div>