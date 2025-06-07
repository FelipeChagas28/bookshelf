<div class="container-relatorio-produtos">

    <h1 class="titulo-relatorio-produtos">Relatório produtos</h1>

    <div class="tabela-relatorio-produtos">

    <div class="botao-imprimir-relatorio-produtos">
        <button onclick="window.print()">Imprimir</button>
    </div>

        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque</th>

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

                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>