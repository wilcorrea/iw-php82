<?php

require __DIR__ . '/vendor/autoload.php';

use App\Cadastro\Cliente;
use App\Cadastro\Produto;
use App\Venda\Pedido;
use App\Venda\PedidoItem;

$cliente = new Cliente('William');

$pedido = new Pedido($cliente);

$pedido->adicionarItem(
    new PedidoItem(new Produto('Salgado', 3.45), 2)
);
$pedido->adicionarItem(
    new PedidoItem(new Produto('Sabonete', 4.35), 3)
);

echo json_encode($pedido, JSON_PRETTY_PRINT);
