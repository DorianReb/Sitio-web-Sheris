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
        // Verifica si la tabla no existe antes de crearla
        if (!Schema::hasTable('puestos')) {
            Schema::create('puestos', function (Blueprint $table) {
                $table->id('Id_puesto');
                $table->string('nombre');
                $table->string('descripcion')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
