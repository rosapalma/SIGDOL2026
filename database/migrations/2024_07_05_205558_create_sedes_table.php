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
        Schema::create('sedes', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->bigIncrements('id');
            $table->string('codigo')->nullable(); // cod_sede
            $table->string('name')->nullable(); //nombsede
            $table->string('abrev')->nullable(); //nombre corto
            $table->string('tipo')->nullable(); // EXT O SEDE
            $table->string('logo')->nullable(); //logo
            $table->string('url')->nullable(); //nombsede
            $table->string('active')->nullable(); //activo
            $table->string('direc')->nullable(); //direccion
            $table->string('phone')->nullable(); //telefono
            $table->string('type')->nullable(); //tipo
            $table->string('city')->nullable(); //cuidad
            $table->string('principalsede')->nullable(); // principalsede -->sede principal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
