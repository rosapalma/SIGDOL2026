<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //PREGUNTAS DE SEGURIDAD
    public function up(): void
    {
        Schema::create('ps', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->bigIncrements('id');
            $table->string('pregunta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ps');
    }
};
