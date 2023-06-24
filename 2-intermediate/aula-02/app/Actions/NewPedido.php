<?php

namespace App\Actions;

use App\Cadastro\Cliente;
use App\Models\ClienteModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class NewPedido
{
    function __invoke(Request $request, Response $response, array $args)
    {
        $renderer = new PhpRenderer(__DIR__ . '/../../resources/views');
        // $params = $request->getQueryParams();
        $model = new ClienteModel();
        $clientes = $model->pegarClientes();
        $clientes = array_map(
            fn(Cliente $cliente) => (object)['id' => $cliente->id, 'nome' => $cliente->nome],
            $clientes
        );
        $parameters = [
            'clientes' => $clientes,
        ];
        return $renderer->render($response, 'pedido/new.php', $parameters);
    }
}