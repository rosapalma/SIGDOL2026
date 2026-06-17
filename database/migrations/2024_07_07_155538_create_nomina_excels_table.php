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
            $table->float('prima_act_univ')->nullable();
            $table->float('prima_pregrado')->nullable();
            $table->float('prima_tsu')->nullable();
            $table->float('prima_maestria')->nullable();
            $table->float('prima_especializacion')->nullable();
            $table->float('prima_doctorado')->nullable();
            $table->float('prima_hijos')->nullable();
            $table->float('prima_hijo_especial')->nullable();
            $table->float('jerarquia_nivel1')->nullable();
            $table->float('jerarquia_nivel2')->nullable();
            $table->float('jerarquia_nivel3')->nullable();
            $table->float('jerarquia_nivel4')->nullable();
            $table->float('jerarquia_nivel5')->nullable();
            $table->float('jerarquia_nivel6')->nullable();
            $table->float('jerarquia_nivel7')->nullable();
            $table->float('jerarquia_nivel8')->nullable();
            $table->float('jerarquia_nivel9')->nullable();
            $table->float('jerarquia_nivel10')->nullable();
            $table->float('prima_titular')->nullable();
            $table->float('prima_chofer')->nullable();
            $table->float('prima_antiguedad')->nullable();
            $table->float('total_asignaciones')->nullable();
            $table->float('salario_integral')->nullable();
            $table->float('seguro_social')->nullable();
            $table->float('paro_forzoso')->nullable();
            $table->float('ley_politica')->nullable();
            $table->float('capaupel_docentes')->nullable();       
            $table->float('cappaoupel_adm_obr')->nullable();
            $table->float('aproupel_seccional_docentes')->nullable();
            $table->float('aproupel_nacional_docentes')->nullable();
            $table->float('asoprojupel_doc_jub')->nullable(); 
            $table->float('aseta_adm')->nullable();
            $table->float('satiutecpri_obrero')->nullable();
            $table->float('pension_alimenticia')->nullable();
            $table->float('fondo_ipp')->nullable();
            $table->float('salario_neto')->nullable();        
            $table->float('islr')->nullable();            
            $table->float('total_deducciones')->nullable();
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
