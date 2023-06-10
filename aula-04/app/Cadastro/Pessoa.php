<?php

namespace App\Cadastro;

class Pessoa
{
    protected bool $ativo = true;
 
    public function __construct(
        public readonly string $nome,
        public readonly string $telefone = '',
        public readonly string $email = ''
    )
    {
    }

    public function alterarAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }

    public function estaAtivo()
    {
        return $this->ativo;
    }
}
