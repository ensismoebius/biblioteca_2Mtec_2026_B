<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'LIVROS';

    protected $primaryKey = 'LVRCODIGO';

    /**
     * Define o relacionamento provisório
     * Como a tabela LIVROS ainda não tem a chave estrangeira do autor,
     * vamos deixar o relacionamento mapeado. Se o grupo atualizar o banco futuramente,
     * o código já estará pronto!
     */
    public function autor()
    {

        return $this->belongsTo(Autor::class, 'LVRAUTCODIGO', 'AUTCODIGO');
    }
}
