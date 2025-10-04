<?php

namespace App\Imports;

use DateTime;
use App\Models\Cargo;
use App\Models\Personal;
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

class PersonalImport implements  ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;
    private $numRows = 0;
    private $empleados;
    private $tipo;
    private $condicionlabora;

    private $condicionlaboral;
    public function __construct(){
        $this->empleados = Personal::pluck('id', 'cedula'); //el paquete 'pluck' delimita el tiempo, estudiar 'Queued Reading' oara archivos grandes

        $this->tipo = Typepers::pluck('id', 'abrev');
        $this->condicionlaboral = Condicionlaboral::pluck('id','abrev');
    }



    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
           //Tipo de Personal - condicion laboral
             //*******administrativos**********
            if ($row['id'] == 20){
                $row['id']= 'ADM';  
                $CondLab = 'ACT';
            }else if ($row['id'] == 22){
                $row['id']= 'ADM';  
                $CondLab = 'JUB';
            }else if ($row['id'] == 24){
                $row['id']= 'ADM';  
                $CondLab = 'PENS';
            }else if ($row['id'] == 19){
                $row['id']= 'ADM';  
                $CondLab = 'CONT';
            }
            //*******obreros**********
            if ($row['id'] == 15){
                $row['id']= 'OBR'; 
                $CondLab = 'ACT';
            }else if ($row['id'] == 16){
                $row['id']= 'OBR';
                $CondLab = 'JUB';
            }else if ($row['id'] == 17){
                $row['id']= 'OBR';
                $CondLab = 'PENS';
            }
              //*******docentes**********
            if ($row['id'] == 50){
                $row['id']= 'DOC';
                $CondLab = 'ACT';
            }else if ($row['id'] == 52){
                $row['id']= 'DOC'; 
                $CondLab = 'JUB';
            }else if ($row['id'] == 53){
                $row['id']= 'DOC'; 
                $CondLab = 'PENS';
            }

            //------FECHA DE EGRESO---------
            if ($row['fecha_de_jubilacion_o_pension']==''){
                $fec_egre = null;
            }else{
                $fec_egre=Date::excelToDateTimeObject($row['fecha_de_jubilacion_o_pension']);
            }

              //ADD | UPDATE TABLE EMPLEADO
            $emp= Personal::where('cedula','=',$row['cedula'])->first();
            if ($emp){
                $emp->cedula = $row['cedula'];
                $emp->full_name = $row['apellidos_y_nombres'];
                $emp->email = $row['email'];
                $emp->fec_ing =  Date::excelToDateTimeObject($row['fecha_de_ingreso']);
                $emp->fec_egre =  $fec_egre;
                $emp->sede_id = 2;
                $emp->cargo = $row['cargo'];
                $emp->dep_adsc = $row['dependencia_de_adscripcion'];
                $emp->categoria = $row['categoria_academica'];
                $emp->jerarquia = $row['jerarquia'];
                $emp->typepers_id = $this->tipo[$row['id']];
                $emp->condicionlaboral_id = $this->condicionlaboral[$CondLab];
                $emp->save();
            }else{
                Personal::create([
                'cedula' => $row['cedula'],
                'full_name' => $row['apellidos_y_nombres'],
                'cargo' => $row['cargo'],
                'dep_adsc' => $row['dependencia_de_adscripcion'],
                'categoria' => $row['categoria_academica'],
                'email' => $row['email'],
                'fec_ing'=>  Date::excelToDateTimeObject($row['fecha_de_ingreso']),
                'fec_egre'=>  $fec_egre,
                'sede_id'=>2,
                'jerarquia' => $row['jerarquia'],
                'typepers_id' => $this->tipo[$row['id']],
                'condicionlaboral_id' => $this->condicionlaboral[$CondLab],
                ]);
            }
            //VUELVE A BUSCARLO PARA UPDATE O INSERT DEDICACION Y PORCENTAJE + ULTIMO SALARIO DEL EMPLEADOR YA ACTUALIZADOS SEGUN NOMINA
            $emp= Personal::where('cedula','=',$row['cedula'])->first();
            $emp_salario= Pers_Sueldo::where('personal_id','=',$emp->id)->first();
            if ($emp_salario){
                $emp_salario->dedication = $row['tiempo_de_dedicacion'];
                $emp_salario->porcentaje_jub_pens = $row['porcentaje_de_jubilacion_o_pension'];
                $emp_salario->salario_base = $row['salario_basico'];
                $emp_salario->salario_integral = $row['salario_integral'];
                $emp_salario->save();
            }else{
                Pers_Sueldo::create([
                    'personal_id' => $emp->id,
                    'dedication' => $row['tiempo_de_dedicacion'],
                    '	porcentaje_jub_pens' => $row['porcentaje_de_jubilacion_o_pension'],
                    'salario_base' => $row['salario_basico'],
                    'salario_integral' => $row['salario_integral'],
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
