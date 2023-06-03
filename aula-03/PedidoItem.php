<?php

class PedidoItem
{
    public function __construct(
        public readonly Produto $produto,
        public readonly int|float $quantidade
    )
    {}
}