<?php

namespace Tests\Unit;

class Calculadora
{
    public function __construct(private readonly Subtrador $subtrador)
    {
    }

    public function somar(int|float $n1, int|float $n2): int|float
    {
        return $n1 + $n2;
    }

    public function subtrair(int|float $n1, int|float $n2): int|float
    {
        return $this->subtrador->subtrair($n1, $n2);
    }
}
