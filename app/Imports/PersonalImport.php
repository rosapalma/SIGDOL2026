<?php

namespace App\Imports;

use DateTime;
use App\Models\Cargo;
use App\Models\Personal;
use App\Models\User;
use App\Models\Typepers;
use App\Models\Condicionlaboral;
use App\Models\Pers_Sueldo;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;
use Auth;

class PersonalImport implements  ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;
    private $numRows = 0;
    private $empleados;
    //private $tipo;
    private $tipepers;
    private $CondLab;
    private $user_id;

    private $condicionlaboral;
    public function __construct(){
        $this->empleados = Personal::pluck('id', 'cedula'); //el paquete 'pluck' delimita el tiempo, estudiar 'Queued Reading' oara archivos grandes
        

        //$this->tipo = Typepers::pluck('id', 'abrev');
        //$this->condicionlaboral = Condicionlaboral::pluck('id','abrev');
    }



    public function collection(Collection $rows)
    {
        $user = Auth::User();
        $user_id = $user->id;
        
        foreach ($rows as $row)
        {
           //Tipo de Personal - condicion laboral
             //*******administrativos ID 3**********
            if ($row['id'] == 20){
                $tipepers= 3;
                $CondLab = 1; //Activo
            }else if ($row['id'] == 22){
                $tipepers = 3;  
                $CondLab = 3; //jubilado
            }else if ($row['id'] == 24){
                $tipepers = 3; 
                $CondLab = 4; //PENSIONADO
            }else if ($row['id'] == 26){
                $tipepers= 3; 
                $CondLab = 2; //CONTR
            }
            //*******obreros ID 2**********
            if ($row['id'] == 15){
                $tipepers = 2; 
                $CondLab = 1; //ACT
            }else if ($row['id'] == 16){
                $tipepers = 2;
                $CondLab = 3; //'JUB';
            }else if ($row['id'] == 17){
                $tipepers= 2;
                $CondLab = 4; // 'PENS';
            }else if ($row['id'] == 18){
                $tipepers= 2;
                $CondLab = 2; // 'CONT';
            }
              //*******docentes ID 1**********
            if ($row['id'] == 50){
                $tipepers = 1;
                $CondLab = 1;//'ACT';
            }else if ($row['id'] == 52){
                $tipepers = 1; 
                $CondLab = 3;//'JUB';
            }else if ($row['id'] == 53){
                 $tipepers = 1; 
                 $CondLab = 4; //PENS
            }else if ($row['id'] == 56){
                 $tipepers = 1; 
                 $CondLab = 2; //CONT
            }

            //VALIDAR CELDAS DE FECHA
            if (isset($row['fecha_de_ingreso']) && trim($row['fecha_de_ingreso']) !== '') {
                $fechaIngreso = Date::excelToDateTimeObject((float)$row['fecha_de_ingreso']);
            } else {
                $fechaIngreso = null; 
            }
            if (isset($row['fecha_de_egreso']) && trim($row['fecha_de_egreso']) !== '') {
                $egreso = Date::excelToDateTimeObject((float)$row['fecha_de_egreso']);
            } else {
                $egreso = null; 
            }


            //ADD | UPDATE TABLE EMPLEADO
            $emp= Personal::where('cedula','=',$row['cedula'])->first();
            if ($emp){
                $emp->nac = $row['n'];
                $emp->cedula = $row['cedula'];
                $emp->full_name = $row['apellidos_y_nombres'];
                $emp->fec_ing =  $fechaIngreso;
                $emp->fec_egre = $egreso;
                $emp->dedication = $row['tiempo_de_dedicacion'];
                $emp->porcentaje_jub_pens = $row['porcentaje_de_jubilacion_o_pension'];
                $emp->anos_servicio = $row['anos_de_servicio'];
                $emp->sede_id = 2;
                $emp->cargo = $row['cargo'];
                $emp->dep_adsc = $row['dependencia_de_adscripcion'];
                $emp->categoria = $row['categoria_academica'];
                $emp->jerarquia = $row['denominacion_cargo_de_jerarquia'];
                $emp->typepers_id = $tipepers;
                $emp->condicionlaboral_id = $CondLab;
                $emp->user_id = $user_id;
                $emp->save();
            }else{
                Personal::create([
                'nac' => $row['n'],
                'cedula' => $row['cedula'],
                'full_name' => $row['apellidos_y_nombres'],
                'cargo' => $row['cargo'],
                'dep_adsc' => $row['dependencia_de_adscripcion'],
                'categoria' => $row['categoria_academica'],
                'fec_ing'=>  $fechaIngreso,
                'fec_egre'=>  $egreso,
                'dedication' => $row['tiempo_de_dedicacion'],
                'porcentaje_jub_pens' => $row['porcentaje_de_jubilacion_o_pension'],
                'anos_servicio' => $row['anos_de_servicio'],
                'sede_id'=>2,
                'jerarquia' => $row['denominacion_cargo_de_jerarquia'],
                'typepers_id' => $tipepers,
                'condicionlaboral_id' => $CondLab,
                'user_id' => $user_id,
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
            '*.cedula' => ['required'],//add unique
            '*.fecha_de_ingreso'=>['required'],
            '*.cargo'=>['required'],

        ];
    }

}
