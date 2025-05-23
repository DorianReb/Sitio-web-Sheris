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
        Schema::table('promociones', function (Blueprint $table) {
            $table->softDeletes(); // Esto agregará la columna 'deleted_at'
        });
    }

    public function down()
    {
        Schema::table('promociones', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto eliminará la columna 'deleted_at'
        });
    }
};
