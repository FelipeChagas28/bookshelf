<div class="container-relatorio-vendas">

  <h1 class="titulo-relatorio-vendas">Relatório vendas</h1>

  <div class="botao-imprimir-relatorio-vendas">
    <button onclick="window.print()">Imprimir</button>
  </div>

  <table class="table table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Cliente</th>
        <th scope="col">Produto</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor</th>

      </tr>
    </thead>
    <tbody>
      <!-- Foreach percorre a lista recebida e coloca cada item da lista $vendas que veio do controller
        na variavel $user -->
      <?php foreach ($vendas as $user):  ?>
        <tr>
          <td><?= $user['data_venda'] ?></td>
          <td><?= $user['nome'] ?></td>
          <td><?= $user['nome_livro'] ?></td>
          <td><?= $user['quantidade'] ?></td>
          <td><?= $user['preco'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>