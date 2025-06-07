<div class="container-relatorio-usuarios">
  <h1 class="titulo-relatorio-usuarios">Usuários</h1>

  <table class="table table-striped table-dark">

    <div class="botao-imprimir-relatorio-usuarios">
      <button onclick="window.print()">Imprimir</button>
    </div>

    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Celular</th>
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
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>