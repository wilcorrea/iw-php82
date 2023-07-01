<?php

namespace App\Cadastro;

class Produto
{
    public function __construct(
        public readonly int $id,
        public readonly string $nome,
        public readonly float $valor
    ) {
    }
}