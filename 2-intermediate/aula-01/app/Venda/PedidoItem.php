<?php

namespace App\Venda;

use App\Cadastro\Produto;

class PedidoItem
{
    public function __construct(
        public readonly Produto $produto,
        public readonly int|float $quantidade
    )
    {}
}