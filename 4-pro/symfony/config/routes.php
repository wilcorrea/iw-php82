<?php

use App\Controller\Cadastro\ProdutoController;
use App\Controller\LuckyController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $router): void
{
    $router->add('lucky', '/lucky/number')
        ->controller(LuckyController::class);

    $router->add('produtos_lista', '/produtos')
        ->controller([ProdutoController::class, 'index']);
};