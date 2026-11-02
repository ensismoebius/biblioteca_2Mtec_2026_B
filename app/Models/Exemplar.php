<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Cópia física de um livro do acervo (tabela EXEMPLARES).
 */
class Exemplar extends Model
{
    protected $table = 'EXEMPLARES';

    protected $primaryKey = 'EXMCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'EXMLIVRO',
        'EXMDISPONIVEL',
        'EXMDTAQUISICAO',
    ];

    protected $casts = [
        'EXMDISPONIVEL' => 'boolean',
        'EXMDTAQUISICAO' => 'date',
    ];

    /**
     * Livro do qual este exemplar é uma cópia.
     */
    public function livro(): BelongsTo
    {
        return $this->belongsTo(Livro::class, 'EXMLIVRO', 'LVRCODIGO');
    }

    /**
     * Exemplares disponíveis para empréstimo.
     */
    public function scopeDisponiveis(Builder $query): Builder
    {
        return $query->where('EXMDISPONIVEL', true);
    }

    /**
     * Exemplares atualmente emprestados.
     */
    public function scopeEmprestados(Builder $query): Builder
    {
        return $query->where('EXMDISPONIVEL', false);
    }
}
