<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Cadastro\Cliente;
use App\Cadastro\Produto;
use App\Venda\Pedido;
use App\Venda\PedidoItem;
use Slim\Views\PhpRenderer;

class StorePedido
{
    function __invoke(Request $request, Response $response, array $args) {
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
        $renderer = new PhpRenderer(__DIR__ . '/../resources/views');
        return $renderer->render($response, 'pedido/success.php', $parameters);
    }
}