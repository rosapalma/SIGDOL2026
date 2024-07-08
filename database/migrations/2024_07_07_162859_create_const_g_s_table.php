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
        Schema::create('const_g_s', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->integer('nro'); //GUARDA ENTERO SIN CEROS A LA IZQUIERDA
            $table->date('fechaEmi'); //fecha de emision
            $table->unsignedBigInteger('nomina_id');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('nomina_id')->references('id')->on('nomina_excels');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('const_g_s');
    }
};
