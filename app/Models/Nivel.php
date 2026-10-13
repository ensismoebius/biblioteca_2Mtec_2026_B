<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** Representa um nível de acesso do sistema (tabela NIVEIS) */
class Nivel extends Model
{
    protected $table = 'NIVEIS';

    protected $primaryKey = 'NVLCODIGO';

    public $timestamps = false;

    /** Função que retorna os usuários associados a um nível */
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'NVLCODIGO', 'NVLCODIGO');
    }
}
