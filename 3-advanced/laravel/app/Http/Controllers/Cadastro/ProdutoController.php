<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\CreateProdutoRequest;
use App\Http\Requests\Cadastro\UpdateProdutoRequest;
use App\Models\Cadastro\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function find(Produto $produto)
    {
        return $produto->get();
    }

    public function create(CreateProdutoRequest $request, Produto $produto)
    {
        return $produto->create($request->validated());
    }

    public function read(Produto $produto)
    {
        return $produto;
    }
 
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        //
    }

    public function destroy(Produto $produto)
    {
        $produto->deleteOrFail();
        return $produto;
    }
}
