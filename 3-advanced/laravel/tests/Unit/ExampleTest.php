<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    private Calculadora $calculadora;

    private mixed $subtrador;

    public function setUp(): void
    {
        parent::setUp();

        $this->subtrador = Mockery::mock(Subtrador::class);
        $this->calculadora = new Calculadora($this->subtrador);
    }

    public function test_somar(): void
    {
        $soma = $this->calculadora->somar(2, 2);
        $this->assertEquals(4, $soma);
    }

    public function test_subtrair(): void
    {
        // arrange
        $this->subtrador->shouldReceive('subtrair')
            // spy
            ->andReturnUsing(function (int|float $n1, int|float $n2) {
                // assert
                $this->assertEquals(2, $n1);
                $this->assertEquals(2, $n2);
                // arrange / act
                return $n1 - $n2;
            });
        // act
        $subtrair = $this->calculadora->subtrair(2, 2);
        
        // assert
        $this->assertEquals(0, $subtrair);
    }
}
