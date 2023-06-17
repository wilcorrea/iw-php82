<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$renderer = new PhpRenderer(__DIR__ . '/../resources/views');

$app->get('/pedido/new', function (Request $request, Response $response, array $args) use ($renderer) {
    // $params = $request->getQueryParams();
    return $renderer->render($response, "pedido/create.php", $args);
});

$app->run();
