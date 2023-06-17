<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use App\Cadastro\Cliente;
use App\Cadastro\Produto;
use App\Venda\Pedido;
use App\Venda\PedidoItem;
use App\Actions\NewPedido;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$renderer = new PhpRenderer(__DIR__ . '/../resources/views');

// $var->property
// $var::proerty

$app->get('/pedido/new', NewPedido::class);

$app->post('/pedido', function (Request $request, Response $response, array $args) use ($renderer) {
    $data = $request->getParsedBody();
    // $response->getBody()->write(json_encode($data));
    $cliente = new Cliente($data['cliente']);
    $pedido = new Pedido($cliente);
    $produtos = $data['produto'];
    $quantidades = $data['quantidade'];
    $pedido->adicionarItem(
        new PedidoItem(new Produto($produtos[0], 3.45), $quantidades[0])
    );
    $pedido->adicionarItem(
        new PedidoItem(new Produto($produtos[1], 4.35), $quantidades[1])
    );
    $parameters = ['message' => 'Pedido salvo com sucesso!', 'pedido' => $pedido];
    return $renderer->render($response, 'pedido/success.php', $parameters);
});

$app->run();
