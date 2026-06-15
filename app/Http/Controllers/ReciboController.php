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
            //'cedula' => 'required',
            'mes' => 'required',
            'anio' => 'required'
        ]);
        //VERIFICANDO SI HAY AUTORIDAD ASIGNADO
        $autoridad= $this->Autoridad();
        if (empty($autoridad)){
              return Redirect::back()->with('error','No puede continuar, dado a que no se ha definido quien certificará dicho documento. Le invitamos a intentarlo mas tarde , consulte al administrador');
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
        $beneficiarios=[];




        //GENERANDO CODIGO
        $ult = RecibosG::all()->last(); // ultimo nro generado
        if(!empty($ult)){ //si existe almenos un registro
            $number = $ult->id + 1; //incremento
        }else{
            $number = 1;
        }
        $anio = Date('y');
        $length = 6;
        $string = substr(str_repeat(0, $length).$number, - $length);
        $cod =  $sedeEmp['abrev'].'-'.$anio.'-'.$string; 




        $autoridad = $this->Autoridad();
        //VALIDANDO Y PROCESANDO


        if ($privilegio == 3){
            $personal = Personal::where('id','=',$IdEmp)->first();  
        }else{
           $personal = Personal::where('cedula','=',$request->cedula)->first(); 
           if (empty($personal)){
                return Redirect::back()->with('error','El empleado no existe en nuestra DB, "verifique" e ¡intente de nuevo!');
           }
          
            
          
        }
        if($personal->condicion){
            return Redirect::back()->with('error','No puede emitir este tipo de documentoción, consulte al administrador');
        }
        $arraytypepers = $personal->typepers()->get();
        $cargo = $personal->cargo;
        $arrayspacework = $personal->spacework()->get();
        foreach ($arraytypepers as $type) {
            $typepers=$type['name'];
            $typepersid = $type['id'];
        }
        $dedicacion = $personal->dedication;
        //SOBREVIVIENTE
        if ($request->has('checkSobrev')) {
            $beneficiarios = $personal->beneficiarios()->get(); 
        }
        //CONSULTANDO NOMINAS PARA TRAER LA ID DE LA SELECCIONADA SEGUN MES-AÑO...
        

        $nominas= $personal->nominas()->orderBy('id','asc')->get();
        if($nominas){
            foreach($nominas as $nom){              
                if(($nom['mes'] == $mes_selc) && ($nom['anio'] == $anio_selc)){
                   $nominasAnioMes = $nom; //nominas de año y mes
                   $arraynomina = $nominasAnioMes;
                   $idnomina = $arraynomina->id;
                }else{
                    return Redirect::back()->with('error','No ha sido cargada al sistema la nomina correspondien al mes/año seleccionado, consulte al administrador');
                }
            } //END FOREACH
            

            DB::table('recibos_g_s')->insert([
                    'codigo' => $cod,
                    'fechaEmi' => $fechaAct,
                    'nomina_id' => $idnomina,
                    'personal_id' =>$IdEmp,
                    'user_id' => $user->id,
                    ]);
                   
        }else{
            return Redirect::back()->with('error','Aun NO tiene ninguna nomina registrada, consulte al administrador');
        }
        $pdf = \PDF::loadView('Solicitar.Download.PDF-ReciboPago',compact('fechaAct','cod','autoridadName','autentication','personal','typepers','typepersid','cargo','dedicacion','arraynomina','sedeEmp','beneficiarios'));
        //$pdf->setPaper('a4', 'landscape'); //horizontal
        return $pdf->download('Recido de pago.pdf');
    }

}
