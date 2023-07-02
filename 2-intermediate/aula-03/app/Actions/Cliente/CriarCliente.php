<?php

namespace App\Actions\Cliente;

use App\Models\ClienteModel;
use Slim\Views\PhpRenderer;
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
        $renderer = new PhpRenderer(__DIR__ . '/../../../resources/views');
        return $renderer->render($response, 'cliente/criado.php', ['cliente' => $cliente]);
        // return $response->withStatus(302)->withHeader('Location', '/cliente/novo');
    }
}