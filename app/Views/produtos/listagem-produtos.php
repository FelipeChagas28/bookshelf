<!-- 

<div class="container-listagem-produtos">

  <h1 class="titulo-listagem-produto">Produtos</h1>

  <div class="botao-pesquisa-adicionar">
    <div class="listagem-produto-adicionar-produto">
      <input class="btn btn-primary" type="submit" value="+" onclick="window.location.href='';">
    </div>


    <div class="listagem-produtos-pesquisa">
      <form class="d-flex" role="search">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>

  </div>

  <table class="table table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Estoque</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">Teste</th>
        <td>R$40,00</td>
        <td>23</td>
        <td><input class="btn btn-primary" type="button" value="Editar" onclick="window.location.href='';"></td>
      </tr>
      <tr>
        <td>teste</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">04/03/25</th>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">05/03/25</th>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">06/03/25</th>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">07/03/25</th>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>

</div>

-->

<div class="container-listagem-produtos">

  <h1 class="titulo-listagem-produto">Produtos</h1>

  <div class="botao-pesquisa-adicionar">
    <div class="listagem-produto-adicionar-produto">
      <input class="btn btn-primary" type="submit" value="+" onclick="window.location.href='/produtos/novo';">
    </div>


    <div class="listagem-produtos-pesquisa">
      <form class="d-flex" role="search">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    
  </div>


  <table class="table table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Livro</th>
        <th scope="col">Preço</th>
        <th scope="col">Estoque</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <!-- Foreach percorre a lista recebida e coloca cada item da lista $produtos que veio do controller
        na variavel $user -->
      <?php foreach ($produtos as $user):  ?>
        <tr>
          <td><?= $user['id_usuario'] ?></td>
          <td><?= $user['nome_livro'] ?></td>
          <td><?= $user['preco'] ?></td>
          <td><?= $user['qtde_estoque'] ?></td>
         

          <td>
            <input class="btn btn-primary" type="button" value="Editar"
              onclick="window.location.href='/produtos/<?= $user['id_usuario'] ?>/editar';">
          </td>
          <td>
            <button class="btn btn-sm btn-outline-danger btn-action" onclick="deletarFisico(<?= $user['id_usuario'] ?>)"
              title="Excluir">
              Fisico
            </button>
          </td>
          <td>
            <button class="btn btn-sm btn-outline-danger btn-action" onclick="deletarLogico(<?= $user['id_usuario'] ?>)"
              title="Excluir">
              Logico
            </button>
          </td>

        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

  <!-- <div class="listagem-usuarios-botoes">
    <input class="btn btn-primary" type="button" value="Cadastrar novo produto"
      onclick="window.location.href='/produtos/novo';">
    <input class="btn btn-primary" type="button" value="Cadastrar novo"
      onclick="window.location.href='Listagemproduto.html';">
    <input class="btn btn-primary" type="button" value="Listagem de vendas"
      onclick="window.location.href='/usuarios/novo';">
  </div>

      -->

</div>

<script>
  function deletarFisico(id) {
    if (confirm("Deseja deletar PERMANENTEMENTE este produto?")) {
      window.location.href = `/produtos/${id}/del-fisico`;
    } else {
      alert("Cancelado!");
    }
  }

  function deletarLogico(id) {
    if (confirm("Deseja DESATIVAR este produto?")) {
      window.location.href = `/produtos/${id}/del-logico`;
    } else {
      alert("Cancelado!");
    }
  }
</script>

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