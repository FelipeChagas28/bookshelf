<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <!-- A imagem da logo ta como link pq ta dando erro, mas o arquivo é o "logo-bookshelf.png" -->
            <a class="navbar-brand" href="#"><img src="https://png.pngtree.com/png-vector/20230105/ourmid/pngtree-book-icon-vector-image-png-image_6552370.png" width="30" height="24" class="me-2">Bookshelf</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/produtos/novo">cadastroProduto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/produtos">Listagem produto</a>
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
            </div>
        </div>
    </nav>



    <div class="container mt-4">

        <?php
        echo $content;
        ?>

    </div>

    <!--
    <footer>
        <div class="footer-base">
            <h1>Teste</h1>
            <p>Projeto realizado na aula de Programação para Internet.</p>
        </div>
    </footer>
-->
</body>

</html>