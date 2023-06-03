<?php

require_once __DIR__ . '/Produto.php';

class PedidoItem
{
    public function __construct(
        public readonly Produto $produto,
        public readonly int|float $quantidade
    )
    {}
}