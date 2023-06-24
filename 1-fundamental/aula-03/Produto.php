<?php

class Produto
{
    public function __construct(
        public readonly string $nome,
        public readonly float $valor
    ) {
    }
}