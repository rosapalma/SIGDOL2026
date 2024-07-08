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
        Schema::create('autoridads', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spacework_id'); //dpto
            $table->unsignedBigInteger('personal_id');
            $table->boolean('statud'); //->default(false);
            $table->timestamps();

            $table->foreign('spacework_id')->references('id')->on('spacesworks');
            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoridads');
    }
};
