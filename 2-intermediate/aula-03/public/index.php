<?php

use Slim\Factory\AppFactory;
use App\Actions\NewPedido;
use App\Actions\StorePedido;
use App\Actions\Cliente\NovoCliente;
use App\Actions\Cliente\CriarCliente;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world");
    return $response;
});

$app->get('/pedido/new', NewPedido::class);
$app->post('/pedido', StorePedido::class);

$app->get('/cliente/novo', NovoCliente::class);
$app->post('/cliente', CriarCliente::class);

$app->run();
