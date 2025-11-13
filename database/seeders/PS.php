<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('ps')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('ps')->insert(['pregunta' => 'Marca o Modelo de tu primer auto']);
        DB::table('ps')->insert(['pregunta' => 'Nombre de tu primera mascota']);
        DB::table('ps')->insert(['pregunta' => 'Lugar favorito donde te gusta ir de vacaciones']);
        DB::table('ps')->insert(['pregunta' => 'Deporte favorito']);
        DB::table('ps')->insert(['pregunta' => 'Comida Favorita']);
        DB::table('ps')->insert(['pregunta' => 'Nombre de tu mejor amigo(a) de la infancia']);
    }
}
