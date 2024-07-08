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
            $table->unsignedBigInteger('personal_id')->unique();           
            $table->string('email')->unique(); // //'required|email|unique:users',
            $table->integer('privilege');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // 'required|confirmed|min:8',
            $table->integer('statud');
            $table->integer('user_created')->nullable();
            $table->rememberToken();
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
