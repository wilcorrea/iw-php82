<?php

namespace App\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Cadastro\Cliente;
use App\Cadastro\Produto;
use App\Models\ClienteModel;
use App\Models\ProdutoModel;
use App\Venda\Pedido;
use App\Venda\PedidoItem;
use Slim\Views\PhpRenderer;

class StorePedido
{
    function __invoke(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        // $response->getBody()->write(json_encode($data));
        $model = new ClienteModel();
        $cliente = $model->pegarCliente((int)$data['cliente']);
        $pedido = new Pedido($cliente);
        
        $produtos = $data['produtos'];
        $produtoModel = new ProdutoModel();
        foreach ($produtos as $linha) {
            $id = $linha['id'];
            $quantidade = $linha['quantidade'];
            $produto = $produtoModel->pegarProduto($id);
            $pedido->adicionarItem(new PedidoItem($produto, $quantidade));
        }
        
        $parameters = [
            'message' => "O cliente '{$cliente->nome}' selecionado",
            'valor' => $pedido->getValorTotal(),
        ];
        $renderer = new PhpRenderer(__DIR__ . '/../../resources/views');
        return $renderer->render($response, 'pedido/success.php', $parameters);
    }
}