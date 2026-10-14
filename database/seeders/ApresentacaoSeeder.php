<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

/**
 * Prepara os dados utilizados na demonstracao final da biblioteca.
 */
class ApresentacaoSeeder extends Seeder
{
    /**
     * Executa a criacao dos dados de demonstracao no ambiente local.
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            throw new RuntimeException(
                'O seeder de apresentacao so pode ser executado no ambiente local.'
            );
        }

        DB::transaction(function (): void {
            $this->criarNiveisEUsuarios();
            $this->criarAutoresELivros();
            $this->criarClientes();
            $this->criarGenerosEAssociacoes();
            $this->criarExemplares();
            $this->criarEmprestimos();
        });
    }

    /**
     * Cria os niveis e as contas de demonstracao.
     */
    private function criarNiveisEUsuarios(): void
    {
        DB::table('NIVEIS')->insertOrIgnore([
            ['NVLNOME' => 'Administrador'],
            ['NVLNOME' => 'Bibliotecario'],
        ]);

        $nivel = DB::table('NIVEIS')
            ->where('NVLNOME', 'Bibliotecario')
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
                'name' => 'Mariana Costa (Demonstracao)',
                'email_verified_at' => now(),
                'password' => Hash::make('DemoBiblioteca!2026'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    /**
     * Cadastra os autores e seus livros de demonstracao.
     */
    private function criarAutoresELivros(): void
    {
        DB::table('AUTORES')->insertOrIgnore([
            [
                'AUTCODIGO' => 900001,
                'AUTNOME' => 'Machado de Assis',
                'AUTPAISNASC' => 'Brasil',
            ],
            [
                'AUTCODIGO' => 900002,
                'AUTNOME' => 'Clarice Lispector',
                'AUTPAISNASC' => 'Ucrania',
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
    }

    /**
     * Cadastra os clientes utilizados nos emprestimos.
     */
    private function criarClientes(): void
    {
        DB::table('CLIENTES')->insertOrIgnore([
            [
                'CLICODIGO' => 900001,
                'CLINOME' => 'Ana Souza (Demonstracao)',
                'CLICPF' => '900.000.000-01',
                'CLITELEFONE' => '(11) 90000-0001',
                'CLIEMAIL' => 'ana.demo@example.com',
                'CLIDTNASC' => '2000-05-12',
                'CLIDTCAD' => '2026-10-01',
            ],
            [
                'CLICODIGO' => 900002,
                'CLINOME' => 'Pedro Lima (Demonstracao)',
                'CLICPF' => '900.000.000-02',
                'CLITELEFONE' => '(11) 90000-0002',
                'CLIEMAIL' => 'pedro.demo@example.com',
                'CLIDTNASC' => '1998-08-20',
                'CLIDTCAD' => '2026-10-01',
            ],
        ]);
    }

    /**
     * Cria generos e relaciona livros com autores e generos.
     */
    private function criarGenerosEAssociacoes(): void
    {
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
    }

    /**
     * Cadastra exemplares disponiveis e emprestados.
     */
    private function criarExemplares(): void
    {
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
    }

    /**
     * Cria emprestimos de demonstracao com datas relativas ao dia atual.
     */
    private function criarEmprestimos(): void
    {
        $usuario = DB::table('USUARIOS')
            ->where('USRLOGIN', 'demo.biblioteca')
            ->value('USRCODIGO');

        DB::table('EMPRESTIMOS')->insertOrIgnore([
            [
                'EMPCODIGO' => 900001,
                'EMPLIVRO' => 900001,
                'EMPUSUARIO' => $usuario,
                'EMPCLIENTE' => 900001,
                'EMPDTEMPR' => now()->subDays(10)->toDateString(),
                'EMPDTDEVOL' => null,
            ],
            [
                'EMPCODIGO' => 900002,
                'EMPLIVRO' => 900002,
                'EMPUSUARIO' => $usuario,
                'EMPCLIENTE' => 900002,
                'EMPDTEMPR' => now()->subDays(2)->toDateString(),
                'EMPDTDEVOL' => null,
            ],
        ]);
    }
}
