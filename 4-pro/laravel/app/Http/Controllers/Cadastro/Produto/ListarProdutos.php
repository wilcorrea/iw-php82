<?php

namespace App\Http\Controllers\Cadastro\Produto;

use App\Models\Cadastro\Produto;

class ListarProdutos
{
    public function __construct(
        private readonly Produto $produto
    ) {
    }

    public function __invoke()
    {
        $produtos = $this->produto->get();
        return response()->json($produtos);
    }
}
