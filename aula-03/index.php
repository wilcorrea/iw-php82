<?php

require_once __DIR__ . '/Pedido.php';
require_once __DIR__ . '/Cliente.php';

$cliente = new Cliente('William');

$pedido = new Pedido($cliente);

$pedido->adicionarItem('Salgado', 3.45);
$pedido->adicionarItem('Sabonete', 4.35);

var_dump($pedido);