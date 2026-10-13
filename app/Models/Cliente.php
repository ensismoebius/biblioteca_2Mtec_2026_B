<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'CLIENTES';
    protected $primaryKey = 'CLICODIGO';

    public function emprestimos(){
    return $this->hasMany(Emprestimo::class, 'EMPRESTIMOS', 'CLICODIGO');
    
    }

    public function getIdadeAttribute(CLIDTNASC)
    {
        return $this->CLIDTNASC ? Carbon::parse($this->CLIDTNASC)->age : null;
    }

     protected function casts(): array{
        return[
            'CLIDTNASC' => 'date',
            'CLIDTCAD' => 'date'
        ];
        
    }
}
