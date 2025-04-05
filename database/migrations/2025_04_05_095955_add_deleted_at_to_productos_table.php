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
        Schema::table('productos', function (Blueprint $table) {
            // Agregar la columna deleted_at
            $table->timestamp('deleted_at')->nullable()->after('updated_at');
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar la columna deleted_at en caso de rollback
            $table->dropColumn('deleted_at');
        });
    }
};
