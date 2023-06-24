<?php

namespace App\Cadastro;

class Produto
{
    public function __construct(
        public readonly string $nome,
        public readonly float $valor
    ) {
    }
}