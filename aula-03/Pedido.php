<?php

require_once __DIR__ . '/Cliente.php';

class Pedido
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

    public function adicionarItem(string $produto, float $valor)
    {
        $this->itens[] = $produto;
        $this->somarValorAoTotal($valor);
    }

    private function somarValorAoTotal(float $valor)
    {
        $this->valor = $this->valor + $valor;
    }
}
