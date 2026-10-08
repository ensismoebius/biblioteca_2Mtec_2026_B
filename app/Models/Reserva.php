<?php

namespace App\Models;

use App\Models\Concerns\Auditavel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Representa a reserva de um livro indisponível por um cliente (tabela RESERVAS).
 *
 * A ordem de chegada na fila é dada pelo código da reserva (autoincremento).
 */
class Reserva extends Model
{
    use Auditavel;

    public const STATUS_AGUARDANDO = 'aguardando';

    public const STATUS_NOTIFICADA = 'notificada';

    public const STATUS_ATENDIDA = 'atendida';

    public const STATUS_CANCELADA = 'cancelada';

    protected $table = 'RESERVAS';

    protected $primaryKey = 'RSVCODIGO';

    public $timestamps = false;

    protected $attributes = [
        'RSVSTATUS' => self::STATUS_AGUARDANDO,
    ];

    protected $fillable = [
        'RSVLIVRO',
        'RSVCLIENTE',
        'RSVDTRESERVA',
        'RSVSTATUS',
        'RSVDTNOTIF',
    ];

    /**
     * Converte as colunas de data em Carbon.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'RSVDTRESERVA' => 'datetime',
            'RSVDTNOTIF' => 'datetime',
        ];
    }

    /**
     * Reservas que ainda esperam na fila de um livro, da mais antiga para a mais nova.
     */
    public function scopeNaFila(Builder $consulta, int $livro): Builder
    {
        return $consulta
            ->where('RSVLIVRO', $livro)
            ->where('RSVSTATUS', self::STATUS_AGUARDANDO)
            ->orderBy('RSVCODIGO');
    }

    /**
     * Reservas ainda abertas (esperando ou já avisadas), usadas para bloquear empréstimo direto.
     */
    public function scopeAbertas(Builder $consulta): Builder
    {
        return $consulta->whereIn('RSVSTATUS', [
            self::STATUS_AGUARDANDO,
            self::STATUS_NOTIFICADA,
        ]);
    }

    /**
     * Posição desta reserva na fila do livro (1 = primeiro da fila).
     */
    public function posicao(): int
    {
        return self::naFila($this->RSVLIVRO)
            ->where('RSVCODIGO', '<', $this->RSVCODIGO)
            ->count() + 1;
    }
}
