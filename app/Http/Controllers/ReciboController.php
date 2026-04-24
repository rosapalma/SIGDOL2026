<?php
//controlleder de data import de excel

namespace App\Http\Controllers;

use App\Models\Autoridad;
use App\Models\Sede;
use App\Models\Personal;
use App\Models\Beneficiario;
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
                $autoridad=$je['id'];
            }
            $autoridad= $autoridad;
            return $autoridad;
        }
    }

    public function Recibo(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'mes' => 'required',
            'anio' => 'required'
        ]);
        //VERIFICANDO SI HAY AUTORIDAD ASIGNADO
        $autoridad= $this->Autoridad();
        if (empty($autoridad)){
              return Redirect::back()->with('error','No puede continuar, dado a que no se ha definido quien certificara dicho documento. Le invitamos a intentarlo mas tarde , consulte al administrador');
        }else{ //RECUPERA DATOS DE AUTORIDAD
            $DatosPers=Personal::where('id','=',$autoridad)->first(); 
            $autoridadName = $DatosPers->full_name;
            $arrayautoridad = $DatosPers->jefe()->get();
            foreach ($arrayautoridad as $aut){
                $autentication = $aut['autentication'];
            }           
        }
        $cedula = $request->cedula;
        $mes_selc = $request->mes;
        $anio_selc = $request->anio;
        $user = $this->User();
        $sedeEmp=$this->Sede();
        $IdEmp = $user['personal_id'];
        $privilegio = $user->privilege;     
        $fechaAct = Date('Y-m-d');
        $beneficiarios=0;

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
                $cargo = $personal->cargo;
                $arrayspacework = $personal->spacework()->get();
                foreach ($arraytypepers as $type) {
                    $typepers=$type['name'];
                    $typepersid = $type['id'];
                }
                // foreach ($arrayspacework as $space) {
                //         $spacework=$space['name'];
                // }
            }else{ //if (verifica sedes)
                return Redirect::back()->with('error','El empleado no se corresponde a la sede de inicio de sesión. Cada SEDE O INSTITUTO debe generar la constancia de trabajo de sus empleados, "verifique" e ¡intente de nuevo!');
            }
                //DEDICATION
     
            $dedicacion = $personal->dedication;

        }//if personal
        else{
            return Redirect::back()->with('error','Disculpe!, esta persona no se encuentra registrado, consulte al administrador');
        }
        //SOBREVIVIENTE
        if ($request->has('checkSobrev')) {
            $beneficiarios = $personal->beneficiarios()->get(); 
        }
        //CONSULTANDO NOMINAS PARA TRAER LA ID DE LA SELECCIONADA SEGUN MES-AÑO...
        $nominas= $personal->nominas()->orderBy('id','desc')->get();
        if($nominas){
            foreach($nominas as $nom){              
                if(($nom['mes'] == $mes_selc) && ($nom['anio'] == $anio_selc)){
                   $arraynomina = $nom;
                   $idnomina = $nom->id;
                   DB::table('recibos_g_s')->insert([
                    'codigo' => $cod,
                    'fechaEmi' => $fechaAct,
                    'nomina_id' => $idnomina,
                    'personal_id' =>$IdEmp,
                    'user_id' => $user->id,
                    ]);
                }else{
                    return Redirect::back()->with('error','No ha sido cargada al sistema la nomina correspondien al mes/año seleccionado, consulte al administrador');
                }
            } //END FOREACH
                   
        }else{
            return Redirect::back()->with('error','Aun NO tiene ninguna nomina registrada, consulte al administrador');
        }
        $pdf = \PDF::loadView('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridadName','autentication','personal','typepers','typepersid','cargo','dedicacion','arraynomina','sedeEmp','beneficiarios'));
        return $pdf->download('Recido de pago.pdf');
    }

}
