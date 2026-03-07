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
       //posgresql omite el DB::statement('SET FOREIGN_KEY_CHECKS=0 o 1 
         //Nota: en laravel 10 las tablas padres relacionadas con tablas foraneas, se omite el truncatetabla()
      $this->call([
        SedesSeeder::class,
        TypepersSeeder::class,
        SpacesworkSeeder::class,
        CondicionlaboralSeeder::class,
        //DeduccionSeeder::class,
        //AsignacionSeeder::class,
        PersonalSeeder::class,
        //PersSueldoSeeder::class,
        //AutoridadSeeder::class,
       // NominaExcelSeeder::class,
        PS::class, //preguntas de seguridad
        UserSeeder::class, // HAY USUARIOS QUE PRIMERO DEBE SER IMPORTADOS
        //BeneficiarioSeeder::class,

      ]);


       // // 1. Desactivar restricciones de claves foráneas
       //  Schema::disableForeignKeyConstraints();

       //  // 2. Vaciar las tablas deseadas
       //  DB::table('A')->truncate();
       //  DB::table('posts')->truncate();
       //  DB::table('categories')->truncate();

       //  // 3. Reactivar restricciones
       //  Schema::enableForeignKeyConstraints();

    }
}
