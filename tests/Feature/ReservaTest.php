<?php

namespace Tests\Feature;

use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * Garante o comportamento básico da fila de reservas de livros.
 */
class ReservaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Cria um livro direto no banco e devolve o código dele.
     */
    private function criarLivro(): int
    {
        return DB::table('LIVROS')->insertGetId(['LVRTITULO' => 'Dom Casmurro']);
    }

    /**
     * Cria um cliente direto no banco e devolve o código dele.
     */
    private function criarCliente(string $cpf): int
    {
        return DB::table('CLIENTES')->insertGetId([
            'CLINOME' => 'Cliente '.$cpf,
            'CLICPF' => $cpf,
            'CLIDTNASC' => '2008-05-10',
            'CLIDTCAD' => '2026-10-01',
        ]);
    }

    /**
     * Uma reserva nova entra na fila com o status "aguardando".
     */
    public function test_reserva_nova_nasce_aguardando(): void
    {
        $reserva = Reserva::create([
            'RSVLIVRO' => $this->criarLivro(),
            'RSVCLIENTE' => $this->criarCliente('111.111.111-11'),
        ]);

        $this->assertSame(Reserva::STATUS_AGUARDANDO, $reserva->fresh()->RSVSTATUS);
        $this->assertNotNull($reserva->fresh()->RSVDTRESERVA);
    }

    /**
     * A fila devolve os clientes na ordem em que reservaram.
     */
    public function test_fila_respeita_a_ordem_de_chegada(): void
    {
        $livro = $this->criarLivro();
        $clientes = [
            $this->criarCliente('111.111.111-11'),
            $this->criarCliente('222.222.222-22'),
            $this->criarCliente('333.333.333-33'),
        ];

        foreach ($clientes as $cliente) {
            Reserva::create(['RSVLIVRO' => $livro, 'RSVCLIENTE' => $cliente]);
        }

        $this->assertSame(
            $clientes,
            Reserva::naFila($livro)->pluck('RSVCLIENTE')->all()
        );
    }
}