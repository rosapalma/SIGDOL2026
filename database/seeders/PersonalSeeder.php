<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
        

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('personals')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 

        DB::table('personals')->insert([
            'cedula' => '17708149',
            'name' => 'ROSA VIRGINIA',
            'last_name' => ' PALMA BRAVO',
            'email' => 'virginia.palma.ipm@upel.edu.ve',
            'fec_ing' => '2014-05-05',
            'sexo' => 'F',
            'spacework_id' => 1,
            'cargo_id'=>5,
            'typepers_id'=>2,
            'condicionlaboral_id'=>1,
            'sede_id'=>2,
        ],);


        DB::table('personals')->insert([
            'cedula' => '11111111',
            'name' => 'Cesar',
            'last_name' => 'Moreno',
            'email' => 'moreno.cesar.ipm@upel.edu.ve',
            'fec_ing' => '2010-05-05',
            'sexo' => 'M',
            'spacework_id' => 3,
            'cargo_id'=>5,
            'typepers_id'=>2,
            'condicionlaboral_id'=>1,
            'sede_id'=>2,
        ],);
    }
}
