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

  <div class="container-suporte">
    <form class="suporte">

      <h1 class="titulo-suporte">Suporte</h1>

      <div class="campos-suporte">
        
        <div class="col-md-10">
          <label for="input-nome" class="form-label">Nome:</label>
          <input type="text" placeholder="Insira seu nome..." class="form-control" id="input-nome" name="#">
        </div>

        <div class="col-md-10">
          <label for="input-email" class="form-label">E-mail:</label>
          <input type="text" placeholder="Insira seu e-mail..." class="form-control" id="input-email" name="#">
        </div>

        <div class="col-md-10">
          <label for="input-mensagem" class="form-label">Mensagem:</label>
          <textarea class="form-control" id="input-mensagem" rows="3" placeholder="Insira seu e-mail..."></textarea>
        </div>
      </div>
      <div class="botao-suporte">
        <button type="button" class="btn btn-primary" onclick="window.location.href = ''">Enviar</button>
      </div>
    </form>


  </div>


</body>

</html>