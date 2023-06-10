<?php

$cliente = new App\Main\Cliente('William');

$pedido = new App\Main\Pedido($cliente);

$pedido->adicionarItem(
    new App\Main\PedidoItem(new App\Main\Produto('Salgado', 3.45), 2)
);
$pedido->adicionarItem(
    new App\Main\PedidoItem(new App\Main\Produto('Sabonete', 4.35), 3)
);

echo json_encode($pedido, JSON_PRETTY_PRINT);
