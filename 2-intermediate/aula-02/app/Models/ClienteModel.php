<?php

namespace App\Models;

use App\Cadastro\Cliente;

class ClienteModel
{
    public function pegarClientes(): array
    {
        return [
            new Cliente('William'),
            new Cliente('Laryssa'),
            new Cliente('Filipe'),
            new Cliente('Janaina'),
            new Cliente('Wagner'),
            new Cliente('Daniel'),
        ];
    }
}