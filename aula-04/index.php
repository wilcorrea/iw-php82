<?php

require __DIR__ . '/vendor/autoload.php';

$cliente = new App\Vendas\Cliente('William');

$pedido = new App\Vendas\Pedido($cliente);

$pedido->adicionarItem(
    new App\Vendas\PedidoItem(new App\Vendas\Produto('Salgado', 3.45), 2)
);
$pedido->adicionarItem(
    new App\Vendas\PedidoItem(new App\Vendas\Produto('Sabonete', 4.35), 3)
);

echo json_encode($pedido, JSON_PRETTY_PRINT);
