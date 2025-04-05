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
            $table->timestamps();  // Esto agregará los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->dropTimestamps();  // Esto eliminará los campos created_at y updated_at
        });
    }
};
