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
        Schema::create('nomina_excels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id');
            $table->float('salario_basico')->nullable();
            $table->float('prima_fliar')->nullable();
            $table->float('prima_por_hijos')->nullable();
            $table->float('prima_profe')->nullable();
            $table->float('prima_tsu')->nullable();
            $table->float('prima_maestria')->nullable();
            $table->float('prima_hijo_especial')->nullable();
            $table->float('prima_antiguedad')->nullable();
            $table->float('prima_act_univ')->nullable();
            $table->float('prima_chofer')->nullable();
            $table->float('tota_asignaciones')->nullable();
            $table->float('salario_integral')->nullable();
            $table->float('seguro_social')->nullable();
            $table->float('satiutecpri')->nullable();
            $table->float('pension_alimenticia')->nullable();
            $table->float('paro_forzoso')->nullable();
            $table->float('ley_politica')->nullable();
            $table->float('cappaoupel')->nullable();
            $table->float('total_deducciones')->nullable();
            $table->float('salario_neto')->nullable();
            $table->float('primera_qna')->nullable();
            $table->float('segunda_qna')->nullable();
            $table->float('bono_nocturno')->nullable();
            $table->float('beca')->nullable();
            $table->integer('mes')->nullable();
            $table->integer('anio')->nullable();

            $table->foreign('personal_id')->references('id')->on('personals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina_excels');
    }
};
