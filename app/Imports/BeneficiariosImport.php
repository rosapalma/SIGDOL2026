<?php

namespace App\Imports;

use App\Models\Beneficiario;
use App\Models\Personal;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Carbon;
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
    private $empleados;
    public function __construct(){
        $this->empleados = Personal::pluck('id', 'cedula');
    }
    
   public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            //Tipo de Personal - condicion laboral
             //*******administrativos ID 3**********
            if ($row['id'] == 60){
                $tipepers= 3;                
            }
            //*******obreros ID 3**********
            if ($row['id'] == 19){
                $tipepers = 2;               
            }
              //*******docentes ID 1**********
            if ($row['id'] == 54){
                $tipepers = 1;
            }
            //VALIDAR CELDAS DE FECHA
            if (isset($row['fecha_de_ingreso']) && trim($row['fecha_de_ingreso']) !== '') {
                $fechaIngreso = Date::excelToDateTimeObject((float)$row['fecha_de_ingreso']);
            } else {
                $fechaIngreso = null; // O lo que requiera tu campo en la BD
            }

            if (isset($row['fecha_de_jubilacion_o_pension']) && trim($row['fecha_de_jubilacion_o_pension']) !== '') {
                $fechaJubPens = Date::excelToDateTimeObject((float)$row['fecha_de_jubilacion_o_pension']);
            } else {
                $fechaJubPens = null; // O lo que requiera tu campo en la BD
            }

            if (isset($row['fecha_de_fallecido']) && trim($row['fecha_de_fallecido']) !== '') {
                $fechafallecido = Date::excelToDateTimeObject((float)$row['fecha_de_fallecido']);
            } else {
                $fechafallecido = null; // O lo que requiera tu campo en la BD
            }

            $emp= Personal::where('cedula','=',$row['cedula_del_fallecido'])->first(); 
            if (empty($emp)){
                  Personal::create([
                    'nac' => $row['n'],
                    'cedula' => $row['cedula_del_fallecido'],
                    'full_name' => $row['apellidos_y_nombres_fallecido'],
                    'fec_ing'=>  $fechaIngreso,
                    'fec_egre'=>  $fechaJubPens,
                    'fec_fallecido'=>  $fechafallecido,
                    'anos_servicio' => $row['anos_de_servicio'],
                    'jerarquia' => $row['jerarquia'],
                    'cargo' => $row['cargo'],
                    'categoria' => $row['categoria_academica'],
                    'dedication' => $row['tiempo_de_dedicacion'],
                    'porcentaje_jub_pens' => $row['porcentaje_de_jubilacion_o_pension'],
                    'condicion' => $row['condicion'],
                    'sede_id'=>2,
                    'typepers_id' => $tipepers, 
                ]);
            }
            else{
                $emp->condicion = $row['condicion'];
                $emp->fec_fallecido = $fechafallecido;
                $emp->save();
            }

            $benef= Beneficiario::where('cedula','=',$row['cedula_sobreviviente'])->first();
                    //ADD | UPDATE TABLE BENEFICIARIOS
                if ($benef){
                    $benef->personal_id = $emp->id;
                    $benef->cedula = $row['cedula_sobreviviente'];
                    $benef->full_name = $row['apellidos_y_nombres_sobreviviente'];
                    $benef->fec_pension = $fechafallecido;
                    $benef->porcentaje = $row['porcentaje_sobreviviente'];  
                    $benef->total_pension = $row['total_fallecido'];
                    $benef->save();

                }else{
                    $empleado= Personal::where('cedula','=',$row['cedula_del_fallecido'])->first(); 
                    Beneficiario::create([
                    'personal_id' => $empleado->id,
                    'cedula' => $row['cedula_sobreviviente'],
                    'full_name' => $row['apellidos_y_nombres_sobreviviente'],
                    'fec_pension' => $fechafallecido,
                    'porcentaje'=> $row['porcentaje_sobreviviente'],
                    'total_pension' => $row['total_fallecido'],    
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
