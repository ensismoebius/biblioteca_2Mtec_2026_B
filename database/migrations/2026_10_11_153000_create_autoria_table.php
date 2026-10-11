<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('AUTORIA', function (Blueprint $table) {
            $table->foreignId('ATRLIVRO')
                ->constrained('LIVROS', 'LVRCODIGO')
                ->onDelete('cascade');
            $table->foreignId('ATRAUTOR')
                ->constrained('AUTORES', 'AUTCODIGO')
                ->onDelete('cascade');
            $table->boolean('ATRPRINCIPAL')->nullable();

            $table->primary(['ATRLIVRO', 'ATRAUTOR']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('AUTORIA');
    }
};