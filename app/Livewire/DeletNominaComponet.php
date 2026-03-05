<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personal;
use App\Models\NominaExcel;
use DB;

class DeletNominaComponet extends Component
{
    public $edita=false, $list, $cedula, $full_name, $IdEmpl, $mes, $anio, $nominas, $Nomina;
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
         // $registro = NominaExcel::where([
         //    ['mes','=',$this->mes],
         //    ['anio', '=',$this->anio]
         //    ])->get() ;
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
        $this->validate(['list' => 'required']);
        if ($this->list ==1){            
            $registro = NominaExcel::where('id','=',$this->Nomina)->first();   // Encontrar el registro 
            $registro->delete();
            $this->clear();
            session()->flash('mensaje', 'Registro eliminado correctamente.');             
        }elseif($this->list ==2){
            $registro = NominaExcel::where([
            ['mes','=',$this->mes],
            ['anio', '=',$this->anio]
            ])->delete();
            $this->clear();
            session()->flash('mensaje', 'Registro eliminado correctamente.');  
        }elseif($this->list=3){
            $registro = NominaExcel::count();
            if ($registro > 0){
                DB::table('nomina_excels')->truncate(); //vaciar tabla
                $this->clear();
                session()->flash('mensaje', 'Todas la Nominas fueron eliminadas...');
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
        $this->list ='';
        $this->mes='';
        $this->anio='';
        $this->full_name ='';
        $this->IdEmpl='';
        $this->Nomina='';
        $this->nominas='';
        $this->searchnominas='';
    }
}
