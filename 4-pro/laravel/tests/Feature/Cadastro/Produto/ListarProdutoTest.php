<?php

namespace Tests\Feature\Cadastro\Produto;

class ListarProdutoTest extends \Tests\TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/produtos');

        $response->assertStatus(200);
    }
}