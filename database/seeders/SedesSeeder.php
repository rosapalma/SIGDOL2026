<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sedes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        
        DB::table('sedes')->insert(
            ['codigo' => '0100',
            'name' => 'Instituto Pedagógico de Caracas',
            'ShortName'=>'IPC', //nombre corto
            'tipo' => 'SEDE',
            'logo' => 'images/Logos/IPC.png',
            'city' => 'Caracas',
            'url'=>'www.upel.edu.ve',
            'direc'=> '',
            'phone'=>'',
            'principalsede'=>'Instituto Pedagógico de Caracas'],
        );
        DB::table('sedes')->insert(
            ['codigo' => '0200',
            'name' => 'Instituto Pedagógico Antonio Lira Alcalá',
            'ShortName'=>'IPM',
            'tipo' => 'SEDE',
            'logo' => 'images/Logos/IPM.png',
            'url'=>'www.ipm.upel.edu.ve',
            'direc'=> 'Final Av. Raúl Leoni. vía el sur, frente al C.C. "Parque Morichal", Maturín, Estado Monagas',
            'phone'=>'0291-6400100/640011/6415496',
            'city' => 'Maturín',
            'principalsede'=>'Instituto Pedagógico de Maturín'],
        );
        DB::table('sedes')->insert(
            ['codigo' => '0300',
            'name' => 'Instituto Pedagógico Antonio Lira Alcalá',
            'ShortName'=>'Extension capayacual',
            'tipo' => 'EXT',
            'logo' => 'images/Logos/IPM.png',
            'url'=>'www.ipm.upel.edu.ve',
            'direc'=> 'Final Av. Raúl Leoni. vía el sur, frente al C.C. "Parque Morichal", Maturín, Estado Monagas',
            'phone'=>'0291-6400100/640011/6415496',
            'city' => 'Maturín',
            'principalsede'=>'Instituto Pedagógico de Maturín'],
        );
        DB::table('sedes')->insert(
            ['codigo' => '0400',
            'name' => 'Instituto Pedagógico de Barquisimeto',
            'ShortName'=>'IPB',
            'tipo'=> 'SEDE',
            'logo' => 'images/Logos/IPB.png',
            'city' => 'Barquisimeto',
            'url'=>'',
            'direc'=> '',
            'phone'=>'',
            'principalsede'=>'Instituto Pedagógico de Barquisimeto'],
        );

    }
}
