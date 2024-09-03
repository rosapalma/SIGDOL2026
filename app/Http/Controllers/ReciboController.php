<?php
//controlleder de data import de excel

namespace App\Http\Controllers;

use App\Models\Autoridad;
use App\Models\Sede;
use App\Models\Personal;
use App\Models\RecibosG;
use App\Models\NominaExcel;
use Illuminate\Http\Request; 
use PDF;
use DB;
use Auth;
use Redirect;
use View;

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

    public function User(){ //USER AUTH
        $user = Auth::User();
        return $user;
    }
    public function Sede(){ // SEDE DE USER AUTH
        $user = $this->user();
        $pers = Personal::where('id','=',$user['personal_id'])->first(); //datos del user en personal
        $sedeEmp = Sede::where('id','=',$pers->sede_id)->first(); //sede de empleado
        return $sedeEmp;
    }
    public function Autoridad(){
        $JefeDpto = Autoridad::where('statud','=',1)->first(); //verifica si hay una autoridad activa
        if ($JefeDpto){
            $arrayjefe = $JefeDpto->Personal()->get();
            foreach ($arrayjefe as $je) {
                $name=$je['name'];
                $last=$je['last_name'];
            }
            $autoridad = $last.' '. $name;
        }else{
            $autoridad = false;
        }
        return $autoridad;
    }

    public function Recibo(Request $request)
    {
        // $request->validate([
        //    'cedula' => 'required',
        //    'mes' => 'required',
        //    'anio' => 'required'
        // ]);
        //$cedula = 17708149;
        // $mes_selc = 02;
        // $anio_selc = 2024;ç
        $cedula = $request->cedula;
        $mes_selc = $request->mes;
        $anio_selc = $request->anio;
        $user = $this->User();
        $sedeEmp=$this->Sede();
        $IdEmp = $user['personal_id'];
        $privilegio = $user->privilege;     
        $fechaAct = Date('Y-m-d');

        //GENERANDO CODIGO
        $ult = RecibosG::all()->last(); // ultimo nro generado
        if(!empty($ult)){ //si existe almenos un registro
            $number = $ult->nro+1; //incremento
        }else{
            $number = 1;
        }
        $anio = Date('y');
        $length = 4;
        $string = substr(str_repeat(0, $length).$number, - $length);
        $cod =  $sedeEmp['abrev'].'-'.$anio.'-'.$string; 

        $autoridad = $this->Autoridad();
        //VALIDANDO Y PROCESANDO
        if ($autoridad){
            $personal = Personal::where('cedula','=',$cedula)->first(); 
            if ($personal){
                if ($privilegio == 3)  {
                    //continua
                    return $IdEmp;
                    if($IdEmp != $personal->id) {
                        return Redirect::back()->with('error','Sus cédula no correspoden al usuario de inicio de sesión; es decir, NO puede emitir documentación de otro Personal,  "verifique" e ¡intente de nuevo!');
                    }
                }

                if($sedeEmp['id'] == $personal->sede_id){
                    $arraytypepers = $personal->typepers()->get();
                    $arraycargo = $personal->cargo()->get();
                    $arrayspacework = $personal->spacework()->get();

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
        //CONSULTANDO NOMINAS...
        $nominas= $personal->nominas()->get();
        if(!empty($nominas) && count($nominas) > 0){
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
            DB::table('recibos_g_s')->insert([
                'codigo' => $cod,
                'fechaEmi' => $fechaAct,
                'nomina_id' => $idnomina,
                'personal_id' =>$IdEmp,
                'user_id' => $user->id,
            ]);

            $pdf = \PDF::loadView('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridad','personal','typepers','cargo','arraynomina','sedeEmp'));
            return $pdf->download('Recido de pago.pdf');

                //return view('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridad','direc','phone','personal','typepers','cargo', 'arraynomina','beca'));









    }

}
