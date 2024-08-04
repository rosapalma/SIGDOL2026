<?php
//controlleder de data import de excel

namespace App\Http\Controllers;

use App\Models\Jefe;
use App\Models\Sede;
use App\Models\Empleado;
use App\Models\RecibosG;
use Barryvdh\DomPDF\PDF;
use App\Models\NominaExcel; //sin utilida, tomada de relacion eloquent
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReciboController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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





   public function Recibo(Request $request)
    {
        $request->validate([
           'cedula' => 'required',
           'mes' => 'required',
           'anio' => 'required'
        ]);
        $user = Auth::User();
        $array_sede = $user->sede()->get();

        $IdEmp = $user->empleado_id;
        $privilegio = $user->privilege;

        foreach ($array_sede as $se) {
            $sede_id=$se['id'];
            $sede_abrev=$se['abrev'];
            $direc=$se['direc'];
            $phone=$se['phone'];
        }
        $fechaAct = Date('Y-m-d');
        $ult = RecibosG::all()->last(); // ultimo nro generado
        if(!empty($ult)){ //si existe almenos un registro
            $number = $ult->nro+1; //incremento
        }else{
            $number = 1;
        }
        //Generando codigo de cuatro digitos a partir del ultimo registro
        $anio = Date('y');
        $length = 4;
        $string = substr(str_repeat(0, $length).$number, - $length); //GENERANDO NRO DE 4 DIGITOS
        $cod =  $sede_abrev.'-'.$anio.'-'.$string; //DEFINIENDO CODIGO....
        $mes_selc = (int) $request->mes;
        $anio_selc = (int) $request->anio;


        $JefeDpto = Jefe::where('statud','=',1)->first();

        if ($JefeDpto){
            $personal = Empleado::where('cedula','=',$request->cedula)->first(); //OJO TRABAJAR CON COUNT TIEMPO de ingreso, para validar antiguedad
            if ($personal){
                if ($privilegio == 3)  {
                    //continua
                    if($IdEmp != $personal ->id) {
                         return Redirect::back()->with('error','Sus cédula no correspoden al usuario de inicio de sesión; es decir, NO puede emitir documentación de otro empleado,  "verifique" e ¡intente de nuevo!');
                    }
                }

               // echo $request->sede;
                $sede = Sede::where('id','=',$request->sede)->first();
                if($sede_id == $personal->sede_id){
                    //sql Eloqent
                    $arrayAutoridad = $JefeDpto->empleado()->get();
                    $arraytypepers = $personal->typepers()->get();
                    $arraycargo = $personal->cargo()->get();
                    //$arrayspacework = $personal->spacework()->get();

                    $autoridad = $this->Autoridad();

                    foreach ($arraytypepers as $type) {
                            $typepers=$type['name'];
                    }
                    foreach ($arraycargo as $car) {
                            $cargo=$car['name'];
                            // $nivel=$car['nivel'];
                    }
                    // foreach ($arrayspacework as $space) {
                    //         $spacework=$space['name'];
                    // }
                }else{ //if (verifica sedes)
                    return Redirect::back()->with('error','El empleado no se corresponde a la sede de inicio de sesión. Cada SEDE O INSTITUTO debe generar la constancia de trabajo de sus empleados, "verifique" e ¡intente de nuevo!');
                }

            }//if personal
            else{
                return Redirect::back()->with('error','Disculpe!, esta persona no se encuentra registrado, consulte al administrador');
            }
        }//if jefe
        else{
            return Redirect::back()->with('error','No puede continuar, dado a que no ha definido ninguna autoridad, quien certificara dicho documento , consulte al administrador');
        }

        $nominas= $personal->nominasExcel()->get();
       // $nominas = NominaExcel::where('empleado_id','=',$personal->id)->get(); //traer todas

           if(!empty($nominas) && count($nominas) > 0){
                   echo 'si tiene';
                    foreach($nominas as $nom){
                        if(($nom['mes'] == $mes_selc) && ($nom['anio'] == $anio_selc)) {
                           $arraynomina = $nom;
                           $idnomina = $nom->id;
                        }else{
                            return Redirect::back()->with('error','Su solicitud no puede ser procesada, pueda que aun no se han cargado al sistema la nómina correspondiente al mes/año seleccionado. Debe esperar o consulte al administrador');
                        }
                    }

            }else{
              return Redirect::back()->with('error','No ha sido cargada al sistema la nomina correspondien al mes/año seleccionado, consulte al administrador');
            }
            $idempleado= $personal->id;
            DB::table('recibos_g_s')->insert([
                'codigo' => $cod,
                'nro' => $number,
                'fechaEmi' => $fechaAct,
                'nomina_id' => $idnomina,
                'empleado_id' =>$idempleado,
                'sede_id' => $sede_id,
                'user_id' => $user->id,
            ]);


            $pdf = \PDF::loadView('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridad','direc','phone','personal','typepers','cargo','arraynomina'));
            return $pdf->download('Recido de pago.pdf');

                //return view('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridad','direc','phone','personal','typepers','cargo', 'arraynomina','beca'));









    }

}
