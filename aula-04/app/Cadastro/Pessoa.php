<?php

namespace App\Cadastro;

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
