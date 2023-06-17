<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class NewPedido
{
    function __invoke(Request $request, Response $response, array $args)
    {
        $renderer = new PhpRenderer(__DIR__ . '/../resources/views');
        // $params = $request->getQueryParams();
        return $renderer->render($response, 'pedido/new.php', $args);
    }
}