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
            if (!Schema::hasColumn('promociones', 'Imagen')) {
                $table->string('Imagen')->nullable()->after('Descripcion');
            }

            if (!Schema::hasColumn('promociones', 'Alt_imagen')) {
                $table->string('Alt_imagen')->nullable()->after('Imagen');
            }
        });
    }
};
