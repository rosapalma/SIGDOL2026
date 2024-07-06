<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypepersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('typepers')->truncate();

        DB::table('typepers')->insert(
            ['name' => 'Docente','abrev' => 'DOC'],
        );
        DB::table('typepers')->insert(
            ['name' => 'Obrero' , 'abrev' => 'OBR'],
        );
          DB::table('typepers')->insert(
            ['name' => 'Administrativo' , 'abrev' => 'ADM'],
        );
    }
}
