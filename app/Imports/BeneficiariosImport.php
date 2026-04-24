<?php

namespace App\Imports;

use App\Models\Beneficiario;
use App\Models\Personal;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BeneficiariosImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    use Importable;
    private $numRows = 0;
    public function __construct(){
        $this->empleados = Personal::pluck('id', 'cedula');
    }
    
   public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            //ADD | UPDATE TABLE BENEFICIARIOS
            $emp= Personal::where('cedula','=',$row['cedula_empleado'])->first();
            $benef= Beneficiario::where('cedula','=',$row['cedula_sobreviviente'])->first();
            if ($benef){
                $benef->personal_id = $emp->id;
                $benef->cedula = $row['cedula_sobreviviente'];
                $benef->full_name = $row['apellidos_y_nombres'];
                $benef->fec_nac =  Date::excelToDateTimeObject($row['fecha_de_nacimiento']);
                $benef->porcentaje = $row['porcentaje'];
                $benef->save();
            }else{
                Beneficiario::create([
                'personal_id' => $emp->id,
                'cedula' => $row['cedula_sobreviviente'],
                'full_name' => $row['apellidos_y_nombres'],
                'fec_nac' => Date::excelToDateTimeObject($row['fecha_de_nacimiento']),
                'porcentaje'=> $row['porcentaje'],

                ]);
            }
            

            $emp='';
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


}
