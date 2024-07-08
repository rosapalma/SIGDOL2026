<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersSueldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pers_sueldos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        

        DB::table('pers_sueldos')->insert([
            'personal_id' => '1',
            'dedication' => 'exclusiva',
            'porcentaje_jub_pens' => '100',
            'salario_base' => '400',
            'salario_integral' => '550',
        ],);

    }
}
