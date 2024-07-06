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
        Schema::create('deduccions', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->bigIncrements('id');            
            $table->string('codigo')->nullable();
            $table->string('description')->nullable();
            $table->float('monto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deduccions');
    }
};
