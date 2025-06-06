<div class="container-listagem-usuarios">
  <h1 class="titulo-usuarios-cadastrados-listagem-usuarios">Usuários</h1>

  <div class="listagem-usuarios-adicionar-usuarios">
    <input class="btn btn-primary" type="submit" value="+" onclick="window.location.href='/usuarios/novo';">
  </div>

  <table class="table table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Celular</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <!-- Foreach percorre a lista recebida e coloca cada item da lista $usuarios que veio do controller
        na variavel $user -->
      <?php foreach ($usuarios as $user):  ?>
        <tr>
          <td><?= $user['id_usuario'] ?></td>
          <td><?= $user['nome'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['celular'] ?></td>

          <td>
            <input class="btn btn-primary" type="button" value="Editar"
              onclick="window.location.href='/usuarios/<?= $user['id_usuario'] ?>/editar';">
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

  <!-- 
  
  <div class="listagem-usuarios-botoes">
    <input class="btn btn-primary" type="button" value="Cadastrar novo usuário"
      onclick="window.location.href='/usuarios/novo';">
    <input class="btn btn-primary" type="button" value="Listagem de produtos"
      onclick="window.location.href='Listagemproduto.html';">
    <input class="btn btn-primary" type="button" value="Listagem de vendas"
      onclick="window.location.href='/usuarios/novo';">
  </div>

  -->

</div>

<script>
  function deletarFisico(id) {
    if (confirm("Deseja deletar PERMANENTEMENTE este usuario?")) {
      window.location.href = `/usuarios/${id}/del-fisico`;
    } else {
      alert("Cancelado!");
    }
  }

  function deletarLogico(id) {
    if (confirm("Deseja DESATIVAR este usuario?")) {
      window.location.href = `/usuarios/${id}/del-logico`;
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