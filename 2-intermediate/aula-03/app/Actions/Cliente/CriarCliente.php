<?php

namespace App\Actions\Cliente;

use App\Models\ClienteModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CriarCliente
{
    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $clienteModel = new ClienteModel();
        $nome = $data['nome'] ?? '';
        $telefone = $data['telefone'] ?? '';
        $email = $data['email'] ?? '';
        $cliente = $clienteModel->criarCliente($nome, $telefone, $email);
        $response->getBody()->write(json_encode($cliente));
        return $response;
    }
}