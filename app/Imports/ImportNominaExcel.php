<?php

namespace App\Imports;

use App\Models\Personal;
use App\Models\Pers_Sueldo;
use App\Models\NominaExcel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ImportNominaExcel implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{

    use Importable;
    private $numRows = 0;
    private $empleados;

    public function __construct(){
        $this->empleados = Personal::pluck('id', 'cedula'); 
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $emp = Personal::where('cedula','=',$row['cedula'])->first();
            if ($emp){     
                NominaExcel::create([
                'personal_id' => $emp->id,
                'salario_basico' => $row['salario_basico'],
                'prima_fliar' => $row['prima_familiar'],
                'prima_act_univ' => $row['prima_actividad_universitaria'],
                'prima_tsu' => $row['prima_profesional_tsu'],
                'prima_pregrado' => $row['prima_profesional_pregrado'],
                'prima_especializacion'=> $row['prima_profesional_especializacion'],
                'prima_maestria' => $row['prima_profesional_maestria'],
                'prima_doctorado' => $row['prima_profesional_doctorado'],
                'prima_hijo_especial' => $row['prima_por_hijo_con_discapacidad'],
                'prima_antiguedad' => $row['prima_antiguedad'],
                'prima_hijos' => $row['prima_por_hijo'],
                'jerarquia_nivel1'=> $row['jerarquia_nivel_1'],
                'jerarquia_nivel2'=> $row['jerarquia_nivel_2'],
                'jerarquia_nivel3'=> $row['jerarquia_nivel_3'],
                'jerarquia_nivel4'=> $row['jerarquia_nivel_4'],
                'jerarquia_nivel5'=> $row['jerarquia_nivel_5'],
                'jerarquia_nivel6'=> $row['jerarquia_nivel_6'],
                'jerarquia_nivel7'=> $row['jerarquia_nivel_7'],
                'jerarquia_nivel8'=> $row['jerarquia_nivel_8'],
                'jerarquia_nivel9'=> $row['jerarquia_nivel_9'],
                'jerarquia_nivel10'=> $row['jerarquia_nivel_10'],
                'prima_chofer' => $row['prima_chofer'],
                'prima_titular' => $row['prima_titular'],
                //'total_asignaciones' => $row['total_de_asignaciones'],
                'salario_integral' => $row['salario_integral'],
                //***********deduciones********
                'seguro_social' => $row['seguro_social'],
                'paro_forzoso' => $row['paro_forzoso'],
                'ley_politica' => $row['ley_de_politica'],
                'capaupel_docentes' => $row['capaupel_docentes'],
                'cappaoupel_adm_obr' => $row['cappaoupel_adm_obr'],
                'aproupel_seccional_docentes' => $row[ 'aproupel_seccional_docentes'],
                'aproupel_nacional_docentes' => $row[ 'aproupel_nacional_docentes'],
                'asoprojupel_doc_jub' => $row['asoprojupel_doc_jub'],
                'aseta_adm' => $row['aseta_adm'],
                'satiutecpri_obrero' => $row['satiutecpri_obr'],
                'paro_forzoso' => $row['paro_forzoso'],
                'fondo_ipp'=> $row['fondo_ipp'],
                'islr' => $row['islr'],
                'total_deducciones' => $row['total_deducciones'],
                'salario_neto' => $row['salario_neto'],
                'segunda_qna' => $row['segunda_quincena'],
                'bono_nocturno' => $row['bono_nocturno'],
                'beca' => $row['beca'],
                'mes' => $row['mes'],
                'anio' => $row['anio'],
               
                
                 ]);
            }
            $emp='';
            $emp_salario='';
            ++$this->numRows;
        }  
    }      

    public function getRowCount(): int //contador de registros
    {
        return $this->numRows;
    }
    public function batchSize(): int //implem. clase WithBatchInserts //define la cantidad de filas a insertar; puedo especificar la catidad que desee
    {
        return 4000;
    }
    public function chunkSize(): int // implem. class  WithChunkReading --> trabaja con la clase anterior
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            '*.cedula' => ['required'],
        ];
    }
}
