<?php

namespace App\Main;

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
