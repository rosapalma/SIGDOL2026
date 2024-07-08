<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('beneficiarios')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
       
        DB::table('beneficiarios')->insert([
            'name' => 'Esther Victoria',
            'last_name' => 'Gonzalez Palma',
            'fec_nac' => '2023-01-20',
            'sexo' => 'F',
            'personal_id' => '1',
        ],);
        
    }
}
