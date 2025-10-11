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
        Schema::create('personals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('cedula')->unique();
            $table->string('full_name')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cargo')->nullable();
            $table->string('dep_adsc')->nullable(); //dependencia de adscripcion
            $table->string('categoria')->nullable(); //categoria academica
            $table->string('email')->nullable();
            $table->date('fec_ing')->nullable();
            $table->date('fec_egre')->nullable();
            $table->string('dedication')->nullable();
            $table->float('porcentaje_jub_pens')->nullable();            
            $table->unsignedBigInteger('spacework_id')->nullable(); //dpto
            $table->unsignedBigInteger('condicionlaboral_id')->nullable();
            $table->unsignedBigInteger('typepers_id')->nullable();
            $table->text('jerarquia')->nullable();
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->timestamps();

            //Relaciones
            $table->foreign('spacework_id')->references('id')->on('spacesworks');
            $table->foreign('typepers_id')->references('id')->on('typepers');
            $table->foreign('condicionlaboral_id')->references('id')->on('condicionlaborals');
            $table->foreign('sede_id')->references('id')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
