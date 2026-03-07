<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personal;
use App\Models\NominaExcel;
use App\Models\AccionUser;
use Auth;

use DB;

class DeletNominaComponet extends Component
{
    public $edita=false, $accion, $cedula, $full_name, $IdEmpl, $mes, $anio, $nominas, $Nomina;
    public function render()
    {
        return view('livewire.delet-nomina-componet');
    }
    public function Editar(){
        $this->edita= true;
    }
    // BUSCAR POR EMPLEADO
    public function Shear()
    {
        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        if($searchempleado){ 
            $user = $searchempleado->user;
            $this->full_name = $searchempleado->full_name;
            $this->IdEmpl = $searchempleado->id;
            $searchnominas = NominaExcel::where('personal_id','=',$searchempleado->id)->get();
            $this->nominas = $searchnominas;
        }
    }
    // BUSCAR POR MES Y AÑO
    public function ShearMesAnio(){
        $searchnominas = NominaExcel::where([
            ['mes','=',$this->mes],
            ['anio', '=',$this->anio]
            ])->get() ;
         $this->nominas = $searchnominas;
         //fetchAll()
    }
    public function Todas(){    
        $searchnominas = NominaExcel::count();
        $this->nominas = $searchnominas;
         //fetchAll()
    }

    public function Save(){
        $this->validate(['accion' => 'required']);
        if ($this->accion ==1){  
            $this->validate(['cedula' => 'required|numeric']);        
            $this->validate(['Nomina' => 'required']);  

            $registro = NominaExcel::where('id','=',$this->Nomina)->first();   // Encontrar el registro 
                 //REGISTRA ACCION user antes de eliminar
            $RegistAccion = AccionUser::create([
            'user_id' => Auth::User()->id,
            'accion' => 'Eliminada, Nom. Mes/año:'. $registro->mes.'/'.$registro->anio.', personal_id:'.$registro->personal_id,
             ]);    
            $RegistAccion->save();
            //eliminar registro
            $registro->delete();
            $this->clear();
            session()->flash('mensaje', 'Registro eliminado correctamente.');             
        }elseif($this->accion ==2){
            //falta guardar AccionUser
             $RegistAccion = AccionUser::create([
            'user_id' => Auth::User()->id,
            'accion' => 'Eliminada, Nom. Mes/año: '. $this->mes.'/'.$this->anio.'personal:'.$this->IdEmpl,
             ]); 
            $registro = NominaExcel::where([
            ['mes','=',$this->mes],
            ['anio', '=',$this->anio],
            ])->delete();
            $this->clear();
            session()->flash('mensaje', 'Registro eliminado correctamente.');  
        }elseif($this->accion=3){
            $registro = NominaExcel::count();
            if ($registro > 0){
                DB::table('nomina_excels')->truncate(); //vaciar tabla
                 $RegistAccion = AccionUser::create([
            'user_id' => Auth::User()->id,
            'accion' => 'Registro de nomina eliminados todos',
             ]); 
                $this->clear();
                session()->flash('mensaje', 'Todas la Nominas fueron eliminadas...');
                //falta guardar AccionUser
            }else{
                $this->clear();
                session()->flash('alert', 'No hay nada para eliminar...'); 
            }            
             
        }
    }

    public function close(){
        $this->edita=false;
        $this->clear();
    }
    public function clear(){
        $this->cedula= '';
        $this->accion ='';
        $this->mes='';
        $this->anio='';
        $this->full_name ='';
        $this->IdEmpl='';
        $this->Nomina='';
        $this->nominas='';
        $this->searchnomina='';
    }
}
