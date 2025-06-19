<?php
if (isset($_SESSION['usuario_email'])) {
  header('location: /dashboard');
}
?>

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

  

  <!-- aba de login-->

  <div class="container-login">
    <?php

    if (isset($_SESSION['erros'])):
      $erros = $_SESSION['erros'];


    ?>

      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erro ao entrar!</h4>
        <ul>
          <?php foreach ($erros as $e): ?>
            <li><?= $e ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

    <?php endif;
    unset($_SESSION['erros']); ?>

    <form class="form-login" action="/entrar" method="POST">

      <h1 class="titulo-login">Login</h1>

      <div class="email-senha-login">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Insira seu e-mail...">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira sua senha...">
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