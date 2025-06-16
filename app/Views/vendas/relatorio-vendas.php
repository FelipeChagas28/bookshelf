<!-- <div class="container">
  <h1 class="titulo-listagemVendas">Listagem de vendas</h1>

  <br>

  <div class="listagem-produto-botao-pesquisa">
    <div class="listagem-produto-botao">
      <input class="btn btn-primary" type="button" value="+" onclick="window.location.href='';">
    </div>

    <div class="listagem-vendas-pesquisa">
      <form class="d-flex" role="search">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
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
      <tr>
        <th scope="row">Teste</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">03/03/25</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">04/03/25</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">05/03/25</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">06/03/25</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">07/03/25</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

    </tbody>
  </table>

  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <span class="page-link">Previous</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <span class="page-link">2</span>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</div>

-->

<div class="container-listagem-vendas">
  <h1 class="titulo-listagem-vendas">Vendas cadastradas</h1>

  <table class="table table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Cliente</th>
        <th scope="col">Produto</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
      <!-- Foreach percorre a lista recebida e coloca cada item da lista $usuarios que veio do controller
        na variavel $user -->
      <?php foreach ($vendas as $user):  ?>
        <tr>
          <td><?= $user['id_usuario'] ?></td>
          <td><?= $user['cliente'] ?></td>
          <td><?= $user['nome_livro'] ?></td>
          <td><?= $user['quantidade'] ?></td>
          <!-- <td><?= $user['valor'] ?></td> -->

          <td>
            <input class="btn btn-primary" type="button" value="Editar"
              onclick="window.location.href='/vendas/<?= $user['id_usuario'] ?>/editar';">
          </td>

        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

  <div class="listagem-usuarios-botoes">
    <input class="btn btn-primary" type="button" value="Cadastrar venda"
      onclick="window.location.href='/vendas/novo';">
    <input class="btn btn-primary" type="button" value="Cadastrar produto"
      onclick="window.location.href='/produtos/novo';">
    <input class="btn btn-primary" type="button" value="Cadastrar usuario"
      onclick="window.location.href='/usuarios/novo';">
  </div>

</div>
<?php
if (isset($_SESSION['mensagem'])):
?>
  <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?> alert-dismissible fade show" role="alert">
    <strong>Sucesso!</strong> <?= $_SESSION['mensagem'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif;
unset($_SESSION['menssagem']);
unset($_SESSION['tipo_menssagem']);
?>