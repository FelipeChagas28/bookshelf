<?php
if (isset($_SESSION['dados'])) {
  $dados = $_SESSION['dados'];
  unset($_SESSION['dados']);
}


if (isset($dados['id_usuario'])) {
  $rota = "/usuarios/" . $dados['id_usuario'] . "/atualizar";
} else {
  $rota = "/usuarios/salvar";
}

//print_r($dados); exit();
if (isset($_SESSION['erros'])):
  $erros = $_SESSION['erros'];


?>

  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Erro ao cadastrar!</h4>
    <p>Verifique os itens abaixo em seu formulário antes de tentar novamento</p>
    <ul>
      <?php foreach ($erros as $e): ?>
        <li><?= $e ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endif;
unset($_SESSION['erros']); ?>

<div class="container-cadastro-usuarios">
  <form class="row g-2" action="<?= $rota ?>" method="POST">

    <h1 class="titulo-cadastro-usuarios">Cadastro de usuarios</h1>

    <div class="col-md-6">
      <label for="input-nome" class="form-label">Nome completo</label>
      <input type="text" placeholder="Insira seu nome..." class="form-control" value="<?= isset($dados['nome']) ? $dados['nome'] : null ?>"
        id="input-nome" name="nome">
    </div>
    <div class="col-md-6">
      <label for="input-email" class="form-label">Email</label>
      <input type="email" placeholder="Insira seu e-mail..." class="form-control" value="<?= isset($dados['email']) ? $dados['email'] : null ?>"
        id="input-email" name="email">
    </div>
    <div class="col-md-3">
      <label for="input-celular" class="form-label">Celular</label>
      <input type="tel" placeholder="Insira seu celular..." class="form-control" value="<?= isset($dados['celular']) ? $dados['celular'] : null ?>"
        id="input-celular" name="celular">
    </div>
    <div class="col-md-3">
      <label for="input-data-nascimento" class="form-label">Data de nascimento</label>
      <input type="date" class="form-control" value="<?= isset($dados['data_nascimento']) ? $dados['data_nascimento'] : null ?>"
        id="input-data-nascimento" name="data_nascimento">
    </div>
    <div class="col-md-6">
      <label for="input-cpf" class="form-label">CPF</label>
      <input type="text" placeholder="Insira seu CPF..." class="form-control" value="<?= isset($dados['cpf']) ? $dados['cpf'] : null ?>"
        id="input-cpf" name="cpf">
    </div>
    <div class="col-md-6">
      <label for="input-senha" class="form-label">Senha</label>
      <input type="password" placeholder="Insira sua senha..." class="form-control"
        id="input-senha" name="senha">
    </div>
    <div class="col-md-6">
      <label for="input-confirme-senha" class="form-label">Confirme a senha</label>
      <input type="password" placeholder="Confirme sua senha..." class="form-control"
        id="input-confirme-senha" name="confirma_senha">
    </div>
    <div class="col-md-6">
      <label for="input-cidade" class="form-label">Cidade</label>
      <input type="text" placeholder="Insira sua cidade..." class="form-control" value="<?= isset($dados['cidade']) ? $dados['cidade'] : null ?>"
        id="input-cidade" name="cidade">
    </div>
    <div class="col-md-4">
      <label for="input-estado" class="form-label">Estado</label>
      <select id="input-estado" class="form-select" name="estado">
        <option>Selecione...</option>
        <!-- -->
        <option <?= isset($dados['estado']) && $dados['estado'] == "AC" ? "selected" : null ?> value="AC">Acre</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "AL" ? "selected" : null ?> value="AL">Alagoas</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "AP" ? "selected" : null ?> value="AP">Amapá</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "AM" ? "selected" : null ?> value="AM">Amazonas</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "BA" ? "selected" : null ?> value="BA">Bahia</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "CE" ? "selected" : null ?> value="CE">Ceará</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "DF" ? "selected" : null ?> value="DF">Distrito Federal</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "ES" ? "selected" : null ?> value="ES">Espírito Santo</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "GO" ? "selected" : null ?> value="GO">Goiás</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "MA" ? "selected" : null ?> value="MA">Maranhão</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "MT" ? "selected" : null ?> value="MT">Mato Grosso</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "MS" ? "selected" : null ?> value="MS">Mato Grosso do Sul</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "MG" ? "selected" : null ?> value="MG">Minas Gerais</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "PA" ? "selected" : null ?> value="PA">Pará</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "PB" ? "selected" : null ?> value="PB">Paraíba</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "PR" ? "selected" : null ?> value="PR">Paraná</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "PE" ? "selected" : null ?> value="PE">Pernambuco</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "PI" ? "selected" : null ?> value="PI">Piauí</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "RJ" ? "selected" : null ?> value="RJ">Rio de Janeiro</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "RN" ? "selected" : null ?> value="RN">Rio Grande do Norte</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "RS" ? "selected" : null ?> value="RS">Rio Grande do Sul</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "RO" ? "selected" : null ?> value="RO">Rondônia</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "RR" ? "selected" : null ?> value="RR">Roraima</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "SC" ? "selected" : null ?> value="SC">Santa Catarina</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "SP" ? "selected" : null ?> value="SP">São Paulo</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "SE" ? "selected" : null ?> value="SE">Sergipe</option>
        <option <?= isset($dados['estado']) && $dados['estado'] == "TO" ? "selected" : null ?> value="TO">Tocantins</option>

      </select>
    </div>
    <div class="col-md-2">
      <label for="input-cep" class="form-label">CEP</label>
      <input type="text" placeholder="CEP" class="form-control" value="<?= isset($dados['cep']) ? $dados['cep'] : null ?>"
        id="input-cep" name="cep">
    </div>
    <div class="col-md-6">
      <label for="input-bairro" class="form-label">Bairro</label>
      <input type="text" placeholder="Insira seu bairro..." class="form-control" value="<?= isset($dados['bairro']) ? $dados['bairro'] : null ?>"
        id="input-bairro" name="bairro">
    </div>
    <div class="col-md-6">
      <label for="input-rua" class="form-label">Rua</label>
      <input type="text" placeholder="Insira sua rua..." class="form-control" value="<?= isset($dados['rua']) ? $dados['rua'] : null ?>"
        id="input-rua" name="rua">
    </div>
    <div class="col-md-2">
      <label for="input-numero" class="form-label">Numero</label>
      <input type="text" placeholder="Numero" class="form-control" value="<?= isset($dados['numero']) ? $dados['numero'] : null ?>"
        id="input-numero" name="numero">
    </div>
    <div class="col-md-3">
      <label for="input-complemento" class="form-label">Complemento</label>
      <input type="text" placeholder="Complemento" class="form-control" value="<?= isset($dados['complemento']) ? $dados['complemento'] : null ?>"
        id="input-complemento" name="complemento">
    </div>
    <div class="col-md-4">
      <label for="input-tipo" class="form-label">Tipo de usuário</label>
      <select id="input-tipo" class="form-select" name="tipo">
        <option>Selecione...</option>
        <option <?= isset($dados['tipo']) && $dados['tipo'] == "Cliente" ? "selected" : null ?>
          value="Cliente">Cliente</option>
        <option <?= isset($dados['tipo']) && $dados['tipo'] == "Funcionário" ? "selected" : null ?>
          value="Funcionário">Funcionário</option>
        <option <?= isset($dados['tipo']) && $dados['tipo'] == "Administrador" ? "selected" : null ?>
          value="Administrador">Administrador</option>
      </select>
    </div>

    <div class="botao-usuarios">
      <div class="col-12 d-flex justify-content-center">
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </div>
      </div>
    </div>

  </form>
</div>