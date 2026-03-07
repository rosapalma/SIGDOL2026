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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id'); //columna que trae la relacion
            $table->string('cedula')->unique(); //esta columna esta demas pero hace que emple tenga 1 solo usuario
            $table->string('email')->unique();
            $table->unsignedBigInteger('ps1_id')->nullable();
            $table->unsignedBigInteger('ps2_id')->nullable();
            $table->string('resp1')->nullable();
            $table->string('resp2')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('privilege');
            $table->integer('statud');
            $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_update')->nullable();
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('ps1_id')->references('id')->on('ps');
            $table->foreign('ps2_id')->references('id')->on('ps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
