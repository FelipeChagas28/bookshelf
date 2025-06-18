<div class="container-cadastro-vendas">
  <form class="row g-2" action="/vendas/salvar" method="POST">

    <h1 class="titulo-cadastro-vendas">Cadastro de vendas</h1>

    <div class="col-md-4">
      <label for="produto_id">Cliente:</label>
      <select name="cliente_id" class="form-select">
        <option value="">Selecione um cliente</option>
        <?php foreach ($usuarios as $usuario): ?>
          <option value="<?= $usuario['id_usuario'] ?>" <?= (isset($dados['cliente_id']) && $dados['cliente_id'] == $usuario['id_usuario']) ? 'selected' : '' ?>>
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
        id="input-quantidade" name="quantidade" min="1">
    </div>


    <div class="col-md-4">
      <label for="produto_id">Livro:</label>
      <select name="livro_id" class="form-select">
        <option value="">Selecione um livro</option>
        <?php foreach ($produtos as $produto): ?>
          <option value="<?= $produto['id_usuario'] ?>" <?= (isset($dados['livro_id']) && $dados['livro_id'] == $produto['id_usuario']) ? 'selected' : '' ?>>
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