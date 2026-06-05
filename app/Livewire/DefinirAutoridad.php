<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Personal;
use App\Models\Autoridad;
use App\Models\User;
use App\Models\AccionUser;
use Auth;

class DefinirAutoridad extends Component
{
    use WithFileUploads;
    public $UpdJefe, $cedula, $full_name, $autentication, $ruta, $User;

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
        }else{
            return back()->with('error','Cedula no existe'); 
        }
    }

 

    public function Save()
    {   
        $this->validate(['cedula' => 'required|numeric|exists:personals,cedula']);
        $this->validate(['autentication'=>'required|image|max:1024']);    
        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        $User = User::where('personal_id','=',$searchempleado->id)->first();

        if ($User){   
            //busca la fila del statud=1 y desactivalo
            $Tochange=Autoridad::where('statud','=',1)->first(); 
            if($Tochange){ //si existe autoridad anterior
                $Tochange->update([
                    'statud' => 0,
                ]);
                $Tochange->save(); 
                // quita privilegios a User
                $UserPriv= User::where('personal_id','=',$Tochange->personal_id)->first();
                if($UserPriv){
                    $UserPriv->update([
                        'privilege' => 3,
                    ]);
                    $UserPriv->save();
                }
            }
            //CAMBIA PRIVILEGIOS A USER
            $User->update([
                     'privilege' => 2,
                    ]);
            $User->save(); 
            $this->autentication->store('public/autenticaciones'); 
            $ImgAut=$this->autentication->store(); 
            //$this->ruta = $ruta;
            $AddNewjefe = Autoridad::create([
                'personal_id' => $searchempleado->id,
                'autentication' => $ImgAut,
                'statud' => 1,
            ]);
            $AddNewjefe->save(); 

        }else{
            return back()->with('error','Debe tener un usuario previamente creado, a quien asignarle privilegios');   
        }       





     
                     
        
        //REGISTRA ACCION user 
        $RegistAccion = AccionUser::create([
            'user_id' => Auth::User()->id,
            'accion' => 'change Autoridad, ahora personal_id: '.$searchempleado->id,
        ]);
        $RegistAccion->save();
        $this->clear();
        return back()->with('mensaje','Responsable de Unidad actualizado');                
    }



    public function clear(){
		$this->cedula='';
		$this->UpdJefe = false;
		$this->full_name ='';
        $this->ruta = '';
        $this->autentication = '';
	}

}
