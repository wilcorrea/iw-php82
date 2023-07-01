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

    public function criarCliente(string $nome, string $telefone, string $email): Cliente
    {
        $json = file_get_contents(__DIR__ . '/../../database/clientes.json');
        $array = json_decode($json, false);
        $callback = function ($acumulado, $item) {
            if ($item->id > $acumulado) {
                $acumulado = $item->id;
            }
            return $acumulado;
        };
        $atual = array_reduce($array, $callback, 0);
        $id = $atual + 1;
        $cliente = new Cliente(
            $id,
            $nome,
            $telefone,
            $email
        );
        $array[] = $cliente;
        $json = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../../database/clientes.json', $json);
        return $cliente;
    }
}