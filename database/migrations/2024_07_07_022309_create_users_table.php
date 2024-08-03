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
            $table->unsignedBigInteger('personal_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('privilege');
            $table->integer('statud');
            $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('user_created')->nullable();
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personals');
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
