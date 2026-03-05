<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Personal;
use Auth;
use Session;
use Hash;
use Livewire\WithPagination;

use Livewire\Component;

class AdmUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
	public  $empls, $mensaje;
    public $edita=false, $full_name, $cedula, $user, $email, $privilege, $IdEmpl, 
    $Actpriv, $Actcont, $contraseña, $contraseña_confirmation;

    function mount(){	
        $empls = Personal::all();
        $this->empls = $empls;
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.adm-users', compact('users'));
    }

    protected $rules = [
        'cedula' => ['required','exists:personals,cedula'],
        //'privilege' => ['required'],
        //'contraseña' => ['required', 'min:8', 'confirmed'],
    ];

    public function Statud($id){    
        $user = User::where('id','=', $id)->first();
        $this->userSelec = $user->statud;
        if($user->statud == 1){
            $user->statud = 0;
            $user->save();
            if($user->id == Auth::User()->id){
                Session::flush(); //ah cerrado su seccion
                $this->mount();
                return back()->with('change_user_find','su seccion se ha cerrado...');
            }
        }else{
            $user->statud = 1;
            $user->save();
        }
        $this->mount();
        return back()->with('change_user','Usuario ahora actualizado');
    }

   //Actualizar usuario
    public function Editar(){
        $this->edita= true;
    }

    //buscar
    public function Shear()
    {
        $searchempleado = Personal::where('cedula','=',$this->cedula)->first();
        if($searchempleado){ 
            $user = $searchempleado->user;
            $this->full_name = $searchempleado->full_name;
            $this->email = $user->email;
            $this->privilege = $user->privilege;
            $this->IdEmpl = $searchempleado->id;
        }
    }
  
    public function update(){
        $this->validate(); 
        $UpdateUser =  User::where('personal_id','=', $this->IdEmpl)->first(); 
        if($this->Actpriv){           
            $UpdateUser->update([
                'privilege' => $this->privilege,
                'user_update' =>  Auth::user()->id,
            ]);   
            $UpdateUser->save();      
        }
        if($this->Actcont){ 
            $this->validate(['contraseña' => 'required', 'min:8', 'confirmed']);       
            $UpdateUser->update([
                'password' => Hash::make($this->contraseña),
                'user_update' =>  Auth::user()->id,
            ]); 
            $UpdateUser->save();        
        }        
        $this->clear();
        $this->close();
        return back()->with('change_user','Usuario ahora actualizado');
    }

    public function close(){
        $this->edita=false;
    }

    public function clear(){
        $this->cedula ='';
        $this->IdEmpl='';
        $this->full_name = '';
        $this->email = '';
        $this->privilege = '';
        $this->contraseña = '';
        $this->contraseña_confirmation = '';
    }
}