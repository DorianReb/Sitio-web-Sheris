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
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre'); // Nombre de la categoría
        $table->text('descripcion')->nullable(); // Descripción opcional
        $table->timestamps(); // Campos created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
