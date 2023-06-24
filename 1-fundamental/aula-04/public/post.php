<?php

require __DIR__ . '/../vendor/autoload.php';

// Full Qualified Name
use App\Cadastro\Cliente;
use App\Cadastro\Produto;
use App\Venda\Pedido;
use App\Venda\PedidoItem;

$cliente = new Cliente($_POST['cliente']);

$pedido = new Pedido($cliente);

$produtos = $_POST['produto'];
$quantidades = $_POST['quantidade'];

$pedido->adicionarItem(
    new PedidoItem(new Produto($produtos[0], 3.45), $quantidades[0])
);
$pedido->adicionarItem(
    new PedidoItem(new Produto($produtos[1], 4.35), $quantidades[1])
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Pedido Salvo</title>
</head>

<body>
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            Pedido salvo com sucesso!
        </div>
        <div>
            O valor do total do pedido foi <?php echo $pedido->getValorTotal() ?>
        </div>
    </div>
</body>

</html>