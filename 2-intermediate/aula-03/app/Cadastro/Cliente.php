<?php

namespace App\Cadastro;

class Cliente extends Pessoa implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $nome,
        public readonly string $telefone = '',
        public readonly string $email = '',
        public readonly bool $novo = true
    )
    {
    }

    public function alterarAtivo(bool $ativo): void
    {
        if ($this->novo === true) {
            return;
        }
        parent::alterarAtivo($ativo);
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}