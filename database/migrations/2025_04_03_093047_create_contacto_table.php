<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //Alexis, eres un pendejo
        // Verifica si la tabla no existe antes de crearla
        if (!Schema::hasTable('contactos')) {
            Schema::create('contactos', function (Blueprint $table) {
                $table->id('Id_contacto');
                $table->string('Correo');
                $table->string('Telefono');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
