<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa um autor de livros do acervo (tabela AUTORES).
 */
class Autor extends Model
{
    protected $table = 'AUTORES';

    protected $primaryKey = 'AUTCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'AUTNOME',
        'AUTPSEUDONIMO',
        'AUTBIOGRAFIA',
        'AUTPAISNASC',
    ];
}
