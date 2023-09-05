<?php

namespace App\Http\Controllers\Cadastro;

use App\Models\Cadastro\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\CreateClienteRequest;
use App\Http\Requests\Cadastro\UpdateClienteRequest;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    public function find()
    {
        return Cliente::query()->get();
    }

    public function create(CreateClienteRequest $request)
    {
        return Cliente::query()->create($request->validated())->fresh();
    }

    public function read(string $id)
    {
        // select * from clientes where id = $id
        $cliente = Cliente::query()->find($id);
        return $cliente;
    }
 
    public function update(UpdateClienteRequest $request, string $id)
    {
        $cliente = Cliente::query()->find($id);
        $cliente->update($request->validated());
        return $cliente->fresh();
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::query()->find($id);
        $cliente->deleteOrFail();
        return $cliente;
    }
}