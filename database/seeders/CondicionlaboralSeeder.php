<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CondicionlaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('condicionlaborals')->truncate();

        DB::table('condicionlaborals')->insert(///fijo
            ['name' => 'Activo','abrev' => 'ACT'], 
        );
        DB::table('condicionlaborals')->insert(
            ['name' => 'Contratado','abrev' => 'CONT'], 
        );
        DB::table('condicionlaborals')->insert(
            ['name' => 'Jubilado','abrev' => 'JUB'],  
        );
        DB::table('condicionlaborals')->insert(
            ['name' => 'Pensionado','abrev' => 'PENS'],  
        );
        DB::table('condicionlaborals')->insert(
        ['name' => 'Sobreviviente','abrev' => 'SOBVI'],  
        );
    }
}
