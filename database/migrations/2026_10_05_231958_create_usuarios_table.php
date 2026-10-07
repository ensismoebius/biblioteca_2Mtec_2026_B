<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('USUARIOS', function (Blueprint $table) {
            $table->id('USRCODIGO');
            $table->string('USRNOME', 150);
            $table->string('USRCPF', 15)->unique();
            $table->string('USRLOGIN', 20)->unique();
            $table->string('USRSENHA', 255); // Bcrypt usa 60 caracteres; 255 também suporta Argon2.
            $table->foreignId('USRNIVEL')
                ->constrained('NIVEIS', 'NVLCODIGO')
                ->restrictOnDelete();
            $table->string('USREMAIL', 150)->unique();
            $table->date('USRDTCAD');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('USUARIOS');
    }
};