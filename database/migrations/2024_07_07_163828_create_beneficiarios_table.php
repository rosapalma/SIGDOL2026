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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id');
            $table->integer('cedula')->nullable();
            $table->string('full_name')->nullable();
            $table->date('fec_nac')->nullable();
            $table->date('fec_pension')->nullable();
            $table->float('porcentaje')->nullable();
            $table->float('total_pension')->nullable(); //total del fallecido
            $table->timestamps();

    

            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
