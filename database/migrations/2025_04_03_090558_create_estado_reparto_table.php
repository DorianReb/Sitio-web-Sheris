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
        Schema::create('estado_reparto', function (Blueprint $table) {
            $table->id('Id_estado');  // Clave primaria personalizada
            $table->string('estado');  // Columna Estado
            $table->timestamps();  // Añade las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_reparto');
    }
};
