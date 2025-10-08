<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personal;
use App\Models\Autoridad;
use Auth;

class DefinirAutoridad extends Component
{
    public $UpdJefe, $cedula, $full_name;
    // public $admin;
	// public $mount, $jefedpto,  $cedula, $NewJefe, $exist;
	// public $LastNameNewJefe, $NameNewJefe, $personal_id, $userSelec;
	// public $idUsers, $vacio;

    public function render()
    {
        $jefe=Autoridad::where('statud','=',1)->first();
		if ($jefe){
			$searchNom = Personal::where('id','=',$jefe->personal_id)->first();
            $vacio = false;
		}else{
			$vacio = true;
            $jefe = '';
            $searchNom = '';
		}
        return view('livewire.definir-autoridad',['jefe'=>$jefe, 'searchNom'=>$searchNom, 'vacio'=>$vacio]);
    }

    public function Update()
    {
        $this->UpdJefe = true;
    }
    public function Shear()
    {
        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        if($searchempleado){
            $this->full_name = $searchempleado->full_name;
        }
    }

    public function Save()
    {   
        $this->validate(['cedula' => 'required|numeric']);
        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        if ($searchempleado) {
            $Tochange=Autoridad::where('statud','=',1)->first(); //busca la fila del statud=1 y desactivalo
            if($Tochange){
                $Tochange->update([
                'statud' => 0,
                ]);
                $Tochange->save();
            }
        }	    
	    $search=Autoridad::where('personal_id','=',$searchempleado->id)->first();
        if($search){ //si este empleado ya ha sido jefe anteriormente actualizalo
            $search->update([
                'statud' => 1,
            ]);
            $search->save();
        }else{  //sino agregalo
            $AddNewjefe = Autoridad::create([
            'spacework_id' => $searchempleado->spacework_id,
            'personal_id' => $searchempleado->id,
            'statud' => 1,
            ]);

            $AddNewjefe->save();
        }
		$this->clear();
		return back()->with('mensaje','Responsable de Unidad actualizado');

    }



    public function clear(){
		$this->cedula='';
		$this->UpdJefe = false;
		$this->full_name ='';
	}

}
