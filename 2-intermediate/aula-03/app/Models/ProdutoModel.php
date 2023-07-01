<?php

namespace App\Models;

use App\Cadastro\Produto;

class ProdutoModel
{
    public function pegarProdutos(): array
    {
        $json = file_get_contents(__DIR__ . '/../../database/produtos.json');
        $array = json_decode($json);
        $produtos = [];
        foreach ($array as $linha) {
            $produtos[] = new Produto(
                $linha->id,
                $linha->nome,
                $linha->valor
            );
        }
        return $produtos;
    }

    public function pegarProduto(int $id): ?Produto
    {
        $json = file_get_contents(__DIR__ . '/../../database/produtos.json');
        $array = json_decode($json);
        $produtos = array_filter($array, function (\stdClass $linha) use ($id) {
            return $linha->id === $id;
        });
        if (count($produtos) < 1) {
            return null;
        }
        $linha = array_shift($produtos);
        return new Produto(
            $linha->id,
            $linha->nome,
            $linha->valor
        );
    }
}