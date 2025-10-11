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
        Schema::create('pers_sueldos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id')->unique();
            $table->string('dedication')->nullable();
            $table->float('porcentaje_jub_pens')->nullable();
            $table->float('salario_base')->nullable();
            $table->float('salario_integral')->nullable();
            $table->timestamps();
            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('pers_sueldos');
    }
};
