<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Classe de testes para validacao do catalogo publico de livros.
 */
class LivroApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste para verificar se a rota publica de livros responde corretamente.
     */
    #[Test]
    public function rota_publica_de_livros_deve_retornar_status_200()
    {
        // Faz a requisição direta na rota pública que você configurou
        $response = $this->getJson('/api/livros');

        // Garante que o catálogo responde com sucesso (Status 200 OK)
        $response->assertStatus(200);
    }
}
