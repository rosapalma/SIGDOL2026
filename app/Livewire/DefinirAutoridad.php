<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Personal;
use App\Models\Autoridad;
use Auth;

class DefinirAutoridad extends Component
{
    use WithFileUploads;
    public $UpdJefe, $cedula, $full_name, $autentication, $ruta;

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
        $this->validate(['autentication'=>'required|image|max:1024']);

        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        if ($searchempleado) { 

            $Tochange=Autoridad::where('statud','=',1)->first(); //busca la fila del statud=1 y desactivalo
            if($Tochange){
                $Tochange->update([
                'statud' => 0,
                ]);
                $Tochange->save();
            }
            $this->autentication->store('public/autenticaciones'); 
            $ImgAut=$this->autentication->store(); 
            //$this->ruta = $ruta;

             $AddNewjefe = Autoridad::create([
                'personal_id' => $searchempleado->id,
                'autentication' => $ImgAut,
                'statud' => 1,
                ]);
                $AddNewjefe->save(); 
            $this->clear();
            return back()->with('mensaje','Responsable de Unidad actualizado');   
        }
		

    }



    public function clear(){
		$this->cedula='';
		$this->UpdJefe = false;
		$this->full_name ='';
        $this->ruta = '';
        $this->autentication = '';
	}

}
