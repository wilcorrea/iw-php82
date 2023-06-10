<?php

namespace App\Vendas;

class Pessoa
{
    public function __construct(
        public readonly string $nome,
        public readonly string $telefone = '',
        public readonly string $email = ''
    )
    {
    }
}
