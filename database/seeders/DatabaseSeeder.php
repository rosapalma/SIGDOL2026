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
       
         //Nota: en laravel 10 las tablas padres relacionadas con tablas foraneas, se omite el truncatetabla()
       $this->call([
          SedesSeeder::class,
          TypepersSeeder::class,
          SpacesworkSeeder::class,
          CondicionlaboralSeeder::class,
          DeduccionSeeder::class,
          AsignacionSeeder::class,
          GCargoSeeder::class,
          CargoSeeder::class,
          PersonalSeeder::class,
          PersSueldoSeeder::class,
          AutoridadSeeder::class,
          NominaExcelSeeder::class,
          UserSeeder::class,
          BeneficiarioSeeder::class,

       ]);

    }
}
