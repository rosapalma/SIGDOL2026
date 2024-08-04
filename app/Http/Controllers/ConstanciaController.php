<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Jefe;
use App\Models\Emple_Sueldo;
use DB;
use PDF;  //download
use Redirect;
use Auth;
use App\Models\ConstG;
use NumerosEnLetras;
use DateTime;
use Illuminate\Support\Arr;


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
        $user = Auth::User();
        $sede = $user->sede()->get();
        return $sede;
    }
    public function FechaAct(){
        $fecha = Date('Y-m-d');
        return $fecha;
    }
    public function Autoridad(){
        $JefeDpto = Jefe::where('statud','=',1)->first(); //verifica si hay una autoridad activa
        if ($JefeDpto){
            $arrayjefe = $JefeDpto->empleado()->get();
            foreach ($arrayjefe as $je) {
                $name=$je['name'];
                $last=$je['last_name'];
            }
            $autoridad = $last.' '. $name;
            return $autoridad;

        }else{
            return Redirect::back()->with('error','Necesita definir una autoridad!, consulte al administrador');
        }
    }
    public function Codigo(){ //Generando codigo de seis digitos
         $ult = ConstG::all()->last(); // busca ultima constancia generada
        if(!empty($ult)){ //si existe almenos un registro
            $number = $ult->id+1; //incremento
        }else{
            $number = 1;
        }
        $length = 6;
        $string = substr(str_repeat(0, $length).$number, - $length);
        return $string;
    }




    //************GENERAR CONSTANCIAS DE TRABAJO **************

    public function Const(Request $request){
        $request->validate([
            'cedula' => 'required',
            'tipo' => 'required'
        ]);

        $tipoConst = $request->tipo;
            // 1--Basica
            // 2--Con sueldo Base
            // 3--Con sueldo integral
            // 4-- para Jubilado  o pensionados
            // 5-- para sobreviviente
        $user=$this->User();
        $sede=$this->Sede();

            $IdEmp = $user->empleado_id;
            $privilegio = $user->privilege;

        foreach ($sede as $se) { //array sede Auth
            $sede_id=$se['id'];
            $sede_abrev=$se['abrev'];
            $city=$se['city'];
            $direc=$se['direc'];
            $phone=$se['phone'];
        }
        $autoridad = $this->Autoridad();

        $personal = Empleado::where('cedula','=',$request->cedula)->first();
        if ($personal){
            if ($privilegio == 3)  {
               //continua
               if($IdEmp != $personal ->id) {
                    return Redirect::back()->with('error','Su cédula no correspoden al usuario de inicio de sesión; es decir, NO puede emitir documentacion de otro empleado, "verifique" e ¡intente de nuevo!');
                }
            }
            if($personal->sede_id == $sede_id){
                $arraytypepers = $personal->typepers()->get();
                $arraycargo = $personal->cargo()->get();
                //$arraycondicion = $personal->condicionlaboral('condicionlaboral_id')->get();  // omito la consult ORM, ya que solo necesito saber el id de la condicion
                foreach ($arraytypepers as $type) {
                   $typepers_id = $type['id'];
                   $typepers = $type['name'];
                }
                foreach ($arraycargo as $car) {
                    $cargo_id = $car['id'];
                      $cargo = $car['name'];
                }
                $condicion = DB::table('condicionlaborals')->where('id','=',$personal->condicionlaboral_id)->first();
                    //*****************CONDICON LABORAL****************
                            //1. Activo
                            //2. Contratado
                            //3. Jubilado
                            //4. Pensionado
                            //5. Sobreviviente

            }else{
                return Redirect::back()->with('error','Sus Datos no se corresponde a la sede de inicio de sesión. Cada SEDE O INSTITUTO debe generar la constancia de trabajo de sus empleados. "verifique" e ¡intente de nuevo!');
            }

        }else{
            return Redirect::back()->with('error','El empleado no existe en nuestra DB, "verifique" e ¡intente de nuevo!');
        }

        // TIPO DE CONSTANCIA
            // 1- Basica
            // 2- Con Sueldo Base
            // 3- Con Sueldo Integral
            // 4- Para Jubilado | pensionados
            // 5- Para Sobreviviente
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
        $direc;
        $phone;




        if(empty($personal->fec_ing )){ //si no tiene registro manda error
            return Redirect::back()->with('error','Esta persona se encuentra registrado en nuestra base de datos, pero no tiene "fecha de ingreso" registara. !consulte con el administrador¡ e ¡intente de nuevo!');
        }

        //EVALUACION SEGUN LA CONDICION LABORAL
            //ACTIVO )
        if ($personal->condicionlaboral_id == 1){
            if(!empty($personal->fec_egre )){ //si tiene registro manda error
                return Redirect::back()->with('error','El empleado se encuentra con fecha de jubilacion | pension  ya establecida. "consulte con el administrador" e ¡intente de nuevo!');
            }
        }
            // CONTRATADO       //¿COMO SE DEFINEN ???
        if ($personal->condicionlaboral_id == 2){
            if(empty($personal->fec_egre )){
                $statudContrato = true;
            }else{
                $statudContrato = false;
            }
        }
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

        //     if ($tipoConst > 3){ //4 0 5
        //         return Redirect::back()->with('error','No puede emitir ese tipo de constancia,Es solo para personal jubilado, pensionado o sobreviviente. "consulte con el administrador" e ¡intente de nuevo!');
        //     }
        // }





        // CONSTACIA BASICA
        if ($tipoConst == 1 ){
          //CON LOS DATOS DEL PERSONAL, YA TENGO TODO
        }

        //CON SUELDO BASE
        if ($tipoConst == 2){
            $sueldo  = Emple_Sueldo::where('empleado_id','=',$personal->id)->first();
            if (empty($sueldo)){
                return Redirect::back()->with('error','No tiene un sueldo definido.. "verifique" e ¡intente de nuevo!');
            }
            $ALetras = NumerosEnLetras::convertir(number_format($sueldo['salario_base'],2),'Bolivares',false,'Centimos');
        }

        //CON SUELDO INTEGRAL
        if ($tipoConst == 3){
            $sueldo  = Emple_Sueldo::where('empleado_id','=',$personal->id)->first();  //SUELDO ASIGNADO A ESA NOMINA DEL EMPLEADO
            if (empty($sueldo)){
                return Redirect::back()->with('error','No tiene un sueldo definido.. "verifique" e ¡intente de nuevo!');
            }
            $neto=$sueldo->salario_integral;
            $ALetras = NumerosEnLetras::convertir(number_format($sueldo['salario_integral'],2),'Bolivares',false,'Centimos');
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
        $cod =  'CONST-'.$sede_abrev.'-'.$anio.'-'.$this->Codigo();  //sede+Aano+codigo
        // echo "<br> codigo: ",$cod;
        // echo "<br> Año: ",$anio;




        // TIEMPO DE SERVICIO
        $TS =   $request->TS; $anio = Date('Y');
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



            // echo "<br><br><br><b>Tipo de Constancia: ",$tipoConst,"</b><br>";
            // echo "Empleado: ", $personal->name, $personal->last_name;
            // echo "<br> Tipo de personal: ", $personal->typepers('name')->get();
            // echo "<br> Condicion laboral: ", $personal->condicionlaboral_id;
            // echo "<br> suma de asignaciones: ", $suma_asig;
            // echo "<br> Sueldo base: ",$sueldo;
            // echo "<br> Total a pagar: ",$neto;
            // //echo "<br> Tiempo de servicio: ",$tiemp;
            // echo "<br> beneficiarios: ",$beneficiarios;
            // echo "<br> array contrato bd: ",$arraycontrato;
            // echo "<br> estatu del contrato: ", $statudContrato;
            // echo "<br> Direccion de sede: ",$direc;
            // echo "<br> Telefono: ",$phone;


            DB::table('const_g_s')->insert([
                'codigo' => $cod,
                'fechaEmi' => $this->FechaAct(),
                'typeConst' => $tipoConst,
                'empleado_id' => $personal->id,
                'sede_id' => $sede_id,
                'user_id' => $user->id,
            ]);




              //ver en pdf en una nueva pestaña
            $pdf = PDF::loadView('Solicitar.Download.PDF-ConstTrab',
                  compact('personal','typepers','cargo','autoridad','sede','condicion','arraycontrato','statudContrato','sueldo','tiemp','ALetras','sueldo','city','direc','phone','tipoConst', 'beneficiarios','tiemp','ALetras','suma_asig','neto'));
           return $pdf->download('Constancia-de-trabajo.pdf');

          //      return view('Solicitar.Download.const-trab-pdf',
            //        compact('personal','typepers','cargo','jefe','sede','condicion','arraycontrato','statudContrato','sueldo','tiemp','ALetras','suma_asig'))
              //      ->with('city', $city)
                //    ->with('direc', $direc)
                  //  ->with('phone', $phone)
                    //->with('tipoConst', $tipoConst)
                //    ->with ('beneficiarios', $beneficiarios)
                  //  ->with('neto',$neto)
                   // ->with('statudContrato',$statudContrato);





    }




}
