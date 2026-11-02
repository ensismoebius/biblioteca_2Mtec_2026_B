<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

/**
 * Popula a tabela NIVEIS com os níveis de acesso do sistema.
 */
class NivelSeeder extends Seeder
{
    /**
     * Cria os níveis que ainda não existem.
     */
    public function run(): void
    {
        $niveis = ['Administrador', 'Bibliotecário', 'Atendente'];

        Nivel::unguarded(function () use ($niveis) {
            foreach ($niveis as $nome) {
                Nivel::firstOrCreate(['NVLNOME' => $nome]);
            }
        });
    }
}
