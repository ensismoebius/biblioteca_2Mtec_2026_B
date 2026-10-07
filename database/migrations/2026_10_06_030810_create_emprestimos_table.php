<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('EMPRESTIMOS', function (Blueprint $table) {
            $table->increments('EMPCODIGO');

            $table->unsignedInteger('EMPLIVRO');
            $table->unsignedInteger('EMPUSUARIO');
            $table->unsignedInteger('EMPCLIENTE');

            $table->date('EMPDTEMPR');
            $table->date('EMPDTDEVOL')->nullable();

            $table->foreign('EMPLIVRO')
                ->references('LVRCODIGO')
                ->on('LIVROS')
                ->onDelete('restrict');

            $table->foreign('EMPUSUARIO')
                ->references('USRCODIGO')
                ->on('USUARIOS')
                ->onDelete('restrict');

            $table->foreign('EMPCLIENTE')
                ->references('CLICODIGO')
                ->on('CLIENTES')
                ->onDelete('restrict');

            $table->index(['EMPCLIENTE', 'EMPDTDEVOL']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('EMPRESTIMOS');
    }
};