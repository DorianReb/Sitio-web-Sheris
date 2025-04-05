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
        if (!Schema::hasTable('estado_reparto')) {
            Schema::create('estado_reparto', function (Blueprint $table) {
                $table->id('Id_estado');
                $table->string('estado');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_reparto');
    }
};
