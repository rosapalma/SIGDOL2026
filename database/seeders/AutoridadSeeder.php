<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
        
class AutoridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('autoridads')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('autoridads')->insert(
            [
                'spacework_id' => '3',//unidad de personal id 3
                'personal_id' => '1',
                'statud' => '1', //activo
            ],);
    }
}
