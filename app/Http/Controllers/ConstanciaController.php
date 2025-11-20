<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\Personal;
use App\Models\Autoridad;
use App\Models\Pers_Sueldo;
use App\Models\NominaExcel;
use App\Models\ConstG;
use App\Models\Sede;
use DB;
use PDF;  //download
use Redirect;
use Auth;
use Luecano\NumeroALetras\NumeroALetras;
use DateTime;


class ConstanciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function User(){ //USER AUTH
        $user = Auth::User();
        return $user;
    }
    public function Sede(){ // SEDE DE USER AUTH
        $user = $this->user();
        $pers = Personal::where('id','=',$user['personal_id'])->first();
        $sedeEmp = Sede::where('id','=',$pers->sede_id)->first(); //busca sede de empleado
        return $sedeEmp;
    }

    public function FechaAct(){
        $fecha = Date('Y-m-d');
        return $fecha;
    }

   public function Autoridad(){
        $JefeDpto = Autoridad::where('statud','=',1)->first(); //verifica si hay una autoridad activa
        if ($JefeDpto){
            $arrayjefe = $JefeDpto->Personal()->get();
            foreach ($arrayjefe as $je) {
                $autoridad=$je['id'];
            }
            $autoridad= $autoridad;
            return $autoridad;
        }
    }

    public function Codigo(){          //Generando codigo de seis digitos
         $ult = ConstG::all()->last(); // busca ultima constancia generada
        if(!empty($ult)){              //si existe almenos un registro
            $number = $ult->id+1;      //incremento
        }else{
            $number = 1;
        }
        $length = 6;
        $string = substr(str_repeat(0, $length).$number, - $length);
        return $string;
    }

    //************GENERAR CONSTANCIAS DE TRABAJO **************

    public function Const(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'tipo' => 'required'
        ]);

            //VERIFICANDO SI HAY AUTORIDAD ASIGNADO
        $autoridad= $this->Autoridad();
        if (empty($autoridad)){
              return Redirect::back()->with('error','Disculpe, en este momento su solicitud no puede ser procesada.¡Le intivamos a intentarlo! o consulte al personal de la unidad');
        }else{ //RECUPERA DATOS DE AUTORIDAD
            $DatosPers=Personal::where('id','=',$autoridad)->first(); 
            $autoridadName = $DatosPers->full_name;
            $arrayautoridad = $DatosPers->jefe()->get();
            foreach ($arrayautoridad as $aut){
                $autentication = $aut['autentication'];
            }
            
            
        }
        $tipoConst = $request->tipo;
            // 1--Basica
            // 2--Con sueldo Base
            // 3--Con sueldo integral
            // 4-- para Jubilado  o pensionados
            // 5-- para sobreviviente
        
        $user=$this->User();
        $IdEmp = $user->personal_id;
        $privilegio = $user->privilege;
        $sedeEmp=$this->Sede();
        $personal = Personal::where('cedula','=',$request->cedula)->first();
        if ($personal){
            if ($privilegio == 3){
                if ($IdEmp != $personal->id) {
                    return Redirect::back()->with('error','No puede emitir documentacion de otro empleado, "verifique" e ¡intente de nuevo!');
                }
            }
            if($personal->sede_id != $sedeEmp->id){
                return Redirect::back()->with('error','Sus Datos no se corresponde a la sede de inicio de sesión. Cada SEDE O INSTITUTO debe generar la constancia de trabajo de sus empleados. "verifique" e ¡intente de nuevo!');
            }
            $arraytypepers = $personal->typepers()->get();
            foreach ($arraytypepers as $type) {
                $typepers = $type['name'];
                $typepersid = $type['id'];
            }
            $cargo = $personal->cargo;
              //*****************CONDICON LABORAL****************
            $condicion = DB::table('condicionlaborals')->where('id','=',$personal->condicionlaboral_id)->first();
        }else{
            return Redirect::back()->with('error','El empleado no existe en nuestra DB, "verifique" e ¡intente de nuevo!');
        }

        if(empty($personal->fec_ing )){ //si no tiene registro manda error
            return Redirect::back()->with('error','Esta persona se encuentra registrado en nuestra base de datos, pero no tiene "fecha de ingreso" registara. !consulte a la unidad correspondiente¡ e ¡intente de nuevo!');
        }
        if ($personal->condicionlaboral_id == 2){     // CONTRATADO       //¿COMO SE DEFINEN ???
            if(empty($personal->fec_egre )){
                $statudContrato = true;
            }else{
                $statudContrato = false;
            }
        }
        //$buscar = Pers_Sueldo::where('personal_id','=',$personal->id)->first(); 
        $dedicacion = $personal->dedication;

        //EVALUACION SEGUN LA CONDICION LABORAL Y TYPO DE CONSTANCIA
     
        if ($tipoConst == 1){
            if ($personal->condicionlaboral_id <= 2){ //'ACTIVO/CONTRATADO'
                if($personal->fec_egre){ 
                    return Redirect::back()->with('error','El empleado se encuentra con fecha  de jubilacion | pension / fecha de egreso, ya establecida. "consulte a la unidad" e ¡intente de nuevo!');
                }
            }elseif ($personal->condicionlaboral_id > 2){
                if(empty($personal->fec_egre )){
                    return Redirect::back()->with('error','El empleado se encuentra en condicion de jubilado | pensionado,  pero no tiene su fecha de egreso, establecida. "consulte a la unidad" e ¡intente de nuevo!');
                }
            }
        }
            //DECLARO VARIABLES
            $ALetras [] = ''; //conversion de numeros a letras
            $sueldo ='';
            $suma_asig = 0;
            $suma_extra = 0;
            $neto = '';
            $tiemp ='';
            $beneficiarios='';
            $arraycontrato='';
            $statudContrato='';  
    
                // TIPO DE CONSTANCIA
                // 1- Basica
                // 2- Con Sueldo Base
                // 3- Con Sueldo Integral
                // 4- Para Jubilado | pensionados
                // 5- Para Sobreviviente

      //¡¡esperando resp. 
        //     $arraycontrato = $personal->contrato()->get()->last();  //busca a traves del modelo el ultimo contrato del empleado
        //     if($arraycontrato){
        //         $begin=$arraycontrato->begin; //INICIO CONTRATO
        //         $end= $arraycontrato->end; //CULMINA
        //         //comprobando si fecha de contrato ya ha pasado...
        //         $fecha_actual = strtotime(date('Y-m-d'));
        //         $hasta = strtotime($end);
        //         if($fecha_actual > $hasta){
        //            $statudContrato = false;
        //             //return "La fecha ya ha pasado";
        //         }else{
        //             $statudContrato = true;
        //             //return "Aun toca trabajar";
        //         }
        //     }else{ //si no hay datos en BD '$arraycontrato'
        //         return Redirect::back()->with('error','El empleado se encuentra en condicion de '. 'CONTRATADO' . ' pero es imposible calcular su fecha de contrato "consulte con el administrador" e ¡intente de nuevo!');
        //     }


        // }

//---------------------------------------
// todo esto cambiara y tomara sueldo de nomina
//************************
     
        //CON SUELDO BASE
        if ($tipoConst == 2){
            $sueldo  = NominaExcel::where('personal_id','=',$personal->id)->orderBy('id','desc')->first();
            if (empty($sueldo)){
               return Redirect::back()->with('error','No tiene un sueldo definido.. "verifique" e ¡intente de nuevo!');
            }

           $monto= $sueldo['salario_basico'];
           $formatter = new NumeroALetras();
           $ALetras= $formatter->toMoney($monto, 2, 'Bolivares', 'CENTIMOS');
        }

        //CON SUELDO INTEGRAL
        if ($tipoConst == 3){
            $sueldo = NominaExcel::where('personal_id','=',$personal->id)->orderBy('id','desc')->first();  //SUELDO ASIGNADO A ESA NOMINA DEL EMPLEADO
            if (empty($sueldo)){
                return Redirect::back()->with('error','No tiene un sueldo definido.. "verifique" e ¡intente de nuevo!');
            }
            echo $neto= $sueldo['salario_integral'];
            $formatter = new NumeroALetras();
            echo $ALetras= $formatter->toMoney($neto, 2, 'Bolivares', 'CENTIMOS');
        }

        //PA' JUBILADOS O PENSIONADOS
        if ($tipoConst == 4) {
            if(empty($personal->fec_egre )){ //si tiene no registro manda error
                return Redirect::back()->with('error','Debe tener registrar la fecha egreso (de jubilacion | pension). "consulte con el administrador" e ¡intente de nuevo!');
            }
        }


        //PA' SOBREVIVIENTE AUN X SER DEFINIDA
        if ($tipoConst == 5) {
            $beneficiarios = $personal->beneficiarios()->get(); //traer beneficiarios "consulta x eloquen"
            if (empty($beneficiarios)){
                $beneficiarios=false;
            }
            //ojo NO SE HA CARGADO DATOS DE BENEFICIARIOS PARA ESTE TIPO DE CONSTANCIA
        }


        //CREANDO CODIGO
        $fecha= $this->FechaAct();
        $anio = Date('Y');
        $cod =  'CONST-'.$sedeEmp->abrev.'-'.$anio.'-'.$this->Codigo();  //sede+Aano+codigo

        // TIEMPO DE SERVICIO
        $TS =   true; 
        $anio = Date('Y');
        if (!empty ($TS)){
            if (empty($personal->fec_egre) ) {
                //   echo "trabaja aun desde hata fecha actual ";
                $date_Act = $this->FechaAct(); //fecha actual
                $fecha1 = new DateTime(date($personal->fec_ing));
                $fecha2 = new DateTime(date($date_Act));
                $tiemp = $fecha1->diff($fecha2);
            }elseif ($personal->fec_egre){
                //    echo "Ya no trabaja";
                $fecha1 = new DateTime(date($personal->fec_ing));
                $fecha2 = new DateTime(date($personal->fec_egre));
                $tiemp = $fecha1->diff($fecha2);
            }
        }
        DB::table('const_g_s')->insert([
            'codigo' => $cod,
            'fechaEmi' => $this->FechaAct(),
            'typeConst' => $tipoConst,
            'personal_id' => $personal->id,
            'user_id' => $user->id,
        ]);
        $pdf = PDF::loadView('Solicitar.Download.PDF-ConstTrab', 
        compact('autoridadName','autentication', 'personal','sedeEmp','condicion', 'tiemp',
        'beneficiarios','typepers', 'typepersid','dedicacion','cargo','tipoConst', 'ALetras',
        'sueldo', 'suma_asig', 'suma_extra', 'neto', 'arraycontrato', 'statudContrato', 'cod'));
        return $pdf->download('document.pdf');





    }

}