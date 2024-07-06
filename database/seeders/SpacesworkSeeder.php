<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpacesworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spacesworks')->truncate();


        DB::table('spacesworks')->insert(
            ['name' => 'Unidad de Informatica'],
        );
        DB::table('spacesworks')->insert(
            ['name' => 'Secretaria'],
        );
        DB::table('spacesworks')->insert(
            ['name' => 'Unidad de personal'],
        );
        DB::table('spacesworks')->insert(
            ['name' => 'Administracion'],
        );
        DB::table('spacesworks')->insert(
            ['name' => 'Biblioteca'],
        );
    }
}
