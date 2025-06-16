<?php
session_start();
//importa o autoload do composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UsuarioController;
//instancia o controller de Usuario para ser utilizado (cria o objeto)
$usuarioCtrl = new UsuarioController();

use App\Controllers\VendasController;

$vendasCtrl = new VendasController();

use App\Controllers\ProdutosController;

$produtosCtrl = new produtosController();

//injeta o conteudo das páginas de rota dentro do template base.php
function render($view, $data = [])
{
    extract($data);
    ob_start();
    //carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    //carrega o template base.php
    require __DIR__ . '/../app/Views/layouts/base.php';
}

function render_sem_login($view, $data = [])
{
    extract($data);
    ob_start();
    $content = ob_get_clean();
    //carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
}

//obtem a URL da requisição da navegação
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url == "/") {
    //render('home.php', ['title' => 'Página inicial - Bookshelf']);
    header('Location: /entrar');
} else if ($url == '/sobre') {
    render('sobre.php', ['title' => 'Sobre o sistema - Bookshelf']);
} else if ($url == '/entrar') {
    render_sem_login('auth/login.php', ['title' => 'Entrar no sistema - Bookshelf']);
} else if ($url == "/dashboard") {
    render('dashboard.php', ['title' => 'Dashboard - Bookshelf']);
} else if ($url == '/sobre') {
    render_sem_login('sobre.php', ['title' => 'Sobre - Bookshelf']);




    //usuarios

} else if ($url == '/usuarios') {
    $usuarios = $usuarioCtrl->listar();
} else if ($url == '/usuarios/novo') {
    $usuarios = $usuarioCtrl->novo();
} else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarios = $usuarioCtrl->salvar();
}

// relatorio usuarios
else if ($url == '/usuarios/relatorio') {
    $usuarios = $usuarioCtrl->relatorio();
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/usuarios/(\d+)/editar$#', $url, $num)) {
    $usuarioCtrl->editar($num[1]);
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/usuarios/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioCtrl->atualizar($num[1]);
} else if (preg_match('#^/usuarios/(\d+)/del-fisico$#', $url, $num)) {
    $usuarioCtrl->deleteFisico($num[1]);
} else if (preg_match('#^/usuarios/(\d+)/del-logico$#', $url, $num)) {
    $usuarioCtrl->deleteLogico($num[1]);
}

    //produtos

else if ($url == '/produtos') {
    $produtos = $produtosCtrl->listar();
} else if ($url == '/produtos/novo') {
    $produtos = $produtosCtrl->novo();
} else if ($url == "/produtos/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $produtos = $produtosCtrl->salvar();
}

// relatorio produtos
else if ($url == '/produtos/relatorio') {
    $produtos = $produtosCtrl->relatorio();
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/produtos/(\d+)/editar$#', $url, $num)) {
    $produtosCtrl->editar($num[1]);
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/produtos/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $produtosCtrl->atualizar($num[1]);
} else if (preg_match('#^/produtos/(\d+)/del-fisico$#', $url, $num)) {
    $produtosCtrl->deleteFisico($num[1]);
} else if (preg_match('#^/produtos/(\d+)/del-logico$#', $url, $num)) {
    $produtosCtrl->deleteLogico($num[1]);
}
 
    //vendas



else if ($url == '/vendas') {
    $vendas = $vendasCtrl->listar();
} else if ($url == '/vendas/novo') {
    $vendas = $vendasCtrl->novo();
} else if ($url == "/vendas/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $vendas = $vendasCtrl->salvar();
}

// relatorio vendas
else if ($url == '/vendas/relatorio') {
    $vendas = $vendasCtrl->relatorio();
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/vendas/(\d+)/editar$#', $url, $num)) {
    $vendasCtrl->editar($num[1]);
}

//pre_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/vendas/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $vendasCtrl->atualizar($num[1]);
} else if (preg_match('#^/vendas/(\d+)/del-fisico$#', $url, $num)) {
    $vendasCtrl->deleteFisico($num[1]);
} else if (preg_match('#^/vendas/(\d+)/del-logico$#', $url, $num)) {
    $vendasCtrl->deleteLogico($num[1]);
}

//outras rotas entram aqui...
else {
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
    //render('404.php', ['title' => 'Página não encontrada - Bookshelf']);
}
