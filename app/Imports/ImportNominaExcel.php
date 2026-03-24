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
                'prima_por_hijos' => $row['prima_por_hijo'],
                'prima_profe' => $row['prima_profesional'],
                'prima_tsu' => $row['prima_tsu'],
                'prima_maestria' => $row['prima_maestria'],
                'prima_hijo_especial' => $row['prima_hijo_especial'],
                'prima_antiguedad' => $row['prima_antiguedad'],
                'prima_act_univ' => $row['prima_de_la_actividad_universitaria'],
                // 'prima_especializacion'=> $row['prima_especializacion'],
                // 'aseta' => $row['aseta'],
                // 'isrl' => $row['isrl'],
                'prima_chofer' => $row['prima_chofer'],
                'tota_asignaciones' => $row['total_asignaciones'],
                'salario_integral' => $row['salario_integral'],
                'seguro_social' => $row['seguro_social'],
                'satiutecpri' => $row['satiutecpri'],
                'pension_alimenticia' => $row['pension_alimenticia'],
                'paro_forzoso' => $row['paro_forzoso'],
                'ley_politica' => $row['ley_de_politica'],
                'cappaoupel' => $row['cappaoupel'],
                'total_deducciones' => $row['total_deducciones'],
                'salario_neto' => $row['salario_neto'],
                '1era_qna' => $row['1ra_quincena'],
                '2da_qna' => $row['2da_quincena'],
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
