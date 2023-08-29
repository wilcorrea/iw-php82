<?php

namespace Tests\Unit;

class Subtrador
{
    public function subtrair(int|float $n1, int|float $n2): int|float
    {
        return $n1 - $n2;
    }
}