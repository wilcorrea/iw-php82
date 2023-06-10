<?php

namespace App\Venda;

use App\Cadastro\Cliente;

class Pedido implements \JsonSerializable
{
    protected array $itens = [];

    private float $valor = 0;

    public function __construct(
        protected readonly Cliente $cliente
    )
    {
    }

    public function getItens()
    {
        return $this->itens;
    }

    public function adicionarItem(PedidoItem $pedidoItem)
    {
        $this->itens[] = $pedidoItem;
        $this->somarValorAoTotal(
            $pedidoItem->produto->valor * $pedidoItem->quantidade
        );
    }

    private function somarValorAoTotal(float $valor)
    {
        $this->valor = $this->valor + $valor;
    }

    public function jsonSerialize(): array
    {
        return [
            'app' => APPLICATION_NAME,
            'cliente' => $this->cliente,
            'itens' => $this->itens,
            'valor' => $this->valor
        ];
    }
}
