<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NominaExcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nomina_excels')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('nomina_excels')->insert([
            'personal_id'=>'1',
            'salario_basico'=> '400',
            'prima_fliar'=> '1',
            'prima_por_hijos'=> '0.5',
            'prima_profe'=> '1',
            //'prima_maestria'=> '',
            //'prima_hijo_especial'=> '',
            //'prima_tsu' => '',
            'prima_antiguedad'=> '1',
            'prima_act_univ'=> '1',
            //'prima_chofer'=> '',
            'tota_asignaciones'=> '4.5',
            'salario_integral'=> '404.5',
            'seguro_social'=> '0.5',
            'satiutecpri'=> '1',
            //'pension_alimenticia'=> '',
            //'paro_forzoso'=> '',
            'ley_politica'=> '1',
            'cappaoupel'=>'1',
            'total_deducciones'=>'3.5',
            'salario_neto'=>'401',
            'primera_qna'=>'200.5',
            'segunda_qna'=>'200.5',
            //'bono_nocturno'=>'',
            //'beca'=>'',
            'mes'=>'02',
            'anio' => '2024',
        ],);
      
    }
}
