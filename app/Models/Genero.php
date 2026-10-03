<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa um gênero literário do acervo (tabela GENEROS).
 */
class Genero extends Model
{
    protected $table = 'GENEROS';

    protected $primaryKey = 'GNRCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'GNRNOME',
    ];
}
