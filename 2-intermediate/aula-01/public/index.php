<?php

use Slim\Factory\AppFactory;
use App\Actions\NewPedido;
use App\Actions\StorePedido;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/pedido/new', NewPedido::class);

$app->post('/pedido', StorePedido::class);

$app->run();
