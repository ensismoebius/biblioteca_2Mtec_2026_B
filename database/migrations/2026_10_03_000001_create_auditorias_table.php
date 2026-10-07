<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('AUDITORIAS', function (Blueprint $table) {
            $table->id('AUDCODIGO');
            $table->unsignedBigInteger('AUDUSUARIO')->nullable()->index();
            $table->string('AUDACAO', 10);
            $table->string('AUDTABELA', 60);
            $table->unsignedBigInteger('AUDREGISTRO');
            $table->json('AUDANTES')->nullable();
            $table->json('AUDDEPOIS')->nullable();
            $table->timestamp('AUDDATA')->useCurrent();

            $table->index(['AUDTABELA', 'AUDREGISTRO']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('AUDITORIAS');
    }
};
