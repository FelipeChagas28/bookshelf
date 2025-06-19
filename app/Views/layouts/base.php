<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!--
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#"><img src="https://png.pngtree.com/png-vector/20230105/ourmid/pngtree-book-icon-vector-image-png-image_6552370.png" width="30" height="24" class="me-2">Bookshelf</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/entrar">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/produtos/novo">cadastrar produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/produtos">Listar produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/vendas">Listagem Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/vendas/novo">Registrar vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/usuarios/novo">Registrar usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="suporte.html">Suporte</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="logout">
                        <a class="nav-link active" aria-current="page" href="/sair">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://png.pngtree.com/png-vector/20230105/ourmid/pngtree-book-icon-vector-image-png-image_6552370.png"
                    width="30" height="24" class="me-2">Bookshelf
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/entrar">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>

                    <!-- Produtos -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="produtosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="produtosDropdown">
                            <li><a class="dropdown-item" href="/produtos/novo">Cadastrar Produto</a></li>
                            <li><a class="dropdown-item" href="/produtos">Listagem de Produtos</a></li>
                        </ul>
                    </li>

                    <!-- Usuários -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuários
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
                            <li><a class="dropdown-item" href="/usuarios/novo">Registrar Usuário</a></li>
                            <li><a class="dropdown-item" href="/usuarios">Listagem de Usuários</a></li>
                        </ul>
                    </li>

                    <!-- Vendas -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="vendasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vendas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="vendasDropdown">
                            <li><a class="dropdown-item" href="/vendas/novo">Registrar Vendas</a></li>
                            <li><a class="dropdown-item" href="/vendas">Listagem de Vendas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/sobre">Suporte</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="logout">
                        <a class="nav-link active" aria-current="page" href="/sair">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-4">

        <?php
        echo $content;
        ?>

    </div>

    <br>

    <!-- <footer>
        <div>
            <h1>Teste</h1>
            <p>Projeto realizado na aula de Programação para Internet.</p>
        </div>
    </footer>

-->
</body>

</html>