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
        Schema::table('contactos', function (Blueprint $table) {
            $table->softDeletes();  // Esto agrega la columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->dropSoftDeletes();  // Esto elimina la columna deleted_at
        });
    }
};
