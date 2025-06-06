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

  <div class="container">
    <form class="login">
      <h1 class="text-login">Login</h1>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Lembrar do login
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
      <a href="/dashboard" class="btn btn-outline-secondary btn-lg">Entrar como demonstração</a>
      <button type="button" class="btn btn-primary" onclick="window.location.href = 'cadastro.html'">Cadastre-se</button>
      <div>
        <a href="" style="color: rgb(141, 141, 141); text-align: center;">
          <p>Esqueci a senha</p>
        </a>
      </div>
    </form>


  </div>


</body>

</html>