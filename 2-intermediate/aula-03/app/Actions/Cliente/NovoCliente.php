<?php

namespace App\Actions\Cliente;

use Slim\Views\PhpRenderer;

class NovoCliente
{
    public function __invoke($request, $response)
    {
        $renderer = new PhpRenderer(__DIR__ . '/../../../resources/views');
        return $renderer->render($response, 'cliente/novo.php', []);
    }
}