<?php

use App\Cadastro\Produto;

require __DIR__ . '/vendor/autoload.php';

$json = '[
    {
      "nome": "Sabonete",
      "valor": 3.45
    },
    {
      "nome": "Salgado",
      "valor": 4.35
    }
  ]';
var_dump($json);
$array = json_decode($json);
var_dump($array);
foreach($array as $object) {
    $produto = new Produto($object->nome, $object->valor);
    var_dump($produto);
}