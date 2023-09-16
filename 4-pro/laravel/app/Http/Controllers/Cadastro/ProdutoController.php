<?php

namespace App\Http\Controllers\Cadastro;

use App\Models\Cadastro\Produto;
use Illuminate\Http\Request;

class ProdutoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::query()->get();
        return view('cadastro/produto/index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro/produto/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::query()->create($request->all());
        return redirect('/produtos')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::query()->find($id);
        return view('cadastro/produto/edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::query()->find($id);
        $produto
            ->fill($request->all())
            ->save();
        return redirect('/produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::query()->find($id);
        $produto->delete();
        return redirect('/produtos')->with('success', 'Produto apagado com sucesso!');
    }
}