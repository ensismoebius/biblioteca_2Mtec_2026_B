<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * Uma linha do histórico de auditoria: quem fez o quê, em qual registro e quando.
 */
class Auditoria extends Model
{
    protected $table = 'AUDITORIAS';

    protected $primaryKey = 'AUDCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'AUDUSUARIO',
        'AUDACAO',
        'AUDTABELA',
        'AUDREGISTRO',
        'AUDANTES',
        'AUDDEPOIS',
        'AUDDATA',
    ];

    /**
     * Converte as colunas JSON em array e a data em Carbon.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'AUDANTES' => 'array',
            'AUDDEPOIS' => 'array',
            'AUDDATA' => 'datetime',
        ];
    }

    /**
     * Usuário que realizou a alteração (nulo se foi o sistema/console).
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'AUDUSUARIO');
    }

    /**
     * Grava uma linha de auditoria para o model informado.
     *
     * Atributos ocultos do model (ex.: password) nunca são gravados.
     *
     * @param  array<string, mixed>|null  $antes
     * @param  array<string, mixed>|null  $depois
     */
    public static function registrar(string $acao, Model $modelo, ?array $antes, ?array $depois): void
    {
        $ocultos = array_flip($modelo->getHidden());

        self::create([
            'AUDUSUARIO' => Auth::id(),
            'AUDACAO' => $acao,
            'AUDTABELA' => $modelo->getTable(),
            'AUDREGISTRO' => $modelo->getKey(),
            'AUDANTES' => $antes === null ? null : array_diff_key($antes, $ocultos),
            'AUDDEPOIS' => $depois === null ? null : array_diff_key($depois, $ocultos),
            'AUDDATA' => now(),
        ]);
    }

    /**
     * Descreve o que mudou, uma linha por campo, pronta para exibir na tela.
     *
     * @return list<string>
     */
    public function detalhes(): array
    {
        $antes = $this->AUDANTES ?? [];
        $depois = $this->AUDDEPOIS ?? [];
        $linhas = [];

        foreach (array_keys($antes + $depois) as $campo) {
            $valorAntes = $antes[$campo] ?? '—';
            $valorDepois = $depois[$campo] ?? '—';

            $linhas[] = $this->AUDACAO === 'editou'
                ? "{$campo}: {$valorAntes} → {$valorDepois}"
                : "{$campo}: ".($this->AUDACAO === 'criou' ? $valorDepois : $valorAntes);
        }

        return $linhas;
    }
}
