<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class ApresentacaoSeeder extends Seeder
{
    public function run(): void
    {
        if (! app()->environment('local')) {
            throw new RuntimeException(
                'O seeder de apresentação só pode ser executado no ambiente local.'
            );
        }

        DB::transaction(function (): void {
            DB::table('NIVEIS')->insertOrIgnore([
                ['NVLNOME' => 'Administrador'],
                ['NVLNOME' => 'Bibliotecário'],
            ]);

            $nivel = DB::table('NIVEIS')
                ->where('NVLNOME', 'Bibliotecário')
                ->value('NVLCODIGO');

            DB::table('USUARIOS')->updateOrInsert(
                ['USRLOGIN' => 'demo.biblioteca'],
                [
                    'USRNOME' => 'Mariana Costa',
                    'USRCPF' => '90000000001',
                    'USRSENHA' => Hash::make('DemoBiblioteca!2026'),
                    'USRNIVEL' => $nivel,
                    'USREMAIL' => 'mariana.demo@example.com',
                    'USRDTCAD' => '2026-10-01',
                ]
            );
            DB::table('users')->updateOrInsert(
               ['email' => 'biblioteca.demo@example.com'],
                [
                    'name' => 'Mariana Costa (Demonstração)',
                    'email_verified_at' => now(),
                    'password' => Hash::make('DemoBiblioteca!2026'),
                    'remember_token' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                 ]
            );

            DB::table('AUTORES')->insertOrIgnore([
                [
                    'AUTCODIGO' => 900001,
                    'AUTNOME' => 'Machado de Assis',
                    'AUTPAISNASC' => 'Brasil',
                ],
                [
                    'AUTCODIGO' => 900002,
                    'AUTNOME' => 'Clarice Lispector',
                    'AUTPAISNASC' => 'Ucrânia',
                ],
            ]);

            DB::table('LIVROS')->insertOrIgnore([
                [
                    'LVRCODIGO' => 900001,
                    'LVRTITULO' => 'Dom Casmurro',
                    'LVRISBN' => 'DEMO900001',
                    'LVREDICAO' => 1,
                    'LVRDTPUBLIC' => '1899-01-01',
                    'LVRSINOPSE' => 'Romance de Machado de Assis.',
                    'LVRFAIXAETARIA' => 12,
                ],
                [
                    'LVRCODIGO' => 900002,
                    'LVRTITULO' => 'A Hora da Estrela',
                    'LVRISBN' => 'DEMO900002',
                    'LVREDICAO' => 1,
                    'LVRDTPUBLIC' => '1977-01-01',
                    'LVRSINOPSE' => 'Romance de Clarice Lispector.',
                    'LVRFAIXAETARIA' => 12,
                ],
            ]);

            DB::table('CLIENTES')->insertOrIgnore([
                [
                    'CLICODIGO' => 900001,
                    'CLINOME' => 'Ana Souza (Demonstração)',
                    'CLICPF' => '900.000.000-01',
                    'CLITELEFONE' => '(11) 90000-0001',
                    'CLIEMAIL' => 'ana.demo@example.com',
                    'CLIDTNASC' => '2000-05-12',
                    'CLIDTCAD' => '2026-10-01',
                ],
                [
                    'CLICODIGO' => 900002,
                    'CLINOME' => 'Pedro Lima (Demonstração)',
                    'CLICPF' => '900.000.000-02',
                    'CLITELEFONE' => '(11) 90000-0002',
                    'CLIEMAIL' => 'pedro.demo@example.com',
                    'CLIDTNASC' => '1998-08-20',
                    'CLIDTCAD' => '2026-10-01',
                ],
            ]);

            DB::table('GENEROS')->insertOrIgnore([
                ['GNRCODIGO' => 900001, 'GNRNOME' => 'Romance Demo'],
                ['GNRCODIGO' => 900002, 'GNRNOME' => 'Literatura Demo'],
            ]);

            DB::table('AUTORIA')->insertOrIgnore([
                [
                    'ATRLIVRO' => 900001,
                    'ATRAUTOR' => 900001,
                    'ATRPRINCIPAL' => true,
                ],
                [
                    'ATRLIVRO' => 900002,
                    'ATRAUTOR' => 900002,
                    'ATRPRINCIPAL' => true,
                ],
            ]);

            DB::table('CLASSIFICACAO')->insertOrIgnore([
                [
                    'CLSLIVRO' => 900001,
                    'CLSGENERO' => 900001,
                    'CLSPRINCIPAL' => true,
                ],
                [
                    'CLSLIVRO' => 900002,
                    'CLSGENERO' => 900002,
                    'CLSPRINCIPAL' => true,
                ],
            ]);

            DB::table('EXEMPLARES')->insertOrIgnore([
                [
                    'EXMCODIGO' => 900001,
                    'EXMLIVRO' => 900001,
                    'EXMDTAQUISICAO' => '2026-01-15',
                    'EXMDISPONIVEL' => false,
                ],
                [
                    'EXMCODIGO' => 900002,
                    'EXMLIVRO' => 900002,
                    'EXMDTAQUISICAO' => '2026-02-10',
                    'EXMDISPONIVEL' => true,
                ],
            ]);

            DB::table('EMPRESTIMOS')->insertOrIgnore([
                [
                    'EMPCODIGO' => 900001,
                    'EMPLIVRO' => 900001,
                    'EMPUSUARIO' => DB::table('USUARIOS')
                        ->where('USRLOGIN', 'demo.biblioteca')
                        ->value('USRCODIGO'),
                    'EMPCLIENTE' => 900001,
                    'EMPDTEMPR' => now()->subDays(10)->toDateString(),
                    'EMPDTDEVOL' => null,
                ],
                [
                    'EMPCODIGO' => 900002,
                    'EMPLIVRO' => 900002,
                    'EMPUSUARIO' => DB::table('USUARIOS')
                        ->where('USRLOGIN', 'demo.biblioteca')
                        ->value('USRCODIGO'),
                    'EMPCLIENTE' => 900002,
                    'EMPDTEMPR' => now()->subDays(2)->toDateString(),
                    'EMPDTDEVOL' => null,
                ],
            ]);
        });
    }
}
