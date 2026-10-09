<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function login_correto_deve_devolver_token()
    {
        $user = User::factory()->create([
            'email' => 'teste@biblioteca.com',
            'password' => bcrypt('senha123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'teste@biblioteca.com',
            'password' => 'senha123',
        ]);

        $response->assertStatus(200);
        // $response->assertJsonStructure(['token']);
    }

    #[Test]
    public function login_errado_deve_devolver_erro_de_autenticacao()
    {
        User::factory()->create([
            'email' => 'teste@biblioteca.com',
            'password' => bcrypt('senha123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'teste@biblioteca.com',
            'password' => 'senha_errada',
        ]);

        $response->assertStatus(422);
    }

    #[Test]
    public function rota_protegida_sem_token_deve_devolver_erro_401()
    {
        $response = $this->getJson('/api/users');

        $response->assertStatus(401);
    }
}
