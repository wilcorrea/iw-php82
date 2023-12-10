<?php

namespace App\Http\Controllers\Cadastro\Produto;

use App\Models\Cadastro\Produto;
use Illuminate\Http\Request;

class CriarProduto
{
    public function __invoke(Request $request)
    {
        $data = $request->only(['nome', 'valor']);
        $produto = Produto::query()->create($data);
        return response()->json($produto, 201);
    }
}