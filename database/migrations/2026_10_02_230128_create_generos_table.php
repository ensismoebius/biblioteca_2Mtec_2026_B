<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('GENEROS', function (Blueprint $table) {
        $table->id('GNRCODIGO');
        $table->string('GNRNOME', 30)->unique();
    });
}

public function down(): void
{
    Schema::dropIfExists('GENEROS');
}
};
