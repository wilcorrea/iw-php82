<?php

namespace Tests\Feature\Cadastro\Produto;

use App\Models\Cadastro\Produto;
use Tests\Feature\FeatureTestCase;

class FindTest extends FeatureTestCase
{
    public function test_produtos_recuperados()
    {
        // arrange: gera dados ou configura o ambiente para o teste
        $produto = Produto::factory()->create();

        // act: simula o comportamento do usuário ou da aplicação
        $response = $this->get('/api/produtos');
        
        // assert: valida se a resposta do act corresponde ao esperado
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJson([$produto->toArray()]);
    }
}
