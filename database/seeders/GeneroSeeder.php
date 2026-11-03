<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

/**
 * Popula a tabela GENEROS com os gêneros literários básicos do acervo.
 */
class GeneroSeeder extends Seeder
{
    /**
     * Cria os gêneros que ainda não existem.
     */
    public function run(): void
    {
        $generos = [
            'Romance',
            'Ficção Científica',
            'Fantasia',
            'Terror',
            'Biografia',
            'História',
            'Didático',
            'Infantil',
            'Poesia',
            'Técnico',
            'Autoajuda',
            'Mangá',
        ];

        foreach ($generos as $nome) {
            Genero::firstOrCreate(['GNRNOME' => $nome]);
        }
    }
}
