<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('RESERVAS', function (Blueprint $table) {
            $table->id('RSVCODIGO');

            // bigint (e não unsignedInteger) para casar com o id() de LIVROS e CLIENTES.
            $table->unsignedBigInteger('RSVLIVRO');
            $table->unsignedBigInteger('RSVCLIENTE');

            $table->timestamp('RSVDTRESERVA')->useCurrent();

            // aguardando | notificada | atendida | cancelada
            $table->string('RSVSTATUS', 15)->default('aguardando');
            $table->timestamp('RSVDTNOTIF')->nullable();

            $table->foreign('RSVLIVRO')
                ->references('LVRCODIGO')
                ->on('LIVROS')
                ->onDelete('restrict');

            $table->foreign('RSVCLIENTE')
                ->references('CLICODIGO')
                ->on('CLIENTES')
                ->onDelete('restrict');

            // A fila de um livro é lida sempre nesta ordem.
            $table->index(['RSVLIVRO', 'RSVSTATUS', 'RSVCODIGO']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('RESERVAS');
    }
};