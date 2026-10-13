<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

/** Representa um usuário do sistema (tabela USUARIOS) */
class Usuario extends User
{
    protected $hidden = ['USRSENHA'];

    protected $table = 'USUARIOS';

    protected $primaryKey = 'USRCODIGO';

    public $timestamps = false;

    protected $fillable = [
        'USRNOME',
        'USRCPF',
        'USRLOGIN',
        'USRSENHA',
        'USRNIVEL',
        'USREMAIL',
        'USRDTCAD',
    ];

    protected $casts = ['USRDTCAD' => 'date'];

    /** Função que retorna a senha do usuário para autenticação */
    public function getAuthPassword()
    {
        return $this->USRSENHA;
    }

    /**Função que retorna o nível de acesso de um usuário */
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class, 'NVLCODIGO', 'NVLCODIGO');
    }
}
