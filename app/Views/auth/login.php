<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class="logo" src="img/nav bar icon.png" alt="Logo" width="30" height="24"
          class="d-inline-block align-text-top"></style>Bookstore</a>
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
            <a class="nav-link active" aria-current="page" href="dashboard.html">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastroProduto.html">cadastroProduto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listagemProduto.html">Listagem produto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ListagemVendas.html">Listagem Vendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registroVendas.html">Registrar vendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="suporte.html">Suporte</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  <!-- aba de login-->

  <div class="container-login">

    <form class="form-login">

      <h1 class="titulo-login">Login</h1>

      <div class="email-senha-login">
        <label for="email">Email</label>
        <input type="text" name="" id="email" class="form-control" placeholder="Insira seu e-mail...">
        <label for="senha">Senha</label>
        <input type="password" name="" id="senha" class="form-control" placeholder="Insira sua senha...">
      </div>

      <div class="botao-lembrar-login">
        <div class="">
          <input class="form-check-input" type="checkbox" id=lembrar-login">
          <label class="form-check-label" for="lembrar-login">Lembrar do login</label>
        </div>
        <a href="#" style="color: #fff; text-decoration:none;">Esqueci a senha</a>
      </div>

      <div class="botoes-login">
        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="/dashboard" class="btn btn-primary">Entrar como demonstração</a>
      </div>
    </form>
  </div>

  <a href="#" class="cadastro-login">Cadastre-se</a>

</body>

</html>