<?php

namespace App\Cadastro;

class Cliente extends Pessoa
{
    public function __construct(
        public readonly string $nome,
        public readonly string $telefone = '',
        public readonly string $email = '',
        public readonly bool $novo = true
    )
    {
    }
}