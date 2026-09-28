<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'AUTORES';
    
    protected $primaryKey = 'AUTCODIGO';
    
    public $timestamps = false;

    protected $fillable = [
        'AUTNOME', 
    ];
}