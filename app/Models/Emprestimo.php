<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprestimo extends Model
{
    protected $table = 'EMPRESTIMOS';
    protected $primaryKey = 'EMPCODIGO';

    public function livro(): BelongsTo{
    return $this->belongsTo(Livro::class);
    }

    public function cliente(): BelongsTo{
    return $this->belongsTo(Cliente::class);
    }

    public function usuario(): BelongsTo{
    return $this->belongsTo(Usuario::class);
    }

    protected function scopeAtivos($query){
        return $query->whereNull('EMPDTDEVOL');
        Emprestimo::ativos()->count();
    }
    protected function scopeDevolvidos(){
        return $query->whereNotNull('EMPDTDEVOL');
    }

    protected function casts(): array{
        return[
            'EMPDTEMPR'=> 'date',
            'EMPDTDEVOL' => 'date'
        ];
        
    }
}
