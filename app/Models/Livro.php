<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Livro do acervo da biblioteca, com seus gêneros, autores e exemplares.
 */
class Livro extends Model
{
    protected $table = 'LIVROS';

    protected $primaryKey = 'LVRCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'LVRTITULO',
        'LVRISBN',
        'LVREDICAO',
        'LVRDTPUBLIC',
        'LVRSINOPSE',
        'LVRFAIXAETARIA',
    ];

    protected $casts = [
        'LVRDTPUBLIC' => 'date',
        'LVRFAIXAETARIA' => 'integer',
    ];

    /**
     * Gêneros do livro, via tabela CLASSIFICACAO.
     */
    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class, 'CLASSIFICACAO', 'CLSLIVRO', 'CLSGENERO')
            ->withPivot('CLSPRINCIPAL');
    }

    /**
     * Autores do livro, via tabela AUTORIA.
     */
    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'AUTORIA', 'ATRLIVRO', 'ATRAUTOR')
            ->withPivot('ATRPRINCIPAL');
    }

    /**
     * Cópias físicas do livro.
     */
    public function exemplares(): HasMany
    {
        return $this->hasMany(Exemplar::class, 'EXMLIVRO', 'LVRCODIGO');
    }

    /**
     * Gênero marcado como principal, ou null se não houver.
     */
    public function generoPrincipal(): ?Genero
    {
        return $this->generos()->wherePivot('CLSPRINCIPAL', true)->first();
    }

    /**
     * Autor marcado como principal, ou null se não houver.
     */
    public function autorPrincipal(): ?Autor
    {
        return $this->autores()->wherePivot('ATRPRINCIPAL', true)->first();
    }
}
