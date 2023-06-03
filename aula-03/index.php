<?php

require_once __DIR__ . '/Pedido.php';
require_once __DIR__ . '/Cliente.php';

$cliente = new Cliente('William');

$pedido = new Pedido($cliente);

$pedido->adicionarItem(
    new PedidoItem(new Produto('Salgado', 3.45), 2)
);
$pedido->adicionarItem(
    new PedidoItem(new Produto('Sabonete', 4.35), 3)
);

echo json_encode($pedido, JSON_PRETTY_PRINT);