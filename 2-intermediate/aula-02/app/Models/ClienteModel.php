<?php

namespace App\Models;

use App\Cadastro\Cliente;

class ClienteModel
{
    public function pegarClientes(): array
    {
        $json = file_get_contents(__DIR__ . '/../../database/clientes.json');
        $array = json_decode($json);
        $clientes = [];
        foreach ($array as $linha) {
            $clientes[] = new Cliente(
                $linha->id,
                $linha->nome,
                $linha->telefone,
                $linha->email,
                $linha->novo
            );
        }
        return $clientes;
    }

    public function pegarCliente(int $id): ?Cliente
    {
        $json = file_get_contents(__DIR__ . '/../../database/clientes.json');
        $array = json_decode($json);
        $clientes = array_filter($array, function (\stdClass $linha) use ($id) {
            return $linha->id === $id;
        });
        if (count($clientes) < 1) {
            return null;
        }
        $linha = array_shift($clientes);
        return new Cliente(
            $linha->id,
            $linha->nome,
            $linha->telefone,
            $linha->email,
            $linha->novo
        );
    }
}