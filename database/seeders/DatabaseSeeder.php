<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
      $this->call([
        SedesSeeder::class,
        TypepersSeeder::class,
        SpacesworkSeeder::class,
        CondicionlaboralSeeder::class,
        PersonalSeeder::class,
        PS::class, //preguntas de seguridad
        UserSeeder::class, // IMPORTANDO USUARIO ADMINISTRADOR
    

      ]);

    }
}
