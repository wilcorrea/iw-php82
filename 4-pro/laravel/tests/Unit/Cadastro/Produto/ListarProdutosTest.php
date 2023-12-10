<?php

namespace Tests\Unit\Cadastro\Produto;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Cadastro\Produto\ListarProdutos;
use App\Models\Cadastro\Produto;
use Mockery;

class ListarProdutosTest extends TestCase
{
    private ListarProdutos $listarProdutos;
    private $produto;

    public function setUp(): void
    {
        parent::setUp();
        $this->produto = Mockery::mock(Produto::class);
        $this->listarProdutos = new ListarProdutos($this->produto);
    }

    public function test__invoke()
    {
        # AAA
        $return = [
            'id' => 1,
            'nome' => 'Produto 1',
            'descricao' => 'Descrição do produto 1',
            'preco' => 10.00,
            'quantidade' => 10,
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ];
        // Arrange
        $this->produto
            ->shouldReceive('get')
            ->once()
            ->andReturn($return);

        // Act
        $resultados = $this->listarProdutos->__invoke();

        // Assert
        $this->assertEquals($resultados[0], $return[0]);
    }
}