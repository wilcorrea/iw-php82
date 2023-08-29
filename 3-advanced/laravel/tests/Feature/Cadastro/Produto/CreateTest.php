<?php

namespace Tests\Feature\Cadastro\Produto;

use App\Models\Cadastro\Produto;
use Tests\Feature\FeatureTestCase;

class CreateTest extends FeatureTestCase
{
    public function test_criar_produto()
    {
        $produto = Produto::factory()->make();

        $response = $this->post('/api/produtos', $produto->toArray());

        $response->assertStatus(201);
        $response->assertJson($produto->toArray());
    }
}
